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
use App\Http\Controllers\SektorController;
use App\Livewire\BranchManager;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\VideoController; // Controller Video Publik
use App\Http\Controllers\Admin\VideoController as AdminVideoController; // Controller Video Admin
use App\Http\Controllers\Admin\CaseStudyController;

/*
|--------------------------------------------------------------------------
| Web Routes (Sisi User / Public)
|--------------------------------------------------------------------------
*/

// Rute OAuth Socialite (Google, Facebook, dll)
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('social.callback');

// PERBAIKAN EMERGENSI: Menggunakan try-catch agar halaman depan TIDAK AKAN PERNAH Error 500 saat presentasi meskipun database kosong
Route::get('/', function () {
    try {
        $sliders = \App\Models\HeroSlider::all() ?? collect();
        $blogs = \App\Models\Blog::latest()->take(3)->get() ?? collect();
        // Ambil data kantor cabang untuk peta Leaflet
        $branchesData = \App\Models\Branch::all() ?? collect(); 
    } catch (\Exception $e) {
        $sliders = collect();
        $blogs = collect();
        // Fallback jika terjadi error agar halaman landing page tidak crash
        $branchesData = collect(); 
    }
    
    return view('welcome', compact('sliders', 'blogs', 'branchesData')); 
})->name('home');

// Halaman Statis Perusahaan
Route::get('/profil', function () { return view('profil'); })->name('profil');
Route::get('/kontak', function () { return view('kontak'); })->name('kontak');
Route::get('/karir', function () { return view('karir'); })->name('karir');
Route::get('/legalitas', function () { return view('legalitas'); })->name('legalitas');
Route::get('/privacy-policy', function () { return view('privacy'); })->name('privacy.policy');
Route::get('/terms-of-service', function () { return view('terms'); })->name('terms.service');

Route::get('email/verify', function () {
    return redirect()->route('verification.notice');
})->name('fortify.verification.notice'); // Ubah namanya agar tidak bentrok

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
| SIGNALS / SEKTOR (UPDATED & SYNCED TO ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('sektor')->group(function () {
    Route::get('/semua-sektor', [SektorController::class, 'semuaSektor'])->name('sektor.semua-sektor');
    
    // Alihkan rute statis view() ke fungsi dinamis showPublicBySector di ProjectController
    Route::get('/mitigasi-geobencana', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'mitigasi-geobencana')
        ->name('sektor.mitigasi-geobencana');

    Route::get('/infrastruktur-transportasi', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'infrastruktur-transportasi')
        ->name('sektor.infrastruktur-transportasi');

    Route::get('/rekayasa-bawah-tanah', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'rekayasa-bawah-tanah')
        ->name('sektor.rekayasa-bawah-tanah');

    Route::get('/pembangkit-energi', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'pembangkit-energi')
        ->name('sektor.pembangkit-energi');

    Route::get('/infrastruktur-air', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'infrastruktur-air')
        ->name('sektor.infrastruktur-air');

    Route::get('/minyak-bumi-gas', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'minyak-bumi-gas')
        ->name('sektor.minyak-bumi-gas');

    Route::get('/kawasan-industri', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'kawasan-industri')
        ->name('sektor.kawasan-industri');

    Route::get('/infrastruktur-jalan', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'infrastruktur-jalan')
        ->name('sektor.infrastruktur-jalan');

    Route::get('/jalur-kereta-api', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'jalur-kereta-api')
        ->name('sektor.jalur-kereta-api');

    Route::get('/kawasan-bandar-udara', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'kawasan-bandar-udara')
        ->name('sektor.kawasan-bandar-udara');

    Route::get('/fasilitas-pendidikan', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'fasilitas-pendidikan')
        ->name('sektor.fasilitas-pendidikan');

    Route::get('/kawasan-pelabuhan', [ProjectController::class, 'showPublicBySector'])
        ->defaults('slug', 'kawasan-pelabuhan')
        ->name('sektor.kawasan-pelabuhan');

    // Rute penangkap cadangan dinamis global untuk sektor baru di masa depan
    Route::get('/{slug}', [ProjectController::class, 'showPublicBySector'])->name('sektor.dynamic.show');
});

/*
|--------------------------------------------------------------------------
| PROYEK (PUBLIC PORTFOLIO)
|--------------------------------------------------------------------------
*/
Route::get('/proyek/detailed-engineering-design', [ProjectController::class, 'showPublicByCategory'])
    ->defaults('slug', 'detailed-engineering-design')
    ->name('proyek.detailed-engineering-design');
Route::get('/proyek/review-design', [ProjectController::class, 'showPublicByCategory'])
    ->defaults('slug', 'review-design')
    ->name('proyek.review-design');
Route::get('/proyek/structural-analysis', [ProjectController::class, 'showPublicByCategory'])
    ->defaults('slug', 'structural-analysis')
    ->name('proyek.structural-analysis');
Route::get('/proyek/3d-fem-analysis', [ProjectController::class, 'showPublicByCategory'])
    ->defaults('slug', '3d-fem') 
    ->name('proyek.3d-fem-analysis');
Route::get('/proyek/numerical-analysis-plaxis-3d', [ProjectController::class, 'showPublicByCategory'])
    ->defaults('slug', 'numerical-analysis') 
    ->name('proyek.numerical-analysis');
Route::get('/proyek/numerical-modeling-analysis', [ProjectController::class, 'showPublicByCategory'])
    ->defaults('slug', 'numerical-modeling')
    ->name('proyek.numerical-modeling');
Route::get('/proyek/slope-stability-analysis', [ProjectController::class, 'showPublicByCategory'])
    ->defaults('slug', 'slope-stability')
    ->name('proyek.slope-stability');
Route::get('/proyek/semua-proyek', [ProyekController::class, 'semuaProyek'])->name('proyek.semua');

Route::get('/proyek/{id}', [ProyekController::class, 'publicShow'])->name('proyek.detail')->whereNumber('id');
Route::get('/proyek/{slug}', [ProjectController::class, 'showPublicByCategory'])->name('proyek.category');

/*
|--------------------------------------------------------------------------
| RESOURCES (PUBLIC ARTIKEL, NEWS, & EVENTS)
|--------------------------------------------------------------------------
*/
// Mengarah ke daftar kumpulan artikel publik
Route::get('/resources/articles', [ArticleController::class, 'publicIndex'])->name('blog.index');

// 🟢 PERBAIKAN DI SINI: Mengubah nama route dari 'resources.article-detail-baru' menjadi 'resources.article-detail'
Route::get('/resources/artikel/{slug}', function($slug) {
    $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
    return view('resources.article-detail', ['blog' => $article]); 
})->name('resources.article-detail');

// Mengarah ke daftar berita / news publik
Route::get('/resources/news-events', [ProyekController::class, 'newsEvents'])->name('resources.news-events');
Route::get('/blog/{slug}', [ProyekController::class, 'showBlog'])->name('blog.show');

Route::get('/resources/geo-engineering', function () { return view('resources.geo-engineering'); })->name('resources.geo-engineering');
Route::get('/resources/consulting-services', function () { return view('resources.consulting-services'); })->name('resources.consulting-services');
Route::get('/resources/perpus-dokumen', function () { return view('resources.perpus-dokumen'); })->name('resources.perpus-dokumen');
Route::get('/resources/semua-resources', [ProyekController::class, 'allResources'])->name('resources.semua');

Route::get('/resources/studi-kasus', function () {
    $caseStudies = \App\Models\CaseStudy::latest()->get();
    return view('resources.studi-kasus', compact('caseStudies'));
})->name('resources.studi-kasus');

Route::get('/resources/video', [VideoController::class, 'index'])->name('resources.video');
Route::get('/resources/video/{id}', [VideoController::class, 'show'])->name('resources.video.show')->whereNumber('id');

// Training
Route::get('/training/pendaftaran', function () { return view('training.pendaftaran'); })->name('training.pendaftaran');
Route::prefix('training')->group(function () {
    Route::view('/silabus-materi', 'training.silabus-materi')->name('training.silabus');
    Route::view('/fasilitas', 'training.fasilitas')->name('training.fasilitas');
});

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
})->name('user.logout');

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
    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update'); 
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::post('/blog/upload-image', [BlogController::class, 'uploadImage'])->name('blog.upload.image');

    // 3. Kelola Blog & News Admin serta Artikel (CRUD Resource)
    Route::resource('blog', BlogController::class);
    Route::resource('articles', ArticleController::class); 

    // Kelola Galeri Video Teknis Admin (CRUD Resource)
    Route::resource('video', AdminVideoController::class);

    // 4. Kelola Cabang Perusahaan (Branch Manager)
    Route::get('/branches', BranchManager::class)->name('branch.branch-manager');

    // Kelola Studi Kasus
    Route::get('/studi-kasus', [CaseStudyController::class, 'index'])->name('studi-kasus.index');
    Route::get('/studi-kasus/create', [CaseStudyController::class, 'create'])->name('studi-kasus.create'); 
    Route::post('/studi-kasus', [CaseStudyController::class, 'store'])->name('studi-kasus.store');
    Route::get('/studi-kasus/{id}/edit', [CaseStudyController::class, 'edit'])->name('studi-kasus.edit');
    Route::put('/studi-kasus/{id}', [CaseStudyController::class, 'update'])->name('studi-kasus.update');
    Route::delete('/studi-kasus/{id}', [CaseStudyController::class, 'destroy'])->name('studi-kasus.destroy');

    // 5. Kelola Akun Admin (Khusus Superadmin)
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