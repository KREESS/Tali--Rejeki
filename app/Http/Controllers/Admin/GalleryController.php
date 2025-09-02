<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with(['primaryImage'])
            ->withCount('images')
            ->latest()
            ->paginate(12);

        return view('admin.gallery.index', [
            'title' => 'Galeri Media',
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create', [
            'title' => 'Tambah Galeri Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:galleries,slug',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_robots' => 'nullable|string|max:100',
            'canonical_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $gallery = Gallery::create($validated);

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            $isFirst = true;
            foreach ($request->file('images') as $index => $file) {
                // Create gallery-images directory if not exists
                $uploadPath = public_path('img/gallery-images');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Move file to public directory
                $file->move($uploadPath, $filename);

                // Store relative path from public folder
                $imageUrl = asset('img/gallery-images/' . $filename);

                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_url' => $imageUrl,
                    'alt_text' => $request->input('alt_texts.' . $index, $gallery->title),
                    'title_attr' => $request->input('title_attrs.' . $index, $gallery->title),
                    'caption' => $request->input('captions.' . $index),
                    'seo_filename' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'is_primary' => $isFirst,
                    'sort_order' => $index + 1,
                ]);
                $isFirst = false;
            }
        }

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Galeri berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load(['images' => function ($query) {
            $query->ordered();
        }]);

        return view('admin.gallery.show', [
            'title' => 'Detail Galeri: ' . $gallery->title,
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $gallery->load(['images' => function ($query) {
            $query->ordered();
        }]);

        return view('admin.gallery.edit', [
            'title' => 'Edit Galeri: ' . $gallery->title,
            'gallery' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        try {
            Log::info('Gallery update started', [
                'gallery_id' => $gallery->id,
                'request_data' => $request->except(['new_images', '_token'])
            ]);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => [
                    'nullable',
                    'string',
                    'max:255',
                    Rule::unique('galleries', 'slug')->ignore($gallery->id)
                ],
                'description' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:255',
                'meta_robots' => 'nullable|string|max:100',
                'canonical_url' => 'nullable|url',
                'status' => 'required|in:draft,published',
                'published_at' => 'nullable|date',
                'new_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ]);

            // Handle empty values that should be null instead of empty strings
            $updateData = $validated;
            foreach (['slug', 'description', 'meta_title', 'meta_description', 'meta_robots', 'canonical_url', 'published_at'] as $field) {
                if (isset($updateData[$field]) && $updateData[$field] === '') {
                    $updateData[$field] = null;
                }
            }

            Log::info('Validation passed', ['validated_data' => $updateData]);

            // Update gallery basic information
            $gallery->update($updateData);

            Log::info('Gallery basic info updated');

            // Handle new image uploads
            if ($request->hasFile('new_images')) {
                Log::info('Processing new images', ['count' => count($request->file('new_images'))]);

                $currentMaxOrder = $gallery->images()->max('sort_order') ?? 0;
                $isFirstImage = $gallery->images()->count() === 0;

                foreach ($request->file('new_images') as $index => $file) {
                    try {
                        // Create gallery-images directory if not exists
                        $uploadPath = public_path('img/gallery-images');
                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0755, true);
                            Log::info('Created upload directory: ' . $uploadPath);
                        }

                        // Generate unique filename
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                        // Move file to public directory
                        $file->move($uploadPath, $filename);

                        Log::info('File uploaded', ['filename' => $filename]);

                        // Store relative path from public folder (with asset() for full URL)
                        $imageUrl = asset('img/gallery-images/' . $filename);

                        $galleryImage = GalleryImage::create([
                            'gallery_id' => $gallery->id,
                            'image_url' => $imageUrl,
                            'alt_text' => $request->input('new_alt_texts.' . $index, $gallery->title),
                            'title_attr' => $request->input('new_title_attrs.' . $index, $gallery->title),
                            'caption' => $request->input('new_captions.' . $index),
                            'seo_filename' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                            'is_primary' => $isFirstImage && $index === 0,
                            'sort_order' => $currentMaxOrder + $index + 1,
                        ]);

                        Log::info('Gallery image created', ['id' => $galleryImage->id]);
                    } catch (\Exception $e) {
                        Log::error('Error uploading image', [
                            'index' => $index,
                            'filename' => $file->getClientOriginalName(),
                            'error' => $e->getMessage()
                        ]);
                        // Continue with other images
                    }
                }
            }

            Log::info('Gallery update completed successfully');

            return redirect()->route('admin.gallery.index')
                ->with('success', 'Galeri berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in gallery update', [
                'errors' => $e->errors(),
                'gallery_id' => $gallery->id
            ]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error updating gallery', [
                'gallery_id' => $gallery->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui galeri: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        try {
            // Delete all images from public directory
            foreach ($gallery->images as $image) {
                $imagePath = parse_url($image->image_url, PHP_URL_PATH);
                $fullPath = public_path($imagePath);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }

            // Delete gallery and related images (cascade)
            $gallery->delete();

            // Check if request expects JSON response (AJAX)
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Galeri berhasil dihapus!'
                ]);
            }

            return redirect()->route('admin.gallery.index')
                ->with('success', 'Galeri berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Delete Gallery Error: ' . $e->getMessage());

            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus gallery!'
                ], 500);
            }

            return redirect()->route('admin.gallery.index')
                ->with('error', 'Terjadi kesalahan saat menghapus gallery!');
        }
    }

    /**
     * Delete a specific image from gallery
     */
    public function deleteImage(GalleryImage $image)
    {
        try {
            $gallery = $image->gallery;
            $wasPrimary = $image->is_primary;

            // Delete image file from public directory
            $fullPath = public_path($image->image_url);
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }

            // Delete image record
            $image->delete();

            // If deleted image was primary, set first remaining image as primary
            if ($wasPrimary) {
                $newPrimary = $gallery->images()->ordered()->first();
                if ($newPrimary) {
                    $newPrimary->setAsPrimary();
                }
            }

            // Check if request expects JSON response (AJAX)
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Gambar berhasil dihapus!'
                ]);
            }

            return back()->with('success', 'Gambar berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Delete Image Error: ' . $e->getMessage());

            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus gambar!'
                ], 500);
            }

            return back()->with('error', 'Terjadi kesalahan saat menghapus gambar!');
        }
    }

    /**
     * Set an image as primary for the gallery
     */
    public function setPrimaryImage(GalleryImage $image)
    {
        try {
            $image->setAsPrimary();

            // Check if request expects JSON response (AJAX)
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Gambar utama berhasil diubah!'
                ]);
            }

            return back()->with('success', 'Gambar utama berhasil diubah!');
        } catch (\Exception $e) {
            Log::error('Set Primary Image Error: ' . $e->getMessage());

            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat mengubah gambar utama!'
                ], 500);
            }

            return back()->with('error', 'Terjadi kesalahan saat mengubah gambar utama!');
        }
    }

    /**
     * Toggle gallery status (draft/published)
     */
    public function toggleStatus(Gallery $gallery)
    {
        try {
            $newStatus = $gallery->status === 'published' ? 'draft' : 'published';
            $gallery->update(['status' => $newStatus]);

            return response()->json([
                'success' => true,
                'message' => "Status gallery berhasil diubah ke {$newStatus}!",
                'new_status' => $newStatus
            ]);
        } catch (\Exception $e) {
            Log::error('Toggle Status Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status gallery!'
            ], 500);
        }
    }
}
