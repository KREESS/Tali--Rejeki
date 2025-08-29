<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatalogItem;
use App\Models\CatalogFile;
use App\Models\CatalogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    /**
     * Display a listing of catalog items.
     */
    public function index()
    {
        $catalogs = CatalogItem::with(['images', 'files'])
            ->latest()
            ->paginate(12);

        return view('admin.catalog.index', [
            'title' => 'Manajemen Katalog',
            'catalogs' => $catalogs
        ]);
    }

    /**
     * Show the form for creating a new catalog item.
     */
    public function create()
    {
        return view('admin.catalog.create', [
            'title' => 'Tambah Item Katalog Baru'
        ]);
    }

    /**
     * Store a newly created catalog item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'files.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'alt_texts.*' => 'nullable|string|max:255'
        ]);

        $slug = Str::slug($request->name);

        // Ensure unique slug
        $originalSlug = $slug;
        $counter = 1;
        while (CatalogItem::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $catalog = CatalogItem::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'meta_title' => $request->meta_title ?? $request->name,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $fileName = time() . '_' . $index . '_' . $image->getClientOriginalName();
                $imagePath = 'catalog/images/' . $fileName;
                $image->move(public_path('catalog/images'), $fileName);

                CatalogImage::create([
                    'item_id' => $catalog->id,
                    'image_url' => $imagePath,
                    'alt_text' => $request->alt_texts[$index] ?? $catalog->name,
                    'slug' => $slug . '-image-' . ($index + 1),
                    'meta_title' => $catalog->name . ' - Gambar ' . ($index + 1),
                    'sort_order' => $index + 1,
                    'is_primary' => $index === 0
                ]);
            }
        }

        // Handle file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $fileName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $filePath = 'catalog/files/' . $fileName;
                $file->move(public_path('catalog/files'), $fileName);

                CatalogFile::create([
                    'item_id' => $catalog->id,
                    'file_url' => $filePath,
                    'slug' => $slug . '-file-' . ($index + 1),
                    'meta_title' => $catalog->name . ' - ' . $file->getClientOriginalName(),
                ]);
            }
        }
        return redirect()->route('admin.catalog.index')
            ->with('success', 'Item katalog berhasil ditambahkan!');
    }

    /**
     * Display the specified catalog item.
     */
    public function show(CatalogItem $catalog)
    {
        $catalog->load(['images', 'files']);

        return view('admin.catalog.show', [
            'title' => 'Detail Katalog: ' . $catalog->name,
            'catalog' => $catalog
        ]);
    }

    /**
     * Show the form for editing the specified catalog item.
     */
    public function edit(CatalogItem $catalog)
    {
        $catalog->load(['images', 'files']);

        return view('admin.catalog.edit', [
            'title' => 'Edit Katalog: ' . $catalog->name,
            'catalog' => $catalog
        ]);
    }

    /**
     * Update the specified catalog item in storage.
     */
    public function update(Request $request, CatalogItem $catalog)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'files.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
            'alt_texts.*' => 'nullable|string|max:255'
        ]);

        $slug = Str::slug($request->name);

        // Ensure unique slug (exclude current item)
        $originalSlug = $slug;
        $counter = 1;
        while (CatalogItem::where('slug', $slug)->where('id', '!=', $catalog->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $catalog->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug,
            'meta_title' => $request->meta_title ?? $request->name,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $existingImagesCount = $catalog->images()->count();

            foreach ($request->file('images') as $index => $image) {
                $fileName = time() . '_' . $index . '_' . $image->getClientOriginalName();
                $imagePath = 'catalog/images/' . $fileName;
                $image->move(public_path('catalog/images'), $fileName);

                CatalogImage::create([
                    'item_id' => $catalog->id,
                    'image_url' => $imagePath,
                    'alt_text' => $request->alt_texts[$index] ?? $catalog->name,
                    'slug' => $slug . '-image-' . ($existingImagesCount + $index + 1),
                    'meta_title' => $catalog->name . ' - Gambar ' . ($existingImagesCount + $index + 1),
                    'sort_order' => $existingImagesCount + $index + 1,
                    'is_primary' => $existingImagesCount === 0 && $index === 0
                ]);
            }
        }

        // Handle new file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $fileName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $filePath = 'catalog/files/' . $fileName;
                $file->move(public_path('catalog/files'), $fileName);

                CatalogFile::create([
                    'item_id' => $catalog->id,
                    'file_url' => $filePath,
                    'slug' => $slug . '-file-' . (time() + $index),
                    'meta_title' => $catalog->name . ' - ' . $file->getClientOriginalName(),
                ]);
            }
        }
        return redirect()->route('admin.catalog.index')
            ->with('success', 'Item katalog berhasil diperbarui!');
    }

    /**
     * Remove the specified catalog item from storage.
     */
    public function destroy(CatalogItem $catalog)
    {
        try {
            // Delete associated images from public folder
            foreach ($catalog->images as $image) {
                if (file_exists(public_path($image->image_url))) {
                    unlink(public_path($image->image_url));
                }
            }

            // Delete associated files from public folder
            foreach ($catalog->files as $file) {
                if (file_exists(public_path($file->file_url))) {
                    unlink(public_path($file->file_url));
                }
            }

            // Delete the catalog item (cascade will handle relations)
            $catalog->delete();

            // For AJAX requests
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item katalog berhasil dihapus!'
                ]);
            }

            // For regular form submission
            return redirect()->route('admin.catalog.index')
                ->with('success', 'Item katalog berhasil dihapus!');
        } catch (\Exception $e) {
            // For AJAX requests
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus katalog: ' . $e->getMessage()
                ], 500);
            }

            // For regular form submission
            return redirect()->route('admin.catalog.index')
                ->with('error', 'Gagal menghapus katalog: ' . $e->getMessage());
        }
    }

    /**
     * Delete a specific image from catalog item.
     */
    public function deleteImage(CatalogImage $image)
    {
        // Delete file from public folder
        if (file_exists(public_path($image->image_url))) {
            unlink(public_path($image->image_url));
        }

        // Delete from database
        $image->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gambar berhasil dihapus!'
        ]);
    }

    /**
     * Set primary image for catalog item.
     */
    public function setPrimaryImage(CatalogImage $image)
    {
        // Remove primary status from all images of this catalog item
        CatalogImage::where('item_id', $image->item_id)
            ->update(['is_primary' => false]);

        // Set this image as primary
        $image->update(['is_primary' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Gambar utama berhasil diubah!'
        ]);
    }

    /**
     * Delete a specific file from catalog item.
     */
    public function deleteFile(CatalogFile $file)
    {
        // Delete file from public folder
        if (file_exists(public_path($file->file_url))) {
            unlink(public_path($file->file_url));
        }

        // Delete from database
        $file->delete();
        return response()->json([
            'success' => true,
            'message' => 'File berhasil dihapus!'
        ]);
    }
}
