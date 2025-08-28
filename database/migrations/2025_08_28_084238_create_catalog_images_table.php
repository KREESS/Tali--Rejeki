<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('catalog_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('catalog_items')->onDelete('cascade');
            $table->string('image_url', 500);
            $table->string('alt_text', 255)->nullable();

            // SEO fields
            $table->string('slug', 220)->unique()->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords', 500)->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('is_primary')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalog_images');
    }
};
