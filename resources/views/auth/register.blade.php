<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Klien - PT GeoINHance Solusi Rekayasa</title>
    
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
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900 min-h-screen flex items-center justify-center p-4 md:p-6">

    <div class="w-full max-w-5xl h-auto md:h-[650px] bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-2xl flex flex-col md:flex-row" data-aos="zoom-in" data-aos-duration="600">
        
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
                <span class="text-red-500 font-bold uppercase text-[10px] tracking-[0.3em] block">Sistem Kemitraan Digital</span>
                <h2 class="text-2xl font-black uppercase tracking-tight leading-tight">Daftarkan Perusahaan <br>& Proyek Anda</h2>
                <p class="text-slate-300 text-xs mt-2 leading-relaxed max-w-sm">Dapatkan akses eksklusif ke Client Portal untuk memantau pengerjaan geoteknik, laporan topografi, manajemen data uji laboratorium, serta transparansi progres proyek dalam satu dasbor terintegrasi.</p>
            </div>

            <div class="text-[10px] text-slate-400 uppercase tracking-wider relative z-10">
                © 2026 PT GeoINHance Solusi Rekayasa
            </div>

            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-red-800/30 rounded-full filter blur-3xl"></div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative bg-white">
            
            <div class="flex items-center mb-6 md:hidden">
                <div class="bg-red-800 p-1.5 rounded-lg mr-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="font-black text-lg tracking-tighter text-slate-900 uppercase">Geo<span class="text-red-800">INHance</span></span>
            </div>

            <div class="mb-5">
                <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight">Buat Akun Baru</h3>
                <p class="text-slate-500 text-xs mt-1">Lengkapi data berikut untuk mendaftarkan akun Klien Resmi.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
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
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Nama Lengkap / Perusahaan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="PT Sukses Mandiri / Jhon Doe" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Alamat Email Perusahaan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="klien@perusahaan.com" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" x-data="{ show: false }">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Password Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" id="password" name="password" required autocomplete="new-password" placeholder="••••••••" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500">Konfirmasi Password</label>
                            <button type="button" @click="show = !show" class="text-[9px] font-bold text-slate-400 hover:text-slate-600 uppercase tracking-wider focus:outline-none">
                                <span x-text="show ? 'Sembunyikan' : 'Lihat Sandi'"></span>
                            </button>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition tracking-wide">
                        </div>
                    </div>
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full bg-red-800 hover:bg-red-900 text-white font-bold uppercase text-xs tracking-widest py-3.5 rounded-xl shadow-lg transition duration-300 transform hover:-translate-y-0.5 focus:outline-none">
                        Daftarkan Akun Klien
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-xs text-slate-500">
                Sudah memiliki akun resmi? 
                <a href="{{ route('login') }}" class="text-red-800 font-bold hover:underline ml-1">Log In Area</a>
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