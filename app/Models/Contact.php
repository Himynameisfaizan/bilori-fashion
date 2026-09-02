<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $primaryKey = 'id';

    // Disable default timestamps because updated_at is varchar
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'email2',
        'company_name',
        'copyright',
        'working_hours',
        'facebook',
        'instagram',
        'twitter',
        'linkdin',
        'map',
        'address',
        'address2',
        'phone',
        'wp_number',
        'telephone',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}