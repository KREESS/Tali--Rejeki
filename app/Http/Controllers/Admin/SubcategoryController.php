<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')
            ->withCount('products')
            ->latest()
            ->paginate(10);

        return view('admin.subcategories.index', [
            'title' => 'Kelola Sub Kategori',
            'subtitle' => 'Manajemen sub kategori produk untuk Tali Rejeki',
            'subcategories' => $subcategories
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.subcategories.create', [
            'title' => 'Tambah Sub Kategori Baru',
            'subtitle' => 'Membuat sub kategori produk baru',
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500'
        ]);

        // Check uniqueness within the same category
        $exists = Subcategory::where('category_id', $request->category_id)
            ->where('name', $request->name)
            ->exists();

        if ($exists) {
            return back()->withInput()
                ->with('error', 'Sub kategori dengan nama ini sudah ada dalam kategori yang dipilih!');
        }

        $subcategory = Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title ?: $request->name,
            'meta_description' => $request->meta_description
        ]);

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Sub kategori berhasil ditambahkan!');
    }

    public function show(Subcategory $subcategory)
    {
        $subcategory->load(['category', 'products' => function ($query) {
            $query->latest();
        }]);

        return view('admin.subcategories.show', [
            'title' => 'Detail Sub Kategori: ' . $subcategory->name,
            'subtitle' => 'Informasi lengkap sub kategori produk',
            'subcategory' => $subcategory
        ]);
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();

        return view('admin.subcategories.edit', [
            'title' => 'Edit Sub Kategori: ' . $subcategory->name,
            'subtitle' => 'Ubah informasi sub kategori produk',
            'subcategory' => $subcategory,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500'
        ]);

        // Check uniqueness within the same category (excluding current subcategory)
        $exists = Subcategory::where('category_id', $request->category_id)
            ->where('name', $request->name)
            ->where('id', '!=', $subcategory->id)
            ->exists();

        if ($exists) {
            return back()->withInput()
                ->with('error', 'Sub kategori dengan nama ini sudah ada dalam kategori yang dipilih!');
        }

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title ?: $request->name,
            'meta_description' => $request->meta_description
        ]);

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Sub kategori berhasil diperbarui!');
    }

    public function destroy(Subcategory $subcategory)
    {
        // Check if subcategory has products
        if ($subcategory->products()->count() > 0) {
            return redirect()->route('admin.subcategories.index')
                ->with('error', 'Tidak dapat menghapus sub kategori yang masih memiliki produk!');
        }

        $subcategory->delete();

        return redirect()->route('admin.subcategories.index')
            ->with('success', 'Sub kategori berhasil dihapus!');
    }
}
