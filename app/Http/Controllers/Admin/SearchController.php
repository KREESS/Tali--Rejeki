<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Job;
use App\Models\CatalogItem;
use App\Models\CatalogFile;
use App\Models\CatalogImage;

class SearchController extends Controller
{
    /**
     * Global search untuk admin - Enhanced dengan semua tabel
     */
    public function globalSearch(Request $request)
    {
        $query = $request->get('query', '');
        $filter = $request->get('filter', 'all');
        $limit = $request->get('limit', 10);
        $searchAll = $request->get('search_all', false); // Flag untuk pencarian mendalam

        if (strlen($query) < 2) {
            return response()->json([
                'success' => false,
                'message' => 'Query minimal 2 karakter'
            ]);
        }

        $results = [];

        try {
            if ($searchAll) {
                // Comprehensive search across ALL tables
                $results = $this->comprehensiveSearch($query, $limit);
            } else {
                // Standard search by filter
                switch ($filter) {
                    case 'products':
                        $results = $this->searchProducts($query, $limit);
                        break;

                    case 'product-categories':
                        $results = ['categories' => $this->searchCategories($query, $limit)];
                        break;

                    case 'product-subcategories':
                        $results = ['subcategories' => $this->searchSubcategories($query, $limit)];
                        break;

                    case 'catalog':
                        $results = ['catalogs' => $this->searchAllCatalogs($query, $limit)];
                        break;

                    case 'article-categories':
                        $results = ['article_categories' => $this->searchArticleCategories($query, $limit)];
                        break;

                    case 'galleries':
                        $results = ['galleries' => $this->searchAllGalleries($query, $limit)];
                        break;

                    case 'jobs':
                        $results = ['jobs' => $this->searchAllJobs($query, $limit)];
                        break;

                    case 'manage-subcategories':
                        $results = ['manage_subcategories' => $this->searchManageSubcategories($query, $limit)];
                        break;

                    case 'manage-catalog':
                        $results = ['manage_catalogs' => $this->searchManageCatalog($query, $limit)];
                        break;

                    case 'manage-article-categories':
                        $results = ['manage_article_categories' => $this->searchManageArticleCategories($query, $limit)];
                        break;

                    case 'gallery-projects':
                        $results = ['gallery_projects' => $this->searchGalleryProjects($query, $limit)];
                        break;

                    case 'job-vacancies':
                        $results = ['job_vacancies' => $this->searchJobVacancies($query, $limit)];
                        break;

                    case 'customers':
                        $results = $this->searchCustomers($query, $limit);
                        break;

                    case 'content':
                        $results = $this->searchContent($query, $limit);
                        break;

                    case 'management':
                        $results = $this->searchManagement($query, $limit);
                        break;

                    case 'all':
                    default:
                        $results = $this->searchAll($query, $limit);
                        break;
                }
            }

            // Calculate total results
            $total = 0;
            if (is_array($results)) {
                foreach ($results as $category) {
                    if (is_array($category)) {
                        $total += count($category);
                    } elseif (is_object($category) && method_exists($category, 'count')) {
                        $total += $category->count();
                    }
                }
            }

            return response()->json([
                'success' => true,
                'query' => $query,
                'filter' => $filter,
                'search_all' => $searchAll,
                'results' => $results,
                'total' => $total
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mencari: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search suggestions untuk autocomplete
     */
    public function searchSuggestions(Request $request)
    {
        $query = $request->get('query', '');

        if (strlen($query) < 2) {
            return response()->json([
                'success' => false,
                'suggestions' => []
            ]);
        }

        try {
            $suggestions = [];

            // Product suggestions
            $products = Product::with('subcategory.category')
                ->where('name', 'LIKE', "%{$query}%")
                ->limit(3)
                ->get();

            foreach ($products as $product) {
                $suggestions[] = [
                    'type' => 'product',
                    'title' => $product->name,
                    'category' => 'Produk',
                    'url' => route('admin.products.show', $product->id),
                    'icon' => 'cube'
                ];
            }

            // Article suggestions
            $articles = Article::with('category')
                ->where('title', 'LIKE', "%{$query}%")
                ->where('status', 'published')
                ->limit(3)
                ->get();

            foreach ($articles as $article) {
                $suggestions[] = [
                    'type' => 'article',
                    'title' => $article->title,
                    'category' => 'Artikel',
                    'url' => route('admin.articles.show', $article->id),
                    'icon' => 'newspaper'
                ];
            }

            // User suggestions
            $users = User::where('name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->limit(2)
                ->get();

            foreach ($users as $user) {
                $suggestions[] = [
                    'type' => 'user',
                    'title' => $user->name,
                    'category' => 'Pengguna',
                    'url' => '#',
                    'icon' => 'user'
                ];
            }

            // Category suggestions (Kategori Produk)
            $categories = Category::where('name', 'LIKE', "%{$query}%")
                ->limit(2)
                ->get();

            foreach ($categories as $category) {
                $suggestions[] = [
                    'type' => 'category',
                    'title' => $category->name,
                    'category' => 'Kategori Produk',
                    'url' => route('admin.categories.show', $category->id),
                    'icon' => 'tags'
                ];
            }

            // Gallery suggestions (Galeri Proyek)
            $galleries = Gallery::where('title', 'LIKE', "%{$query}%")
                ->where('status', 'published')
                ->limit(2)
                ->get();

            foreach ($galleries as $gallery) {
                $suggestions[] = [
                    'type' => 'gallery',
                    'title' => $gallery->title,
                    'category' => 'Galeri Proyek',
                    'url' => route('admin.gallery.show', $gallery->id),
                    'icon' => 'images'
                ];
            }

            // Job suggestions (Lowongan Kerja)
            $jobs = Job::where('title', 'LIKE', "%{$query}%")
                ->where('status', 'published')
                ->limit(2)
                ->get();

            foreach ($jobs as $job) {
                $suggestions[] = [
                    'type' => 'job',
                    'title' => $job->title,
                    'category' => 'Lowongan Kerja',
                    'url' => route('admin.jobs.show', $job->id),
                    'icon' => 'briefcase'
                ];
            }

            return response()->json([
                'success' => true,
                'suggestions' => array_slice($suggestions, 0, 8)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'suggestions' => []
            ]);
        }
    }

    /**
     * Search products
     */
    private function searchProducts($query, $limit)
    {
        $products = Product::with(['subcategory.category', 'primaryImage'])
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('sku', 'LIKE', "%{$query}%")
                    ->orWhere('attr1', 'LIKE', "%{$query}%")
                    ->orWhere('attr2', 'LIKE', "%{$query}%")
                    ->orWhere('attr3', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('subcategory', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('subcategory.category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return [
            'products' => $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'title' => $product->name,
                    'description' => $product->subcategory->category->name . ' > ' . $product->subcategory->name,
                    'price' => $product->price ? 'Rp ' . number_format($product->price, 0, ',', '.') : null,
                    'sku' => $product->sku,
                    'image' => $product->primaryImage ? asset($product->primaryImage->image_path) : null,
                    'url' => route('admin.products.show', $product->id),
                    'type' => 'product',
                    'icon' => 'cube'
                ];
            })
        ];
    }

    /**
     * Search customers/users
     */
    private function searchCustomers($query, $limit)
    {
        $users = User::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%");
        })
            ->limit($limit)
            ->get();

        return [
            'customers' => $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'title' => $user->name,
                    'description' => $user->email,
                    'role' => $user->getRoleNames()->first() ?? 'User',
                    'created_at' => $user->created_at->format('d M Y'),
                    'url' => '#',
                    'type' => 'customer',
                    'icon' => 'user'
                ];
            })
        ];
    }

    /**
     * Search content (articles, galleries, jobs, etc)
     */
    private function searchContent($query, $limit)
    {
        $results = [];

        // Articles
        $articles = Article::with('category')
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")
                    ->orWhere('excerpt', 'LIKE', "%{$query}%");
            })
            ->limit($limit / 4)
            ->get();

        $results['articles'] = $articles->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->excerpt ?: 'Artikel ' . ($article->category->name ?? ''),
                'status' => $article->status,
                'published_at' => $article->published_at ? $article->published_at->format('d M Y') : null,
                'url' => route('admin.articles.show', $article->id),
                'type' => 'article',
                'icon' => 'newspaper'
            ];
        });

        // Galleries
        $galleries = Gallery::with('primaryImage')
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->limit($limit / 4)
            ->get();

        $results['galleries'] = $galleries->map(function ($gallery) {
            return [
                'id' => $gallery->id,
                'title' => $gallery->title,
                'description' => $gallery->description ?: 'Galeri foto',
                'status' => $gallery->status,
                'image' => $gallery->primaryImage ? asset($gallery->primaryImage->image_url) : null,
                'url' => route('admin.gallery.show', $gallery->id),
                'type' => 'gallery',
                'icon' => 'images'
            ];
        });

        // Jobs
        $jobs = Job::where(function ($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
                ->orWhere('description_html', 'LIKE', "%{$query}%")
                ->orWhere('location', 'LIKE', "%{$query}%")
                ->orWhere('department', 'LIKE', "%{$query}%");
        })
            ->limit($limit / 4)
            ->get();

        $results['jobs'] = $jobs->map(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'description' => $job->location . ' - ' . $job->department,
                'status' => $job->status,
                'employment_type' => $job->employment_type,
                'url' => route('admin.jobs.show', $job->id),
                'type' => 'job',
                'icon' => 'briefcase'
            ];
        });

        // Catalog Items
        $catalogs = CatalogItem::with('images')
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->limit($limit / 4)
            ->get();

        $results['catalogs'] = $catalogs->map(function ($catalog) {
            return [
                'id' => $catalog->id,
                'title' => $catalog->name,
                'description' => $catalog->description ?: 'Item katalog',
                'files_count' => $catalog->files()->count(),
                'images_count' => $catalog->images()->count(),
                'url' => route('admin.catalog.show', $catalog->id),
                'type' => 'catalog',
                'icon' => 'folder'
            ];
        });

        return $results;
    }

    /**
     * Search all categories
     */
    private function searchAll($query, $limit)
    {
        $perCategory = max(1, intval($limit / 3));

        return [
            'products' => $this->searchProducts($query, $perCategory)['products'],
            'customers' => $this->searchCustomers($query, $perCategory)['customers'],
            'content' => $this->searchContent($query, $perCategory)
        ];
    }

    /**
     * Advanced search dengan filter lebih detail
     */
    public function advancedSearch(Request $request)
    {
        $query = $request->get('query', '');
        $type = $request->get('type', 'all');
        $category = $request->get('category', '');
        $dateFrom = $request->get('date_from', '');
        $dateTo = $request->get('date_to', '');
        $status = $request->get('status', '');
        $sortBy = $request->get('sort_by', 'relevance');
        $sortOrder = $request->get('sort_order', 'desc');
        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 15);

        $results = [];

        try {
            switch ($type) {
                case 'products':
                    $query_builder = Product::with(['subcategory.category', 'primaryImage'])
                        ->where(function ($q) use ($query) {
                            if ($query) {
                                $q->where('name', 'LIKE', "%{$query}%")
                                    ->orWhere('sku', 'LIKE', "%{$query}%");
                            }
                        });

                    if ($category) {
                        $query_builder->whereHas('subcategory.category', function ($q) use ($category) {
                            $q->where('id', $category);
                        });
                    }

                    if ($dateFrom) {
                        $query_builder->where('created_at', '>=', $dateFrom);
                    }

                    if ($dateTo) {
                        $query_builder->where('created_at', '<=', $dateTo);
                    }

                    $results = $query_builder->paginate($perPage);
                    break;

                case 'articles':
                    $query_builder = Article::with('category')
                        ->where(function ($q) use ($query) {
                            if ($query) {
                                $q->where('title', 'LIKE', "%{$query}%")
                                    ->orWhere('content', 'LIKE', "%{$query}%");
                            }
                        });

                    if ($status) {
                        $query_builder->where('status', $status);
                    }

                    if ($category) {
                        $query_builder->where('category_id', $category);
                    }

                    if ($dateFrom) {
                        $query_builder->where('created_at', '>=', $dateFrom);
                    }

                    if ($dateTo) {
                        $query_builder->where('created_at', '<=', $dateTo);
                    }

                    $results = $query_builder->paginate($perPage);
                    break;

                case 'users':
                    $query_builder = User::where(function ($q) use ($query) {
                        if ($query) {
                            $q->where('name', 'LIKE', "%{$query}%")
                                ->orWhere('email', 'LIKE', "%{$query}%");
                        }
                    });

                    if ($dateFrom) {
                        $query_builder->where('created_at', '>=', $dateFrom);
                    }

                    if ($dateTo) {
                        $query_builder->where('created_at', '<=', $dateTo);
                    }

                    $results = $query_builder->paginate($perPage);
                    break;
            }

            return response()->json([
                'success' => true,
                'results' => $results,
                'filters' => [
                    'query' => $query,
                    'type' => $type,
                    'category' => $category,
                    'date_from' => $dateFrom,
                    'date_to' => $dateTo,
                    'status' => $status,
                    'sort_by' => $sortBy,
                    'sort_order' => $sortOrder
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Comprehensive search across ALL database tables
     */
    private function comprehensiveSearch($query, $limit)
    {
        $results = [];
        $perTable = max(1, intval($limit / 10)); // Divide limit across multiple tables

        // 1. Products and related tables
        $products = $this->searchProducts($query, $perTable);
        if (!empty($products['products'])) {
            $results['products'] = $products['products'];
        }

        // 2. Categories and Subcategories
        $categories = $this->searchCategories($query, $perTable);
        if (!empty($categories)) {
            $results['categories'] = $categories;
        }

        // 3. Users
        $users = $this->searchCustomers($query, $perTable);
        if (!empty($users['customers'])) {
            $results['users'] = $users['customers'];
        }

        // 4. Articles and Article Categories
        $articles = $this->searchAllArticles($query, $perTable);
        if (!empty($articles)) {
            $results['articles'] = $articles;
        }

        // 5. Galleries and Gallery Images
        $galleries = $this->searchAllGalleries($query, $perTable);
        if (!empty($galleries)) {
            $results['galleries'] = $galleries;
        }

        // 6. Jobs
        $jobs = $this->searchAllJobs($query, $perTable);
        if (!empty($jobs)) {
            $results['jobs'] = $jobs;
        }

        // 7. Catalog Items, Files, and Images
        $catalogs = $this->searchAllCatalogs($query, $perTable);
        if (!empty($catalogs)) {
            $results['catalogs'] = $catalogs;
        }

        // 8. Product Images
        $productImages = $this->searchProductImages($query, $perTable);
        if (!empty($productImages)) {
            $results['product_images'] = $productImages;
        }

        // 9. Notifications
        $notifications = $this->searchNotifications($query, $perTable);
        if (!empty($notifications)) {
            $results['notifications'] = $notifications;
        }

        // 10. System Logs
        $systemLogs = $this->searchSystemLogs($query, $perTable);
        if (!empty($systemLogs)) {
            $results['system_logs'] = $systemLogs;
        }

        return $results;
    }

    /**
     * Search management related data (categories, subcategories, etc)
     */
    private function searchManagement($query, $limit)
    {
        $results = [];
        $perTable = max(1, intval($limit / 3));

        // Categories
        $categories = $this->searchCategories($query, $perTable);
        if (!empty($categories)) {
            $results['categories'] = $categories;
        }

        // Subcategories  
        $subcategories = $this->searchSubcategories($query, $perTable);
        if (!empty($subcategories)) {
            $results['subcategories'] = $subcategories;
        }

        // Article Categories
        $articleCategories = $this->searchArticleCategories($query, $perTable);
        if (!empty($articleCategories)) {
            $results['article_categories'] = $articleCategories;
        }

        return $results;
    }

    /**
     * Search Categories
     */
    private function searchCategories($query, $limit)
    {
        $categories = Category::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('meta_title', 'LIKE', "%{$query}%")
                ->orWhere('meta_description', 'LIKE', "%{$query}%");
        })
            ->limit($limit)
            ->get();

        return $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->name,
                'description' => $category->meta_description ?: 'Kategori produk',
                'slug' => $category->slug,
                'products_count' => $category->subcategories()->withCount('products')->get()->sum('products_count'),
                'url' => route('admin.categories.show', $category->id),
                'type' => 'category',
                'icon' => 'tags'
            ];
        })->toArray();
    }

    /**
     * Search Subcategories
     */
    private function searchSubcategories($query, $limit)
    {
        $subcategories = Subcategory::with('category')
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('meta_title', 'LIKE', "%{$query}%")
                    ->orWhere('meta_description', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $subcategories->map(function ($subcategory) {
            return [
                'id' => $subcategory->id,
                'title' => $subcategory->name,
                'description' => $subcategory->category->name . ' > ' . $subcategory->name,
                'slug' => $subcategory->slug,
                'products_count' => $subcategory->products()->count(),
                'url' => route('admin.subcategories.index'),
                'type' => 'subcategory',
                'icon' => 'tag'
            ];
        })->toArray();
    }

    /**
     * Search Article Categories
     */
    private function searchArticleCategories($query, $limit)
    {
        $articleCategories = ArticleCategory::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
                ->orWhere('slug', 'LIKE', "%{$query}%");
        })
            ->limit($limit)
            ->get();

        return $articleCategories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->name,
                'description' => 'Kategori artikel',
                'slug' => $category->slug,
                'articles_count' => $category->articles()->count(),
                'url' => route('admin.article-categories.index'),
                'type' => 'article_category',
                'icon' => 'newspaper'
            ];
        })->toArray();
    }

    /**
     * Search All Articles (including content search)
     */
    private function searchAllArticles($query, $limit)
    {
        $articles = Article::with('category')
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")
                    ->orWhere('excerpt', 'LIKE', "%{$query}%")
                    ->orWhere('meta_title', 'LIKE', "%{$query}%")
                    ->orWhere('meta_description', 'LIKE', "%{$query}%")
                    ->orWhere('slug', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $articles->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->excerpt ?: substr(strip_tags($article->content ?? ''), 0, 100) . '...',
                'status' => $article->status,
                'category' => $article->category->name ?? 'Tidak berkategori',
                'published_at' => $article->published_at ? $article->published_at->format('d M Y') : null,
                'url' => route('admin.articles.show', $article->id),
                'type' => 'article',
                'icon' => 'newspaper'
            ];
        })->toArray();
    }

    /**
     * Search All Galleries (including images)
     */
    private function searchAllGalleries($query, $limit)
    {
        $galleries = Gallery::with('primaryImage')
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('meta_title', 'LIKE', "%{$query}%")
                    ->orWhere('meta_description', 'LIKE', "%{$query}%")
                    ->orWhere('slug', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('images', function ($q) use ($query) {
                $q->where('alt_text', 'LIKE', "%{$query}%")
                    ->orWhere('caption', 'LIKE', "%{$query}%")
                    ->orWhere('title_attr', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $galleries->map(function ($gallery) {
            return [
                'id' => $gallery->id,
                'title' => $gallery->title,
                'description' => $gallery->description ?: 'Galeri foto',
                'status' => $gallery->status,
                'images_count' => $gallery->images()->count(),
                'image' => $gallery->primaryImage ? asset($gallery->primaryImage->image_url) : null,
                'published_at' => $gallery->published_at ? $gallery->published_at->format('d M Y') : null,
                'url' => route('admin.gallery.show', $gallery->id),
                'type' => 'gallery',
                'icon' => 'images'
            ];
        })->toArray();
    }

    /**
     * Search All Jobs
     */
    private function searchAllJobs($query, $limit)
    {
        $jobs = Job::where(function ($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
                ->orWhere('summary', 'LIKE', "%{$query}%")
                ->orWhere('description_html', 'LIKE', "%{$query}%")
                ->orWhere('location', 'LIKE', "%{$query}%")
                ->orWhere('department', 'LIKE', "%{$query}%")
                ->orWhere('employment_type', 'LIKE', "%{$query}%")
                ->orWhere('remote_policy', 'LIKE', "%{$query}%")
                ->orWhere('slug', 'LIKE', "%{$query}%");
        })
            ->limit($limit)
            ->get();

        return $jobs->map(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'description' => $job->summary ?: ($job->location . ' - ' . $job->department),
                'location' => $job->location,
                'department' => $job->department,
                'employment_type' => $job->employment_type,
                'status' => $job->status,
                'salary_display' => $job->salary_display,
                'is_open' => $job->is_open,
                'url' => route('admin.jobs.show', $job->id),
                'type' => 'job',
                'icon' => 'briefcase'
            ];
        })->toArray();
    }

    /**
     * Search All Catalogs (items, files, images)
     */
    private function searchAllCatalogs($query, $limit)
    {
        $catalogs = CatalogItem::with(['images', 'files'])
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('meta_title', 'LIKE', "%{$query}%")
                    ->orWhere('meta_description', 'LIKE', "%{$query}%")
                    ->orWhere('slug', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('files', function ($q) use ($query) {
                $q->where('slug', 'LIKE', "%{$query}%")
                    ->orWhere('meta_title', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('images', function ($q) use ($query) {
                $q->where('alt_text', 'LIKE', "%{$query}%")
                    ->orWhere('slug', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $catalogs->map(function ($catalog) {
            return [
                'id' => $catalog->id,
                'title' => $catalog->name,
                'description' => $catalog->description ?: 'Item katalog',
                'files_count' => $catalog->files()->count(),
                'images_count' => $catalog->images()->count(),
                'url' => route('admin.catalog.show', $catalog->id),
                'type' => 'catalog',
                'icon' => 'folder'
            ];
        })->toArray();
    }

    /**
     * Search Product Images
     */
    private function searchProductImages($query, $limit)
    {
        $productImages = ProductImage::with('product')
            ->where(function ($q) use ($query) {
                $q->where('alt_text', 'LIKE', "%{$query}%")
                    ->orWhere('image_path', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('product', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $productImages->map(function ($image) {
            return [
                'id' => $image->id,
                'title' => $image->alt_text ?: 'Gambar Produk',
                'description' => $image->product->name ?? 'Produk tidak ditemukan',
                'image_path' => $image->image_path,
                'image_url' => asset($image->image_path),
                'is_primary' => $image->is_primary,
                'product_id' => $image->product_id,
                'url' => $image->product ? route('admin.products.show', $image->product_id) : '#',
                'type' => 'product_image',
                'icon' => 'image'
            ];
        })->toArray();
    }

    /**
     * Search Notifications
     */
    private function searchNotifications($query, $limit)
    {
        $notifications = DB::table('admin_notifications')
            ->join('users', 'admin_notifications.user_id', '=', 'users.id')
            ->where(function ($q) use ($query) {
                $q->where('admin_notifications.title', 'LIKE', "%{$query}%")
                    ->orWhere('admin_notifications.message', 'LIKE', "%{$query}%")
                    ->orWhere('admin_notifications.type', 'LIKE', "%{$query}%")
                    ->orWhere('users.name', 'LIKE', "%{$query}%");
            })
            ->select(
                'admin_notifications.*',
                'users.name as user_name',
                'users.email as user_email'
            )
            ->limit($limit)
            ->get();

        return $notifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'title' => $notification->title,
                'description' => $notification->message,
                'type' => $notification->type,
                'priority' => $notification->priority,
                'user_name' => $notification->user_name,
                'is_read' => !is_null($notification->read_at),
                'created_at' => \Carbon\Carbon::parse($notification->created_at)->format('d M Y H:i'),
                'url' => $notification->action_url ?: '#',
                'type' => 'notification',
                'icon' => 'bell'
            ];
        })->toArray();
    }

    /**
     * Search System Logs
     */
    private function searchSystemLogs($query, $limit)
    {
        $systemLogs = DB::table('system_logs')
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('type', 'LIKE', "%{$query}%")
                    ->orWhere('status', 'LIKE', "%{$query}%")
                    ->orWhere('user_id', 'LIKE', "%{$query}%")
                    ->orWhere('ip_address', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $systemLogs->map(function ($log) {
            return [
                'id' => $log->id,
                'title' => $log->title,
                'description' => $log->description ?: 'Log sistem',
                'type' => $log->type,
                'status' => $log->status,
                'user_id' => $log->user_id,
                'ip_address' => $log->ip_address,
                'created_at' => \Carbon\Carbon::parse($log->created_at)->format('d M Y H:i'),
                'url' => '#',
                'type' => 'system_log',
                'icon' => 'history'
            ];
        })->toArray();
    }

    /**
     * Search Manage Subcategories - Kelola Sub Kategori produk
     */
    private function searchManageSubcategories($query, $limit)
    {
        $subcategories = Subcategory::with(['category', 'products'])
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('meta_description', 'LIKE', "%{$query}%")
                    ->orWhereHas('category', function ($cat) use ($query) {
                        $cat->where('name', 'LIKE', "%{$query}%");
                    });
            })
            ->limit($limit)
            ->get();

        return $subcategories->map(function ($subcategory) {
            return [
                'id' => $subcategory->id,
                'title' => $subcategory->name,
                'description' => 'Kategori: ' . $subcategory->category->name . ' - ' . ($subcategory->meta_description ?: 'Sub kategori produk'),
                'category_name' => $subcategory->category->name,
                'products_count' => $subcategory->products()->count(),
                'status' => 'Aktif',
                'url' => route('admin.subcategories.show', $subcategory->id),
                'edit_url' => route('admin.subcategories.edit', $subcategory->id),
                'type' => 'manage_subcategory',
                'icon' => 'tags'
            ];
        })->toArray();
    }

    /**
     * Search Manage Catalog - Kelola Katalog  
     */
    private function searchManageCatalog($query, $limit)
    {
        $catalogs = CatalogItem::with(['images', 'files'])
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('meta_title', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $catalogs->map(function ($catalog) {
            return [
                'id' => $catalog->id,
                'title' => $catalog->name,
                'description' => $catalog->description ?: 'Item katalog produk',
                'images_count' => $catalog->images()->count(),
                'files_count' => $catalog->files()->count(),
                'status' => 'Aktif',
                'url' => route('admin.catalog.show', $catalog->id),
                'edit_url' => route('admin.catalog.edit', $catalog->id),
                'type' => 'manage_catalog',
                'icon' => 'folder-open'
            ];
        })->toArray();
    }

    /**
     * Search Manage Article Categories - Kategori Artikel
     */
    private function searchManageArticleCategories($query, $limit)
    {
        $articleCategories = ArticleCategory::with('articles')
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('slug', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $articleCategories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->name,
                'description' => 'Kategori artikel',
                'slug' => $category->slug,
                'articles_count' => $category->articles()->count(),
                'status' => 'Aktif',
                'url' => route('admin.article-categories.show', $category->id),
                'edit_url' => route('admin.article-categories.edit', $category->id),
                'type' => 'manage_article_category',
                'icon' => 'newspaper'
            ];
        })->toArray();
    }

    /**
     * Search Gallery Projects - gallery proyek
     */
    private function searchGalleryProjects($query, $limit)
    {
        $galleries = Gallery::with(['images'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('slug', 'LIKE', "%{$query}%")
                    ->orWhere('meta_title', 'LIKE', "%{$query}%");
            })
            ->limit($limit)
            ->get();

        return $galleries->map(function ($gallery) {
            return [
                'id' => $gallery->id,
                'title' => $gallery->title,
                'description' => $gallery->description ?: 'Galeri proyek',
                'slug' => $gallery->slug,
                'images_count' => $gallery->images()->count(),
                'date' => $gallery->created_at ? $gallery->created_at->format('d M Y') : '',
                'status' => $gallery->status,
                'url' => route('admin.gallery.show', $gallery->id),
                'edit_url' => route('admin.gallery.edit', $gallery->id),
                'type' => 'gallery_project',
                'icon' => 'camera'
            ];
        })->toArray();
    }

    /**
     * Search Job Vacancies - lowongan kerja
     */
    private function searchJobVacancies($query, $limit)
    {
        $jobs = Job::where(function ($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
                ->orWhere('summary', 'LIKE', "%{$query}%")
                ->orWhere('description_html', 'LIKE', "%{$query}%")
                ->orWhere('location', 'LIKE', "%{$query}%")
                ->orWhere('department', 'LIKE', "%{$query}%")
                ->orWhere('employment_type', 'LIKE', "%{$query}%");
        })
            ->limit($limit)
            ->get();

        return $jobs->map(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'description' => $job->location . ' - ' . $job->department,
                'department' => $job->department,
                'location' => $job->location,
                'employment_type' => $job->employment_type,
                'salary_range' => $job->salary_display ?: 'Negotiable',
                'closing_date' => $job->close_at ? \Carbon\Carbon::parse($job->close_at)->format('d M Y') : 'Terbuka',
                'status' => $job->status,
                'applications_count' => 0,
                'url' => route('admin.jobs.show', $job->id),
                'edit_url' => route('admin.jobs.edit', $job->id),
                'type' => 'job_vacancy',
                'icon' => 'briefcase'
            ];
        })->toArray();
    }
}
