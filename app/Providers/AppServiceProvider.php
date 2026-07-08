<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\View; 
use App\Models\Product; //  SEKARANG MEMANGGIL MODEL PRODUK

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

        //  SINKRONISASI DROPDOWN KHUSUS PRODUK
        View::composer(['partials.navbar', 'products.semua-produk'], function ($view) {
            // Kita kirim dua variabel sekaligus agar navbar dan halaman semua-produk sama-sama aman
            $productsData = Product::where('is_active', true)->latest()->get();
            
            $view->with('allProductsNavbar', $productsData)
                ->with('products', $productsData); // Tambahkan baris ini
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