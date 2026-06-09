<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAXIS 3D - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
<body class="bg-slate-50 font-sans antialiased text-slate-900" x-data="{ mobileMenuOpen: false, mobileDropdownOpen: false, mobileProductDropdownOpen: false }">

    <!-- TOPBAR & NAVBAR -->
<nav class="fixed w-full z-[100] transition-all duration-300 ">
        <div class="bg-[#002d62] text-white/90 py-2 px-6 md:px-16 text-[11px] flex justify-between items-center tracking-wider">
            <div class="flex items-center space-x-8">
                <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path></svg> Bandung, West Java</span>
                <span class="hidden sm:flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg> +62 851-9044-1744</span>
            </div>
            <div class="flex space-x-2 text-xs font-bold">
                <a href="{{ route('lang.switch', 'id') }}" 
                class="{{ App::getLocale() == 'id' ? 'text-red-800' : 'text-slate-400 hover:text-slate-600' }}">
                ID
                </a>
                <span class="text-slate-300">|</span>
                <a href="{{ route('lang.switch', 'en') }}" 
                class="{{ App::getLocale() == 'en' ? 'text-red-800' : 'text-slate-400 hover:text-slate-600' }}">
                EN
                </a>
            </div>
        </div>

        <div class="nav-glass border-b border-slate-200 py-4 px-6 md:px-16 flex justify-between items-center shadow-sm">
            <div class="flex items-center">
                <div class="leading-none" style="cursor: pointer;" onclick="window.location.href='/'">
                    <!-- <span class="font-black text-xl tracking-tighter text-slate-900 block uppercase">Geo<span class="text-red-800">INHance</span></span> -->
                    <img src="images/inh 2.png" alt="GeoINHance Logo" class="h-30 w-60 object-contain">
                    <!-- <span class="text-[9px] font-bold text-slate-500 tracking-[0.2em] uppercase">geotechnical insights, engineering solutions</span> -->
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-8 text-[12px] font-bold uppercase tracking-widest text-slate-600">
                <a href="/profil"  class="nav-link transition
                    {{ request()->is('profil') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">Profil Perusahaan</a>
                
                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button  class="nav-link flex items-center space-x-1
                    {{ request()->is('sektor/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
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
                        <a href="{{ route('sektor.infrastruktur') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Infrastruktur & Transportasi</a>
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
                    <button  class="nav-link flex items-center space-x-1
                        {{ request()->is('produk/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
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
                        <a href="{{ route('product.plaxis2d') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Plaxis 2D</a>
                        <a href="{{ route('product.plaxis3d') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Plaxis 3D</a>
                        <a href="https://www.bentley.com/software/plaxis-2d/" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Detail Program Plaxis</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
                        {{ request()->is('proyek/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
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
                        <a href="{{ route('project.geotechnical-analysis') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geotechnical Analysis</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Review Design Analysis</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Detailed Engineering Design (DED)</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Lombok GECC Power Plant </a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Design & Build of Kalibaru</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Detailed Design of Red Mud Stockyard</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Numerical Analysis Plaxis 3D</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geotechnical Analysis</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Numerical Analysis Using Plaxis 3D</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Numerical Modeling Analysis </a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Slope Stability Analysis</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Proyek</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
                        {{ request()->is('resources/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
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
                        <a href="{{ route('resources.articles') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Articles</a>
                        <a href="{{ route('resources.news-events') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">News & Events</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Video</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Case Study</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Document Library</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Resources</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
                        {{ request()->is('training/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
                        <span>TRAINING</span>
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
                        <a href="/training/silabus" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Silabus & Materi</a>
                        <a href="/training/fasilitas" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Fasilitas (Sertifikat, Modul, Software Trial)</a>
                        <a href="/training/pendaftaran" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Form Pendaftaran</a>
                    </div>
                </div>
                <a href="/kontak"class="nav-link transition
                        {{ request()->is('kontak') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">Kontak</a>

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
    </nav>

    <!-- CONTENT WRAPPER -->
    <div class="pt-[95px]">
        
        <!-- HEADER SECTION (TEMA GELAP BIRU BERADU MERAH) -->
        <section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="relative z-10" data-aos="zoom-in">
                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">Ultimate 3D Geotechnical Analysis</span>
                <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">PLAXIS 3D</h1>
                <p class="text-slate-300 text-sm md:text-base mt-3 max-w-xl mx-auto leading-relaxed">
                    Sistem Komputasi Elemen Hingga Tiga Dimensi Komprehensif untuk Pemodelan Geometri Tanah dan Struktur Volume Penuh.
                </p>
                <div class="w-16 h-1 bg-red-800 mx-auto mt-5 rounded-full"></div>

                <div class="mt-8 flex justify-center" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('kontak', ['product' => 'plaxis-2d']) }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center bg-gradient-to-r from-red-800 to-red-700 hover:from-red-700 hover:to-red-600 text-white font-black text-xs uppercase tracking-widest px-8 py-4 rounded-xl shadow-[0_10px_30px_-5px_rgba(153,27,27,0.4)] hover:shadow-[0_15px_35px_-5px_rgba(153,27,27,0.6)] transition-all duration-300 transform hover:-translate-y-1 group">
                        <span class="material-symbols-outlined mr-2.5 text-lg transition-transform group-hover:scale-110">monetization_on</span> 
                        Minta Penawaran Harga
                    </a>
                </div>
            </div>
        </section>

        <!-- PENGERTIAN & GAMBAR PRODUK -->
        <section class="max-w-7xl mx-auto py-20 px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">3D Spatial Technology</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                    Presisi Tanpa Batas <br><span class="text-red-800">Dalam Ruang Tiga Dimensi</span>
                </h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    PLAXIS 3D membawa analisis rekayasa tanah ke tingkat akurasi tertinggi dengan menyertakan efek spasial tiga dimensi penuh. Ketika penyederhanaan potongan melintang 2D tidak lagi memadai, PLAXIS 3D hadir menangani kompleksitas geometri melengkung, interaksi beban sudut, serta anisotropi formasi batuan/tanah.
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    Melalui kemitraan dengan **PT GeoINHance Solusi Rekayasa**, tim Anda akan dipandu untuk memaksimalkan seluruh potensi fitur CAD-in, manajemen parameter tanah berlapis, hingga interpretasi grafik luaran visualisasi deformasi volumetrik yang rumit menjadi wawasan desain yang matang.
                </p>

                <div class="grid grid-cols-2 gap-6 border-t border-slate-200 pt-6">
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300">Full Volumetric</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Analisis Tegangan 3 Sumbu</span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300">CAD Interoperability</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Import Geometri Eksternal</span>
                    </div>
                </div>
            </div>
            
            <div class="relative group" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-slate-200 bg-slate-900">
                    <!-- Placeholder Ilustrasi Workspace PLAXIS 3D -->
                    <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=800" alt="Plaxis 3D Modeling Work" class="w-full h-[450px] object-cover group-hover:scale-110 group-hover:opacity-40 transition duration-700">
                    
                    <div class="absolute inset-0 flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                        <span class="text-red-500 font-bold uppercase text-[10px] tracking-widest mb-1">3D Mesh Generation</span>
                        <h4 class="text-white font-black text-xl uppercase tracking-wide">Elemen Tetrahedron Otomatis</h4>
                        <p class="text-slate-300 text-xs mt-2 leading-relaxed">Pembuatan jaring elemen volume segitiga bernoda jamak (10-node) demi menghasilkan hitungan konvergensi yang tangguh.</p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-red-800/10 rounded-full blur-2xl -z-10"></div>
            </div>
        </section>

        <!-- INTERAKTIF TAB: KEUNGGULAN / MODUL TEKNIS -->
        <section class="bg-slate-100 py-24 px-6 border-t border-b border-slate-200" x-data="{ activeTab: 'capabilities3d' }">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Advanced 3D Capabilities</span>
                    <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Kelebihan Komputasi 3D</h2>
                </div>

                <!-- Tab Buttons -->
                <div class="flex justify-center space-x-4 mb-8">
                    <button @click="activeTab = 'capabilities3d'" 
                            :class="activeTab === 'capabilities3d' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                            class="px-6 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                        Workflow & Geometri
                    </button>
                    <button @click="activeTab = 'extensions3d'" 
                            :class="activeTab === 'extensions3d' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                            class="px-6 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                        Analisis Lanjutan
                    </button>
                </div>

                <!-- Tab Content Box -->
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-200 min-h-[220px] flex items-center relative overflow-hidden">
                    
                    <!-- Content 1 -->
                    <div x-show="activeTab === 'capabilities3d'" x-transition:enter="transition ease-out duration-500" class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-black text-[#002d62] uppercase mb-2">BIM Integration & CAD</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Impor file topografi lapangan langsung dari ekstensi DXF, STEP, atau skrip IFC, meminimalkan rekonstruksi ulang geometri struktur tanah manual.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-[#002d62] uppercase mb-2">Tunnel Designer</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Modul khusus perancangan terowongan lengkung lengkap dengan sekat pendorong (shield), perkuatan payung batuan (*rockbolts*), dan lapisan dinding beton sekunder.</p>
                        </div>
                    </div>

                    <!-- Content 2 -->
                    <div x-show="activeTab === 'extensions3d'" x-transition:enter="transition ease-out duration-500" class="w-full grid grid-cols-1 md:grid-cols-2 gap-6" x-cloak>
                        <div>
                            <h3 class="text-lg font-black text-red-800 uppercase mb-2">Dynamic & Consolidation</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Mampu mensimulasikan getaran gempa berulang, perambatan gelombang mekanis beban kereta cepat, serta penurunan konsolidasi tanah dalam fungsi waktu.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-red-800 uppercase mb-2">Coupled Flow Analysis</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Menghubungkan deformasi mekanis tanah secara simultan dengan fluktuasi tekanan hidrolik air tanah tidak konstan (*unsaturated fluid flow*).</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- LAYOUT SPESIFIKASI DAN APLIKASI -->
        <section class="max-w-7xl mx-auto py-24 px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <!-- Kolom Kiri - Sektor Aplikasi -->
                <div class="lg:col-span-2 space-y-8" data-aos="fade-right">
                    <div>
                        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Implementation</span>
                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Bidang Aplikasi Proyek 3D</h2>
                        <div class="w-12 h-1 bg-red-800 mt-3 rounded-full"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="material-symbols-outlined text-red-800 text-3xl mb-3">domain</span>
                            <h4 class="font-bold text-slate-900 uppercase text-sm mb-1">Grup Tiang Fondasi & Raft (Piled-Raft)</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Evaluasi distribusi beban aksial-lateral antar baris tiang pancang gedung pencakar langit.</p>
                        </div>
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="material-symbols-outlined text-red-800 text-3xl mb-3">architecture</span>
                            <h4 class="font-bold text-slate-900 uppercase text-sm mb-1">Interaksi Terowongan Silang</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Perhitungan efek simpangan tegangan tanah akibat jalur *underpass* baru yang memotong jalur pipa bawah tanah eksisting.</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan - Spesifikasi Teknis Sistem -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm h-fit" data-aos="fade-left">
                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-4 border-b border-slate-100 pb-3">Informasi Sistem & Lisensi</h3>
                    <table class="w-full text-left text-xs border-collapse">
                        <tbody>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">Developer</td><td class="py-3 text-[#002d62] font-bold">Bentley Systems</td></tr>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">OS</td><td class="py-3 text-slate-700 font-medium">Windows 10, 11 (64-bit)</td></tr>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">Komputasi</td><td class="py-3 text-slate-700 font-medium">Multicore CPU & GPU Accelerated</td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        <!-- CALL TO ACTION (CTA) -->
        <section class="bg-[#002d62] text-white py-16 px-6 text-center relative overflow-hidden">
            <div class="absolute -right-24 -bottom-24 w-72 h-72 bg-red-800 rounded-full blur-3xl opacity-20"></div>
            <div class="relative z-10 max-w-2xl mx-auto" data-aos="fade-up">
                <h3 class="text-2xl md:text-3xl font-black uppercase mb-4 tracking-tight">Implementasikan Pemodelan PLAXIS 3D Sekarang</h3>
                <p class="text-slate-300 text-xs md:text-sm mb-8 leading-relaxed">
                    Tingkatkan keandalan analisis spasial infrastruktur Anda. Sediakan lisensi resmi korporasi, program edukasi bersertifikat, atau kolaborasi pengerjaan pemodelan 3D bersama tim teknis senior kami.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://wa.me/622127881958" target="_blank" 
                       class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-900/60 hover:bg-slate-900 border border-slate-700 hover:border-emerald-500 text-slate-200 hover:text-white font-bold text-xs uppercase tracking-widest px-8 py-4 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                        <i class="fab fa-whatsapp mr-2.5 text-base text-emerald-500 group-hover:animate-bounce"></i> 
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </section>

    </div>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-12 px-6 md:px-16 border-t border-slate-800">
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
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-3">Produk Utama</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('product.plaxis2d') }}" class="hover:text-red-500 transition">PLAXIS 2D</a></li>
                    <li><a href="#" class="hover:text-red-500 transition">PLAXIS 3D</a></li>
                    <li><a href="#" class="hover:text-red-500 transition">Geogrid Systems</a></li>
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
                <p>© 1945 PT GeoINHance Solusi Rekayasa. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="{{ url('/privacy-policy') }}" class="hover:text-red-800 transition-colors">Privacy Policy</a>
                    <a href="{{ url('/terms-of-service') }}" class="hover:text-red-800 transition-colors">Terms of Service</a>
                </div>
            </div>
    </footer>

    <!-- SCRIPT AKTIVASI -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
    @livewireScripts
</body>
</html>