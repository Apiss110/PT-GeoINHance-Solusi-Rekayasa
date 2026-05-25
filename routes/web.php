<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SliderController; // Import Controller Admin
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Sisi User / Public)
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| Authenticated Routes (Dashboard & Profile)
|--------------------------------------------------------------------------
*/

// PERBAIKAN DI SINI: Mengarahkan ke pages.admin.dashboard agar tidak error
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
| Kelompok route ini digunakan oleh admin untuk mengelola foto/banner.
| URL otomatis menjadi /admin/slider
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Fitur Manajemen Foto / Slider Banner
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');     
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');    
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); 

});

/*
|--------------------------------------------------------------------------
| Laravel Breeze / Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';