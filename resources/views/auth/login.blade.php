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

    <div class="w-full max-w-5xl h-[600px] bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-2xl flex" data-aos="zoom-in" data-aos-duration="600">
        
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

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative bg-white">
            
            <div class="flex items-center mb-8 md:hidden">
                <div class="bg-red-800 p-1.5 rounded-lg mr-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="font-black text-lg tracking-tighter text-slate-900 uppercase">Geo<span class="text-red-800">INHance</span></span>
            </div>

            <div class="mb-6">
                <h3 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Selamat Datang</h3>
                <p class="text-slate-500 text-xs mt-1.5">
                    Silakan masukkan kredensial akun terdaftar Anda untuk mengakses Client Area.
                </p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-800 text-[11px] font-semibold p-3.5 rounded-xl flex items-start space-x-2">
                        <svg class="w-4 h-4 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Alamat Email Registered</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="contoh@geoinhance.com" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-3.5 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500">Security Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-red-800 hover:underline uppercase tracking-wider">Lupa Sandi?</a>
                        @endif
                    </div>
                    <div class="relative" x-data="{ show: false }">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required autocomplete="current-password" placeholder="••••••••" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-12 py-3.5 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                        
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!show"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="show" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.025 10.025 0 014.132-5.4m3.045-1.308A9.764 9.764 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.4m-4.343-4.343a3 3 0 11-4.243-4.243M3 3l18 18"></path></svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-red-800 border-slate-300 rounded focus:ring-red-800 bg-slate-50">
                    <label for="remember_me" class="ml-2 text-xs font-semibold text-slate-500 select-none">Ingat perangkat ini</label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-red-800 hover:bg-red-900 text-white font-bold uppercase text-xs tracking-widest py-4 rounded-xl shadow-lg transition duration-300 transform hover:-translate-y-0.5 focus:outline-none">
                        Sign In Account
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center text-xs text-slate-500">
                Belum mendaftarkan perusahaan Anda? 
                <a href="/register" class="text-red-800 font-bold hover:underline ml-1">Registrasi Klien</a>
            </div>

            <a href="/" class="absolute top-4 right-4 md:top-8 md:right-12 text-slate-400 hover:text-slate-900 transition flex items-center text-xs font-bold uppercase tracking-wider group">
                <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @livewireScripts
</body>
</html>