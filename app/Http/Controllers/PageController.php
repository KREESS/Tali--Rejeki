<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Job;
use App\Models\Article;
use App\Models\CatalogItem;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Get featured categories (latest 6)
        $categories = Category::latest()->take(6)->get();

        // Get featured products (latest 8)
        $featuredProducts = Product::with(['subcategory.category', 'images'])
            ->latest()
            ->take(8)
            ->get();

        // Get latest gallery items for homepage
        $galleryItems = Gallery::with('images')
            ->published()
            ->latest()
            ->take(6)
            ->get();

        // Get latest articles
        $latestArticles = Article::with('category')
            ->published()
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', [
            'title' => 'Distributor Insulasi Industri Terpercaya',
            'categories' => $categories,
            'featuredProducts' => $featuredProducts,
            'galleryItems' => $galleryItems,
            'latestArticles' => $latestArticles
        ]);
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('pages.about', [
            'title' => 'Tentang Kami - Tali Rejeki'
        ]);
    }

    /**
     * Display the products page.
     */
    public function products(Request $request)
    {
        $query = Product::with(['subcategory.category', 'images']);

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('meta_description', 'like', "%{$searchTerm}%")
                    ->orWhere('attr1', 'like', "%{$searchTerm}%")
                    ->orWhere('attr2', 'like', "%{$searchTerm}%");
            });
        }

        // Category filter - now filtering by subcategory's category
        if ($request->has('category') && !empty($request->category)) {
            $query->whereHas('subcategory.category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Price range filter
        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        $sortBy = $request->get('sort', 'newest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('pages.products', [
            'title' => 'Produk Insulasi Industri',
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $request->category,
            'searchTerm' => $request->search
        ]);
    }

    /**
     * Display products by category.
     */
    public function productsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::with(['subcategory.category', 'images'])
            ->whereHas('subcategory', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })
            ->paginate(12);

        return view('pages.products', [
            'title' => 'Produk ' . $category->name,
            'products' => $products,
            'categories' => Category::all(),
            'currentCategory' => $slug,
            'category' => $category
        ]);
    }

    /**
     * Display single product detail.
     */
    public function productDetail($slug)
    {
        $product = Product::with(['subcategory.category', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Get related products from same category (through subcategory)
        $relatedProducts = Product::with(['subcategory.category', 'images'])
            ->whereHas('subcategory', function ($query) use ($product) {
                $query->where('category_id', $product->subcategory->category_id);
            })
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('pages.product-detail', [
            'title' => $product->name,
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    /**
     * Display the catalog page.
     */
    public function catalog(Request $request)
    {
        $query = CatalogItem::query();

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        // Type filter
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }

        $catalogItems = $query->latest()->paginate(12);

        return view('pages.catalog', [
            'title' => 'Katalog Digital',
            'catalogItems' => $catalogItems
        ]);
    }

    /**
     * Display single catalog detail.
     */
    public function catalogDetail($slug)
    {
        $catalogItem = CatalogItem::where('slug', $slug)->firstOrFail();

        // Get related catalog items
        $relatedItems = CatalogItem::where('category', $catalogItem->category)
            ->where('id', '!=', $catalogItem->id)
            ->take(4)
            ->get();

        return view('pages.catalog-detail', [
            'title' => $catalogItem->title,
            'catalogItem' => $catalogItem,
            'relatedItems' => $relatedItems
        ]);
    }

    /**
     * Display the gallery page.
     */
    public function gallery(Request $request)
    {
        $query = Gallery::with('images')->published();

        // Category filter if needed
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        $galleries = $query->latest()->paginate(12);

        return view('pages.gallery', [
            'title' => 'Galeri Proyek',
            'galleries' => $galleries
        ]);
    }

    /**
     * Display single gallery detail.
     */
    public function galleryDetail($slug)
    {
        $gallery = Gallery::with('images')
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        return view('pages.gallery-detail', [
            'title' => $gallery->title,
            'gallery' => $gallery
        ]);
    }

    /**
     * Display the career page.
     */
    public function career()
    {
        $jobs = Job::open()
            ->latest()
            ->paginate(10);

        return view('pages.career', [
            'title' => 'Karier - Bergabung dengan Tim Kami',
            'jobs' => $jobs
        ]);
    }

    /**
     * Display single job detail.
     */
    public function jobDetail($slug)
    {
        $job = Job::where('slug', $slug)
            ->open()
            ->firstOrFail();

        return view('pages.job-detail', [
            'title' => $job->title,
            'job' => $job
        ]);
    }

    /**
     * Handle job application submission.
     */
    public function jobApply(Request $request, $slug)
    {
        $job = Job::where('slug', $slug)
            ->open()
            ->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'experience' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf|max:5120', // 5MB
            'cover_letter' => 'nullable|file|mimes:pdf|max:5120',
            'portfolio' => 'nullable|file|mimes:pdf|max:10240', // 10MB
            'message' => 'nullable|string',
            'agree' => 'required|accepted'
        ]);

        // Here you can implement file storage and email sending logic
        // For now, we'll just return success response

        return back()->with('success', 'Terima kasih! Lamaran Anda telah terkirim. Tim HR akan menghubungi Anda jika ada kesesuaian.');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Hubungi Kami'
        ]);
    }

    /**
     * Handle contact form submission.
     */
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        // Here you can implement email sending logic
        // For now, we'll just return success response

        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.');
    }

    /**
     * Display blog/articles page.
     */
    public function blog(Request $request)
    {
        $query = Article::with(['category'])
            ->published();

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%")
                    ->orWhere('excerpt', 'like', "%{$searchTerm}%");
            });
        }

        $articles = $query->latest()->paginate(9);
        $categories = \App\Models\ArticleCategory::all();

        return view('pages.blog', [
            'title' => 'Blog & Artikel',
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    /**
     * Display single article detail.
     */
    public function blogDetail($slug)
    {
        $article = Article::with('category')
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Get previous and next articles
        $previousArticle = Article::published()
            ->where('id', '<', $article->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextArticle = Article::published()
            ->where('id', '>', $article->id)
            ->orderBy('id', 'asc')
            ->first();

        // Get recent articles
        $recentArticles = Article::with('category')
            ->published()
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(5)
            ->get();

        // Get popular articles (mock data for now)
        $popularArticles = Article::with('category')
            ->published()
            ->where('id', '!=', $article->id)
            ->inRandomOrder()
            ->take(5)
            ->get();

        // Get categories
        $categories = \App\Models\ArticleCategory::withCount('articles')->get();

        // Get related articles
        $relatedArticles = Article::with('category')
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->published()
            ->take(3)
            ->get();

        // Calculate read time (estimate)
        $wordCount = str_word_count(strip_tags($article->content));
        $readTime = ceil($wordCount / 200); // Average reading speed

        return view('pages.blog-detail', [
            'title' => $article->title,
            'article' => $article,
            'previousArticle' => $previousArticle,
            'nextArticle' => $nextArticle,
            'recentArticles' => $recentArticles,
            'popularArticles' => $popularArticles,
            'categories' => $categories,
            'relatedArticles' => $relatedArticles,
            'readTime' => $readTime
        ]);
    }

    /**
     * Display blog by category.
     */
    public function blogByCategory($slug)
    {
        $category = \App\Models\ArticleCategory::where('slug', $slug)->firstOrFail();

        $articles = Article::with('category')
            ->where('category_id', $category->id)
            ->published()
            ->latest()
            ->paginate(9);

        $categories = \App\Models\ArticleCategory::all();

        return view('pages.blog', [
            'title' => 'Blog - ' . $category->name,
            'articles' => $articles,
            'categories' => $categories,
            'currentCategory' => $category
        ]);
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $searchTerm = $request->get('q');

        if (empty($searchTerm)) {
            return redirect()->route('home')->with('error', 'Mohon masukkan kata kunci pencarian.');
        }

        // Search in products
        $products = Product::with(['subcategory.category', 'images'])
            ->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('meta_description', 'like', "%{$searchTerm}%")
                    ->orWhere('attr1', 'like', "%{$searchTerm}%")
                    ->orWhere('attr2', 'like', "%{$searchTerm}%");
            })
            ->take(5)
            ->get();

        // Search in articles
        $articles = Article::with('category')
            ->published()
            ->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");
            })
            ->take(5)
            ->get();

        // Search in galleries
        $galleries = Gallery::published()
            ->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%");
            })
            ->take(5)
            ->get();

        return view('pages.search-results', [
            'title' => 'Hasil Pencarian: ' . $searchTerm,
            'searchTerm' => $searchTerm,
            'products' => $products,
            'articles' => $articles,
            'galleries' => $galleries
        ]);
    }
}
