<?php

return [
    /*
    |--------------------------------------------------------------------------
    | iThink Logistics API v3 - LIVE PRODUCTION
    |--------------------------------------------------------------------------
    */
    
    'access_token' => env('ITHINK_LOGISTICS_ACCESS_TOKEN'),
    'secret_key' => env('ITHINK_LOGISTICS_SECRET_KEY'),
    'pickup_address_id' => env('ITHINK_LOGISTICS_PICKUP_ADDRESS_ID', '30467'),
    
    'base_url' => env('ITHINK_LOGISTICS_BASE_URL', 'https://my.ithinklogistics.com'),
    'staging_url' => 'https://pre-alpha.ithinklogistics.com',
    'production_url' => 'https://my.ithinklogistics.com',
    
    'mode' => env('ITHINK_LOGISTICS_MODE', 'production'),
    'pickup_pincode' => env('ITHINK_LOGISTICS_PICKUP_PINCODE', '110001'),
    'store_url' => env('APP_URL', 'https://bilorifashion.com'),
    'api_version' => '3.0.0',
    
    'api_endpoints' => [
        'sync_order' => 'api_v3/order/sync.json',
        'track_order' => 'api_v3/order/track.json',
        'cancel_order' => 'api_v3/order/cancel.json',
        'print_label' => 'api_v3/order/label.json',
        'print_manifest' => 'api_v3/order/manifest.json',
        'check_pincode' => 'api_v3/pincode/serviceability.json',
        'get_rates' => 'api_v3/rate/calculator.json',
    ],
    
    'defaults' => [
        'weight' => 0.5,
        'length' => 10,
        'breadth' => 10,
        'height' => 10,
        'channel' => 'WEB',
        'store_name' => 'Bilori Fashion',
    ],
];