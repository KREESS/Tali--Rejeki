<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('subcategory_id')
                ->constrained('subcategories')
                ->cascadeOnDelete();

            $table->string('name');
            // SEO fields
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // business fields
            $table->json('brands')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('price_strike', 12, 2)->nullable();
            $table->char('currency', 3)->default('IDR');
            $table->string('sku')->nullable();

            // 10 slot atribut bebas (string gabungan, semuanya nullable)
            $table->text('attr1')->nullable();
            $table->text('attr2')->nullable();
            $table->text('attr3')->nullable();
            $table->text('attr4')->nullable();
            $table->text('attr5')->nullable();
            $table->text('attr6')->nullable();
            $table->text('attr7')->nullable();
            $table->text('attr8')->nullable();
            $table->text('attr9')->nullable();
            $table->text('attr10')->nullable();

            $table->timestamps();

            // indexes
            $table->index('subcategory_id');
            $table->index('name');
            $table->unique(['subcategory_id', 'slug']); // slug unik dalam 1 subkategori
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
