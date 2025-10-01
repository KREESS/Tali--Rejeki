<?php

use Illuminate\Support\Facades\Route;

// === CONTROLLERS ===
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\MyWelcomeController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EnPageController;
use Illuminate\Support\Facades\Auth;

// === MIDDLEWARE ===
use Spatie\WelcomeNotification\WelcomesNewUsers;

/*
|--------------------------------------------------------------------------
| Web Routes - Tali Rejeki
|--------------------------------------------------------------------------
| Distributor Insulasi Industri
| Routes untuk landing page, authentication, dan admin area
|--------------------------------------------------------------------------
*/

// ==================== LANDING PAGE ====================
Route::get('/', [PageController::class, 'index'])->name('home');

// ==================== PUBLIC PAGES ====================
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/{category:slug}', [PageController::class, 'productsByCategory'])->name('products.category');
Route::get('/products/{category:slug}/{subcategory:slug}', [PageController::class, 'subcategory'])->name('products.subcategory');
Route::get('/products/{category:slug}/{subcategory:slug}/{product:slug}', [PageController::class, 'show'])->name('product.detail');

Route::get('/catalog-page', [PageController::class, 'catalog'])->name('catalog1-page');
Route::get('/catalog-page/{slug}', [PageController::class, 'catalogDetail'])->name('catalog1-page.detail');
Route::get('/catalog/{id}/download', [PageController::class, 'catalogDownload'])->name('catalog.download');
Route::get('/catalog/{id}/preview', [PageController::class, 'catalogPreview'])->name('catalog.preview');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{slug}', [PageController::class, 'galleryDetail'])->name('gallery.detail');
Route::get('/career', [PageController::class, 'career'])->name('career');
Route::get('/career/{slug}', [PageController::class, 'jobDetail'])->name('job.detail');
Route::post('/career/{slug}/apply', [PageController::class, 'jobApply'])->name('job.apply');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/category/{slug}', [PageController::class, 'blogByCategory'])->name('blog.category');
Route::get('/search-ajax', [PageController::class, 'searchAjax'])->name('search.ajax');




// ==================== LANDING PAGE EN ====================
Route::get('/en', [EnPageController::class, 'index'])->name('en.home');

// ==================== PUBLIC PAGES EN ====================
Route::get('/en/about', [EnPageController::class, 'about'])->name('en.about');
Route::get('/en/products', [EnPageController::class, 'products'])->name('en.products');
Route::get('/en/products/{category:slug}', [EnPageController::class, 'productsByCategory'])->name('en.products.category');
Route::get('/en/products/{category:slug}/{subcategory:slug}', [EnPageController::class, 'subcategory'])->name('en.products.subcategory');
Route::get('/en/products/{category:slug}/{subcategory:slug}/{product:slug}', [EnPageController::class, 'show'])->name('en.product.detail');

Route::get('/en/catalog-page', [EnPageController::class, 'catalog'])->name('en.catalog.page');
Route::get('/en/catalog-page/{slug}', [EnPageController::class, 'catalogDetail'])->name('en.catalog.detail');
Route::get('/en/catalog/{id}/download', [EnPageController::class, 'catalogDownload'])->name('en.catalog.download');
Route::get('/en/catalog/{id}/preview', [EnPageController::class, 'catalogPreview'])->name('en.catalog.preview');

Route::get('/en/gallery', [EnPageController::class, 'gallery'])->name('en.gallery');
Route::get('/en/gallery/{slug}', [EnPageController::class, 'galleryDetail'])->name('en.gallery.detail');

Route::get('/en/career', [EnPageController::class, 'career'])->name('en.career');
Route::get('/en/career/{slug}', [EnPageController::class, 'jobDetail'])->name('en.job.detail');
Route::post('/en/career/{slug}/apply', [EnPageController::class, 'jobApply'])->name('en.job.apply');

Route::get('/en/contact', [EnPageController::class, 'contact'])->name('en.contact');
Route::post('/en/contact', [EnPageController::class, 'contactSubmit'])->name('en.contact.submit');

Route::get('/en/blog', [EnPageController::class, 'blog'])->name('en.blog');
Route::get('/en/blog/{slug}', [EnPageController::class, 'blogDetail'])->name('en.blog.detail');
Route::get('/en/blog/category/{slug}', [EnPageController::class, 'blogByCategory'])->name('en.blog.category');

Route::get('/en/search', [EnPageController::class, 'search'])->name('en.search');

// ==================== AUTHENTICATION ====================

/*
|--------------------------------------------------------------------------
| Guest Routes (Belum Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit');

    // Password Reset Routes (Spatie Integration)
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Sudah Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});

/*
|--------------------------------------------------------------------------
| Spatie Welcome Notification Routes
|--------------------------------------------------------------------------
| Routes untuk form set password dari email notification
*/
Route::middleware(['web', WelcomesNewUsers::class])->group(function () {
    Route::get('welcome/{user}', [MyWelcomeController::class, 'showWelcomeForm'])
        ->name('welcome');
    Route::post('welcome/{user}', [MyWelcomeController::class, 'savePassword'])
        ->name('welcome.store');
});

// ==================== LEGAL PAGES ====================
Route::prefix('legal')->group(function () {
    Route::view('/terms', 'legal.terms')->name('terms');
    Route::view('/privacy', 'legal.privacy')->name('privacy');
});

// ==================== ADMIN AREA ====================

/*
|--------------------------------------------------------------------------
| Admin Routes (Auth + Role Admin)
|--------------------------------------------------------------------------
| Dashboard dan management area untuk administrator
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            // Ambil data real dari database
            $totalUsers = \App\Models\User::count();
            $totalProducts = \App\Models\Product::count();
            $totalArticles = \App\Models\Article::count();
            $totalJobs = \App\Models\Job::count();
            $totalCategories = \App\Models\Category::count();
            $totalGalleries = \App\Models\Gallery::count();
            $totalCatalogs = \App\Models\CatalogItem::count();

            // Data untuk stats cards
            $stats = [
                'users' => $totalUsers,
                'products' => $totalProducts,
                'articles' => $totalArticles,
                'jobs' => $totalJobs,
                'categories' => $totalCategories,
                'galleries' => $totalGalleries,
                'catalogs' => $totalCatalogs
            ];

            return view('admin.dashboard', [
                'title' => 'Dashboard Admin - Tali Rejeki',
                'subtitle' => 'Panel administrasi untuk distributor insulasi industri',
                'user' => Auth::user(),
                'stats' => $stats
            ]);
        })->name('dashboard');

        // Product Management Routes
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubcategoryController::class);
        Route::resource('products', ProductController::class);

        // Product Image Management
        Route::delete('/products/images/{image}', [ProductController::class, 'deleteImage'])
            ->name('products.images.delete');
        Route::post('/products/images/{image}/primary', [ProductController::class, 'setPrimaryImage'])
            ->name('products.images.primary');

        // Search Routes
        Route::prefix('search')->name('search.')->group(function () {
            Route::get('/global', [SearchController::class, 'globalSearch'])
                ->name('global');
            Route::get('/suggestions', [SearchController::class, 'searchSuggestions'])
                ->name('suggestions');
            Route::get('/advanced', [SearchController::class, 'advancedSearch'])
                ->name('advanced');
        });

        // Notification Routes
        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::get('/', [NotificationController::class, 'index'])
                ->name('index');
            Route::get('/unread-count', [NotificationController::class, 'getUnreadCount'])
                ->name('unread-count');
            Route::get('/recent-activity', [NotificationController::class, 'getRecentActivity'])
                ->name('recent-activity');
            Route::post('/', [NotificationController::class, 'create'])
                ->name('create');
            Route::patch('/{id}/read', [NotificationController::class, 'markAsRead'])
                ->name('mark-read');
            Route::patch('/mark-all-read', [NotificationController::class, 'markAllAsRead'])
                ->name('mark-all-read');
            Route::delete('/{id}', [NotificationController::class, 'delete'])
                ->name('delete');
        });

        // Catalog Management Routes
        Route::resource('catalog', CatalogController::class);

        // Catalog Image Management
        Route::delete('/catalog/images/{image}', [CatalogController::class, 'deleteImage'])
            ->name('catalog.images.delete');
        Route::post('/catalog/images/{image}/primary', [CatalogController::class, 'setPrimaryImage'])
            ->name('catalog.images.primary');

        // Catalog File Management
        Route::delete('/catalog/files/{file}', [CatalogController::class, 'deleteFile'])
            ->name('catalog.files.delete');

        // Article Management Routes
        Route::resource('article-categories', ArticleCategoryController::class);
        Route::post('article-categories/{articleCategory}/bulk-actions', [ArticleCategoryController::class, 'bulkActions'])
            ->name('article-categories.bulk-actions');
        Route::resource('articles', ArticleController::class);

        // Gallery Management Routes
        Route::resource('gallery', GalleryController::class);

        // Gallery Test Route
        Route::get('/gallery/{gallery}/edit-test', function ($gallery) {
            $gallery = \App\Models\Gallery::findOrFail($gallery);
            $gallery->load(['images' => function ($query) {
                $query->orderBy('sort_order');
            }]);

            return view('admin.gallery.edit_simple_test', [
                'title' => 'Edit Galeri Test: ' . $gallery->title,
                'gallery' => $gallery
            ]);
        })->name('gallery.edit.test');

        // Gallery Status Toggle
        Route::post('/gallery/{gallery}/toggle-status', [GalleryController::class, 'toggleStatus'])
            ->name('gallery.toggle-status');

        // Gallery Image Management
        Route::delete('/gallery/images/{image}', [GalleryController::class, 'deleteImage'])
            ->name('gallery.images.delete');
        Route::post('/gallery/images/{image}/primary', [GalleryController::class, 'setPrimaryImage'])
            ->name('gallery.images.primary');

        // Job Management Routes
        Route::resource('jobs', JobController::class);
        Route::post('/jobs/{job}/toggle-status', [JobController::class, 'toggleStatus'])
            ->name('jobs.toggle-status');
        Route::post('/jobs/bulk-actions', [JobController::class, 'bulkActions'])
            ->name('jobs.bulk-actions');

        // Reports
        Route::get('/reports', function () {
            return view('admin.reports', [
                'title' => 'Laporan',
                'message' => 'Area laporan khusus administrator.'
            ]);
        })->name('reports');
    });
