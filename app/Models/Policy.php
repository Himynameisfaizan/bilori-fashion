<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'privacy_policy',
        'terms_of_service',
        'shipping_policy',
        'return_exchange_policy',
        'return_exchange_request',
    ];
}