<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karir & Budaya Kerja - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
        <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
                <span class="hidden sm:flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg> +62 851-9044-1744</span>
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
                <div class="leading-none" style="cursor: pointer;" onclick="window.location.href='{{ route('home') }}'">
                    <span class="font-black text-xl tracking-tighter text-slate-900 block uppercase">Geo<span class="text-red-800">INHance</span></span>
                    <span class="text-[9px] font-bold text-slate-500 tracking-[0.2em] uppercase">Engineering Solutions</span>
                </div>
            </div>

             <div class="hidden lg:flex items-center space-x-10 text-[12px] font-bold uppercase tracking-widest text-slate-600">
                <a href="/profil" class="nav-link hover:text-red-800 transition">Profil Perusahaan</a>
                
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
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Infrastruktur & Transportasi</a>
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
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">News & Events</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Video</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Case Study</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Document Library</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Resources</a>
                    </div>
                </div>

                <a href="/karir" class="nav-link hover:text-red-800 transition">Legalitas</a>
                <a href="/karir" class="nav-link text-red-800 active transition">Karir</a>
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
        </div>

        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden bg-white border-b border-slate-200 py-4 px-6 space-y-3 shadow-xl font-bold uppercase text-xs tracking-wider">
            <a href="/" class="block text-slate-600 hover:text-red-800 py-1">Beranda</a>
            <a href="/profil" class="block text-slate-600 hover:text-red-800 py-1">Profil Perusahaan</a>
            <a href="/proyek" class="block text-slate-600 hover:text-red-800 py-1">Proyek</a>
            <a href="/karir" class="block text-red-800 py-1">Karir</a>
            <a href="/kontak" class="block text-slate-600 hover:text-red-800 py-1">Kontak</a>
            <a href="{{ route('login') }}" class="block bg-slate-900 text-white text-center py-2.5 rounded shadow">Client Area</a>
        </div>
    </nav>
    <div class="pt-[95px]">
        
        <section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="relative z-10" data-aos="zoom-in">
                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3">Build Your Future With Us</span>
                <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">Karir & Budaya Kerja</h1>
                <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-300 text-sm max-w-xl mx-auto mt-6 leading-relaxed">
                    Bergabunglah bersama tim ahli rekayasa geoteknik dan pemetaan terintegrasi untuk melahirkan solusi infrastruktur masa depan Indonesia.
                </p>
            </div>
        </section>

        <section class="max-w-7xl mx-auto py-20 px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Why GeoINHance</span>
                <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Bertumbuh Bersama Nilai Kami</h2>
                <p class="text-slate-500 text-sm max-w-xl mx-auto mt-2">Kami menyediakan ekosistem kerja yang mendukung presisi teknis, inovasi berkelanjutan, dan pengembangan kompetensi karir jangka panjang.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl border border-slate-200 card-shadow group hover:border-red-800 transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center mb-6 group-hover:bg-red-800 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h3 class="font-black text-lg text-slate-900 uppercase tracking-tight mb-2">Inovasi Berbasis Data</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Kami mendorong tim untuk mengeksplorasi metodologi pemetaan udara terkini dan analisis geoteknik menggunakan komputasi mutakhir.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-slate-200 card-shadow group hover:border-red-800 transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center mb-6 group-hover:bg-red-800 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="font-black text-lg text-slate-900 uppercase tracking-tight mb-2">Integritas Profesional</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Keamanan bangunan dan ketepatan survei klien bergantung pada kejujuran olah data teknis insinyur kami di lapangan.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-slate-200 card-shadow group hover:border-red-800 transition duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center mb-6 group-hover:bg-red-800 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="font-black text-lg text-slate-900 uppercase tracking-tight mb-2">Kolaborasi Multidisiplin</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Sinergi penuh antara ahli teknik sipil, surveyor hidrografi, operator UAV, hingga tim manajemen operasional.</p>
                </div>
            </div>
        </section>

        <section class="bg-slate-100 py-20 px-6 border-t border-b border-slate-200">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16" data-aos="fade-up">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Alur Seleksi</span>
                    <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Proses Rekrutmen Kami</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 relative">
                    <div class="bg-white p-6 rounded-xl border border-slate-200 relative shadow-sm" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-3xl font-black text-red-800/20 mb-2">01</div>
                        <h4 class="font-bold text-slate-900 text-sm uppercase tracking-tight mb-2">Seleksi Berkas</h4>
                        <p class="text-slate-500 text-xs">Peninjauan CV, portofolio proyek kalkulasi struktural, atau riwayat survei lapangan.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-slate-200 relative shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-3xl font-black text-red-800/20 mb-2">02</div>
                        <h4 class="font-bold text-slate-900 text-sm uppercase tracking-tight mb-2">Asesmen Teknis</h4>
                        <p class="text-slate-500 text-xs">Tes studi kasus rekayasa teknis/geoteknik sesuai pemfokusan spesialisasi posisi.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-slate-200 relative shadow-sm" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-3xl font-black text-red-800/20 mb-2">03</div>
                        <h4 class="font-bold text-slate-900 text-sm uppercase tracking-tight mb-2">Wawancara Panel</h4>
                        <p class="text-slate-500 text-xs">Diskusi mendalam bersama tim manajemen operasional serta kepala divisi teknis.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-slate-200 relative shadow-sm" data-aos="fade-up" data-aos-delay="400">
                        <div class="text-3xl font-black text-red-800/20 mb-2">04</div>
                        <h4 class="font-bold text-slate-900 text-sm uppercase tracking-tight mb-2">Offering & Medical</h4>
                        <p class="text-slate-500 text-xs">Pemaparan penawaran kompensasi resmi dilanjutkan tes kesehatan fisik kerja.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-100 py-24 px-6 border-t border-b border-slate-200">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16" data-aos="fade-up">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Available Positions</span>
                    <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Peluang Karir Terbuka</h2>
                    <p class="text-slate-500 text-sm max-w-xl mx-auto mt-2">Temukan posisi yang sesuai dengan keahlian teknis dan visi profesional Anda.</p>
                </div>

                <div class="space-y-4" data-aos="fade-up">
                    <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 card-shadow flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="bg-red-50 text-red-800 text-[10px] font-bold uppercase px-3 py-1 rounded-full">Full-Time</span>
                                <span class="text-slate-400 text-xs flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Bandung (Studio Teknis)</span>
                            </div>
                            <h3 class="font-black text-xl text-slate-900 tracking-tight">Senior Geotechnical Engineer</h3>
                            <p class="text-slate-500 text-xs mt-1">Minimal 5 tahun pengalaman, terbiasa merancang analisis stabilitas lereng, fondasi dalam, dan pemodelan PLAXIS.</p>
                        </div>
                        <a href="#apply-form" class="w-full md:w-auto bg-[#002d62] text-white text-center font-bold text-xs uppercase px-6 py-3.5 rounded-xl hover:bg-red-800 transition duration-300 shrink-0">
                            Lamar Posisi
                        </a>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 card-shadow flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="bg-red-50 text-red-800 text-[10px] font-bold uppercase px-3 py-1 rounded-full">Full-Time</span>
                                <span class="text-slate-400 text-xs flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Jakarta / Lapangan Project</span>
                            </div>
                            <h3 class="font-black text-xl text-slate-900 tracking-tight">UAV Pilot & Mapping Specialist</h3>
                            <p class="text-slate-500 text-xs mt-1">Memiliki sertifikasi pilot drone (DKPPU), menguasai fotogrametri, pengolahan data LiDAR, dan GIS Mapping.</p>
                        </div>
                        <a href="#apply-form" class="w-full md:w-auto bg-[#002d62] text-white text-center font-bold text-xs uppercase px-6 py-3.5 rounded-xl hover:bg-red-800 transition duration-300 shrink-0">
                            Lamar Posisi
                        </a>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 card-shadow flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="bg-amber-50 text-amber-800 text-[10px] font-bold uppercase px-3 py-1 rounded-full">Internship</span>
                                <span class="text-slate-400 text-xs flex items-center"><svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> Bandung (Studio Teknis)</span>
                            </div>
                            <h3 class="font-black text-xl text-slate-900 tracking-tight">Laboratory Technician Intern</h3>
                            <p class="text-slate-500 text-xs mt-1">Mahasiswa akhir/lulusan baru Teknik Sipil / Geologi untuk pengujian laboratorium tanah (Triaxial, Consolidation).</p>
                        </div>
                        <a href="#apply-form" class="w-full md:w-auto bg-[#002d62] text-white text-center font-bold text-xs uppercase px-6 py-3.5 rounded-xl hover:bg-red-800 transition duration-300 shrink-0">
                            Lamar Posisi
                        </a>
                    </div>
                </div>

                <div class="mt-8 text-center text-xs text-slate-500">
                    Tidak menemukan posisi yang cocok? Anda dapat mengirimkan aplikasi umum ke <span class="font-bold text-red-800">hrd@geoinhance.com</span>
                </div>
            </div>
        </section>

        <section id="apply-form" class="max-w-4xl mx-auto py-24 px-6">
            <div class="bg-white p-8 md:p-12 rounded-3xl border border-slate-200 shadow-xl" data-aos="fade-up">
                <div class="mb-8">
                    <h3 class="text-2xl font-black uppercase text-slate-900 tracking-tight mb-2">Kirim Lamaran Digital</h3>
                    <p class="text-slate-500 text-xs">Isi data diri Anda dengan lengkap dan lampirkan Curriculum Vitae (CV) terbaru beserta portofolio proyek (jika ada).</p>
                </div>
                
                <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Nama Lengkap *</label>
                            <input type="text" required placeholder="Contoh: John Doe" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Alamat Email *</label>
                            <input type="email" required placeholder="nama@email.com" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Nomor Telepon / WhatsApp *</label>
                            <input type="tel" required placeholder="0812xxxxxxx" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Posisi Yang Dilamar *</label>
                            <select required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                                <option value="" disabled selected>Pilih Posisi Target</option>
                                <option value="senior-geotechnic">Senior Geotechnical Engineer</option>
                                <option value="uav-mapping">UAV Pilot & Mapping Specialist</option>
                                <option value="lab-technician-intern">Laboratory Technician Intern</option>
                                <option value="general-application">Aplikasi Umum / Posisi Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Tautan Portofolio / LinkedIn (Opsional)</label>
                        <input type="url" placeholder="https://linkedin.com/in/username" 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">Dokumen CV & Berkas Pendukung * (PDF, Maks 5MB)</label>
                        <div class="border-2 border-dashed border-slate-200 hover:border-red-800 rounded-xl p-6 text-center cursor-pointer bg-slate-50 transition relative">
                            <input type="file" required accept=".pdf" class="absolute inset-0 opacity-0 cursor-pointer">
                            <svg class="w-8 h-8 text-slate-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <span class="text-xs font-medium text-slate-600 block">Klik atau seret file PDF Anda ke area ini</span>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="w-full sm:w-auto bg-red-800 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 rounded-xl shadow-lg hover:bg-slate-900 transition-all duration-300 transform hover:-translate-y-0.5">
                            Kirim Berkas Lamaran
                        </button>
                    </div>
                </form>
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
                    <p class="text-slate-400 text-sm mb-2">P: +62 851-9044-1744</p>
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

    <a href="https://wa.me/085190441744" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    @livewireScripts
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50
            });
        });
    </script>
</body>
</html>