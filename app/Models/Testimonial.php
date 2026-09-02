<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = [

        'name',
        'description',
        'review',
        'photo',
        'status'

    ];

    protected $casts = [

        'review' => 'integer'

    ];

    /**
     * Active testimonials scope
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Photo URL accessor
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {

            return asset('storage/' . $this->photo);

        }

        return asset('assets/img/default-avatar.png');
    }

    /**
     * Star rating HTML
     */
    public function getStarRatingHtmlAttribute()
    {
        $html = '';

        for ($i = 1; $i <= 5; $i++) {

            if ($i <= $this->review) {

                $html .= '<i class="fas fa-star text-warning"></i>';

            } else {

                $html .= '<i class="far fa-star text-warning"></i>';

            }

        }

        return $html;
    }
}