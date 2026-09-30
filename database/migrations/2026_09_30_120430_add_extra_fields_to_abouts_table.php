<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
            
            // Multiple images ke liye JSON array store karenge
            $table->json('gallery_images')->nullable()->after('image'); 
            
            // Vision / Story Section
            $table->text('vision_title')->nullable()->after('gallery_images');
            $table->longText('vision_description')->nullable()->after('vision_title');
            $table->json('vision_images')->nullable()->after('vision_description');
            
            // Features / Promise Section (like "You're wearing stories")
            $table->string('feature_title')->nullable()->after('vision_images');
            $table->json('features_list')->nullable()->after('feature_title'); // Store array of {icon/image, title, text}
        });
    }

    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle', 'gallery_images', 'vision_title', 'vision_description', 'vision_images', 'feature_title', 'features_list'
            ]);
        });
    }
};