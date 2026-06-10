<div class="flex min-h-screen bg-slate-50">
    
    <!-- ========================================== -->
    <!-- SIDEBAR PANEL NAVIGASI (Sisi Kiri)         -->
    <!-- ========================================== -->
    <div class="w-64 bg-[#0e1d82] text-white flex flex-col justify-between p-5 shrink-0 shadow-lg">
        <div>
            <!-- Header Brand & Logo Korporat -->
            <div class="flex items-center space-x-3 mb-8 border-b border-white/10 pb-4">
                <div class="bg-white text-[#0e1d82] px-2.5 py-1.5 rounded-lg font-black text-lg tracking-wider shadow-sm">
                    GIH
                </div>
                <div>
                    <div class="font-extrabold text-sm tracking-wide">GeoINHance</div>
                    <div class="text-[9px] text-slate-300 tracking-widest uppercase font-semibold">Sistem Kontrol</div>
                </div>
            </div>

            <!-- Kelompok Menu Navigasi -->
            <div class="space-y-6">
                <!-- KELOMPOK 1: PANEL NAVIGASI -->
                <div>
                    <div class="text-[10px] font-bold uppercase tracking-widest text-slate-400 px-3 mb-2">
                        PANEL NAVIGASI
                    </div>
                    <nav class="space-y-1">
                        <!-- Dashboard Utama -->
                        <a href="{{ route('dashboard') }}" 
                           class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-white text-[#0e1d82] font-bold shadow-sm' : 'text-slate-200 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                            </svg>
                            <span>Dashboard Utama</span>
                        </a>

                        <!-- Banner Slider Front -->
                        <a href="{{ route('admin.slider.index') }}" 
                           class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('admin.slider.*') ? 'bg-white text-[#0e1d82] font-bold shadow-sm' : 'text-slate-200 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Banner Slider Front</span>
                        </a>

                        <!-- Portofolio Proyek -->
                        <a href="{{ route('admin.project.index') }}" 
                           class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('admin.project.*') ? 'bg-white text-[#0e1d82] font-bold shadow-sm' : 'text-slate-200 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span>Portofolio Proyek</span>
                        </a>

                        <!-- Blog & News (Sudah Ditambahkan & Selaras) -->
                        <a href="{{ route('admin.blog.index') }}" 
                           class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('admin.blog.*') ? 'bg-white text-[#0e1d82] font-bold shadow-sm' : 'text-slate-200 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            <span>Blog & News</span>
                        </a>
                    </nav>
                </div>

                <!-- KELOMPOK 2: AKSES MANAJEMEN (Hanya muncul jika user login adalah superadmin) -->
                @if(auth()->check() && auth()->user()->role === 'superadmin')
                <div>
                    <div class="text-[10px] font-bold uppercase tracking-widest text-slate-400 px-3 mb-2">
                        AKSES MANAJEMEN
                    </div>
                    <nav class="space-y-1">
                        <!-- Kelola Akun Admin -->
                        <a href="{{ route('admin.kelola-admin.index') }}" 
                           class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition duration-200 {{ request()->routeIs('admin.kelola-admin.*') ? 'bg-white text-[#0e1d82] font-bold shadow-sm' : 'text-slate-200 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span>Kelola Akun Admin</span>
                        </a>
                    </nav>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar Bagian Bawah: Informasi Akun Dinamis & Tombol Logout -->
        <div class="border-t border-white/10 pt-4 space-y-3">
            <div class="px-3">
                <div class="font-bold text-sm tracking-wide truncate">{{ auth()->user()->name ?? 'Superadmin Geo' }}</div>
                <div class="text-[9px] text-amber-400 uppercase tracking-widest font-bold">{{ auth()->user()->role ?? 'SUPERADMIN' }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-2 px-3 py-2.5 text-xs font-bold text-red-200 hover:bg-red-700/20 hover:text-red-400 rounded-xl transition text-left cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Keluar Panel</span>
                </button>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- CONTENT WRAPPER (Sisi Kanan - Konten Utama) -->
    <!-- ========================================== -->
    <div class="content-wrapper flex-1 overflow-y-auto">
        <div class="content p-8">
            <div class="container-fluid">
                
                {{ $slot }}
                
            </div>
        </div>
    </div>

</div>