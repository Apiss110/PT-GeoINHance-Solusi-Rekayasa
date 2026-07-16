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
use App\Models\Product;
use App\Models\ProjectPage;
use App\Models\Sector;
use App\Models\CaseStudy; // 🟢 Import model tambahan Anda
use App\Models\Article;   // 🟢 Import model tambahan Anda
use App\Models\ContactMessage;        // <--- Pastikan ini ada
use App\Models\TrainingRegistration;  // <--- Pastikan ini juga ada



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
Route::get('/product/plaxis-2d', function () { return view('products.plaxis-2d'); })->name('product.plaxis2d');
Route::get('/product/plaxis-3d', function () { return view('products.plaxis-3d'); })->name('product.plaxis3d');
Route::get('/product/staad-pro', function () { return view('products.staad-pro'); })->name('product.staadpro');
Route::get('/product/geostudio-flow', function () { return view('products.geostudio'); })->name('product.geostudio');
Route::get('/product/all-products', function () { return view('products.semua-produk'); })->name('product.all');

Route::get('/product/{idOrSlug}', [AdminProductController::class, 'show'])->name('produk.detail');

/*
|--------------------------------------------------------------------------
| SEKTOR (PUBLIC SIDE)
|--------------------------------------------------------------------------
*/
Route::prefix('sektor')->group(function () {
    Route::get('/semua-sektor', [ProjectController::class, 'showAllSectorsPublic'])->name('sektor.semua-sektor');
    Route::get('/{slug}', [PublicSectorController::class, 'show'])->name('front.sector.show');
});

/*
|--------------------------------------------------------------------------
| PROYEK / PORTFOLIO (PUBLIC SIDE)
|--------------------------------------------------------------------------
*/
Route::get('/proyek/semua-proyek', [ProyekController::class, 'semuaProyek'])->name('proyek.semua');
Route::get('/proyek/{id}', [ProyekController::class, 'publicShow'])->name('proyek.detail')->whereNumber('id');
Route::get('/proyek/{slug}', [ProjectController::class, 'showPublicByCategory'])->name('proyek.category');

/*
|--------------------------------------------------------------------------
| RESOURCES & ARTICLES ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/resources/articles', [ArticleController::class, 'publicIndex'])->name('blog.index');
Route::get('/resources/artikel/{slug}', [ArticleController::class, 'publicShow'])->name('article.show');
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
// rute GET untuk menampilkan form
Route::get('/training/pendaftaran', [TrainingController::class, 'pendaftaran'])->name('training.pendaftaran');

// rute POST untuk submit data form (Ubah namanya di sini agar sinkron dengan file Blade)
Route::post('/training/pendaftaran', [TrainingController::class, 'storeRegistration'])->name('training.pendaftaran.store');

Route::prefix('training')->group(function () {
    Route::get('/silabus-materi', [SyllabusController::class, 'publicIndex'])->name('training.silabus');
    Route::get('/silabus-materi/{id}', [SyllabusController::class, 'publicShow'])->name('training.syllabus.show');
    Route::view('/fasilitas', 'training.fasilitas')->name('training.fasilitas');
});

// Multi-language Switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) { Session::put('locale', $locale); }
    return redirect()->back();
})->name('lang.switch');

// Route API untuk Leaflet JS dikeluarkan dari admin agar bisa diakses Publik tanpa Auth
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
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::delete('/project/bulk-delete', [ProjectController::class, 'bulkDestroy'])->name('project.destroy.bulk');
    Route::delete('/slider/bulk-delete', [SliderController::class, 'bulkDestroy'])->name('slider.destroy.bulk');
    
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');     
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');    
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); 

    Route::resource('products', AdminProductController::class);

    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update'); 
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::post('/blog/upload-image', [BlogController::class, 'uploadImage'])->name('blog.upload.image');

    Route::get('/project-pages', [ProjectPageController::class, 'index'])->name('project-pages.index');
    Route::post('/project-pages', [ProjectPageController::class, 'store'])->name('project-pages.store');
    Route::delete('/project-pages/{id}', [ProjectPageController::class, 'destroy'])->name('project-pages.destroy');
    Route::get('/project-pages/{id}/edit', [ProjectPageController::class, 'edit'])->name('project-pages.edit');
    Route::put('/project-pages/{id}', [ProjectPageController::class, 'update'])->name('project-pages.update');

    Route::resource('blog', BlogController::class);
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::resource('articles', ArticleController::class); 
    
    Route::resource('video', AdminVideoController::class);

    // Jalur Rute Peta Proyek Admin 
    Route::get('/branches', [App\Http\Controllers\ProyekController::class, 'branchesAdmin'])->name('branches.index');
    Route::post('/branches', [App\Http\Controllers\ProyekController::class, 'storeBranch'])->name('branches.store');
    Route::get('/branches/{id}/edit', [App\Http\Controllers\ProyekController::class, 'editBranch'])->name('branches.edit');
    Route::put('/branches/{id}', [App\Http\Controllers\ProyekController::class, 'updateBranch'])->name('branches.update');
    Route::delete('/branches/{id}', [App\Http\Controllers\ProyekController::class, 'destroyBranch'])->name('branches.destroy');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    Route::get('/studi-kasus', [CaseStudyController::class, 'index'])->name('studi-kasus.index');
    Route::get('/studi-kasus/create', [CaseStudyController::class, 'create'])->name('studi-kasus.create'); 
    Route::post('/studi-kasus', [CaseStudyController::class, 'store'])->name('studi-kasus.store');
    Route::get('/studi-kasus/{id}/edit', [CaseStudyController::class, 'edit'])->name('studi-kasus.edit');
    Route::put('/studi-kasus/{id}', [CaseStudyController::class, 'update'])->name('studi-kasus.update');
    Route::delete('/studi-kasus/{id}', [CaseStudyController::class, 'destroy'])->name('studi-kasus.destroy');

    Route::get('/training', [TrainingAdminController::class, 'index'])->name('training.index');
    Route::get('/training/{id}', [TrainingAdminController::class, 'show'])->name('training.show');
    Route::delete('/training/{id}', [TrainingAdminController::class, 'destroy'])->name('training.destroy');

    Route::middleware([IsSuperadmin::class])->group(function () {
        Route::get('/kelola-admin', [AdminController::class, 'index'])->name('kelola-admin.index');
        Route::get('/kelola-admin/create', [AdminController::class, 'create'])->name('kelola-admin.create');
        Route::post('/kelola-admin', [AdminController::class, 'store'])->name('kelola-admin.store');
        Route::get('/kelola-admin/{id}/edit', [AdminController::class, 'edit'])->name('kelola-admin.edit');
        Route::put('/kelola-admin/{id}', [AdminController::class, 'update'])->name('kelola-admin.update');
        Route::delete('/kelola-admin/{id}', [AdminController::class, 'destroy'])->name('kelola-admin.destroy');
    });

    Route::resource('syllabus', SyllabusController::class);
    Route::resource('sector', AdminSectorController::class);
        
});

require __DIR__.'/auth.php';