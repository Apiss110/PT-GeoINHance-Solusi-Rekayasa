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

    <div class="w-full max-w-5xl min-h-[550px] md:h-[720px] bg-white rounded-2xl sm:rounded-3xl overflow-hidden border border-slate-200 shadow-2xl flex flex-col md:flex-row my-auto" data-aos="zoom-in" data-aos-duration="600">
        
        <!-- Bagian Kiri (Sisi Branding) -->
        <div class="hidden md:flex md:w-1/2 bg-pattern p-8 lg:p-12 flex-col justify-between relative text-white">
            <!-- Logo Dikebawahin Sedikit Agar Sejajar Vertikal Dengan Header Kanan -->
            <div class="flex items-center relative z-10 mt-2 lg:mt-3">
                <div class="leading-none">
                    <img src="../images/logo_inh.png" alt="GeoINHance Logo" class="h-14 lg:h-20 w-auto object-contain">
                </div>
            </div>

            <div class="space-y-4 relative z-10">
                <span class="text-red-500 font-bold uppercase text-[10px] tracking-[0.3em] block">{{ __('Data & Project Control') }}</span>
                
                <div>
                    <h2 class="text-2xl font-black uppercase tracking-tight leading-tight">{{ __('Pantau Progress Proyek Geoteknik Anda') }}</h2>
                    <p class="text-slate-300 text-xs mt-2 leading-relaxed max-w-sm">{{ __('Masuk untuk mengunduh laporan analisis tanah, memantau bor log, dan melihat pemetaan topografi proyek Anda secara real-time.') }}</p>
                </div>
            </div>

            <div class="text-[10px] text-slate-400 uppercase tracking-wider relative z-10">
                © 2026 PT GeoINHance Solusi Rekayasa
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-red-800/30 rounded-full filter blur-3xl"></div>
        </div>

        <!-- Bagian Kanan (Form Login) -->
        <div class="w-full md:w-1/2 p-8 lg:p-12 flex flex-col justify-between relative bg-white">
            
            <!-- Header Form: Sejajar di Paling Atas tanpa Space Kosong -->
            <div class="flex items-center justify-between w-full">
                <!-- Kiri: Logo Mobile & Tombol Kembali -->
                <div class="flex items-center gap-3">
                    <div class="md:hidden flex items-center">
                        <img src="../images/inh 2.png" alt="GeoINHance Logo" class="h-10 sm:h-12 w-auto object-contain">
                    </div>

                    <a href="/" class="text-slate-400 hover:text-slate-600 transition inline-flex items-center text-[10px] font-bold uppercase tracking-wider group">
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

            <!-- Content Utama Form (Berada di Tengah Area) -->
            <div class="my-auto py-4">
                <div class="mb-5">
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase tracking-tight">{{ __('Selamat Datang') }}</h3>
                    <p class="text-slate-500 text-xs mt-1">{{ __('Silakan masuk untuk mengakses Client Area.') }}</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-3.5">
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
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">{{ __('Alamat Email') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="contoh@geoinhance.com" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-xs sm:text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div x-data="{ show: false, val: '' }">
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500">{{ __('Password') }}</label>
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-red-800 hover:underline uppercase tracking-wider">{{ __('Lupa Sandi?') }}</a>
                        </div>
                        <div class="relative">
                            <!-- Icon Kiri (Lock) -->
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" x-model="val" name="password" required placeholder="••••••••" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-10 py-2.5 text-xs sm:text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                            <!-- Icon Kanan (Eye) - Muncul Hanya Saat Diisi -->
                            <button type="button" @click="show = !show" x-show="val.length > 0" x-cloak class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none transition">
                                <i class="fa-solid text-xs" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-red-800 hover:bg-red-900 text-white font-bold uppercase text-xs tracking-widest py-3.5 rounded-xl shadow-lg transition duration-300 active:scale-[0.98] focus:outline-none">
                        {{ __('Sign In Account') }}
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-4">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-xs">
                        <span class="bg-white px-2 text-slate-400 uppercase tracking-widest text-[9px] font-bold">{{ __('Atau Masuk Lewat') }}</span>
                    </div>
                </div>

                <!-- Grid Tombol Sosial Media -->
                <div class="grid grid-cols-2 gap-3">
                    <!-- Google -->
                    <a href="{{ route('social.redirect', 'google') }}" class="flex items-center justify-center gap-2 py-2.5 px-3 border border-slate-200 rounded-xl hover:border-red-800 hover:bg-slate-50 transition text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-slate-700 shadow-sm duration-300">
                        <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                        Google
                    </a>

                    <!-- Facebook -->
                    <a href="{{ route('social.redirect', 'facebook') }}" class="flex items-center justify-center gap-2 py-2.5 px-3 border border-slate-200 rounded-xl hover:border-blue-600 hover:bg-slate-50 transition text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-slate-700 shadow-sm duration-300">
                        <svg class="w-4 h-4 shrink-0 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Facebook
                    </a>
                </div>
            </div>

            <!-- Footer Registrasi -->
            <div class="text-center text-xs text-slate-500 pt-2">
                {{ __('Belum mendaftarkan perusahaan?') }}
                <a href="/register" class="text-red-800 font-bold hover:underline ml-1">{{ __('Registrasi Klien') }}</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>