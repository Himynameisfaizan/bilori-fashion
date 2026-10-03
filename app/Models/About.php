<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Option A: Agar $fillable use kar rahe ho, toh saare naye fields yahan add hone chahiye:
    protected $fillable = [
        'title',
        'subtitle',
        'short_description',
        'description',
        'image',
        'gallery_images',
        'vision_title',
        'vision_description',
        'vision_images',
        'feature_title',
        'features_list',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'brand_stats',
    ];

    // OR Option B (Sabse aasan): Tum $fillable ki jagah direct guarded empty kar sakte ho taaki koi bhi field block na ho:
    // protected $guarded = [];

    protected $casts = [
        'gallery_images' => 'array',
        'vision_images' => 'array',
        'features_list' => 'array',
        'brand_stats'   => 'array',
    ];
}