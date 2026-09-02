<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // Allows your controller to save form arrays cleanly
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}