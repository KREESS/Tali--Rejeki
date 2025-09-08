<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class TestRelationships extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:relationships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Product and Category relationships';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing Product relationships...');

        try {
            // Test Product with relationships
            $products = Product::with(['subcategory.category', 'images'])->take(1)->get();
            $this->info('✅ Product with relationships loaded successfully');

            if ($products->count() > 0) {
                $product = $products->first();
                $this->line("Product name: " . $product->name);

                if ($product->subcategory) {
                    $this->line("Subcategory: " . $product->subcategory->name);

                    if ($product->subcategory->category) {
                        $this->line("Category: " . $product->subcategory->category->name);
                    } else {
                        $this->warn("Category not found for subcategory");
                    }
                } else {
                    $this->warn("Subcategory not found for product");
                }

                // Test accessors
                $this->line("Description: " . $product->description);
                $this->line("Specifications: " . $product->specifications);
            } else {
                $this->warn("No products found");
            }
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }

        $this->info('Testing Category relationships...');

        try {
            $categories = Category::with(['subcategories', 'products'])->take(1)->get();
            $this->info('✅ Category with relationships loaded successfully');

            if ($categories->count() > 0) {
                $category = $categories->first();
                $this->line("Category name: " . $category->name);
                $this->line("Subcategories count: " . $category->subcategories->count());
                $this->line("Products count: " . $category->products->count());
            } else {
                $this->warn("No categories found");
            }
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }

        $this->info('Test completed!');
        return 0;
    }
}
