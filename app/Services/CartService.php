<?php

namespace App\Services;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;
use App\Models\Coupon;

class CartService
{
    public function addToCart($productId, $quantity = 1, $attributes = [])
    {
        $product = Product::findOrFail($productId);

        if (!$product->isInStock() || $product->stock_quantity < $quantity) {
            throw new \Exception('Product is out of stock.');
        }

        Cart::session(auth()->id())->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->final_price,
            'quantity' => $quantity,
            'attributes' => $attributes,
            'associatedModel' => $product
        ]);

        return true;
    }

    public function removeFromCart($itemId)
    {
        Cart::session(auth()->id())->remove($itemId);
        return true;
    }

    public function updateQuantity($itemId, $quantity)
    {
        Cart::session(auth()->id())->update($itemId, [
            'quantity' => [
                'relative' => false,
                'value' => $quantity
            ]
        ]);

        return true;
    }

    public function getCartItems()
    {
        return Cart::session(auth()->id())->getContent();
    }

    public function getSubtotal()
    {
        return Cart::session(auth()->id())->getSubTotal();
    }

    public function getTotal()
    {
        $subtotal = $this->getSubtotal();
        $discount = $this->getDiscount();

        return $subtotal - $discount;
    }

    public function applyCoupon($code)
    {
        $coupon = Coupon::where('code', $code)
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->first();

        if (!$coupon) {
            throw new \Exception('Invalid or expired coupon.');
        }

        if ($coupon->usage_limit && $coupon->used_count >= $coupon->usage_limit) {
            throw new \Exception('Coupon usage limit exceeded.');
        }

        $subtotal = $this->getSubtotal();

        if ($coupon->min_order_amount && $subtotal < $coupon->min_order_amount) {
            throw new \Exception("Minimum order amount of {$coupon->min_order_amount} required.");
        }

        $discount = $coupon->type === 'percentage'
            ? ($subtotal * $coupon->value / 100)
            : $coupon->value;

        if ($coupon->max_discount && $discount > $coupon->max_discount) {
            $discount = $coupon->max_discount;
        }

        session([
            'coupon' => [
                'code' => $coupon->code,
                'discount' => $discount
            ]
        ]);

        return $discount;
    }

    public function getDiscount()
    {
        return session('coupon.discount', 0);
    }

    public function clear()
    {
        Cart::session(auth()->id())->clear();
        session()->forget('coupon');
    }
}