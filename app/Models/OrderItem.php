<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_sku',
        'quantity',
        'price',
        'extra_price',
        'total',
        'color',
        'size',
        'image',
        'bogo_enabled',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'extra_price' => 'decimal:2',
        'total' => 'decimal:2',
        'quantity' => 'integer',
        'bogo_enabled' => 'boolean',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Get formatted price
    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price, 2);
    }

    // Get formatted total
    public function getFormattedTotalAttribute()
    {
        return '₹' . number_format($this->total, 2);
    }
}