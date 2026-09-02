<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

protected $fillable = [
    'code', 
    'type', 
    'value', 
    'min_order_amount', 
    'max_discount', 
    'start_date', 
    'end_date', 
    'usage_limit', 
    'used_count', 
    'status', 
    'category_id',  // NAYA FIELD ADD KAREIN
    'description'   // NAYA FIELD ADD KAREIN
];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'value' => 'decimal:2',
        'min_order_amount' => 'decimal:2',
        'max_discount' => 'decimal:2'
    ];

    public function isValid()
    {
        $now = now();
        return $this->status == 'active' &&
            ($this->usage_limit === null || $this->used_count < $this->usage_limit) &&
            ($this->start_date === null || $this->start_date <= $now) &&
            ($this->end_date === null || $this->end_date >= $now);
    }

    public function calculateDiscount($subtotal)
    {
        if (!$this->isValid() || ($this->min_order_amount && $subtotal < $this->min_order_amount)) {
            return 0;
        }

        $discount = $this->type == 'percentage'
            ? ($subtotal * $this->value / 100)
            : $this->value;

        if ($this->max_discount && $discount > $this->max_discount) {
            $discount = $this->max_discount;
        }

        return $discount;
    }
    
    /**
     * Get the category that this coupon applies to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}