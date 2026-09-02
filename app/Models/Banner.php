<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'link',
        'button_text',
        'position',
        'order',
        'device_type', // mobile / laptop
        'status',
        'start_date',
        'end_date',
        'target',
        'background_color',
        'text_color',
        'button_color'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'order' => 'integer',
        'status' => 'boolean' // IMPORTANT FIX
    ];

    // ACTIVE CHECK
    public function isActive()
    {
        $now = now();

        return $this->status == 1 &&
            ($this->start_date === null || $this->start_date <= $now) &&
            ($this->end_date === null || $this->end_date >= $now);
    }

    // STATUS BADGE
    public function getStatusBadgeAttribute()
    {
        if (!$this->isActive()) {
            return '<span class="badge bg-secondary">Inactive</span>';
        }

        return '<span class="badge bg-success">Active</span>';
    }

    // DEVICE TYPE LABEL (NEW FEATURE)
    public function getDeviceLabelAttribute()
    {
        return match($this->device_type) {
            'mobile' => '📱 Mobile',
            'laptop' => '💻 Laptop',
            default => '🌐 All Devices',
        };
    }
}