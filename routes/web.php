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
Route::get('/products/category/{slug}', [PageController::class, 'productsByCategory'])->name('products.category');
Route::get('/product/{slug}', [PageController::class, 'productDetail'])->name('product.detail');
Route::get('/catalog-page', [PageController::class, 'catalog'])->name('catalog1-page');
Route::get('/catalog-page/{slug}', [PageController::class, 'catalogDetail'])->name('catalog1-page.detail');
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
Route::get('/search', [PageController::class, 'search'])->name('search');

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
