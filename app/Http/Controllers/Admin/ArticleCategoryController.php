<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ArticleCategory::withCount('articles')->paginate(10);
        return view('admin.article-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name',
        ]);

        $slug = Str::slug($request->name);

        // Ensure slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while (ArticleCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        ArticleCategory::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.article-categories.index')
            ->with('success', 'Kategori artikel berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ArticleCategory $article_category)
    {
        try {
            // Get all articles for client-side filtering (no pagination for better UX)
            $articles = $article_category->articles()->orderBy('created_at', 'desc')->get();

            $articleCategory = $article_category; // Alias for consistency with view
            return view('admin.article-categories.show', compact('articleCategory', 'articles'));
        } catch (\Exception $e) {
            Log::error('Show category error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memuat artikel. Silakan coba lagi.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleCategory $article_category)
    {
        $articleCategory = $article_category; // Alias for consistency
        return view('admin.article-categories.edit', compact('articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleCategory $article_category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:article_categories,name,' . $article_category->id,
        ]);

        $slug = Str::slug($request->name);

        // Ensure slug is unique (except for current category)
        $originalSlug = $slug;
        $counter = 1;
        while (ArticleCategory::where('slug', $slug)->where('id', '!=', $article_category->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $article_category->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.article-categories.index')
            ->with('success', 'Kategori artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategory $article_category)
    {
        try {
            // Count articles for messaging
            $articleCount = $article_category->articles()->count();

            // Delete all article images first
            foreach ($article_category->articles as $article) {
                if ($article->cover_url && file_exists(public_path($article->cover_url))) {
                    unlink(public_path($article->cover_url));
                }
            }

            // Delete all articles in this category
            $article_category->articles()->delete();

            // Delete the category itself
            $categoryName = $article_category->name;
            $article_category->delete();

            // Handle AJAX requests
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Kategori '{$categoryName}' dan {$articleCount} artikel berhasil dihapus!"
                ]);
            }

            return redirect()->route('admin.article-categories.index')
                ->with('success', "Kategori '{$categoryName}' dan {$articleCount} artikel berhasil dihapus!");
        } catch (\Exception $e) {
            Log::error('Category delete error: ' . $e->getMessage());

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus kategori. Silakan coba lagi.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus kategori. Silakan coba lagi.');
        }
    }

    /**
     * Bulk actions for articles in category
     */
    public function bulkActions(Request $request, ArticleCategory $articleCategory)
    {
        // Validate action parameter
        $request->validate([
            'action' => 'required|in:delete,publish,draft'
        ]);

        $action = $request->input('action');

        try {
            switch ($action) {
                case 'delete':
                    return $this->bulkDeleteArticles($articleCategory);
                case 'publish':
                    return $this->bulkPublishArticles($articleCategory);
                case 'draft':
                    return $this->bulkDraftArticles($articleCategory);
                default:
                    throw new \Exception('Aksi tidak valid');
            }
        } catch (\Exception $e) {
            Log::error('Bulk action error: ' . $e->getMessage());

            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 422);
            }

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Bulk delete all articles in category
     */
    private function bulkDeleteArticles(ArticleCategory $articleCategory)
    {
        try {
            $articles = $articleCategory->articles;
            $deletedCount = 0;

            foreach ($articles as $article) {
                // Delete cover image if exists
                if ($article->cover_url && file_exists(public_path($article->cover_url))) {
                    unlink(public_path($article->cover_url));
                }

                $article->delete();
                $deletedCount++;
            }

            // Handle AJAX requests
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Berhasil menghapus {$deletedCount} artikel",
                    'deleted_count' => $deletedCount
                ]);
            }

            return redirect()->route('admin.article-categories.show', $articleCategory)
                ->with('success', "Berhasil menghapus {$deletedCount} artikel");
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus artikel. Silakan coba lagi.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus artikel. Silakan coba lagi.');
        }
    }

    /**
     * Bulk publish articles in category
     */
    private function bulkPublishArticles(ArticleCategory $articleCategory)
    {
        try {
            $updatedCount = $articleCategory->articles()
                ->where('status', 'draft')
                ->update([
                    'status' => 'published',
                    'published_at' => now()
                ]);

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Berhasil mempublikasi {$updatedCount} artikel",
                    'updated_count' => $updatedCount
                ]);
            }

            return redirect()->route('admin.article-categories.show', $articleCategory)
                ->with('success', "Berhasil mempublikasi {$updatedCount} artikel");
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mempublikasi artikel. Silakan coba lagi.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Gagal mempublikasi artikel. Silakan coba lagi.');
        }
    }

    /**
     * Bulk draft articles in category
     */
    private function bulkDraftArticles(ArticleCategory $articleCategory)
    {
        try {
            $updatedCount = $articleCategory->articles()
                ->where('status', 'published')
                ->update(['status' => 'draft']);

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Berhasil mengubah {$updatedCount} artikel menjadi draft",
                    'updated_count' => $updatedCount
                ]);
            }

            return redirect()->route('admin.article-categories.show', $articleCategory)
                ->with('success', "Berhasil mengubah {$updatedCount} artikel menjadi draft");
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengubah status artikel. Silakan coba lagi.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Gagal mengubah status artikel. Silakan coba lagi.');
        }
    }
}
