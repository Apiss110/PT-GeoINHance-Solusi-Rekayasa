<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SliderController; 
use App\Http\Controllers\Admin\ProjectController; 
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Middleware\IsSuperadmin; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\BlogController; 
use App\Http\Controllers\ProyekController; 

/*
|--------------------------------------------------------------------------
| Web Routes (Sisi User / Public)
|--------------------------------------------------------------------------
*/

// Rute OAuth Socialite (Google, Facebook, dll)
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('social.callback');

// Halaman Utama / Landing Page (Mengambil Banner & 3 Berita Terbaru)
Route::get('/', function () {
    $sliders = \App\Models\HeroSlider::all();
    $blogs = \App\Models\Blog::latest()->take(3)->get();
    return view('welcome', compact('sliders', 'blogs')); 
})->name('home');

// Halaman Statis Perusahaan
Route::get('/profil', function () { return view('profil'); })->name('profil');
Route::get('/kontak', function () { return view('kontak'); })->name('kontak');
Route::get('/karir', function () { return view('karir'); })->name('karir');
Route::get('/legalitas', function () { return view('legalitas'); })->name('legalitas');
Route::get('/privacy-policy', function () { return view('privacy'); })->name('privacy.policy');
Route::get('/terms-of-service', function () { return view('terms'); })->name('terms.service');

/*
|--------------------------------------------------------------------------
| PRODUCTS
|--------------------------------------------------------------------------
*/
Route::get('/product/plaxis-2d', function () { return view('products.plaxis-2d'); })->name('product.plaxis2d');
Route::get('/product/plaxis-3d', function () { return view('products.plaxis-3d'); })->name('product.plaxis3d');
Route::get('/product/staad-pro', function () { return view('products.staad-pro'); })->name('product.staadpro');
Route::get('/product/geostudio-flow', function () { return view('products.geostudio-flow'); })->name('product.geostudio');

/*
|--------------------------------------------------------------------------
| SEKTOR (PERBAIKAN SYNTAX ERROR)
|--------------------------------------------------------------------------
*/
Route::prefix('sektor')->group(function () {
    Route::view('/infrastruktur-transportasi', 'sektor.infrastruktur-transportasi')->name('sektor.infrastruktur');
    Route::view('/semua-sektor', 'sektor.semua-sektor')->name('sektor.semua-sektor');
});

/*
|--------------------------------------------------------------------------
| PROYEK (PUBLIC PORTFOLIO)
|--------------------------------------------------------------------------
*/
Route::get('/proyek/semua-proyek', [ProyekController::class, 'semuaProyek'])->name('proyek.semua');
Route::view('/proyek/geotechnical-analysis', 'proyek.geotechnical-analysis')->name('project.geotechnical-analysis');
Route::get('/proyek/{id}', [ProyekController::class, 'publicShow'])->name('proyek.show');

/*
|--------------------------------------------------------------------------
| RESOURCES (PUBLIC BLOG & NEWS)
|--------------------------------------------------------------------------
*/
Route::get('/resources/articles', [ProyekController::class, 'articles'])->name('resources.articles');
Route::get('/resources/news-events', [ProyekController::class, 'newsEvents'])->name('resources.news-events');
Route::get('/blog/{slug}', [ProyekController::class, 'showBlog'])->name('blog.show');

// Training
Route::get('/training/pendaftaran', function () { return view('training.pendaftaran'); })->name('training.pendaftaran');

// Multi-language Switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Dashboard & Profile Managements)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes (Manajemen Konten Back-End)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. Kelola Hero Slider Banner
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');     
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');    
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); 

    // 2. Kelola Proyek Strategis
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // 3. Kelola Blog & News Admin (CRUD Resource)
    Route::resource('blog', BlogController::class);

    // 4. Kelola Akun Admin (Khusus Superadmin)
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