<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('description')->nullable();

            // SEO fields
            $table->string('meta_title', 70)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('meta_robots', 50)->default('index,follow');
            $table->string('canonical_url', 500)->nullable();

            // publikasi
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->dateTime('published_at')->nullable();

            $table->timestamps();

            // index bantu listing published terbaru
            $table->index(['status', 'published_at'], 'idx_gallery_status_published_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
