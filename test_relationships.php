<?php

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

// Test Product relationship
echo "Testing Product relationships...\n";

// Test apakah model Product bisa diload
try {
    $products = Product::with(['subcategory.category', 'images'])->take(1)->get();
    echo "✅ Product with relationships loaded successfully\n";

    if ($products->count() > 0) {
        $product = $products->first();
        echo "Product name: " . $product->name . "\n";

        if ($product->subcategory) {
            echo "Subcategory: " . $product->subcategory->name . "\n";

            if ($product->subcategory->category) {
                echo "Category: " . $product->subcategory->category->name . "\n";
            } else {
                echo "⚠️  Category not found for subcategory\n";
            }
        } else {
            echo "⚠️  Subcategory not found for product\n";
        }

        // Test accessor
        echo "Description: " . $product->description . "\n";
        echo "Specifications: " . $product->specifications . "\n";
    } else {
        echo "⚠️  No products found\n";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

// Test Category relationship
echo "\nTesting Category relationships...\n";

try {
    $categories = Category::with(['subcategories', 'products'])->take(1)->get();
    echo "✅ Category with relationships loaded successfully\n";

    if ($categories->count() > 0) {
        $category = $categories->first();
        echo "Category name: " . $category->name . "\n";
        echo "Subcategories count: " . $category->subcategories->count() . "\n";
        echo "Products count: " . $category->products->count() . "\n";
    } else {
        echo "⚠️  No categories found\n";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\nTest completed!\n";
