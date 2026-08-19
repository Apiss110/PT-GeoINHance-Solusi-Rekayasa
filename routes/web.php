<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SliderController; 
use App\Http\Controllers\Admin\ProjectController; 
use App\Http\Controllers\Admin\ProjectPageController; 
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
use App\Http\Controllers\VideoController; 
use App\Http\Controllers\Admin\VideoController as AdminVideoController; 
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\TrainingAdminController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SectorController as AdminSectorController;
use App\Http\Controllers\PublicSectorController;
use App\Http\Controllers\WelcomeController; 
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Models\ProjectPage;
use App\Models\Sector;
use App\Models\CaseStudy; // 🟢 Import model tambahan Anda
use App\Models\Article;   // 🟢 Import model tambahan Anda
use App\Models\ContactMessage;        // <--- Pastikan ini ada
use App\Models\TrainingRegistration;  // <--- Pastikan ini juga ada
use App\Http\Controllers\Admin\SliderDropdownController;
use App\Http\Controllers\Admin\ProjectProgressController;
use App\Http\Controllers\ClientProgressController;
use App\Http\Controllers\Admin\ClientController; // 👈 Pastikan baris ini ada
use App\Http\Controllers\Admin\BranchController;



/*
|--------------------------------------------------------------------------
| Web Routes (Sisi User / Public)
|--------------------------------------------------------------------------
*/

// Rute OAuth Socialite (Google, Facebook, dll)
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('social.callback');

// Home Utama Tunggal
Route::get('/', [WelcomeController::class, 'index'])->name('home');

// Halaman Statis Perusahaan
Route::get('/profil', function () { return view('profil'); })->name('profil');
Route::get('/kontak', function () { return view('kontak'); })->name('kontak');
Route::get('/karir', function () { return view('karir'); })->name('karir');
Route::get('/legalitas', function () { return view('legalitas'); })->name('legalitas');

Route::post('/kontak/send', [ContactController::class, 'store'])->name('kontak.send');

Route::view('/terms-and-conditions', 'terms')->name('terms');
Route::view('/privacy-policy', 'privacy')->name('privacy');

Route::get('email/verify', function () {
    return redirect()->route('verification.notice');
})->name('fortify.verification.notice');

/*
|--------------------------------------------------------------------------
| PRODUCTS (PUBLIC SIDE)
|--------------------------------------------------------------------------
*/

// 🟢 1. Route Statis Khusus Produk Spesifik / Manual Blade
Route::get('/product/plaxis-2d', function () { return view('products.plaxis-2d'); })->name('product.plaxis2d');
Route::get('/product/plaxis-3d', function () { return view('products.plaxis-3d'); })->name('product.plaxis3d');
Route::get('/product/staad-pro', function () { return view('products.staad-pro'); })->name('product.staadpro');
Route::get('/product/geostudio-flow', function () { return view('products.geostudio-flow'); })->name('product.geostudio');

// 🟢 2. Route Halaman "Semua Produk" (Harus ditaruh SEBELUM wildcard {slug})
Route::get('/product/all-products', [AdminProductController::class, 'publicIndex'])->name('product.all');
Route::get('/products/semua-produk', [AdminProductController::class, 'publicIndex'])->name('products.index');

// 🟢 3. Route Detail Produk Dinamis (Harus ditaruh di PALING BAWAH)
Route::get('/products/{slug}', [AdminProductController::class, 'publicShow'])->name('products.show');
Route::get('/product/{idOrSlug}', [AdminProductController::class, 'show'])->name('produk.detail');
/*
|--------------------------------------------------------------------------
| SEKTOR (PUBLIC SIDE)
|--------------------------------------------------------------------------
*/
Route::prefix('sektor')->group(function () {
    Route::get('/semua-sektor', [ProjectController::class, 'showAllSectorsPublic'])->name('sektor.semua-sektor');
    
    // Cukup gunakan satu rute ini saja agar tidak terjadi tumpang tindih (override)
    Route::get('/{slug}', [PublicSectorController::class, 'show'])->name('front.sector.show');
});

/*
|--------------------------------------------------------------------------
| PROYEK / PORTFOLIO (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::controller(ProyekController::class)->prefix('proyek')->as('proyek.')->group(function () {
    // 1. Daftar semua proyek (/proyek/semua-proyek)
    Route::get('/semua-proyek', 'semuaProyek')->name('semua');

    // 2. Detail proyek berdasarkan ID angka (/proyek/1)
    Route::get('/{id}', 'publicShow')->whereNumber('id')->name('detail');

    // 3. Kategori & Detail berdasarkan slug (/proyek/kategori-atau-slug)
    Route::get('/{slug}', 'show')->name('category');
});

/*
|--------------------------------------------------------------------------
| AREA KLIEN (AUTHENTICATED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Halaman Progres Pekerjaan Klien (/progres-saya)
    Route::get('/progres-saya', [ClientProgressController::class, 'index'])->name('client.progress.index');
});

/*
|--------------------------------------------------------------------------
| RESOURCES & ARTICLES ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/resources/articles', [ArticleController::class, 'publicIndex'])->name('blog.index');
Route::get('/resources/artikel/{slug}', [ArticleController::class, 'publicShow'])->name('article.show');
Route::get('/resources/news-events', [ProyekController::class, 'newsEvents'])->name('resources.news-events');
Route::get('/blog/{slug}', [ProyekController::class, 'showBlog'])->name('blog.show');
Route::get('/articles/{slug}', [ArticleController::class, 'show']);

Route::get('/resources/geo-engineering', function () { return view('resources.geo-engineering'); })->name('resources.geo-engineering');
Route::get('/resources/consulting-services', function () { return view('resources.consulting-services'); })->name('resources.consulting-services');
Route::get('/resources/perpus-dokumen', function () { return view('resources.perpus-dokumen'); })->name('resources.perpus-dokumen');
Route::get('/resources/semua-resources', [ProyekController::class, 'allResources'])->name('resources.semua');

Route::get('/resources/studi-kasus', function () {
    $caseStudies = \App\Models\CaseStudy::latest()->get(); 
    return view('resources.studi-kasus', compact('caseStudies'));
})->name('resources.studi-kasus');

Route::get('/resources/studi-kasus/{slug}', function ($slug) {
    $caseStudy = \App\Models\CaseStudy::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
    return view('resources.case-study-detail', compact('caseStudy'));
})->name('resources.studi-kasus.detail');

Route::get('/resources/video', [VideoController::class, 'index'])->name('resources.video');
Route::get('/resources/video/{id}', [VideoController::class, 'show'])->name('resources.video.show')->whereNumber('id');

/*
|--------------------------------------------------------------------------
| TRAINING & SYLLABUS (PUBLIC SIDE)
|--------------------------------------------------------------------------
*/

Route::prefix('training')->group(function () {
    // 🟢 1. Route Statis & Spesifik Ditaruh Paling Atas
    Route::get('/silabus-materi', [SyllabusController::class, 'publicIndex'])->name('training.silabus');
    Route::get('/silabus-materi/{id}', [SyllabusController::class, 'publicShow'])->name('training.syllabus.show');
    Route::get('/pendaftaran', [TrainingController::class, 'pendaftaran'])->name('training.pendaftaran');
    Route::post('/pendaftaran', [TrainingController::class, 'storeRegistration'])->name('training.pendaftaran.store');
    Route::view('/fasilitas', 'training.fasilitas')->name('training.fasilitas');

    // 🟢 2. Route Dinamis Wildcard ({slug}) Ditaruh di Paling Bawah Kelompok
    Route::get('/{slug}', [TrainingController::class, 'show'])->name('training.show');
});

/*
|--------------------------------------------------------------------------
| UTILITIES & API
|--------------------------------------------------------------------------
*/

// Multi-language Switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
        session()->save(); // Force save session
    }
    return redirect()->back();
})->name('lang.switch');

// Route API untuk Leaflet JS (Akses Publik)
Route::get('/api/branches', [ProyekController::class, 'getBranchesJson'])->name('api.branches.json');


/*
|--------------------------------------------------------------------------
| Authenticated Routes (Dashboard & Profile Managements)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    // Fungsi aman untuk menghitung baris tabel secara dinamis jika Model ada
    $safeCount = function($modelClass) {
        return class_exists($modelClass) ? $modelClass::count() : 0;
    };

    // Deteksi model Blog / Post / Article
    $blogClass = class_exists('App\Models\Blog') 
        ? 'App\Models\Blog' 
        : (class_exists('App\Models\Post') ? 'App\Models\Post' : null);
    $totalBlogs = $blogClass ? $blogClass::count() : 0;

    // Ambil data untuk notifikasi angka "Baru"
    $pendingTrainingsCount = class_exists('App\Models\TrainingRegistration') 
        ? \App\Models\TrainingRegistration::where('is_read', 0)->count() 
        : 0;
        
    $unreadMessagesCount = class_exists('App\Models\ContactMessage') 
        ? \App\Models\ContactMessage::where('is_read', 0)->count() 
        : 0;

    // Ambil aktivitas terbaru untuk bagian bawah dashboard
    $recentMessages = class_exists('App\Models\ContactMessage') 
        ? \App\Models\ContactMessage::latest()->take(3)->get() 
        : collect();
        
    $recentTrainings = class_exists('App\Models\TrainingRegistration') 
        ? \App\Models\TrainingRegistration::latest()->take(3)->get() 
        : collect();

    return view('pages.admin.dashboard', [
        // 13 Modul yang terhubung langsung ke database Anda:
        'totalSliders'     => $safeCount('App\Models\HeroSlider'),
        'totalProducts'    => $safeCount('App\Models\Product'),
        'totalProjects'    => $safeCount('App\Models\ProjectPage'),
        'totalSectors'     => $safeCount('App\Models\Sector'),
        'totalBlogs'       => $totalBlogs,
        'totalArticles'    => $safeCount('App\Models\Article'),
        'totalPetaProyek'  => class_exists('App\Models\StrategicProject') ? \App\Models\StrategicProject::count() : $safeCount('App\Models\Branch'),
        'totalVideos'      => $safeCount('App\Models\Video'),
        'totalCaseStudies' => $safeCount('App\Models\CaseStudy'),
        'totalSyllabi'     => class_exists('App\Models\Syllabus') ? \App\Models\Syllabus::count() : $safeCount('App\Models\Syllabi'),
        'totalTrainings'   => $safeCount('App\Models\TrainingRegistration'),
        'totalMessages'    => $safeCount('App\Models\ContactMessage'),
        'totalAdmins'      => $safeCount('App\Models\User'),

        // Data Pelengkap Aktivitas
        'pendingTrainingsCount' => $pendingTrainingsCount,
        'unreadMessagesCount'   => $unreadMessagesCount,
        'recentMessages'        => $recentMessages,
        'recentTrainings'       => $recentTrainings,
    ]);
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
| Seluruh route di bawah diproteksi oleh middleware 'auth' DAN 'is_admin'
| agar akun bernilai 'client' tidak bisa mengaksesnya.
*/
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {

    // --- Dashboard ---
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // --- Bulk Delete Routes ---
    Route::delete('/project/bulk-delete', [ProjectController::class, 'bulkDestroy'])->name('project.destroy.bulk');
    Route::delete('/slider/bulk-delete', [SliderController::class, 'bulkDestroy'])->name('slider.destroy.bulk');
    Route::delete('/products/bulk-delete', [AdminProductController::class, 'bulkDelete'])->name('products.destroy.bulk');
    Route::delete('/project-pages/bulk-delete', [ProjectPageController::class, 'bulkDelete'])->name('project-pages.destroy.bulk');
    Route::delete('/sector/bulk-delete', [AdminSectorController::class, 'bulkDelete'])->name('sector.destroy.bulk');
    Route::delete('/blog/bulk-delete', [BlogController::class, 'bulkDelete'])->name('blog.destroy.bulk');
    Route::delete('/articles/bulk-delete', [ArticleController::class, 'bulkDelete'])->name('articles.destroy.bulk');
    Route::delete('/branches/bulk-delete', [ProyekController::class, 'bulkDelete'])->name('branches.destroy.bulk');
    Route::delete('/video/bulk-delete', [AdminVideoController::class, 'bulkDelete'])->name('video.destroy.bulk');
    Route::delete('/studi-kasus/bulk-delete', [CaseStudyController::class, 'bulkDelete'])->name('studi-kasus.destroy.bulk');
    Route::delete('/syllabus/bulk-delete', [SyllabusController::class, 'bulkDelete'])->name('syllabus.destroy.bulk');
    Route::delete('/training/bulk-delete', [TrainingAdminController::class, 'bulkDelete'])->name('training.destroy.bulk');
    Route::delete('/messages/bulk-delete', [MessageController::class, 'bulkDelete'])->name('messages.destroy.bulk');

    // --- Slider Management ---
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

    // --- Products ---
    Route::resource('products', AdminProductController::class);

    // --- Project ---
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // Route Alias Project Card
    Route::get('/project-card/{id}/edit', [ProjectController::class, 'edit'])->name('project-card.edit');
    Route::put('/project-card/{id}', [ProjectController::class, 'update'])->name('project-card.update');
    Route::delete('/project-card/{id}', [ProjectController::class, 'destroy'])->name('project-card.destroy');

    // --- Project Pages ---
    Route::get('/project-pages', [ProjectPageController::class, 'index'])->name('project-pages.index');
    Route::get('/project-pages/create', [ProjectPageController::class, 'create'])->name('project-pages.create');
    Route::post('/project-pages', [ProjectPageController::class, 'store'])->name('project-pages.store');
    Route::get('/project-pages/{id}/edit', [ProjectPageController::class, 'edit'])->name('project-pages.edit');
    Route::put('/project-pages/{id}', [ProjectPageController::class, 'update'])->name('project-pages.update');
    Route::delete('/project-pages/{id}', [ProjectPageController::class, 'destroy'])->name('project-pages.destroy');

    // --- Project Progress ---
    Route::resource('project-progress', ProjectProgressController::class);
    Route::patch('/project-progress/{id}/checklist', [ProjectProgressController::class, 'updateChecklist'])
        ->name('project-progress.update-checklist');
    Route::delete('/project-progress/{id}/delete-image', [ProjectProgressController::class, 'deleteImage'])
        ->name('project-progress.delete-image');
    Route::delete('/project-progress/{id}/delete-attachment/{index}', [ProjectProgressController::class, 'deleteAttachment'])
        ->name('project-progress.delete-attachment');

    // --- Blog & Articles ---
    Route::post('/blog/upload-image', [BlogController::class, 'uploadImage'])->name('blog.upload.image');
    Route::resource('blog', BlogController::class);
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::resource('articles', ArticleController::class);

    // --- Video ---
    Route::resource('video', AdminVideoController::class);

    // 1. Route Bulk Delete (Wajib ditaruh sebelum route yang memakai parameter {id})
    Route::delete('/branches/bulk-delete', [ProyekController::class, 'bulkDestroy'])
        ->name('branches.bulk-destroy');

    // 2. Route Manual untuk Branches (ProyekController)
    Route::get('/branches', [ProyekController::class, 'branchesAdmin'])->name('branches.index');
    Route::get('/branches/create', [ProyekController::class, 'createBranch'])->name('branches.create');
    Route::post('/branches', [ProyekController::class, 'storeBranch'])->name('branches.store');
    Route::get('/branches/{id}/edit', [ProyekController::class, 'editBranch'])->name('branches.edit');
    Route::put('/branches/{id}', [ProyekController::class, 'updateBranch'])->name('branches.update');
    Route::delete('/branches/{id}', [ProyekController::class, 'destroyBranch'])->name('branches.destroy');

    // --- Messages ---
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // --- Studi Kasus ---
    Route::get('/studi-kasus', [CaseStudyController::class, 'index'])->name('studi-kasus.index');
    Route::get('/studi-kasus/create', [CaseStudyController::class, 'create'])->name('studi-kasus.create');
    Route::post('/studi-kasus', [CaseStudyController::class, 'store'])->name('studi-kasus.store');
    Route::get('/studi-kasus/{id}/edit', [CaseStudyController::class, 'edit'])->name('studi-kasus.edit');
    Route::put('/studi-kasus/{id}', [CaseStudyController::class, 'update'])->name('studi-kasus.update');
    Route::delete('/studi-kasus/{id}', [CaseStudyController::class, 'destroy'])->name('studi-kasus.destroy');

    // --- Training ---
    Route::get('/training', [TrainingAdminController::class, 'index'])->name('training.index');
    Route::get('/training/{id}', [TrainingAdminController::class, 'show'])->name('training.show');
    Route::delete('/training/{id}', [TrainingAdminController::class, 'destroy'])->name('training.destroy');

    // --- Sector & Syllabus ---
    Route::resource('syllabus', SyllabusController::class);
    Route::resource('sector', AdminSectorController::class);

    // --- Kelola Akun Klien ---
    Route::resource('clients', ClientController::class);

    
   

    // --- Superadmin Only ---
    Route::middleware([IsSuperadmin::class])->group(function () {
        Route::get('/kelola-admin', [AdminController::class, 'index'])->name('kelola-admin.index');
        Route::get('/kelola-admin/create', [AdminController::class, 'create'])->name('kelola-admin.create');
        Route::post('/kelola-admin', [AdminController::class, 'store'])->name('kelola-admin.store');
        Route::get('/kelola-admin/{id}/edit', [AdminController::class, 'edit'])->name('kelola-admin.edit');
        Route::put('/kelola-admin/{id}', [AdminController::class, 'update'])->name('kelola-admin.update');
        Route::delete('/kelola-admin/{id}', [AdminController::class, 'destroy'])->name('kelola-admin.destroy');
    });

    // --- API Dropdown Banner Slider ---
    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/dropdown/sub-items/{category}', [SliderDropdownController::class, 'getSubItems'])->name('dropdown.sub-items');
        Route::get('/dropdown/detail-items/{category}/{id}', [SliderDropdownController::class, 'getDetailItems'])->name('dropdown.detail-items');
    });
});

require __DIR__.'/auth.php';