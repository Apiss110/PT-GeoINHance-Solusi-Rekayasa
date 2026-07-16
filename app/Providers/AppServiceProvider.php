<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Schema; // <-- TAMBAHAN: Untuk mengecek keberadaan tabel di DB
use App\Models\Product; // MEMANGGIL MODEL PRODUK
use App\Models\ProjectPage; // MEMANGGIL MODEL HALAMAN PROYEK BARU
use App\Models\Sector; // Memanggil Model Sector untuk CMS Sektor
use App\Models\ContactMessage; // <-- TAMBAHAN: Memanggil Model Pesan Masuk
use App\Models\TrainingRegistration; // <-- TAMBAHAN: Memanggil Model Pendaftaran Training

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();

        // Daftarkan driver Apple Socialite ke dalam Event Laravel
        Event::listen(
            \SocialiteProviders\Manager\SocialiteWasCalled::class,
            \SocialiteProviders\Apple\AppleExtendSocialite::class . '@handle'
        );

        // SINKRONISASI DATA DROPDOWN NAVBAR & HALAMAN PUBLIK (PRODUK & PROYEK)
        View::composer(['partials.navbar', 'products.semua-produk'], function ($view) {
            // 1. Ambil data produk aktif
            $productsData = Product::where('is_active', true)->latest()->get();
            
            // 2. Ambil data halaman proyek aktif dari tabel baru
            $projectPagesData = ProjectPage::where('is_active', true)->latest()->get();
            
            // Kirimkan variabel ke view terkait
            $view->with('allProductsNavbar', $productsData)
                 ->with('products', $productsData)
                 ->with('dynamicProjectPages', $projectPagesData); // Variabel untuk looping di navbar proyek
        });

        // SINKRONISASI DATA GLOBAL (SEKTOR, PESAN MASUK, & PENDAFTARAN TRAINING)
        // Variabel di dalam composer ini akan otomatis dibagikan ke seluruh view (.blade.php)
        View::composer('*', function ($view) {
            // 1. Bagikan data Sektor ke semua view
            if (Schema::hasTable('sectors')) {
                $view->with('globalSectors', Sector::orderBy('name', 'asc')->get());
            }

            // 2. Hitung jumlah Pesan Masuk yang belum dibaca (is_read = false)
            $unreadMessagesCount = Schema::hasTable('contact_messages') 
                ? ContactMessage::where('is_read', false)->count() 
                : 0;

            // 3. Hitung jumlah Pendaftaran Training yang belum diproses/dibaca
            $pendingTrainingsCount = Schema::hasTable('training_registrations') 
                ? TrainingRegistration::where('is_read', false)->count() 
                : 0;

            // Bagikan variabel hitungan notifikasi ke seluruh blade view (termasuk sidebar admin)
            $view->with([
                'unreadMessagesCount' => $unreadMessagesCount,
                'pendingTrainingsCount' => $pendingTrainingsCount,
            ]);
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}