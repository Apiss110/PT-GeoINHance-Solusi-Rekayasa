<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Interaktif - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Navbar Blur Effect */
        .nav-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }
        /* Underline animation */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #991b1b;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }
        /* Custom Shadow for clean look */
        .card-shadow {
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
        }
        /* Anti-flicker utility for Alpine */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900" x-data="{ mobileMenuOpen: false, mobileDropdownOpen: false }">

    <nav class="fixed w-full z-[100] transition-all duration-300">
        <div class="bg-[#002d62] text-white/90 py-2 px-6 md:px-16 text-[11px] flex justify-between items-center tracking-wider">
            <div class="flex items-center space-x-8">
                <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path></svg> Bandung, West Java</span>
                <span class="hidden sm:flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg> +62 21 2788 1958</span>
            </div>
            <div class="flex items-center space-x-4 font-bold">
                <a href="#" class="hover:text-yellow-500 transition">ID</a>
                <span class="opacity-20">|</span>
                <a href="#" class="hover:text-yellow-500 transition">EN</a>
            </div>
        </div>

        <div class="nav-glass border-b border-slate-200 py-4 px-6 md:px-16 flex justify-between items-center shadow-sm">
            <div class="flex items-center">
                <div class="bg-red-800 p-1.5 rounded-md mr-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div class="leading-none" style="cursor: pointer;" onclick="window.location.href='/'">
                    <span class="font-black text-xl tracking-tighter text-slate-900 block uppercase">Geo<span class="text-red-800">INHance</span></span>
                    <span class="text-[9px] font-bold text-slate-500 tracking-[0.2em] uppercase">Engineering Solutions</span>
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-10 text-[12px] font-bold uppercase tracking-widest text-slate-600">
                <a href="#" class="nav-link text-red-800 active transition">Profil Perusahaan</a>
                
                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link hover:text-red-800 flex items-center space-x-1 focus:outline-none">
                        <span>SEKTOR</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute left-0 mt-4 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal" 
                         x-cloak>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Pertambangan</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Oil & Gas</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Energi</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Agriculture</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Infrakstruktur & Transportasi</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Jalur Kereta Api</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Kawasan Bandar Udara</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Kawasan Pelabuhan</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Kawasan Industri</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Kawasan Pariwisata</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Area Perumahan</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Pusat Pendidikan</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Pusat Olahraga</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Daerah Aliran Sungai</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Sektor</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link hover:text-red-800 flex items-center space-x-1 focus:outline-none">
                        <span>PRODUK</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute left-0 mt-4 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal" 
                         x-cloak>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geogrid</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geogrid InterAx</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geogrid TriAx</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geogrid Biaxial</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geogrid Uniaxial</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Multiblock Retaining Wall System</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">SierraScape Retaining Wall System</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Wraparound System</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geocell</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geomembrance</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geotextile</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Zipdram</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Stripdram</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">VMax Erosion Control</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Monitoring Jarak Jauh (InSAR)</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Produk</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link hover:text-red-800 flex items-center space-x-1 focus:outline-none">
                        <span>PROYEK</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute left-0 mt-4 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal" 
                         x-cloak>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Tensar TriAx GeoGrid</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Tensar Biaxial GeoGrid</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Tensar Uniaxial GeoGrid</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geomembrane</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geotextile</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">MultiBlock Retaining Wall System</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Sierrascape Retaining Wall System</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Wraparound System</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">VMax Erosion Control</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Proyek</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link hover:text-red-800 flex items-center space-x-1 focus:outline-none">
                        <span>RESOURCES</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute left-0 mt-4 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal" 
                         x-cloak>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Multibangun Engineering Hub</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Articles</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">New & Event</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Video</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Case Study</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Document Library</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Resources</a>
                    </div>
                </div>
                <a href="/karir" class="nav-link hover:text-red-800 transition">Legalitas</a>
                <a href="/karir" class="nav-link hover:text-red-800 transition">Karir</a>
                <a href="/kontak" class="nav-link hover:text-red-800 transition">Kontak</a>
                
                @auth
                    <div class="relative" x-data="{ userOpen: false }" @click.away="userOpen = false">
                        <button @click="userOpen = !userOpen" class="flex items-center space-x-2.5 bg-slate-100 hover:bg-slate-200 border border-slate-200 py-1.5 px-3.5 rounded-xl transition duration-200 focus:outline-none normal-case tracking-normal">
                            <div class="w-6 h-6 bg-red-800 text-white rounded-full flex items-center justify-center font-bold text-[10px] uppercase shadow-sm shrink-0">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            
                            <div class="text-left leading-none">
                                <span class="block text-xs font-black text-slate-800 truncate max-w-[100px]">{{ Auth::user()->name }}</span>
                                <span class="block text-[8px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">{{ Auth::user()->role ?? 'Client' }}</span>
                            </div>

                            <svg class="w-3 h-3 text-slate-400 transition-transform duration-200 shadow-none" :class="userOpen ? 'transform rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="userOpen" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white border border-slate-200 rounded-xl shadow-xl overflow-hidden py-1 z-50 normal-case font-semibold text-slate-700 tracking-normal" 
                             x-cloak>
                            
                            <a href="{{ Auth::user()->role === 'admin' ? url('/dashboard') : url('/client/dashboard') }}" class="flex items-center space-x-2 px-4 py-2.5 text-xs hover:bg-slate-50 hover:text-red-800 transition">
                                <span class="material-symbols-outlined text-slate-400 text-sm">dashboard</span>
                                <span>Dasbor Panel</span>
                            </a>

                            <hr class="border-slate-100 my-1">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2.5 text-xs text-red-700 font-bold hover:bg-red-50 text-left transition">
                                    <span class="material-symbols-outlined text-red-600 text-sm">logout</span>
                                    <span>Keluar Sistem</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-slate-900 text-white px-6 py-2.5 rounded shadow-lg hover:bg-red-800 transition-all duration-300 transform hover:-translate-y-0.5">
                        Client Area
                    </a>
                @endauth
            </div>

            <div class="lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden bg-white border-b border-slate-200 py-4 px-6 space-y-3 shadow-xl font-bold uppercase text-xs tracking-wider" 
             x-cloak>
            <a href="#" class="nav-link text-red-800 font-black">Profil Perusahaan</a>
            <a href="/" class="block text-slate-600 hover:text-red-800 py-1">Beranda</a>
            <div class="space-y-1">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen" class="w-full flex justify-between items-center hover:text-red-800 py-1 text-left focus:outline-none">
                    <span>Sektor</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="mobileDropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="mobileDropdownOpen" class="pl-4 border-l border-slate-200 space-y-2.5 py-1.5 normal-case font-semibold text-slate-500 text-[11px]" x-cloak>
                    <a href="#" @click="mobileMenuOpen = false" class="block hover:text-red-800">Profil Perusahaan</a>
                    <a href="#visi-misi" @click="mobileMenuOpen = false" class="block hover:text-red-800">Visi & Misi</a>
                    <a href="#alamat-kantor" @click="mobileMenuOpen = false" class="block hover:text-red-800">Lokasi Kantor</a>
                </div>
            </div>
            
            <a href="/#services" class="block text-slate-600 hover:text-red-800 py-1">Layanan</a>
            <a href="/#portfolio" class="block text-slate-600 hover:text-red-800 py-1">Proyek</a>

            @auth
                <a href="{{ Auth::user()->role === 'admin' ? url('/dashboard') : url('/client/dashboard') }}" class="block bg-slate-100 text-slate-800 text-center py-2.5 rounded font-black">Dasbor Panel</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-50 text-red-700 text-center py-2.5 rounded font-bold">Keluar Sistem</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block bg-slate-900 text-white text-center py-2.5 rounded shadow">Client Area</a>
            @endauth
        </div>
    </nav>

<div class="pt-[95px]">
    
    <!-- 1. SECTION: HERO / JUMBOTRON (DARK CENTERED) -->
    <section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative z-10" data-aos="zoom-in">
            <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">Platform Solusi Geoteknik</span>
            <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">Profil Perusahaan</h1>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
        </div>
    </section>

    <!-- 2. SECTION: WHO WE ARE (SPLIT GRID) -->
    <section class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Who We Are</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                    Mengenal Lebih Dekat <br><span class="text-red-800">GeoINHance</span>
                </h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    PT Geoinhance Solusi Rekayasa adalah perusahaan profesional yang berspesialisasi dalam teknik geoteknik dan teknologi teknik sipil, menyediakan solusi teknik yang akurat, andal, dan berbasis sains untuk mendukung pembangunan infrastruktur yang aman dan berkelanjutan.
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    Kami memulai bisnis ini pada tahun 2019 dan secara resmi mendirikan perusahaan pada tahun 2025. Kami bertindak sebagai mitra teknis strategis dalam mengatasi tantangan tanah dan struktural yang kompleks. Dengan mengintegrasikan pengalaman lapangan, analisis numerik tingkat lanjut, serta kepatuhan terhadap standar nasional dan internasional, Geoinhance ensures bahwa setiap keputusan teknik yang diambil tepat secara teknis, efisien, dan dapat dipertanggungjawabkan.
                </p>

                <div class="grid grid-cols-3 gap-4 border-t border-slate-200 pt-6">
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">12+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Thn Pengalaman</span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">250+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Proyek Selesai</span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">40+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Insinyur Ahli</span>
                    </div>
                </div>
            </div>
            
            <div class="relative group" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-slate-200 bg-slate-900">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800" alt="Bangunan Kantor PT GeoINHance" class="w-full h-[480px] object-cover group-hover:scale-110 group-hover:opacity-40 transition duration-700">
                    
                    <div class="absolute inset-0 flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                        <span class="text-red-500 font-bold uppercase text-[10px] tracking-widest mb-1">Kantor Pusat</span>
                        <h4 class="text-white font-black text-xl uppercase tracking-wide">Menara Sentraya Lt. 11</h4>
                        <p class="text-slate-300 text-xs mt-2 leading-relaxed">Pusat manajemen operasional, integrasi Big Data Geoteknik, dan sistem kendali mutu aplikasi web GeoINHance.</p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-red-800/10 rounded-full blur-2xl -z-10"></div>
            </div>
        </div>
    </section>

    <!-- 3. SECTION: VISI MISI PERUSAHAAN (CENTERED + TABS ACCENT BUFFER) -->
    <section id="visi-misi" class="bg-slate-100 py-24 px-6 border-t border-b border-slate-200" x-data="{ activeTab: 'visi' }">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Arah & Komitmen</span>
                <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Prinsip Kerja Kami</h2>
            </div>

            <div class="flex justify-center space-x-4 mb-8">
                <button @click="activeTab = 'visi'" 
                        :class="activeTab === 'visi' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                        class="px-8 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                    Visi Perusahaan
                </button>
                <button @click="activeTab = 'misi'" 
                        :class="activeTab === 'misi' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                        class="px-8 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                    Misi Perusahaan
                </button>
            </div>

            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-200 min-h-[220px] flex items-center relative overflow-hidden">
                <!-- Konten Visi -->
                <div x-show="activeTab === 'visi'" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-x-8"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="w-full flex flex-col md:flex-row items-start gap-6">
                    <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-black uppercase text-slate-900 tracking-tight mb-3">MENYEDIAKAN SOLUSI GEOTEKNIK TERBAIK & TEPERCAYA</h3>
                        <p class="text-slate-600 text-base leading-relaxed">
                            Menjadi penyedia solusi teknik geoteknik dan teknologi sipil paling tepercaya, yang menghadirkan infrastruktur aman, inovatif, dan berkelanjutan serta memenuhi standar nasional maupun internasional.
                        </p>
                    </div>
                </div>

                <!-- Konten Misi -->
                <div x-show="activeTab === 'misi'" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 -translate-x-8"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="w-full space-y-4" x-cloak>
                    <h3 class="text-xl font-black uppercase text-slate-900 tracking-tight mb-3">LANGKAH STRATEGIS DAN KOMITMEN NYATA KAMI</h3>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">1</div>
                        <p class="text-slate-600 text-sm leading-relaxed pt-1">Menyediakan layanan konsultasi geoteknik yang akurat dan andal</p>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">2</div>
                        <p class="text-slate-600 text-sm leading-relaxed pt-1">Menyediakan solusi teknik & perangkat lunak (software) berbasis teknologi</p>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">3</div>
                        <p class="text-slate-600 text-sm leading-relaxed pt-1">Mengembangkan sumber daya manusia yang kompeten melalui pelatihan</p>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">4</div>
                        <p class="text-slate-600 text-sm leading-relaxed pt-1">Melakukan penyelidikan geoteknik & pengujian laboratorium yang berkualitas tinggi</p>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">5</div>
                        <p class="text-slate-600 text-sm leading-relaxed pt-1">Membangun kemitraan jangka panjang dengan klien dan pemangku kepentingan (stakeholders)</p>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">6</div>
                        <p class="text-slate-600 text-sm leading-relaxed pt-1">Menerapkan sistem manajemen K3 (Keselamatan dan Kesehatan Kerja), lingkungan, serta anti-penyuapan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. SECTION: KEAHLIAN & PENDEKATAN KAMI (ALTERNATING ZIG-ZAG GRID) -->
    <section class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto space-y-24">
            
            <!-- BARIS 1: KEAHLIAN KAMI (Kiri: Foto, Kanan: Teks) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">
                <div class="w-full h-[320px] md:h-[400px] rounded-2xl overflow-hidden shadow-sm border border-slate-200/60" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800" alt="Analisis Geoteknik GeoINHance" class="w-full h-full object-cover">
                </div>
                
                <div data-aos="fade-left">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Kapabilitas Utama</span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                        Keahlian <br><span class="text-red-800">Kami</span>
                    </h2>
                    <p class="text-slate-600 mb-4 leading-relaxed font-normal">
                        GeoINHance memiliki keahlian yang kuat dalam analisis geoteknik tingkat lanjut, termasuk Finite Element Method (FEM) 2D dan 3D, pemodelan numerik, analisis respons seismik, serta penilaian stabilitas tanah.
                    </p>
                    <p class="text-slate-600 leading-relaxed font-normal">
                        Kapabilitas ini memungkinkan kami untuk mengevaluasi interaksi tanah-struktur secara realistis, bahkan pada proyek dengan risiko tinggi dan kondisi geologi yang menantang.
                    </p>
                </div>
            </div>

            <!-- BARIS 2: PENDEKATAN KAMI (Kiri: Teks, Kanan: Foto) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center pt-4">
                <div class="order-2 md:order-1" data-aos="fade-right">
                    <span class="text-[#002d62] font-bold uppercase text-xs tracking-[0.3em] block mb-2">Strategi Eksekusi</span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                        Pendekatan <br><span class="text-[#002d62]">Kami</span>
                    </h2>
                    <p class="text-slate-600 mb-4 leading-relaxed font-normal">
                        Kami believe bahwa solusi rekayasa yang efektif harus kuat secara teknis, praktis, dan berorientasi pada target proyek. Oleh karena itu, layanan kami diberikan melalui pendekatan yang terintegrasi dan dipersonalisasi.
                    </p>
                    <p class="text-slate-600 leading-relaxed font-normal">
                        Seluruh proses didukung oleh komunikasi satu pintu melalui Project Manager khusus untuk menjamin standar kualitas terbaik, keselamatan kerja, serta ketepatan waktu penyelesaian proyek Anda.
                    </p>
                </div>
                
                <div class="w-full h-[320px] md:h-[400px] rounded-2xl overflow-hidden shadow-sm border border-slate-200/60 order-1 md:order-2" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1590069261209-f8e9b8642343?w=800" alt="Manajemen Proyek GeoINHance" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- 5. SECTION: KOMITMEN KAMI (CLEAN LIGHT CENTERED WITH CARD CONTRAST) -->
    <section class="bg-slate-50/70 py-20 px-6 border-t border-b border-slate-100">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Nilai & Tanggung Jawab</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 uppercase tracking-tight">
                    Komitmen Kami
                </h2>
                <div class="w-16 h-[2px] bg-red-800 mx-auto mt-4"></div>
                
                <p class="text-slate-600 mt-6 leading-relaxed font-normal text-sm md:text-base">
                    Dengan pengalaman luas di berbagai sektor infrastruktur seperti jalan tol, jembatan, pelabuhan, bandara, jalur kereta api, bangunan gedung, hingga fasilitas energi, GeoINHance berkomitmen penuh menjadi mitra teknis strategis melalui tiga pilar utama:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12" data-aos="fade-up" data-aos-delay="100">
                <!-- Kartu 01 -->
                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">01 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">Optimasi Keputusan</h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        Meningkatkan kualitas pengambilan keputusan teknik (<span class="font-semibold text-slate-800">engineering decision-making</span>) secara presisi, akurat, dan berbasis data ilmiah.
                    </p>
                </div>

                <!-- Kartu 02 -->
                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">02 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">Mitigasi Risiko</h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        Meminimalkan risiko konstruksi serta memitigasi potensi permasalahan stabilitas tanah dan geoteknik yang kompleks langsung di lapangan.
                    </p>
                </div>

                <!-- Kartu 03 -->
                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">03 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">Infrastruktur Berkelanjutan</h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        Mendukung penuh pengembangan infrastruktur nasional yang tangguh, mengutamakan aspek keamanan tinggi, serta berkelanjutan jangka panjang.
                    </p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto text-center border-t border-slate-200 pt-8" data-aos="fade-up" data-aos-delay="200">
                <p class="text-slate-500 text-xs leading-relaxed font-normal">
                    Sejalan dengan visi utama perusahaan, kami terus memperkuat kapabilitas teknis, pengembangan sumber daya manusia, serta inovasi teknologi. Langkah ini berjalan beriringan dengan konsistensi kami dalam menerapkan prinsip Keselamatan dan Kesehatan Kerja (K3), perlindungan lingkungan, serta tata kelola perusahaan yang baik (*good corporate governance*).
                </p>
            </div>
        </div>
    </section>

    <!-- SECTION: CTA DOWNLOAD COMPANY PROFILE (ULTRA CLEAN BUTTON ONLY) -->
<section class="py-12 px-6 text-center bg-white">
    <div class="max-w-md mx-auto" data-aos="fade-up">
        
        <a href="{{ asset('documents/COMPANY PROFILE GEOINHANCE.pdf') }}" class="inline-flex items-center justify-center space-x-3 bg-red-800 hover:bg-red-700 text-white font-bold uppercase text-xs tracking-widest px-8 py-4 rounded-xl shadow-md hover:shadow-red-800/30 transition-all duration-300 transform hover:-translate-y-0.5 group w-full sm:w-auto">
            <span>Download Company Profile</span>
            <svg class="w-4 h-4 transform group-hover:translate-y-0.5 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
        </a>
        
    </div>
</section>

    <!-- 6. SECTION: ALAMAT KANTOR & MAPS (SPLIT GRID) -->
    <section id="alamat-kantor" class="bg-white py-24 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Location</span>
                <h2 class="text-3xl font-black text-slate-900 uppercase mb-6 tracking-tight">Kantor Operasional</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 hover:shadow-md transition duration-300 cursor-pointer group">
                        <div class="text-red-800 mt-1 group-hover:scale-110 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 group-hover:text-red-800 transition">Alamat Surat / Operasional</h4>
                            <p class="text-slate-600 text-sm mt-1 leading-relaxed">
                                Menara Sentraya Lt. 11 Unit A4, <br>
                                Jl. Iskandarsyah Raya, Jakarta Selatan, DKI Jakarta.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 hover:shadow-md transition duration-300 cursor-pointer group">
                        <div class="text-red-800 mt-1 group-hover:scale-110 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 group-hover:text-red-800 transition">Studio Teknis</h4>
                            <p class="text-slate-600 text-sm mt-1 leading-relaxed">
                                Jl. Ir. H. Juanda No. 123, Dago, Kota Bandung, West Java.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="h-96 rounded-3xl overflow-hidden shadow-xl border border-slate-200" data-aos="fade-left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2736184581457!2d106.80164807603417!3d-6.22761356098628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14fc2ff6113%3A0xc6c7674681643cb0!2sMenara%20Sentraya!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                        class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</div>

        <footer class="bg-[#001a33] text-white pt-20 pb-10 px-6">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-white/10 pb-16">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-6">
                        <div class="bg-red-800 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <span class="font-black text-2xl tracking-tighter uppercase">Geo<span class="text-red-800">INHance</span></span>
                    </div>
                    <p class="text-slate-400 leading-relaxed mb-8 max-w-sm">
                        Menyediakan layanan konsultasi rekayasa teknik dan geoteknik kelas dunia dengan integritas dan akurasi tinggi di seluruh Indonesia.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.linkedin.com/company/geoinhance/" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/geoinhance/" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@geoinhance" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.tiktok.com/@geoinhance" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-8">Navigasi</h4>
                    <ul class="space-y-4 text-slate-400 text-sm">
                        <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="/#services" class="hover:text-white transition">Layanan Kami</a></li>
                        <li><a href="/#portfolio" class="hover:text-white transition">Proyek Strategis</a></li>
                        <li><a href="/karir" class="hover:text-white transition">Karir Perusahaan</a></li>
                        <li><a href="/kontak" class="hover:text-white transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-8">Kantor Pusat</h4>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        Menara Sentraya Lt. 11 Unit A4, <br>
                        Jl. Iskandarsyah Raya, Jakarta Selatan.
                    </p>
                    <p class="text-slate-400 text-sm mb-2">P: +62 21 2788 1958</p>
                    <p class="text-slate-400 text-sm text-red-500 font-bold">E: info@geoinhance.com</p>
                </div>
            </div>
            
            <div class="max-w-7xl mx-auto pt-8 flex flex-col md:flex-row justify-between items-center text-[10px] text-slate-500 uppercase tracking-[0.2em]">
                <p>© 2026 PT GeoINHance Solusi Rekayasa. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="{{ url('/privacy-policy') }}" class="hover:text-red-800 transition-colors">Privacy Policy</a>
                    <a href="{{ url('/terms-of-service') }}" class="hover:text-red-800 transition-colors">Terms of Service</a>
                </div>
            </div>
        </footer>

    <a href="https://wa.me/6285720062009" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi library animasi AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Handler Smooth Scroll Murni untuk navigasi hash internal (#visi-misi, #alamat-kantor)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if(targetId !== '#') {
                    e.preventDefault();
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        // Offset dikurangi 100 agar pas dengan sticky navbar tinggi
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>