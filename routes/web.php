<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Tambahan untuk reset password via email (Spatie)
use Spatie\WelcomeNotification\WelcomesNewUsers;
use App\Http\Controllers\Auth\MyWelcomeController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

// LANDING PAGE
Route::view('/', 'welcome')->name('home');

// =====================
// AUTH (Guest only)
// =====================
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    // ===== Forgot Password (mengirim welcome link Spatie) =====
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
});

// Logout (hanya user yg sudah login)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// =====================
// SPATIE WELCOME ROUTES (form set password dari email)
// =====================
Route::middleware(['web', WelcomesNewUsers::class])->group(function () {
    Route::get('welcome/{user}', [MyWelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('welcome/{user}', [MyWelcomeController::class, 'savePassword']);
});

// ===== LEGAL PAGES =====
Route::view('/terms', 'legal.terms')->name('terms');
Route::view('/privacy', 'legal.privacy')->name('privacy');
// ===== BATAS ======

// =====================
// ADMIN AREA (Auth + Role:admin)
// =====================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // cukup "/dashboard" karena sudah prefix('admin')
    Route::get('/dashboard', function () {
        return 'Halo Admin, ini dashboard khusus role admin.';
    })->name('dashboard');

    Route::get('/', function () {
        return 'Kelola User (hanya admin yang bisa lihat ini).';
    })->name('users');

    Route::get('/reports', function () {
        return 'Laporan hanya untuk admin.';
    })->name('reports');
});
