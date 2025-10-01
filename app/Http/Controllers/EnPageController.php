<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Job;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\CatalogItem;

class EnPageController extends Controller
{
    // =================== LANDING PAGE ===================
    public function index()
    {
        $categories = Category::latest()->take(6)->get();
        $featuredProducts = Product::with(['subcategory.category', 'images'])->latest()->take(8)->get();
        $galleryItems = Gallery::with('images')->published()->latest()->take(6)->get();
        $latestArticles = Article::with('category')->published()->latest()->take(3)->get();

        return view('en.welcome', compact(
            'categories',
            'featuredProducts',
            'galleryItems',
            'latestArticles'
        ))->with('title', 'Distributor Insulasi Industri Terpercaya');
    }

    public function about()
    {
        return view('en.about')->with('title', 'Tentang Kami - Tali Rejeki');
    }

    // =================== PRODUCTS ===================
    public function products(Request $request)
    {
        $query = Product::with(['subcategory.category', 'images']);
        $this->applyProductFilters($query, $request);

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::with(['subcategories' => fn($q) => $q->withCount('products')])->get();

        return view('en.products', compact('products', 'categories'))
            ->with([
                'title' => 'Produk Insulasi Industri',
                'currentCategory' => $request->category,
                'searchTerm' => $request->search,
            ]);
    }

    public function productsByCategory(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $query = Product::with(['subcategory.category', 'images'])
            ->whereHas('subcategory', fn($q) => $q->where('category_id', $category->id));

        $this->applyProductFilters($query, $request);

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::with(['subcategories' => fn($q) => $q->withCount('products')])->get();

        return view('en.products', compact('products', 'categories', 'category'))
            ->with([
                'title' => 'Produk ' . $category->name,
                'currentCategory' => $slug,
                'searchTerm' => $request->search,
            ]);
    }

    public function subcategory(Request $request, Category $category, Subcategory $subcategory)
    {
        abort_unless($subcategory->category_id === $category->id, 404);

        $query = Product::with(['subcategory.category', 'images'])
            ->where('subcategory_id', $subcategory->id);

        $this->applyProductFilters($query, $request);

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::with(['subcategories' => fn($q) => $q->withCount('products')])->get();

        return view('en.products', compact('products', 'categories', 'category', 'subcategory'))
            ->with([
                'title' => $subcategory->name,
                'currentCategory' => $category->slug,
                'searchTerm' => $request->search,
            ]);
    }

    public function show(Category $category, Subcategory $subcategory, Product $product)
    {
        abort_unless($product->subcategory_id === $subcategory->id && $subcategory->category_id === $category->id, 404);

        $product->load([
            'subcategory.category',
            'images' => fn($q) => $q->orderBy('sort_order'),
            'primaryImage'
        ]);

        $relatedProducts = Product::query()
            ->where('id', '!=', $product->id)
            ->where(function ($q) use ($subcategory, $category) {
                $q->where('subcategory_id', $subcategory->id)
                    ->orWhereHas('subcategory', fn($q2) => $q2->where('category_id', $category->id));
            })
            ->with(['subcategory.category', 'images' => fn($q) => $q->orderBy('sort_order')])
            ->orderByDesc('updated_at')
            ->limit(12)
            ->get();

        $moreProducts = Product::with(['subcategory.category', 'images' => fn($q) => $q->orderBy('sort_order')])
            ->orderByDesc('updated_at')
            ->get();

        return view('en.product-detail', compact('product', 'relatedProducts', 'moreProducts'))
            ->with('title', $product->name);
    }

    // =================== CATALOG ===================
    public function catalog(Request $request)
    {
        $query = CatalogItem::with(['primaryImage', 'images', 'primaryFile']);

        if ($request->filled('search')) {
            $query->where(fn($q) => $q->where('title', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%"));
        }
        if ($request->filled('category')) $query->where('category', $request->category);
        if ($request->filled('type')) $query->where('type', $request->type);

        $catalogItems = $query->latest()->paginate(12);

        return view('en.catalog', compact('catalogItems'))->with('title', 'Katalog Digital');
    }

    public function catalogDetail($slug)
    {
        $catalogItem = CatalogItem::with([
            'images' => fn($q) => $q->orderByDesc('is_primary')->orderBy('sort_order')->orderBy('id'),
            'files'  => fn($q) => $q->orderByRaw("
                CASE
                    WHEN LOWER(file_url) LIKE '%.pdf' THEN 0
                    WHEN LOWER(file_url) REGEXP '\\\\.(docx?|rtf)$' THEN 1
                    ELSE 2
                END
            ")->orderByDesc('id')
        ])->where('slug', $slug)->firstOrFail();

        $relatedItems = CatalogItem::with('primaryImage')
            ->where('category', $catalogItem->category)
            ->where('id', '!=', $catalogItem->id)
            ->latest()->take(4)->get();

        return view('en.catalog-detail', compact('catalogItem', 'relatedItems'))->with('title', $catalogItem->title);
    }

    // =================== GALLERY ===================
    public function gallery(Request $request)
    {
        $query = Gallery::with('images')->published();
        if ($request->filled('category')) $query->where('category', $request->category);
        $galleries = $query->latest()->paginate(12);

        return view('en.gallery', compact('galleries'))->with('title', 'Galeri Proyek');
    }

    public function galleryDetail($slug)
    {
        $gallery = Gallery::with('images')->published()->where('slug', $slug)->firstOrFail();
        return view('en.gallery-detail', compact('gallery'))->with('title', $gallery->title);
    }

    // =================== CAREER ===================
    public function career()
    {
        $jobs = Job::open()->latest()->paginate(10);
        return view('en.career', compact('jobs'))->with('title', 'Karier - Bergabung dengan Tim Kami');
    }

    public function jobDetail($slug)
    {
        $job = Job::open()->where('slug', $slug)->firstOrFail();
        return view('en.job-detail', compact('job'))->with('title', $job->title);
    }

    public function jobApply(Request $request, $slug)
    {
        $job = Job::open()->where('slug', $slug)->firstOrFail();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'experience' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf|max:5120',
            'cover_letter' => 'nullable|file|mimes:pdf|max:5120',
            'portfolio' => 'nullable|file|mimes:pdf|max:10240',
            'message' => 'nullable|string',
            'agree' => 'required|accepted'
        ]);

        return back()->with('success', 'Terima kasih! Lamaran Anda telah terkirim. Tim HR akan menghubungi Anda jika ada kesesuaian.');
    }

    // =================== CONTACT ===================
    public function contact()
    {
        return view('en.contact')->with('title', 'Hubungi Kami');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.');
    }

    // =================== BLOG / ARTICLES ===================
    public function blog(Request $request)
    {
        $query = Article::with('category')->published();

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $query->where(fn($q) => $q->where('title', 'like', "%{$request->search}%")
                ->orWhere('content', 'like', "%{$request->search}%")
                ->orWhere('excerpt', 'like', "%{$request->search}%"));
        }

        $articles = $query->latest()->paginate(9);
        $categories = ArticleCategory::all();

        return view('en.blog', compact('articles', 'categories'))->with('title', 'Blog & Artikel');
    }

    public function blogDetail($slug)
    {
        $article = Article::with('category')->published()->where('slug', $slug)->firstOrFail();

        $previousArticle = Article::published()->where('id', '<', $article->id)->orderBy('id', 'desc')->first();
        $nextArticle = Article::published()->where('id', '>', $article->id)->orderBy('id', 'asc')->first();
        $recentArticles = Article::with('category')->published()->where('id', '!=', $article->id)->latest()->take(5)->get();
        $popularArticles = Article::with('category')->published()->where('id', '!=', $article->id)->inRandomOrder()->take(5)->get();
        $categories = ArticleCategory::withCount('articles')->get();
        $relatedArticles = Article::with('category')->where('category_id', $article->category_id)->where('id', '!=', $article->id)->published()->take(3)->get();

        $readTime = ceil(str_word_count(strip_tags($article->content)) / 200);

        return view('en.blog-detail', compact(
            'article',
            'previousArticle',
            'nextArticle',
            'recentArticles',
            'popularArticles',
            'categories',
            'relatedArticles',
            'readTime'
        ))->with('title', $article->title);
    }

    public function blogByCategory($slug)
    {
        $category = ArticleCategory::where('slug', $slug)->firstOrFail();
        $articles = Article::with('category')->where('category_id', $category->id)->published()->latest()->paginate(9);
        $categories = ArticleCategory::all();

        return view('en.blog', compact('articles', 'categories', 'category'))->with([
            'title' => 'Blog - ' . $category->name,
            'currentCategory' => $category
        ]);
    }

    // =================== SEARCH ===================
    public function searchAjax(Request $request)
    {
        $query = trim($request->get('q', ''));

        if (!$query) {
            return response()->json([
                'products' => [],
                'articles' => [],
                'galleries' => []
            ]);
        }

        // --------------------
        // Produk
        // --------------------
        $products = Product::query()
            ->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($query) . '%'])
            ->take(5)
            ->get()
            ->map(function ($p) {
                // Cek relasi subcategory & category
                $url = '#';
                if ($p->subcategory && $p->subcategory->category) {
                    $url = route('en.product.detail', [
                        'category' => $p->subcategory->category->slug,
                        'subcategory' => $p->subcategory->slug,
                        'product' => $p->slug
                    ]);
                }
                return [
                    'id' => $p->id,
                    'name' => $p->name,
                    'url' => $url
                ];
            });

        return response()->json([
            'products' => $products,
        ]);
    }

    // =================== CATALOG DOWNLOAD / PREVIEW ===================
    public function catalogDownload($id)
    {
        return $this->handleCatalogFile($id, 'download');
    }

    public function catalogPreview($id)
    {
        return $this->handleCatalogFile($id, 'preview');
    }

    // =================== PRIVATE HELPERS ===================
    private function applyProductFilters($query, Request $request)
    {
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(fn($q) => $this->applySearch($q, $s));
        }
        if ($request->filled('category')) $query->whereHas('subcategory.category', fn($q) => $q->where('slug', $request->category));
        if ($request->filled('min_price')) $query->where('price', '>=', $request->min_price);
        if ($request->filled('max_price')) $query->where('price', '<=', $request->max_price);

        switch ($request->get('sort', 'newest')) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
                break;
        }
    }

    private function applySearch($query, $term)
    {
        for ($i = 1; $i <= 10; $i++) {
            $query->orWhere("attr{$i}", 'like', "%{$term}%");
        }
        $query->orWhere('name', 'like', "%{$term}%")
            ->orWhere('meta_description', 'like', "%{$term}%")
            ->orWhere('sku', 'like', "%{$term}%")
            ->orWhere('brands', 'like', "%{$term}%");
        return $query;
    }

    private function handleCatalogFile($id, $type = 'download')
    {
        $catalogItem = CatalogItem::with('files')->findOrFail($id);
        $primaryFile = $catalogItem->files->sortBy(fn($f) => strtolower(pathinfo($f->file_url ?? '', PATHINFO_EXTENSION)) === 'pdf' ? 0 : 1)->first();

        if (!$primaryFile || !$primaryFile->file_url) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }

        $filePath = $primaryFile->file_url;
        if (str_starts_with($filePath, 'public/')) $filePath = public_path(substr($filePath, 7));
        elseif (str_starts_with($filePath, 'catalog/files/')) $filePath = public_path($filePath);
        else $filePath = public_path('catalog/files/' . basename($filePath));

        if (!file_exists($filePath)) return redirect()->back()->with('error', 'File tidak ditemukan: ' . $filePath);

        $filename = $catalogItem->title . '.' . pathinfo($filePath, PATHINFO_EXTENSION);

        if (property_exists($catalogItem, 'download_count') && $type === 'download') $catalogItem->increment('download_count');

        return $type === 'download'
            ? response()->download($filePath, $filename)
            : response()->file($filePath, ['Content-Type' => mime_content_type($filePath), 'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"']);
    }
}
