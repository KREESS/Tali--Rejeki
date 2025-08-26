<?php

use Illuminate\Support\Facades\Route;

// === CONTROLLERS ===
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\MyWelcomeController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

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
                'title' => 'Dashboard Admin',
                'message' => 'Halo Admin, selamat datang di dashboard Tali Rejeki!'
            ]);
        })->name('dashboard');

        // User Management
        Route::get('/users', function () {
            return view('admin.users', [
                'title' => 'Kelola User',
                'message' => 'Management area untuk mengelola user sistem.'
            ]);
        })->name('users');

        // Reports
        Route::get('/reports', function () {
            return view('admin.reports', [
                'title' => 'Laporan',
                'message' => 'Area laporan khusus administrator.'
            ]);
        })->name('reports');
    });
