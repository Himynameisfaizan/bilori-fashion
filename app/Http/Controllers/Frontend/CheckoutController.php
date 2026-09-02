<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderItem;
  use App\Services\IthinkLogisticsService;

class CheckoutController extends Controller
{
    private $razorpayKey;
    private $razorpaySecret;
    
    public function __construct()
    {
        $this->razorpayKey = env('RAZORPAY_KEY', 'rzp_live_SukHFtpJQNHZCx');
        $this->razorpaySecret = env('RAZORPAY_SECRET', 'MCAd8m161RB9yxHm3gETxTut');
    }

    /**
     * Display checkout page
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $bogoDiscount = session()->get('bogo_discount', 0);
        $couponDiscount = session()->get('coupon_discount', 0);

        $subTotal = 0;
        foreach ($cart as $item) {
            $itemPrice = ($item['price'] ?? 0) + ($item['extra_price'] ?? 0);
            $subTotal += $itemPrice * ($item['qty'] ?? 1);
        }

        $totalAfterBogo = $subTotal - $bogoDiscount;
        $totalAfterCoupon = max(0, $totalAfterBogo - $couponDiscount);
        $shippingCharge = $totalAfterBogo >= 999 ? 0 : 99;
        $taxAmount = round($totalAfterCoupon * 0.05, 2);
        $grandTotal = $totalAfterCoupon + $shippingCharge + $taxAmount;

        session([
            'total_after_bogo' => $totalAfterBogo,
            'bogo_discount' => $bogoDiscount,
            'coupon_discount' => $couponDiscount,
        ]);

        return view('checkout', compact(
            'cart', 
            'subTotal', 
            'bogoDiscount', 
            'couponDiscount',
            'totalAfterBogo', 
            'totalAfterCoupon',
            'shippingCharge', 
            'taxAmount', 
            'grandTotal'
        ));
    }

    /**
     * Create Razorpay Order using cURL
     */
    public function createRazorpayOrder(Request $request)
    {
        try {
            $amount = (int) $request->amount;
            $receipt = 'BER-' . time() . '-' . rand(1000, 9999);
            
            $url = 'https://api.razorpay.com/v1/orders';
            
            $data = [
                'amount' => $amount,
                'currency' => 'INR',
                'receipt' => $receipt,
                'notes' => [
                    'source' => 'beroli_website_checkout',
                    'customer_name' => $request->name ?? 'Guest'
                ]
            ];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Basic ' . base64_encode($this->razorpayKey . ':' . $this->razorpaySecret)
            ]);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);
            
            if ($curlError) {
                Log::error('Razorpay cURL Error: ' . $curlError);
                return response()->json([
                    'success' => false,
                    'message' => 'Payment gateway connection failed.'
                ], 500);
            }
            
            $responseData = json_decode($response, true);
            
            if ($httpCode === 200 && isset($responseData['id'])) {
                Log::info('Razorpay Order Created', [
                    'order_id' => $responseData['id'],
                    'receipt' => $receipt,
                    'amount' => $amount
                ]);
                
                return response()->json([
                    'success' => true,
                    'order_id' => $responseData['id'],
                    'amount' => $responseData['amount'],
                    'currency' => $responseData['currency'],
                    'receipt' => $receipt,
                ]);
            } else {
                Log::error('Razorpay Order Creation Failed', [
                    'http_code' => $httpCode,
                    'response' => $responseData
                ]);
                
                $errorMessage = isset($responseData['error']['description']) 
                    ? $responseData['error']['description'] 
                    : 'Unable to create payment order.';
                
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 500);
            }
            
        } catch (\Exception $e) {
            Log::error('Razorpay Order Creation Exception: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.'
            ], 500);
        }
    }

    /**
     * Verify Razorpay Payment Signature
     */
    private function verifyRazorpaySignature($paymentId, $orderId, $signature)
    {
        $generatedSignature = hash_hmac('sha256', $orderId . '|' . $paymentId, $this->razorpaySecret);
        return hash_equals($generatedSignature, $signature);
    }

    /**
     * Process and place order - Save to Database
     */
    public function placeOrder(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'nullable|email|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'pincode' => 'required|string|max:10',
                'address' => 'required|string',
                'payment_method' => 'required|string|in:cash_on_delivery,razorpay',
                'notes' => 'nullable|string',
                'subtotal' => 'required|numeric',
                'bogo_discount' => 'nullable|numeric',
                'coupon_discount' => 'nullable|numeric',
                'grand_total' => 'required|numeric',
                'payment_status' => 'nullable|string|in:paid,pending,failed',
            ]);

            $cart = session()->get('cart', []);
            if (empty($cart)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cart is empty!'
                ], 400);
            }

            // Generate unique order number
            $orderNumber = 'BER-' . strtoupper(substr(uniqid(), -6)) . '-' . date('Ymd');
            
            $subTotal = (float) $request->subtotal;
            $bogoDiscount = (float) ($request->bogo_discount ?? 0);
            $couponDiscount = (float) ($request->coupon_discount ?? 0);
            $grandTotal = (float) $request->grand_total;
            $paymentStatus = 'pending';
            
            // Handle Razorpay payment verification
            if ($request->payment_method === 'razorpay') {
                if ($request->has('razorpay_payment_id') && 
                    $request->has('razorpay_order_id') && 
                    $request->has('razorpay_signature')) {
                    
                    $isValid = $this->verifyRazorpaySignature(
                        $request->razorpay_payment_id,
                        $request->razorpay_order_id,
                        $request->razorpay_signature
                    );
                    
                    if ($isValid) {
                        $paymentStatus = 'paid';
                        Log::info('Razorpay Payment Verified', [
                            'payment_id' => $request->razorpay_payment_id
                        ]);
                    } else {
                        Log::error('Razorpay Signature Verification Failed');
                        return response()->json([
                            'success' => false,
                            'message' => 'Payment verification failed.'
                        ], 400);
                    }
                }
            }

            // Calculate shipping and tax
            $totalAfterBogo = $subTotal - $bogoDiscount;
            $totalAfterCoupon = max(0, $totalAfterBogo - $couponDiscount);
            $shippingCost = $totalAfterBogo >= 999 ? 0 : 99;
            $taxAmount = round($totalAfterCoupon * 0.05, 2);

            // SAVE ORDER TO DATABASE
            $order = new Order();
            $order->order_number = $orderNumber;
            $order->user_id = auth()->id();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->pincode = $request->pincode;
            $order->address = $request->address;
            $order->shipping_address = $request->address;
            $order->billing_address = $request->address;
            $order->notes = $request->notes;
            $order->status = 'pending';
            $order->payment_status = $paymentStatus;
            $order->payment_method = $request->payment_method;
            $order->subtotal = $subTotal;
            $order->discount = $bogoDiscount;
            $order->bogo_discount = $bogoDiscount;
            $order->coupon_discount = $couponDiscount;
            $order->coupon_code = session('coupon_code');
            $order->tax = $taxAmount;
            $order->shipping_cost = $shippingCost;
            $order->total_amount = $grandTotal;
            $order->total = $grandTotal;
            $order->shipping_method = 'Standard Delivery';
            
            // Save Razorpay details if available
            if ($request->has('razorpay_payment_id')) {
                $order->razorpay_payment_id = $request->razorpay_payment_id;
                $order->razorpay_order_id = $request->razorpay_order_id;
                $order->razorpay_signature = $request->razorpay_signature;
            }
            
            $order->save();
            
            // SAVE ORDER ITEMS
            foreach ($cart as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item['product_id'] ?? null;
                $orderItem->product_name = $item['name'] ?? 'Product';
                $orderItem->product_sku = $item['sku'] ?? null;
                $orderItem->quantity = $item['qty'] ?? 1;
                $orderItem->price = $item['price'] ?? 0;
                $orderItem->extra_price = $item['extra_price'] ?? 0;
                $orderItem->total = (($item['price'] ?? 0) + ($item['extra_price'] ?? 0)) * ($item['qty'] ?? 1);
                $orderItem->color = $item['color'] ?? null;
                $orderItem->size = $item['size'] ?? null;
                $orderItem->image = $item['image'] ?? null;
                $orderItem->bogo_enabled = $item['bogo_enabled'] ?? false;
                $orderItem->save();
            }

            // Store order info in session for confirmation page
            session(['last_order_id' => $order->id]);

            // Clear cart
            session()->forget([
                'cart', 
                'bogo_discount', 
                'coupon_discount', 
                'total_after_bogo', 
                'cart_total_items', 
                'coupon_code'
            ]);

            Log::info('Order Placed Successfully', [
                'order_id' => $order->id,
                'order_number' => $orderNumber,
                'payment_method' => $request->payment_method,
                'payment_status' => $paymentStatus,
                'grand_total' => $grandTotal,
                'items_count' => count($cart)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully! 🎉',
                'redirect_url' => url('/order/confirmation'),
                'order_number' => $orderNumber,
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            Log::error('Order Placement Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error placing order. Please try again.'
            ], 500);
        }
    }

    /**
     * Order Confirmation Page
     */
    public function orderConfirmation()
    {
        $orderId = session('last_order_id');
        
        if (!$orderId) {
            return redirect()->to('/')->with('info', 'No order found.');
        }

        $order = Order::with('items')->find($orderId);
        
        if (!$order) {
            return redirect()->to('/')->with('info', 'Order not found.');
        }

        return view('order-confirmation', compact('order'));
    }
    
    
  

/**
 * Create shipment after order placement
 */
private function createShipment($order)
{
    try {
        $ithink = new IthinkLogisticsService();
        
        $shipmentData = [
            'order_id' => $order->order_number,
            'buyer_name' => $order->name,
            'buyer_phone' => $order->phone,
            'buyer_email' => $order->email ?? '',
            'buyer_address' => $order->address,
            'buyer_city' => $order->city,
            'buyer_state' => $order->state,
            'buyer_pincode' => $order->pincode,
            'payment_mode' => $order->payment_method == 'cash_on_delivery' ? 'COD' : 'Prepaid',
            'order_amount' => $order->total_amount,
            'weight' => 0.5, // Default 500g
            'length' => 20,
            'breadth' => 15,
            'height' => 10,
            'item_name' => $order->items->first()->product_name ?? 'Product',
            'item_quantity' => $order->items->count(),
        ];

        $response = $ithink->createOrder($shipmentData);

        if (isset($response['awb_number'])) {
            $order->tracking_number = $response['awb_number'];
            $order->shipping_method = $response['courier_name'] ?? 'iThink Logistics';
            $order->save();

            Log::info('Shipment Created', [
                'order' => $order->order_number,
                'awb' => $response['awb_number']
            ]);
        }

        return $response;
    } catch (\Exception $e) {
        Log::error('Shipment Creation Error: ' . $e->getMessage());
        return null;
    }
}
}