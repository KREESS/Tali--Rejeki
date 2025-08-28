<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['subcategory.category', 'primaryImage'])
            ->latest()
            ->paginate(12);

        return view('admin.products.index', [
            'title' => 'Kelola Produk',
            'subtitle' => 'Manajemen semua produk Tali Rejeki',
            'products' => $products
        ]);
    }

    public function create()
    {
        $subcategories = Subcategory::with('category')->get()->groupBy('category.name');

        return view('admin.products.create', [
            'title' => 'Tambah Produk Baru',
            'subtitle' => 'Menambahkan produk insulasi industri baru',
            'subcategories' => $subcategories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255',
            'brands' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'price_strike' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'attr1' => 'nullable|string|max:255',
            'attr2' => 'nullable|string|max:255',
            'attr3' => 'nullable|string|max:255',
            'attr4' => 'nullable|string|max:255',
            'attr5' => 'nullable|string|max:255',
            'attr6' => 'nullable|string|max:255',
            'attr7' => 'nullable|string|max:255',
            'attr8' => 'nullable|string|max:255',
            'attr9' => 'nullable|string|max:255',
            'attr10' => 'nullable|string|max:255',
        ]);

        $brands = $request->brands ? explode(',', $request->brands) : null;

        $product = Product::create([
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title ?: $request->name,
            'meta_description' => $request->meta_description,
            'brands' => $brands,
            'price' => $request->price,
            'price_strike' => $request->price_strike,
            'currency' => $request->currency ?: 'IDR',
            'sku' => $request->sku,
            'attr1' => $request->attr1,
            'attr2' => $request->attr2,
            'attr3' => $request->attr3,
            'attr4' => $request->attr4,
            'attr5' => $request->attr5,
            'attr6' => $request->attr6,
            'attr7' => $request->attr7,
            'attr8' => $request->attr8,
            'attr9' => $request->attr9,
            'attr10' => $request->attr10,
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'alt_text' => $product->name,
                    'is_primary' => $index === 0, // First image is primary
                    'sort_order' => $index + 1
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        $product->load(['subcategory.category', 'images']);

        return view('admin.products.show', [
            'title' => 'Detail Produk: ' . $product->name,
            'subtitle' => 'Informasi lengkap produk',
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        $subcategories = Subcategory::with('category')->get()->groupBy('category.name');
        $product->load('images');

        return view('admin.products.edit', [
            'title' => 'Edit Produk: ' . $product->name,
            'subtitle' => 'Ubah informasi produk',
            'product' => $product,
            'subcategories' => $subcategories
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255',
            'brands' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'price_strike' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $product->id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'attr1' => 'nullable|string|max:255',
            'attr2' => 'nullable|string|max:255',
            'attr3' => 'nullable|string|max:255',
            'attr4' => 'nullable|string|max:255',
            'attr5' => 'nullable|string|max:255',
            'attr6' => 'nullable|string|max:255',
            'attr7' => 'nullable|string|max:255',
            'attr8' => 'nullable|string|max:255',
            'attr9' => 'nullable|string|max:255',
            'attr10' => 'nullable|string|max:255',
        ]);

        $brands = $request->brands ? explode(',', $request->brands) : null;

        $product->update([
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title ?: $request->name,
            'meta_description' => $request->meta_description,
            'brands' => $brands,
            'price' => $request->price,
            'price_strike' => $request->price_strike,
            'currency' => $request->currency ?: 'IDR',
            'sku' => $request->sku,
            'attr1' => $request->attr1,
            'attr2' => $request->attr2,
            'attr3' => $request->attr3,
            'attr4' => $request->attr4,
            'attr5' => $request->attr5,
            'attr6' => $request->attr6,
            'attr7' => $request->attr7,
            'attr8' => $request->attr8,
            'attr9' => $request->attr9,
            'attr10' => $request->attr10,
        ]);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $existingImagesCount = $product->images()->count();

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'alt_text' => $product->name,
                    'is_primary' => $existingImagesCount === 0 && $index === 0,
                    'sort_order' => $existingImagesCount + $index + 1
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        try {
            // Delete all product images from storage
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->image_path);
            }

            $productName = $product->name;
            $product->delete();

            // Check if request expects JSON (AJAX)
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => "Produk '{$productName}' berhasil dihapus!"
                ]);
            }

            // Traditional form submission
            return redirect()->route('admin.products.index')
                ->with('success', "Produk '{$productName}' berhasil dihapus!");
        } catch (\Exception $e) {
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus produk: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('admin.products.index')
                ->with('error', 'Gagal menghapus produk!');
        }
    }

    public function deleteImage(ProductImage $image)
    {
        // Don't allow deletion if it's the only image
        if ($image->product->images()->count() <= 1) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat menghapus gambar terakhir produk!'
            ], 400);
        }

        // If deleting primary image, set another image as primary
        if ($image->is_primary) {
            $newPrimary = $image->product->images()
                ->where('id', '!=', $image->id)
                ->first();

            if ($newPrimary) {
                $newPrimary->update(['is_primary' => true]);
            }
        }

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus!'
        ]);
    }

    public function setPrimaryImage(ProductImage $image)
    {
        // Remove primary status from all images of this product
        $image->product->images()->update(['is_primary' => false]);

        // Set this image as primary
        $image->update(['is_primary' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Gambar utama berhasil diubah!'
        ]);
    }
}
