<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'name',
        'phone',
        'email',
        'city',
        'state',
        'pincode',
        'address',
        'status',
        'payment_status',
        'payment_method',
        'subtotal',
        'discount',
        'bogo_discount',
        'tax',
        'shipping_cost',
        'total_amount',
        'total',
        'shipping_address',
        'billing_address',
        'shipping_method',
        'tracking_number',
        'notes',
        'coupon_code',
        'coupon_discount',
        'razorpay_payment_id',
        'razorpay_order_id',
        'razorpay_signature',
        // Shipping fields - ADD THESE
        'awb_number',
        'courier_name',
        'shipping_label_url',
        'manifest_url',
        'shipping_response',
        'shipping_weight',
    'shipping_length',
    'shipping_width',
    'shipping_height',
        'shipped_at',
        'delivered_at',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'bogo_discount' => 'decimal:2',
        'tax' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'coupon_discount' => 'decimal:2',
        'shipping_weight',
    'shipping_length',
    'shipping_width',
    'shipping_height',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // Add datetime casts for shipping fields
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    // Generate unique order number
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = 'BER-' . strtoupper(substr(uniqid(), -6)) . '-' . date('Ymd');
            }
        });
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Get status badge class
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'warning',
            'processing' => 'info',
            'shipped' => 'primary',
            'delivered' => 'success',
            'completed' => 'success',
            'cancelled' => 'danger',
            'failed' => 'danger'
        ];

        return $badges[$this->status] ?? 'secondary';
    }

    // Get payment status badge
    public function getPaymentStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'warning',
            'paid' => 'success',
            'failed' => 'danger'
        ];

        return $badges[$this->payment_status] ?? 'secondary';
    }

    // Get status label
    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Pending',
            'processing' => 'Processing',
            'shipped' => 'Shipped',
            'delivered' => 'Delivered',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
            'failed' => 'Failed'
        ];

        return $labels[$this->status] ?? ucfirst($this->status);
    }

    // Get payment status label
    public function getPaymentStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Pending',
            'paid' => 'Paid',
            'failed' => 'Failed'
        ];

        return $labels[$this->payment_status] ?? ucfirst($this->payment_status);
    }

    // Get formatted total
    public function getFormattedTotalAttribute()
    {
        return '₹' . number_format($this->total_amount, 2);
    }

    // Shipping related accessors
    public function getHasTrackingAttribute()
    {
        return !empty($this->awb_number);
    }

    public function getIsShippedAttribute()
    {
        return !empty($this->shipped_at);
    }

    public function getIsDeliveredAttribute()
    {
        return !empty($this->delivered_at);
    }

    // Scope for filtering
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }

    // Shipping scopes
    public function scopeHasAwb($query)
    {
        return $query->whereNotNull('awb_number');
    }

    public function scopeNeedsShipment($query)
    {
        return $query->whereNull('awb_number')
                     ->where('payment_status', 'paid')
                     ->whereIn('status', ['pending', 'processing']);
    }

    public function scopeInTransit($query)
    {
        return $query->where('status', 'shipped');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }
}