<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAXIS 2D - PT GeoINHance Solusi Rekayasa</title>
    
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

    <nav class="fixed w-full z-[100] transition-all duration-300 ">
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
                <div class="leading-none" style="cursor: pointer;" onclick="window.location.href='/'">
                    <span class="font-black text-xl tracking-tighter text-slate-900 block uppercase">Geo<span class="text-red-800">INHance</span></span>
                    <span class="text-[9px] font-bold text-slate-500 tracking-[0.2em] uppercase">Engineering Solutions</span>
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-8 text-[12px] font-bold uppercase tracking-widest text-slate-600">
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
                        <a href="{{ route('product.plaxis2d') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Plaxis 2D</a>
                        <a href="{{ route('product.plaxis3d') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Plaxis 3D</a>
                        <a href="https://www.bentley.com/software/plaxis-2d/" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Detail Program Plaxis</a>
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
        </div>
    </nav>

    <div class="pt-[73px] lg:pt-[77px]">
        
        <section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="relative z-10" data-aos="zoom-in">
                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">Advanced FEA Software</span>
                <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">PLAXIS 2D</h1>
                <p class="text-slate-300 text-sm md:text-base mt-3 max-w-xl mx-auto leading-relaxed">
                    Sistem Komputasi Elemen Hingga Dua Dimensi untuk Analisis Deformasi dan Stabilitas Tanah yang Akurat.
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

        <section class="max-w-7xl mx-auto py-20 px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Core Technology</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                    Solusi Terpercaya <br><span class="text-red-800">Insinyur Geoteknik</span>
                </h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    PLAXIS 2D adalah program elemen hingga yang dirancang khusus untuk analisis deformasi, stabilitas, dan aliran air tanah dalam rekayasa geoteknik. Aplikasi ini menyediakan lingkungan pemodelan yang sangat andal dan kuat untuk berbagai jenis masalah struktur tanah yang kompleks.
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    Bersama **PT GeoINHance Solusi Rekayasa**, kami membantu integrasi perangkat lunak ini di setiap alur kerja proyek Anda, mulai dari pengadaan lisensi resmi Bentley Systems hingga dukungan teknis pemodelan numerik tingkat lanjut untuk memastikan ketepatan desain infrastruktur.
                </p>

                <div class="grid grid-cols-2 gap-6 border-t border-slate-200 pt-6">
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300">Plane Strain</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Analisis Distribusi Tegangan</span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300">Axisymmetric</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Pemodelan Silindris Terpusat</span>
                    </div>
                </div>
            </div>
            
            <div class="relative group" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-slate-200 bg-slate-900">
                    <img src="https://images.unsplash.com/photo-1581092335397-9583fe92d232?w=800" alt="Plaxis 2D Modeling Work" class="w-full h-[450px] object-cover group-hover:scale-110 group-hover:opacity-40 transition duration-700">
                    <div class="absolute inset-0 flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                        <span class="text-red-500 font-bold uppercase text-[10px] tracking-widest mb-1">FEA Interface</span>
                        <h4 class="text-white font-black text-xl uppercase tracking-wide">Pemodelan Jaring (Mesh) Otomatis</h4>
                        <p class="text-slate-300 text-xs mt-2 leading-relaxed">Mempercepat proses pembagian elemen segitiga tanah secara presisi tinggi untuk komputasi tegangan pori.</p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-red-800/10 rounded-full blur-2xl -z-10"></div>
            </div>
        </section>

        <section class="bg-slate-100 py-24 px-6 border-t border-b border-slate-200" x-data="{ activeTab: 'capabilities' }">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Technical Capabilities</span>
                    <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Fitur Utama Pemodelan</h2>
                </div>

                <div class="flex justify-center space-x-4 mb-8">
                    <button @click="activeTab = 'capabilities'" 
                            :class="activeTab === 'capabilities' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                            class="px-6 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                        Kapabilitas Dasar
                    </button>
                    <button @click="activeTab = 'models'" 
                            :class="activeTab === 'models' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                            class="px-6 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                        Model Material
                    </button>
                </div>

                <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-200 min-h-[220px] flex items-center relative overflow-hidden">
                    <div x-show="activeTab === 'capabilities'" x-transition:enter="transition ease-out duration-500" class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-black text-[#002d62] uppercase mb-2">Staged Construction</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Memungkinkan simulasi akurat tahapan pengerjaan di lapangan, seperti penggalian basemen secara bertahap atau penimbunan lereng jalan.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-[#002d62] uppercase mb-2">Steady-state Seepage</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Analisis aliran air dalam tanah yang terintegrasi untuk menghitung tekanan air pori dan debit rembesan pada tubuh bendungan atau tanggul.</p>
                        </div>
                    </div>

                    <div x-show="activeTab === 'models'" x-transition:enter="transition ease-out duration-500" class="w-full grid grid-cols-1 md:grid-cols-2 gap-6" x-cloak>
                        <div>
                            <h3 class="text-lg font-black text-red-800 uppercase mb-2">Advanced Soil Models</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Mendukung model elastoplastis canggih seperti *Hardening Soil*, *Soft Soil*, hingga *Mohr-Coulomb* untuk replikasi perilaku tanah asli secara realistis.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-red-800 uppercase mb-2">Structural Elements</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Dilengkapi pemodelan elemen balok (*beams*), jangkar (*anchors*), geotekstil, dan antarmuka (*interfaces*) interaksi tanah-struktur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto py-24 px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 space-y-8" data-aos="fade-right">
                    <div>
                        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Implementation</span>
                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Bidang Aplikasi Proyek</h2>
                        <div class="w-12 h-1 bg-red-800 mt-3 rounded-full"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="material-symbols-outlined text-red-800 text-3xl mb-3">construction</span>
                            <h4 class="font-bold text-slate-900 uppercase text-sm mb-1">Galian Dalam (Deep Excavation)</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Evaluasi pergerakan tanah di sekitar dinding penahan basemen perkotaan.</p>
                        </div>
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="material-symbols-outlined text-red-800 text-3xl mb-3">terrain</span>
                            <h4 class="font-bold text-slate-900 uppercase text-sm mb-1">Stabilitas Lereng & Tanggul</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Perhitungan Faktor Keamanan (Safety Factor) dengan metode reduksi c-phi.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm h-fit" data-aos="fade-left">
                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-4 border-b border-slate-100 pb-3">Informasi Sistem & Lisensi</h3>
                    <table class="w-full text-left text-xs border-collapse">
                        <tbody>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">Developer</td><td class="py-3 text-[#002d62] font-bold">Bentley Systems</td></tr>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">OS</td><td class="py-3 text-slate-700 font-medium">Windows 10, 11 (64-bit)</td></tr>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">Opsi Ekstensi</td><td class="py-3 text-slate-700 font-medium">Dynamics & Thermal Module</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

<!-- MAIN BOTTOM CTA SECTION (PREMIUM REDESIGN) -->
        <section class="relative overflow-hidden bg-gradient-to-br from-[#002d62] via-[#001f44] to-slate-950 text-white py-24 px-6 border-t border-white/5">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-800/10 rounded-full blur-3xl -z-10 pointer-events-none"></div>
            <div class="absolute -right-16 -bottom-16 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl -z-10 pointer-events-none"></div>
            <div class="absolute inset-0 opacity-[0.03] bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto text-center" data-aos="fade-up">
                <!-- Mini Badge -->
                <span class="inline-flex items-center gap-1.5 bg-red-500/10 border border-red-500/20 text-red-400 font-bold text-[10px] uppercase tracking-[0.25em] px-3 py-1.5 rounded-full mb-6">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span> Authorized Partner
                </span>

                <h3 class="text-3xl md:text-4xl font-black uppercase mb-4 tracking-tight leading-tight">
                    Siap Mengimplementasikan <br class="sm:hidden"> <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-red-400">PLAXIS 2D?</span>
                </h3>
                
                <p class="text-slate-300 text-sm md:text-base mb-10 max-w-2xl mx-auto leading-relaxed font-medium">
                    Dapatkan lisensi resmi, penawaran harga korporasi khusus, atau diskon paket bundling program edukasi geoteknik langsung dari <span class="text-white font-semibold">PT GeoINHance Solusi Rekayasa</span>.
                </p>

                <!-- Action Buttons Group -->
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4 max-w-md sm:max-w-none mx-auto">
                    <a href="https://wa.me/622127881958" target="_blank" 
                       class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-900/60 hover:bg-slate-900 border border-slate-700 hover:border-emerald-500 text-slate-200 hover:text-white font-bold text-xs uppercase tracking-widest px-8 py-4 rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                        <i class="fab fa-whatsapp mr-2.5 text-base text-emerald-500 group-hover:animate-bounce"></i> 
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </section>

    </div> <footer class="bg-slate-900 text-slate-400 text-xs py-12 px-6 md:px-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-white/10 pb-16">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-6">
                    <div class="bg-red-800 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <span class="font-black text-2xl tracking-tighter uppercase text-white">Geo<span class="text-red-800">INHance</span></span>
                </div>
                <p class="text-slate-400 leading-relaxed mb-8 max-w-sm">
                    Menyediakan layanan konsultasi rekayasa teknik dan geoteknik kelas dunia dengan integritas dan akurasi tinggi di seluruh Indonesia.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition text-white"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition text-white"><i class="fab fa-instagram"></i></a>
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
                <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-4">Kantor Pusat</h4>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">
                    Menara Sentraya Lt. 11 Unit A4, <br>
                    Jl. Iskandarsyah Raya, Jakarta Selatan.
                </p>
                <p class="text-slate-400 text-sm mb-1">P: +62 851-9044-1744</p>
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>