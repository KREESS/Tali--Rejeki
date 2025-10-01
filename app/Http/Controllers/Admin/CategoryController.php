<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('subcategories')->latest()->paginate(10);

        return view('admin.categories.index', [
            'title' => 'Kelola Kategori Produk',
            'subtitle' => 'Manajemen kategori produk untuk Tali Rejeki',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Tambah Kategori Baru',
            'subtitle' => 'Membuat kategori produk baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title ?: $request->name,
            'meta_description' => $request->meta_description
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function show(Category $category)
    {
        $category->load('subcategories');

        return view('admin.categories.show', [
            'title' => 'Detail Kategori: ' . $category->name,
            'subtitle' => 'Informasi lengkap kategori produk',
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Edit Kategori: ' . $category->name,
            'subtitle' => 'Ubah informasi kategori produk',
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title ?: $request->name,
            'meta_description' => $request->meta_description
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Category $category)
    {
        try {
            // Check if category exists and get a fresh instance
            $category = Category::findOrFail($category->id);

            // Check if category has subcategories
            if ($category->subcategories()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus kategori yang masih memiliki sub kategori!'
                ], 409); // Using 409 Conflict for business rule violation
            }

            // Check if category has associated products through subcategories
            if ($category->products()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus kategori yang masih memiliki produk!'
                ], 409);
            }

            // Begin transaction
            DB::beginTransaction();

            try {
                $category->delete();
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Kategori berhasil dihapus!'
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan database saat menghapus kategori: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus kategori: ' . $e->getMessage()
            ], 500);
        }
    }
}
