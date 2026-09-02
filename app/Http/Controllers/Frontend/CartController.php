<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;

class CartController extends Controller
{
    /**
     * Display cart page
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        
        $bogoData = $this->applyMixAndMatchBogo($cart);
        $cart = $bogoData['cart'];
        $bogoDiscount = $bogoData['total_discount'];
        
        $subTotal = 0;
        $totalItems = 0;

        foreach ($cart as $item) {
            $itemPrice = ($item['price'] ?? 0);
            $subTotal += $itemPrice * ($item['qty'] ?? 1);
            $totalItems += $item['qty'];
        }

        $totalAfterBogo = $subTotal - $bogoDiscount;

        // ---- DYNAMIC COUPON RE-CALCULATION ----
        $couponCode = session('coupon_code');
        $couponDiscount = 0;

        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->where('status', 'active')->first();
            if ($coupon && $coupon->isValid() && (!$coupon->min_order_amount || $totalAfterBogo >= $coupon->min_order_amount)) {
                $couponDiscount = $coupon->calculateDiscount($totalAfterBogo);
                session()->put('coupon_discount', $couponDiscount);
            } else {
                session()->forget(['coupon_code', 'coupon_discount']);
                $couponCode = null;
            }
        }
        
        // ---- SARE ACTIVE COUPONS FETCH KAREIN ----
        // Yeh database se saare active coupons nikal kar Blade file ke liye ready karega
        $availableCoupons = Coupon::where('status', 'active')->get();
        
        session()->put('cart', $cart);
        session()->put('bogo_discount', $bogoDiscount);
        session()->put('total_after_bogo', $totalAfterBogo);
        session()->put('cart_total_items', $totalItems);

        // compact() ke andar 'availableCoupons' pass kar diya gaya hai
        return view('cart', compact(
            'cart', 
            'subTotal', 
            'bogoDiscount', 
            'totalAfterBogo',
            'totalItems',
            'couponDiscount',
            'couponCode',
            'availableCoupons'
        ));
    }
    
    /**
     * Coupon Code Apply Karne Ke Liye
     */
    public function applyCoupon(Request $request)
    {
        $couponCode = strtoupper(trim($request->coupon_code));

        if (empty($couponCode)) {
            return response()->json(['success' => false, 'message' => 'Please enter a coupon code.']);
        }

        $coupon = Coupon::where('code', $couponCode)->where('status', 'active')->first();

        if (!$coupon || !$coupon->isValid()) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired coupon code.']);
        }

        $cartTotalAfterBogo = session('total_after_bogo', 0);
        
        if ($coupon->min_order_amount && $cartTotalAfterBogo < $coupon->min_order_amount) {
            return response()->json(['success' => false, 'message' => 'Minimum order amount is ₹' . number_format($coupon->min_order_amount, 2)]);
        }

        $discountAmount = $coupon->calculateDiscount($cartTotalAfterBogo);
        
        session([
            'coupon_code' => $coupon->code,
            'coupon_discount' => $discountAmount
        ]);

        return response()->json([
            'success' => true, 
            'message' => 'Coupon applied successfully!',
            'coupon_discount' => '₹' . number_format($discountAmount, 2),
            'grand_total' => '₹' . number_format(($cartTotalAfterBogo - $discountAmount), 2)
        ]);
    }

    /**
     * Coupon Code Remove Karne Ke Liye
     */
    public function removeCoupon()
    {
        session()->forget(['coupon_code', 'coupon_discount']);

        return response()->json([
            'success' => true,
            'message' => 'Coupon removed successfully.'
        ]);
    }

    /**
     * Poora Cart Saaf Karne Ke Liye
     */
    public function clearCart()
    {
        session()->forget(['cart', 'coupon_code', 'coupon_discount', 'bogo_discount', 'total_after_bogo', 'cart_total_items']);

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully.'
        ]);
    }

    /**
     * Add product to cart via AJAX
     */
    public function addToCart(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            $quantity = max(1, (int) $request->quantity);
            $color = $request->color ?? '';
            $size = $request->size ?? '';
            $extraPrice = (float) ($request->extra_price ?? 0);

            $basePrice = $product->sale_price ?? $product->price;
            $finalPrice = $basePrice + $extraPrice;

            if ($product->stock_quantity <= 0) {
                return response()->json(['success' => false, 'message' => 'यह प्रोडक्ट अभी आउट ऑफ स्टॉक है!'], 422);
            }

            $cart = session()->get('cart', []);
            $cartKey = $id . '_' . ($color ?: 'noc') . '_' . ($size ?: 'nos');

            if (isset($cart[$cartKey])) {
                $newQty = $cart[$cartKey]['qty'] + $quantity;
                if ($newQty > $product->stock_quantity) {
                    return response()->json(['success' => false, 'message' => 'क्षमा करें, केवल ' . $product->stock_quantity . ' आइटम ही स्टॉक में उपलब्ध हैं!'], 422);
                }
                $cart[$cartKey]['qty'] = $newQty;
            } else {
                $cart[$cartKey] = [
                    "product_id" => $product->id,
                    "name" => $product->name,
                    "slug" => $product->slug ?? '',
                    "price" => $finalPrice,
                    "image" => $product->image ?? 'default.jpg',
                    "qty" => $quantity,
                    "max_qty" => $product->stock_quantity ?? 99,
                    "color" => $color,
                    "size" => $size,
                    "bogo_enabled" => $product->bogo_enabled ? true : false,
                    "category_id" => $product->category_id
                ];
            }

            // Sync, BOGO and Coupon calculations
            $this->syncCartTotals($cart);

            return response()->json([
                'success' => true,
                'message' => $product->name . ' को थैली में जोड़ दिया गया है! 🎉',
                'cart_count' => session('cart_total_items'),
                'cart_total' => '₹' . number_format(session('total_after_bogo') - session('coupon_discount', 0), 2),
                'bogo_discount' => '₹' . number_format(session('bogo_discount'), 2),
                'coupon_discount' => '₹' . number_format(session('coupon_discount', 0), 2)
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update cart quantity
     */
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if ($request->has('cart_key') && $request->has('quantity')) {
            $cartKey = $request->cart_key;
            $quantity = max(1, (int) $request->quantity);

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['qty'] = $quantity;
                $this->syncCartTotals($cart);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart updated!',
            'cart_count' => session('cart_total_items'),
            'sub_total' => '₹' . number_format(session('total_after_bogo'), 2),
            'coupon_discount' => '₹' . number_format(session('coupon_discount', 0), 2),
            'grand_total' => '₹' . number_format(session('total_after_bogo') - session('coupon_discount', 0), 2)
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $this->syncCartTotals($cart);

            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart!',
                'cart_count' => session('cart_total_items'),
                'sub_total' => '₹' . number_format(session('total_after_bogo'), 2),
                'coupon_discount' => '₹' . number_format(session('coupon_discount', 0), 2),
                'grand_total' => '₹' . number_format(session('total_after_bogo') - session('coupon_discount', 0), 2)
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Item not found!']);
    }

    /**
     * Helper to sync all totals (BOGO + Coupon) inside AJAX requests
     */
    private function syncCartTotals($cart)
    {
        $bogoData = $this->applyMixAndMatchBogo($cart);
        $cart = $bogoData['cart'];
        $bogoDiscount = $bogoData['total_discount'];
        
        $cartTotal = 0;
        $totalItems = 0;
        foreach ($cart as $item) {
            $cartTotal += ($item['price'] ?? 0) * ($item['qty'] ?? 1);
            $totalItems += $item['qty'];
        }
        
        $totalAfterBogo = $cartTotal - $bogoDiscount;

        // Recalculate Active Coupon inside AJAX Process
        $couponCode = session('coupon_code');
        $couponDiscount = 0;
        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->where('status', 'active')->first();
            if ($coupon && $coupon->isValid() && (!$coupon->min_order_amount || $totalAfterBogo >= $coupon->min_order_amount)) {
                $couponDiscount = $coupon->calculateDiscount($totalAfterBogo);
                session()->put('coupon_discount', $couponDiscount);
            } else {
                session()->forget(['coupon_code', 'coupon_discount']);
            }
        }

        session()->put('cart', $cart);
        session()->put('bogo_discount', $bogoDiscount);
        session()->put('total_after_bogo', $totalAfterBogo);
        session()->put('cart_total_items', $totalItems);
    }

    /**
     * MIX & MATCH BOGO CALCULATOR
     */
    private function applyMixAndMatchBogo($cart)
    {
        if (empty($cart)) {
            return ['cart' => $cart, 'total_discount' => 0];
        }

        $bogoPool = [];

        foreach ($cart as $cartKey => $item) {
            if (isset($item['bogo_enabled']) && $item['bogo_enabled'] == true) {
                for ($i = 0; $i < $item['qty']; $i++) {
                    $bogoPool[] = [
                        'cart_key' => $cartKey,
                        'price' => (float) $item['price']
                    ];
                }
            }
        }

        usort($bogoPool, function ($a, $b) {
            return $b['price'] <=> $a['price'];
        });

        $totalDiscount = 0;
        $poolSize = count($bogoPool);

        for ($i = 0; $i < $poolSize; $i += 2) {
            if (isset($bogoPool[$i + 1])) {
                $item1Price = $bogoPool[$i]['price'];
                $item2Price = $bogoPool[$i + 1]['price'];
                
                $originalPairTotal = $item1Price + $item2Price;
                $offerPairTotal = 1500.00;

                if ($originalPairTotal > $offerPairTotal) {
                    $totalDiscount += ($originalPairTotal - $offerPairTotal);
                }
            }
        }

        return [
            'cart' => $cart,
            'total_discount' => $totalDiscount
        ];
    }
}