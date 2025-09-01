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
Route::get('/', function () {
    return view('welcome');
})->name('home');

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
            return view('admin.dashboard', [
                'title' => 'Dashboard Admin - Tali Rejeki',
                'subtitle' => 'Panel administrasi untuk distributor insulasi industri',
                'user' => Auth::user(),
                'stats' => [
                    'users' => 1234,
                    'orders' => 567,
                    'products' => 89,
                    'revenue' => 2100000
                ]
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

        // Reports
        Route::get('/reports', function () {
            return view('admin.reports', [
                'title' => 'Laporan',
                'message' => 'Area laporan khusus administrator.'
            ]);
        })->name('reports');
    });
