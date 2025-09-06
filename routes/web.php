<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\PemesananController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [ProductController::class, 'index'])->name('menu');
Route::get('/pemasaran', [ContactController::class, 'showForm'])->name('pemasaran.form');
Route::post('/kontak', [ContactController::class, 'submitForm'])->name('pemasaran.submit');
Route::get('/team', [TeamController::class, 'index'])->name('team');

Route::middleware('auth')->group(function () {
    // User Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::resource('/admin/pemesanan', PemesananController::class)
            ->only(['index', 'edit', 'update', 'destroy'])
            ->names('admin.pemesanan');
    });
});

require __DIR__.'/auth.php';
