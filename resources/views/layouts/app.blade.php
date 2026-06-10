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
            
            <!-- ========================================== -->
            <!-- SIDEBAR PANEL NAVIGASI (Sisi Kiri)         -->
            <!-- ========================================== -->
            <aside class="w-64 bg-[#0e1d82] text-white flex flex-col justify-between shrink-0 border-r border-[#0c196e] shadow-lg z-10">
                <div class="p-5 flex flex-col h-full overflow-y-auto">
                    
                    <!-- Header Brand & Logo Korporat -->
                    <div class="flex items-center space-x-3 mb-8 border-b border-white/10 pb-5">
                        <div class="p-2 bg-white rounded-lg shadow-sm">
                            <span class="text-[#0e1d82] font-black text-lg tracking-tighter">GIH</span>
                        </div>
                        <div>
                            <span class="text-white font-bold text-sm block tracking-wide">GeoINHance</span>
                            <span class="text-[10px] text-[#cfdde9] block uppercase tracking-widest font-medium">Sistem Kontrol</span>
                        </div>
                    </div>

                    <!-- Kelompok Menu Navigasi -->
                    <nav class="flex-1 space-y-1">
                        <p class="px-3 text-[10px] font-bold text-[#cfdde9]/60 uppercase tracking-wider mb-2">Panel Navigasi</p>
                        
                        <!-- 1. Dashboard Utama -->
                        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('dashboard') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                            </svg>
                            Dashboard Utama
                        </a>

                        <!-- 2. Banner Slider Front -->
                        <a href="{{ route('admin.slider.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.slider.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 00.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            Banner Slider Front
                        </a>

                        <!-- 3. Portofolio Proyek -->
                        <a href="{{ route('admin.project.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.project.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Portofolio Proyek
                        </a>

                        <!-- 4. Blog & News (DITAMBAHKAN DI SINI) -->
                        <a href="{{ route('admin.blog.index') }}" class="flex items-center px-3 py-2.5 text-sm rounded-lg {{ request()->routeIs('admin.blog.*') ? 'bg-[#cfdde9] text-[#0e1d82] font-bold' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 20H4.5A1.5 1.5 0 013 18.5v-13A1.5 1.5 0 014.5 4h15A1.5 1.5 0 0121 5.5v13a1.5 1.5 0 01-1.5 1.5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h10M7 16h6" />
                            </svg>
                            Blog & News
                        </a>

                        <!-- Akses Manajemen Khusus Superadmin -->
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

                    <!-- Informasi Akun & Tombol Logout -->
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

            <!-- ========================================== -->
            <!-- CONTENT AREA (Sisi Kanan)                  -->
            <!-- ========================================== -->
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