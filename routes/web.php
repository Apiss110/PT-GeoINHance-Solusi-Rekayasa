<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SliderController; // Import Controller Admin Slider
use App\Http\Controllers\Admin\ProjectController; // Import Controller Admin Project
use App\Http\Controllers\Admin\AdminController; // Import Controller Admin CRUD (Superadmin)
use App\Http\Middleware\IsSuperadmin; // Import Middleware IsSuperadmin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes (Sisi User / Public)
|--------------------------------------------------------------------------
*/
// Rute untuk mengarahkan pengguna ke halaman login provider (Google, Facebook, dll)
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('social.redirect');

// Rute untuk menerima balasan data dari provider setelah pengguna berhasil login
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('social.callback');

// PERBAIKAN DI SINI: Mengambil data sliders dan blogs sekaligus
Route::get('/', function () {
    // 1. Ambil semua foto banner dari database
    $sliders = \App\Models\HeroSlider::all();
    
    // 2. Ambil 3 artikel blog terbaru untuk section Latest Blog & News
    $blogs = \App\Models\Blog::latest()->take(3)->get();
    
    // Kirim kedua data ke file welcome.blade.php
    return view('welcome', compact('sliders', 'blogs')); 
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

Route::get('/lang/{locale}', function ($locale) {
    // Validasi bahasa yang diizinkan agar aman
    if (in_array($locale, ['id', 'en'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back(); // Kembali ke halaman terakhir yang dibuka user
})->name('lang.switch');

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

Route::view(
    '/resources/news-events',
    'resources.news_events'
)->name('resources.news-events');

// Rute untuk halaman pendaftaran training
Route::get('/training/pendaftaran', function () {
    return view('training.pendaftaran');
})->name('training.pendaftaran');

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

    // 4. Fitur CRUD Blog & News (Bisa diakses oleh Admin biasa & Superadmin)
    Route::resource('blog', BlogController::class);

    // 3. Fitur Kelola Akun Admin (HANYA BISA DIAKSES OLEH SUPERADMIN)
    Route::middleware([IsSuperadmin::class])->group(function () {
        Route::get('/kelola-admin', [AdminController::class, 'index'])->name('kelola-admin.index');
        Route::get('/kelola-admin/create', [AdminController::class, 'create'])->name('kelola-admin.create');
        Route::post('/kelola-admin', [AdminController::class, 'store'])->name('kelola-admin.store');
        Route::get('/kelola-admin/{id}/edit', [AdminController::class, 'edit'])->name('kelola-admin.edit');
        Route::put('/kelola-admin/{id}', [AdminController::class, 'update'])->name('kelola-admin.update');
        Route::delete('/kelola-admin/{id}', [AdminController::class, 'destroy'])->name('kelola-admin.destroy');
    });

});

/*
|--------------------------------------------------------------------------
| Laravel Breeze / Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';