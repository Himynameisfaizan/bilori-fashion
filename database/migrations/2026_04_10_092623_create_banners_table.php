<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            // Check if column doesn't exist before adding
            if (!Schema::hasColumn('banners', 'target')) {
                $table->enum('target', ['_self', '_blank'])->default('_self')->after('link');
            }

            if (!Schema::hasColumn('banners', 'background_color')) {
                $table->string('background_color', 7)->nullable()->after('end_date');
            }

            if (!Schema::hasColumn('banners', 'text_color')) {
                $table->string('text_color', 7)->nullable()->after('background_color');
            }

            if (!Schema::hasColumn('banners', 'button_color')) {
                $table->string('button_color', 7)->nullable()->after('text_color');
            }

            if (!Schema::hasColumn('banners', 'subtitle')) {
                $table->text('subtitle')->nullable()->after('title');
            }

            if (!Schema::hasColumn('banners', 'button_text')) {
                $table->string('button_text')->nullable()->after('link');
            }
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
