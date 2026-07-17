<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GeoINHance Admin') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/admin.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-[#f8fafc]">
        
        <div class="flex h-screen overflow-hidden">
            
            <aside class="w-64 bg-[#0e1d82] text-white flex flex-col justify-between shrink-0 border-r border-[#0c196e] shadow-lg z-10">
                <div class="p-5 flex flex-col h-full overflow-y-auto">
                    
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('images/logo_inh.png') }}" alt="GeoINHance Logo" class="h-30 w-60 object-contain">
                    </div>

                    <nav class="flex-1 space-y-1">
                        <p class="px-3 text-[10px] font-bold text-[#cfdde9]/60 uppercase tracking-wider mb-2">Panel Navigasi</p>
                        
                        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('dashboard') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                            </svg>
                            Dashboard Utama
                        </a>

                        <a href="{{ route('admin.slider.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.slider.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 00.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            Banner Slider Front
                        </a>

                        {{-- 🟢 MODUL BARU: KELOLA DATA PRODUK (DI ATAS PORTOFOLIO PROYEK) --}}
                        <a href="{{ route('admin.products.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.products.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            Kelola Produk 
                        </a>

                        <a href="{{ route('admin.project-pages.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.project-pages.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Portofolio Proyek
                        </a>

                        <a href="{{ route('admin.sector.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.sector.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Kelola Sektor
                        </a>

                        <a href="{{ route('admin.blog.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.blog.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 20H4.5A1.5 1.5 0 013 18.5v-13A1.5 1.5 0 014.5 4h15A1.5 1.5 0 0121 5.5v13a1.5 1.5 0 01-1.5 1.5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h10M7 16h6" />
                            </svg>
                            News & Event 
                        </a>

                        <a href="{{ route('admin.articles.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.articles.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            Artikel & Insight
                        </a>

                        {{-- 🛠️ PERBAIKAN DI SINI: Mengarah ke rute admin.branches.index yang benar --}}
                        <a href="{{ route('admin.branches.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.branches.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            Peta Proyek
                        </a>

                        <a href="{{ route('admin.video.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.video.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            Manajemen Video
                        </a>

                        <a href="{{ route('admin.studi-kasus.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.studi-kasus.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Manajemen Case Study
                        </a>

                        <a href="{{ route('admin.syllabus.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.syllabus.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            Kelola Silabus & Materi
                        </a>

                        {{-- 🟢 MODIFIKASI: Menu Manajemen Training (Dengan Badge Notifikasi) --}}
                        <a href="{{ route('admin.training.index') }}" class="flex items-center justify-between px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.training.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <div class="flex items-center min-w-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="truncate">Manajemen Training</span>
                            </div>
                            @if(isset($pendingTrainingsCount) && $pendingTrainingsCount > 0)
                                <span class="ml-2 inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-red-500 rounded-full animate-pulse shrink-0">
                                    {{ $pendingTrainingsCount }}
                                </span>
                            @endif
                        </a>

                        {{-- 🟢 MODIFIKASI: Menu Pesan Masuk (Dengan Badge Notifikasi) --}}
                        <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.messages.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <div class="flex items-center min-w-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="truncate">Pesan Masuk</span>
                            </div>
                            @if(isset($unreadMessagesCount) && $unreadMessagesCount > 0)
                                <span class="ml-2 inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-red-500 rounded-full animate-pulse shrink-0">
                                    {{ $unreadMessagesCount }}
                                </span>
                            @endif
                        </a>

                        @if(auth()->check() && auth()->user()->role === 'superadmin')
                            <div class="pt-4 mt-4 border-t border-white/10">
                                <p class="px-3 text-[10px] font-bold text-[#cfdde9]/60 uppercase tracking-wider mb-2">Akses Manajemen</p>
                                <a href="{{ route('admin.kelola-admin.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.kelola-admin.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    Kelola Akun Admin
                                </a>
                            </div>
                        @endif
                    </nav>

                    <div class="mt-auto border-t border-white/10 pt-4 space-y-3">
                        <div class="px-3">
                            <span class="text-xs font-semibold text-white block truncate">{{ auth()->user()->name }}</span>
                            <span class="text-[10px] text-[#cfdde9] font-medium uppercase tracking-widest block">{{ auth()->user()->role }}</span>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-3 py-2 text-xs font-medium text-red-300 hover:bg-red-800/30 rounded-lg transition-all text-left">
                                <svg class="w-4 h-4 mr-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                Keluar Panel
                            </button>
                        </form>
                    </div>
                </div>
            </aside>

            <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
                
                @if (isset($header))
                    <header class="bg-white border-b border-slate-200 py-5 px-8 shrink-0">
                        <div class="max-w-7xl">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main class="p-8 flex-1 overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>