<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Interaktif - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Profil Perusahaan</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Visi & Misi</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Lokasi Kantor</a>
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
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Profil Perusahaan</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Visi & Misi</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Lokasi Kantor</a>
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
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Profil Perusahaan</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Visi & Misi</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Lokasi Kantor</a>
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
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Profil Perusahaan</a>
                        <a href="#visi-misi" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Visi & Misi</a>
                        <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Lokasi Kantor</a>
                    </div>
                </div>
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
        
        <section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="relative z-10" data-aos="zoom-in">
                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">Platform Solusi Geoteknik</span>
                <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">Profil Perusahaan</h1>
                <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto py-20 px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Who We Are</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                    Mengenal Lebih Dekat <br><span class="text-red-800">GeoINHance</span>
                </h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    PT GeoINHance Solusi Rekayasa adalah perusahaan konsultan rekayasa teknik terkemuka yang berfokus pada penyediaan solusi geoteknik, survei pemetaan, dan analisis struktural tanah yang presisi. Melalui platform web GeoINHance, kami mengintegrasikan teknologi pemantauan data terkini untuk memberikan efisiensi maksimal bagi klien kami di sektor infrastruktur dan konstruksi.
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    Kami percaya bahwa fondasi yang kuat adalah awal dari infrastruktur yang berkelanjutan. Didukung oleh tim insinyur berlisensi dan laboratorium berstandar internasional, kami siap memitigasi risiko konstruksi di seluruh penjuru Indonesia.
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
        </section>

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
                    <div x-show="activeTab === 'visi'" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 translate-x-8"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="w-full flex flex-col md:flex-row items-start gap-6">
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 shadow-inner">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-black uppercase text-slate-900 tracking-tight mb-3">Menjadi yang Terdepan di Asia Tenggara</h3>
                            <p class="text-slate-600 text-base leading-relaxed">
                                Menjadi mitra konsultan rekayasa teknik dan geoteknik global terpercaya yang mengutamakan inovasi teknologi, keselamatan kerja, serta akurasi data demi kemajuan pembangunan infrastruktur berkelanjutan yang aman dan kokoh.
                            </p>
                        </div>
                    </div>

                    <div x-show="activeTab === 'misi'" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 -translate-x-8"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="w-full space-y-4" x-cloak>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">1</div>
                            <p class="text-slate-600 text-sm leading-relaxed pt-1">
                                Menyediakan layanan analisis geoteknik dan pemetaan tanah berpresisi tinggi dengan standar keselamatan internasional menggunakan ekosistem perangkat lunak terintegrasi yang transparan bagi seluruh klien.
                            </p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-50 text-[#002d62] rounded-lg flex items-center justify-center shrink-0 font-bold text-sm">2</div>
                            <p class="text-slate-600 text-sm leading-relaxed pt-1">
                                Mengembangkan kompetensi tim ahli secara berkala dan konsisten mengadopsi kemajuan digitalisasi pemetaan udara demi efisiensi konstruksi proyek strategis nasional.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="alamat-kantor" class="max-w-7xl mx-auto py-24 px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Location</span>
                    <h2 class="text-3xl font-black text-slate-900 uppercase mb-6 tracking-tight">Kantor Operasional</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-white hover:shadow-md transition duration-300 cursor-pointer group">
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

                        <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-white hover:shadow-md transition duration-300 cursor-pointer group">
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
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-instagram"></i></a>
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
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </footer>

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