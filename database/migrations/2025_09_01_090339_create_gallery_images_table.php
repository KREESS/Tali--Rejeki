<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained('galleries')->cascadeOnDelete();

            // sumber & info file
            $table->string('image_url', 500);
            $table->string('alt_text', 255)->nullable();
            $table->string('title_attr', 255)->nullable();
            $table->text('caption')->nullable();
            $table->string('seo_filename', 255)->nullable();

            // flag & urutan
            $table->boolean('is_primary')->default(false);
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // indeks berguna
            $table->index('gallery_id', 'idx_gallery_id');
            $table->index('is_primary', 'idx_is_primary');
            $table->index(['gallery_id', 'sort_order'], 'idx_gallery_sort');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
