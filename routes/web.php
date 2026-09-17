<?php

use App\Http\Controllers\Admin\AdminAchievementController;
use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicAchievementController;
use App\Http\Controllers\PublicAnnouncementController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\PublicNewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::get('/', [PublicAnnouncementController::class, 'index'])->name('index');
    Route::get('/{announcement:slug}', [PublicAnnouncementController::class, 'show'])->name('show');
});

Route::prefix('event')->name('event.')->group(function () {
    Route::get('/', [PublicEventController::class, 'index'])->name('index');
    Route::get('/{event:slug}', [PublicEventController::class, 'show'])->name('show');
});

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [PublicNewsController::class, 'index'])->name('index');
    Route::get('/{news:slug}', [PublicNewsController::class, 'show'])->name('show');
});

Route::get('/prestasi', [PublicAchievementController::class, 'index'])->name('prestasi.index');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('pengumuman', AdminAnnouncementController::class);
    Route::resource('event', AdminEventController::class);
    Route::resource('berita', AdminNewsController::class);
    Route::resource('prestasi', AdminAchievementController::class);
    Route::resource('kategori', AdminCategoryController::class)->except(['show']);
    Route::resource('users', AdminUserController::class)->except(['show']);
});
