<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Login Client Area') }} - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        .bg-pattern {
            background-color: #002d62;
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 0);
            background-size: 24px 24px;
        }
        .form-shadow {
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.05);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900 min-h-screen flex items-center justify-center p-4 sm:p-6 overflow-x-hidden">

    <!-- Container Card Utam: Disesuaikan tinggi optimalnya (md:h-[630px]) -->
    <div class="w-full max-w-5xl min-h-[550px] md:h-[630px] bg-white rounded-2xl sm:rounded-3xl overflow-hidden border border-slate-200/80 shadow-2xl flex flex-col md:flex-row my-auto" data-aos="zoom-in" data-aos-duration="600">
        
        <!-- Bagian Kiri (Sisi Branding) -->
        <div class="hidden md:flex md:w-1/2 bg-pattern p-8 lg:p-12 flex-col justify-between relative text-white">
            <div class="flex items-center relative z-10 mt-1">
                <div class="leading-none">
                    <img src="../images/logo_inh.png" alt="GeoINHance Logo" class="h-14 lg:h-16 w-auto object-contain">
                </div>
            </div>

            <div class="space-y-3 relative z-10">
                <span class="text-red-500 font-bold uppercase text-[10px] tracking-[0.3em] block">{{ __('Data & Project Control') }}</span>
                
                <div>
                    <h2 class="text-2xl lg:text-3xl font-black uppercase tracking-tight leading-tight">{{ __('Pantau Progress Proyek Geoteknik Anda') }}</h2>
                    <p class="text-slate-300 text-xs mt-2.5 leading-relaxed max-w-sm">{{ __('Masuk untuk mengunduh laporan analisis tanah, memantau bor log, dan melihat pemetaan topografi proyek Anda secara real-time.') }}</p>
                </div>
            </div>

            <div class="text-[10px] text-slate-400 uppercase tracking-wider relative z-10 font-semibold">
                © 2026 PT GeoINHance Solusi Rekayasa
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-red-800/30 rounded-full filter blur-3xl"></div>
        </div>

        <!-- Bagian Kanan (Form Login) -->
        <div class="w-full md:w-1/2 p-7 lg:p-11 flex flex-col justify-between relative bg-white">
            
            <!-- Header Right: Top Bar -->
            <div class="flex items-center justify-between w-full">
                <!-- Kiri: Logo Mobile & Tombol Kembali -->
                <div class="flex items-center gap-3">
                    <div class="md:hidden flex items-center">
                        <img src="../images/inh 2.png" alt="GeoINHance Logo" class="h-10 sm:h-12 w-auto object-contain">
                    </div>

                    <a href="/" class="text-slate-400 hover:text-slate-700 transition inline-flex items-center text-[10px] font-bold uppercase tracking-wider group">
                        <svg class="w-3.5 h-3.5 mr-1.5 transform group-hover:-translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        {{ __('Kembali') }}
                    </a>
                </div>
                
                <!-- Kanan: Switcher Bahasa ID | EN -->
                <div class="flex items-center bg-slate-100 p-1 rounded-xl border border-slate-200/80 text-[10px] font-bold">
                    <a href="{{ route('lang.switch', 'id') }}" 
                       class="px-2.5 py-1 rounded-lg transition-all duration-200 {{ app()->getLocale() == 'id' ? 'bg-white text-red-800 shadow-sm font-black' : 'text-slate-400 hover:text-slate-600' }}">
                       ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" 
                       class="px-2.5 py-1 rounded-lg transition-all duration-200 {{ app()->getLocale() == 'en' ? 'bg-white text-red-800 shadow-sm font-black' : 'text-slate-400 hover:text-slate-600' }}">
                       EN
                    </a>
                </div>
            </div>

            <!-- Content Utama Form Login -->
            <div class="my-auto py-2 max-w-md w-full mx-auto">
                <div class="mb-6">
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight uppercase">{{ __('Selamat Datang') }}</h3>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1 leading-relaxed">{{ __('Silakan masuk untuk mengakses Client Area GeoINHance.') }}</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Error Handling -->
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-800 text-[11px] font-semibold p-3.5 rounded-xl flex items-start space-x-2">
                            <svg class="w-4 h-4 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <!-- Input Email -->
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600">{{ __('Alamat Email') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@geoinhance.com" 
                                class="w-full bg-slate-50/80 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-red-800/20 focus:border-red-800 focus:bg-white transition duration-200 tracking-wide text-slate-800 placeholder:text-slate-400">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div x-data="{ show: false, val: '' }" class="space-y-1.5">
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600">{{ __('Kata Sandi') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" x-model="val" name="password" required placeholder="••••••••" 
                                class="w-full bg-slate-50/80 border border-slate-200 rounded-xl pl-10 pr-10 py-3 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-red-800/20 focus:border-red-800 focus:bg-white transition duration-200 tracking-wide text-slate-800 placeholder:text-slate-400">
                            <button type="button" @click="show = !show" x-show="val.length > 0" x-cloak class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none transition">
                                <i class="fa-solid text-xs" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Checkbox Ingat Saya & Lupa Kata Sandi -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center gap-2 cursor-pointer text-slate-600 hover:text-slate-900 transition select-none">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-red-800 focus:ring-red-800/20 cursor-pointer">
                            <span class="font-semibold text-[11px] sm:text-xs text-slate-600">{{ __('Ingat Saya') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[11px] sm:text-xs font-bold text-red-800 hover:text-red-900 transition hover:underline">
                                {{ __('Lupa Kata Sandi?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Tombol Masuk -->
                    <button type="submit" class="w-full bg-red-800 hover:bg-red-900 text-white font-bold uppercase text-xs tracking-widest py-3.5 rounded-xl shadow-lg shadow-red-900/10 hover:shadow-red-900/20 transition-all duration-200 active:scale-[0.98] focus:outline-none flex items-center justify-center gap-2 group mt-2">
                        <span>{{ __('Masuk Akun') }}</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Footer Right Bar: Menjaga Keseimbangan Layout Vertikal -->
            <div class="text-center text-[11px] text-slate-400 font-medium">
                {{ __('Kendala saat masuk?') }} <a href="https://wa.me/6285190441744" class="text-red-800 hover:underline font-bold">{{ __('Hubungi Support') }}</a>
            </div>

        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>