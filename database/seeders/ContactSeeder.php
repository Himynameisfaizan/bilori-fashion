<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'company_name' => 'Your Company Name',
            'name' => 'John Doe',
            'email' => 'info@company.com',
            'email2' => 'support@company.com',
            'phone' => '+1234567890',
            'wp_number' => '1234567890',
            'telephone' => '1234567890',
            'working_hours' => 'Mon-Fri: 9AM-6PM',
            'copyright' => '© 2024 Your Company. All rights reserved.',
            'address' => '123 Street Name',
            'address2' => 'City, State, Country',
            'facebook' => 'https://facebook.com/yourcompany',
            'instagram' => 'https://instagram.com/yourcompany',
            'twitter' => 'https://twitter.com/yourcompany',
            'linkdin' => 'https://linkedin.com/company/yourcompany',
        ]);
    }
}