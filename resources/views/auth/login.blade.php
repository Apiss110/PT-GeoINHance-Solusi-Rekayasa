<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Client Area - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
<body class="bg-slate-50 font-sans antialiased text-slate-900 h-screen flex items-center justify-center p-4 md:p-6">

    <div class="w-full max-w-5xl h-[720px] bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-2xl flex" data-aos="zoom-in" data-aos-duration="600">
        
        <!-- Bagian Kiri -->
        <div class="hidden md:flex md:w-1/2 bg-pattern p-12 flex-col justify-between relative text-white">
            <div class="flex items-center relative z-10">
                <div class="bg-red-800 p-2 rounded-xl mr-3 shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div class="leading-none">
                    <span class="font-black text-xl tracking-tighter uppercase block">Geo<span class="text-red-500">INHance</span></span>
                    <span class="text-[9px] font-bold text-slate-300 tracking-[0.2em] uppercase">Engineering Solutions</span>
                </div>
            </div>

            <div class="space-y-4 relative z-10">
                <span class="text-red-500 font-bold uppercase text-[10px] tracking-[0.3em] block">Data & Project Control</span>
                
                <div>
                    <h2 class="text-2xl font-black uppercase tracking-tight leading-tight">Pantau Progress <br>Proyek Geoteknik Anda</h2>
                    <p class="text-slate-300 text-xs mt-2 leading-relaxed max-w-sm">Masuk untuk mengunduh laporan analisis tanah, memantau bor log, dan melihat pemetaan topografi proyek Anda secara real-time.</p>
                </div>
            </div>

            <div class="text-[10px] text-slate-400 uppercase tracking-wider relative z-10">
                © 2026 PT GeoINHance Solusi Rekayasa
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-red-800/30 rounded-full filter blur-3xl"></div>
        </div>

        <!-- Bagian Kanan (Login Form) -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative bg-white">
            
            <div class="mb-6">
                <h3 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Selamat Datang</h3>
                <p class="text-slate-500 text-xs mt-1.5">Silakan masuk untuk mengakses Client Area.</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Error Handling -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-800 text-[11px] font-semibold p-3.5 rounded-xl flex items-start space-x-2">
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="contoh@geoinhance.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:border-red-800 transition">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500">Password</label>
                        <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-red-800 hover:underline uppercase tracking-wider">Lupa Sandi?</a>
                    </div>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm focus:outline-none focus:border-red-800 transition">
                </div>

                <button type="submit" class="w-full bg-red-800 hover:bg-red-900 text-white font-bold uppercase text-xs tracking-widest py-4 rounded-xl shadow-lg transition">
                    Sign In Account
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-200"></div>
                </div>
                <div class="relative flex justify-center text-xs">
                    <span class="bg-white px-2 text-slate-400 uppercase tracking-widest">Atau</span>
                </div>
            </div>

            <!-- Tombol Google -->
            <a href="{{ route('social.redirect', 'google') }}" class="w-full bg-white border border-slate-200 hover:border-red-800 text-slate-700 font-bold uppercase text-xs tracking-widest py-4 rounded-xl shadow-sm transition duration-300 flex items-center justify-center gap-3 hover:bg-slate-50">
                <svg class="w-4 h-4" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                Login dengan Google
            </a>

            <div class="mt-8 text-center text-xs text-slate-500">
                Belum mendaftarkan perusahaan? 
                <a href="/register" class="text-red-800 font-bold hover:underline ml-1">Registrasi Klien</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    @livewireScripts
</body>
</html>