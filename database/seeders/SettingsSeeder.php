<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $defaultSettings = [
            ['key' => 'site_name', 'value' => 'E-Commerce Store', 'group' => 'general'],
            ['key' => 'site_email', 'value' => 'admin@example.com', 'group' => 'general'],
            ['key' => 'site_phone', 'value' => '+1 234 567 8900', 'group' => 'general'],
            ['key' => 'currency', 'value' => 'USD', 'group' => 'general'],
            ['key' => 'currency_symbol', 'value' => '$', 'group' => 'general'],
            ['key' => 'tax_rate', 'value' => '10', 'group' => 'general'],
            ['key' => 'shipping_cost', 'value' => '5', 'group' => 'general'],
            ['key' => 'free_shipping_threshold', 'value' => '50', 'group' => 'general'],
        ];

        foreach ($defaultSettings as $setting) {
            Setting::create($setting);
        }
    }
}