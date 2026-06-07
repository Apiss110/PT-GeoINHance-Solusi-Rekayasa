<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SliderController; // Import Controller Admin Slider
use App\Http\Controllers\Admin\ProjectController; // Import Controller Admin Project
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes (Sisi User / Public)
|--------------------------------------------------------------------------
*/
// Rute untuk mengarahkan pengguna ke halaman login provider (Google, Facebook, dll)
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('social.redirect');

// Rute untuk menerima balasan data dari provider setelah pengguna berhasil login
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('social.callback');

Route::get('/', function () {
    // Ambil semua foto banner dari database
    $sliders = \App\Models\HeroSlider::all();
    
    // Kirim data sliders ke file welcome.blade.php
    return view('welcome', compact('sliders')); 
})->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/karir', function () {
    return view('karir');
})->name('karir');

Route::get('/legalitas', function () {
    return view('legalitas');
})->name('legalitas');

Route::get('/privacy-policy', function () {
    return view('privacy');
});

// Rute untuk Syarat & Ketentuan
Route::get('/terms-of-service', function () {
    return view('terms');
});

Route::get('/product/plaxis-2d', function () {
    return view('products.plaxis-2d'); // 'products.' merujuk ke folder products
})->name('product.plaxis2d');

Route::get('/product/plaxis-3d', function () {
    return view('products.plaxis-3d');
})->name('product.plaxis3d');

// SEKTOR
Route::prefix('sektor')->group(function () {

    Route::view('/infrastruktur-transportasi', 
        'sektor.infrastruktur-transportasi'
    )->name('sektor.infrastruktur');

});

/*
|--------------------------------------------------------------------------
| PROYEK
|--------------------------------------------------------------------------
*/

Route::view(
    '/proyek/geotechnical-analysis',
    'proyek.geotechnical-analysis'
)->name('project.geotechnical-analysis');

/*
|--------------------------------------------------------------------------
| RESOURCES
|--------------------------------------------------------------------------
*/

Route::view(
    '/resources/articles',
    'resources.articles'
)->name('resources.articles');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Dashboard & Profile)
|--------------------------------------------------------------------------
*/

// Mengarahkan ke pages.admin.dashboard agar tidak error
Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group Route untuk Profile Manajemen
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Logout
Route::get('logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes (Manajemen Konten Website)
|--------------------------------------------------------------------------
| Kelompok route ini digunakan oleh admin untuk mengelola konten website.
| Semua route di dalam group ini otomatis menggunakan prefix /admin/
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. Fitur Manajemen Foto / Slider Banner
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');     
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');    
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); 

    // 2. Fitur Manajemen Proyek Strategis (CRUD Slider Proyek)
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

});

/*
|--------------------------------------------------------------------------
| Laravel Breeze / Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';