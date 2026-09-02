<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display available coupons for a product
     */
    public function getProductCoupons($productId)
    {
        $product = \App\Models\Product::findOrFail($productId);
        
        $coupons = Coupon::where('status', 'active')
            ->where(function($query) {
                $query->whereNull('start_date')
                    ->orWhere('start_date', '<=', now());
            })
            ->where(function($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->where(function($query) {
                $query->whereNull('usage_limit')
                    ->orWhereRaw('used_count < usage_limit');
            })
            ->where(function($query) use ($product) {
                $query->whereNull('category_id')
                    ->orWhere('category_id', $product->category_id);
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($coupon) {
                return [
                    'id' => $coupon->id,
                    'code' => $coupon->code,
                    'type' => $coupon->type,
                    'value' => $coupon->value,
                    'min_order_amount' => $coupon->min_order_amount,
                    'max_discount' => $coupon->max_discount,
                    'description' => $coupon->description,
                    'end_date' => $coupon->end_date ? $coupon->end_date->format('d M Y') : null,
                    'discount_text' => $coupon->type == 'percentage' 
                        ? number_format($coupon->value, 0) . '% OFF'
                        : '₹' . number_format($coupon->value, 0) . ' OFF'
                ];
            });

        return response()->json([
            'success' => true,
            'coupons' => $coupons
        ]);
    }

    /**
     * Validate and apply a coupon code
     */
    public function validateCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'product_id' => 'required|integer|exists:products,id',
            'subtotal' => 'required|numeric|min:0'
        ]);

        $coupon = Coupon::where('code', $request->code)
            ->where('status', 'active')
            ->first();

        if (!$coupon) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid coupon code. Please check and try again.'
            ]);
        }

        // Check if coupon is valid (date range, usage limit, status)
        if (!$coupon->isValid()) {
            if ($coupon->end_date && $coupon->end_date < now()) {
                return response()->json([
                    'valid' => false,
                    'message' => 'This coupon has expired on ' . $coupon->end_date->format('d M Y')
                ]);
            }
            
            if ($coupon->usage_limit && $coupon->used_count >= $coupon->usage_limit) {
                return response()->json([
                    'valid' => false,
                    'message' => 'This coupon has reached its maximum usage limit'
                ]);
            }
            
            return response()->json([
                'valid' => false,
                'message' => 'This coupon is no longer valid'
            ]);
        }

        // Check if coupon already applied
        $appliedCoupon = session('applied_coupon');
        if ($appliedCoupon && $appliedCoupon['code'] === $coupon->code) {
            return response()->json([
                'valid' => false,
                'message' => 'This coupon is already applied'
            ]);
        }

        // Check minimum order amount
        if ($coupon->min_order_amount && $request->subtotal < $coupon->min_order_amount) {
            $remaining = $coupon->min_order_amount - $request->subtotal;
            return response()->json([
                'valid' => false,
                'message' => 'Add ₹' . number_format($remaining, 2) . ' more to apply this coupon. Minimum order: ₹' . number_format($coupon->min_order_amount, 2)
            ]);
        }

        // Check if coupon is for specific category
        $product = \App\Models\Product::find($request->product_id);
        if ($coupon->category_id && $product->category_id != $coupon->category_id) {
            $category = \App\Models\Category::find($coupon->category_id);
            return response()->json([
                'valid' => false,
                'message' => 'This coupon is valid only for ' . ($category ? $category->name : 'specific') . ' category products'
            ]);
        }

        // Calculate discount
        $discount = $coupon->calculateDiscount($request->subtotal);
        
        if ($discount <= 0) {
            return response()->json([
                'valid' => false,
                'message' => 'This coupon cannot be applied to this order'
            ]);
        }

        $newPrice = $request->subtotal - $discount;
        
        // Store coupon in session
        session(['applied_coupon' => [
            'code' => $coupon->code,
            'discount' => $discount,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'max_discount' => $coupon->max_discount,
            'coupon_id' => $coupon->id,
            'applied_at' => now()->toDateTimeString()
        ]]);

        $discountText = $coupon->type == 'percentage' 
            ? number_format($coupon->value, 0) . '% OFF (₹' . number_format($discount, 2) . ')'
            : '₹' . number_format($discount, 2) . ' OFF';

        return response()->json([
            'valid' => true,
            'message' => '🎉 Coupon applied! You saved ₹' . number_format($discount, 2),
            'discount' => $discount,
            'discount_text' => $discountText,
            'new_price' => $newPrice,
            'coupon' => [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value
            ]
        ]);
    }

    /**
     * Remove applied coupon
     */
    public function removeCoupon(Request $request)
    {
        $appliedCoupon = session('applied_coupon');
        
        session()->forget('applied_coupon');
        
        $message = 'Coupon removed successfully';
        if ($appliedCoupon) {
            $message = 'Coupon ' . $appliedCoupon['code'] . ' removed successfully';
        }
        
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    /**
     * Get applied coupon details
     */
    public function getAppliedCoupon()
    {
        $appliedCoupon = session('applied_coupon');
        
        if ($appliedCoupon) {
            return response()->json([
                'success' => true,
                'coupon' => $appliedCoupon
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'No coupon applied'
        ]);
    }
}