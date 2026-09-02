<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'image_name',
        'image_path',
    ];

    // Accessor to get full image URL
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    // Boot method to auto-generate image name if not provided
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gallery) {
            if (empty($gallery->image_name)) {
                $gallery->image_name = pathinfo($gallery->image_path, PATHINFO_FILENAME);
            }
        });
    }
}