<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
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
        .nav-link:hover::after {
            width: 100%;
        }
        /* Custom Shadow for clean look */
        .card-shadow {
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900 ">

    <nav class="fixed w-full z-[100] transition-all duration-300 ">
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

    <div class="pt-[95px]">
        
        <livewire:home-slider />

        <section class="max-w-7xl mx-auto py-12 px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm border-l-4 border-red-800 flex items-center space-x-6" data-aos="fade-up">
                    <span class="text-4xl font-black text-slate-900">12+</span>
                    <span class="text-xs uppercase font-bold tracking-widest text-slate-500 leading-relaxed">Tahun Pengalaman<br>Industri</span>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border-l-4 border-blue-800 flex items-center space-x-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-blue-50 p-3 rounded-xl text-blue-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Data Akurat</h4>
                        <p class="text-[10px] text-slate-500 uppercase font-bold tracking-tight">Laboratorium Standar Int.</p>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border-l-4 border-slate-800 flex items-center space-x-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-red-50 p-3 rounded-xl text-red-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Tim Ahli</h4>
                        <p class="text-[10px] text-slate-500 uppercase font-bold tracking-tight">Insinyur Berlisensi</p>
                    </div>
                </div>
            </div>
        </section>

<section id="services" class="max-w-7xl mx-auto py-24 px-6">

    <!-- HEADER -->
    <div class="text-center mb-20" data-aos="fade-up">

        <span class="inline-block px-5 py-2 rounded-full border border-red-100 bg-red-50 text-red-800 text-xs font-extrabold uppercase tracking-[0.35em] shadow-sm">
            Our Expertise
        </span>

        <h2 class="mt-6 text-4xl md:text-5xl font-black uppercase text-slate-900 leading-tight">
            Layanan
            <span class="text-red-800">
                Unggulan
            </span>
        </h2>

        <p class="max-w-2xl mx-auto mt-6 text-lg leading-8 text-slate-500">
            Solusi engineering profesional dengan pendekatan modern,
            presisi tinggi, dan standar kualitas industri terbaik.
        </p>

        <div class="mt-8 flex items-center justify-center gap-3">
            <div class="h-[3px] w-12 rounded-full bg-red-200"></div>
            <div class="h-4 w-4 rounded-full bg-red-800"></div>
            <div class="h-[3px] w-12 rounded-full bg-red-200"></div>
        </div>

    </div>

    <!-- SERVICES -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- CARD -->
        <div class="rounded-3xl border border-slate-200 bg-white p-10 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

            <!-- ICON -->
            <div class="mx-auto mb-8 flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-red-800 to-red-900 shadow-lg">

                <span class="material-symbols-outlined text-[60px] text-white">
                    engineering
                </span>

            </div>

            <h3 class="mb-4 text-2xl font-black text-slate-900">
                Geotechnical Engineering
            </h3>

            <p class="leading-8 text-slate-500">
                Analisis stabilitas tanah dan fondasi untuk keamanan konstruksi.
            </p>

        </div>

        <!-- CARD -->
        <div class="rounded-3xl border border-slate-200 bg-white p-10 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

            <!-- ICON -->
            <div class="mx-auto mb-8 flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-red-800 to-red-900 shadow-lg">

                <span class="material-symbols-outlined text-[60px] text-white">
                    architecture
                </span>

            </div>

            <h3 class="mb-4 text-2xl font-black text-slate-900">
                Structural Analysis
            </h3>

            <p class="leading-8 text-slate-500">
                Perhitungan kekuatan struktur bangunan modern dan efisien.
            </p>

        </div>

        <!-- CARD -->
        <div class="rounded-3xl border border-slate-200 bg-white p-10 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

            <!-- ICON -->
            <div class="mx-auto mb-8 flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-red-800 to-red-900 shadow-lg">

                <span class="material-symbols-outlined text-[60px] text-white">
                    map
                </span>

            </div>

            <h3 class="mb-4 text-2xl font-black text-slate-900">
                Land Surveying
            </h3>

            <p class="leading-8 text-slate-500">
                Pemetaan lahan presisi tinggi menggunakan GPS modern.
            </p>

        </div>

    </div>

</section>

<section class="bg-white py-24 px-6 border-t border-b border-slate-100" x-data="{ 
    activeBranch: 'bandung',
    branches: {
        jakarta: {
            title: 'Kantor Perwakilan - Jakarta',
            desc: 'Hub operasional strategis untuk koordinasi regulasi, kemitraan BUMN, dan manajemen proyek skala nasional.',
            img: 'https://images.unsplash.com/photo-1577495508048-b635879837f1?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[75%] left-[26%]'
        },
        bandung: {
            title: 'Kantor Pusat - Bandung',
            desc: 'Pusat komputasi data geoteknik, studio analisis pemodelan struktural, dan laboratorium pengujian mekanika tanah utama.',
            img: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[79.5%] left-[28%]'
        },
        surabaya: {
            title: 'Kantor Cabang - Surabaya',
            desc: 'Layanan investigasi lapangan wilayah Indonesia Timur, mencakup survei hidrografi dan pemetaan geofisika maritim.',
            img: 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[82%] left-[39.5%]'
        },
        Bali: {
            title: 'Studio Pusat - Bali',
            desc: 'Pos komando taktis penanganan survei UAV, pemetaan udara koridor infrastruktur, dan monitoring geoteknik real-time IKN.',
            img: 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=600&auto=format&fit=crop',
            coords: 'top-[89%] left-[45.5%]'
        }
    }
}">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Operational Network</span>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Cakupan Wilayah & Jaringan Cabang</h2>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
            <p class="text-slate-500 text-sm max-w-xl mx-auto mt-4">Sinergi multi-kantor untuk memastikan mobilitas tim teknis yang cepat dan efisien di seluruh koridor infrastruktur Indonesia.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            
            <div class="lg:col-span-9 relative bg-slate-50/60 p-2 md:p-6 rounded-3xl border border-slate-100 flex items-center justify-center min-h-[400px]" data-aos="fade-right">
                <div class="w-full relative select-none">
                    
                    <img src="https://marketplace.canva.com/O3kyc/MAHFD_O3kyc/1/tl/canva-map-of-indonesia-MAHFD_O3kyc.png" 
                         class="w-full h-auto opacity-40 grayscale hover:grayscale-0 transition-all duration-700" 
                         alt="GeoINHance Operational Map">
                    
                    <div class="absolute inset-0 w-full h-full">
                        <template x-for="(branch, key) in branches" :key="key">
                            <div class="absolute transform -translate-x-1/2 -translate-y-full transition-all duration-300" 
                                 :class="[branch.coords, activeBranch === key ? 'z-30 scale-110' : 'z-10 hover:z-20']">
                                
                                <button @mouseenter="activeBranch = key" 
                                        @click="activeBranch = key" 
                                        class="relative flex flex-col items-center justify-center focus:outline-none transition-transform duration-300 hover:-translate-y-1.5 group">
                                    
                                    <span class="absolute inline-flex h-6 w-6 rounded-full opacity-60 animate-ping bottom-[-3px]" 
                                          :class="activeBranch === key ? 'bg-red-500' : 'bg-[#002d62]/30'"></span>
                                    
                                    <svg class="w-7 h-7 filter drop-shadow-md transition-colors duration-300" 
                                         viewBox="0 0 24 24" 
                                         fill="currentColor">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" 
                                              :class="activeBranch === key ? 'text-red-800' : 'text-[#002d62]'"/>
                                    </svg>
                                    
                                    <span class="absolute bottom-full mb-1.5 bg-slate-900 text-white text-[9px] font-black px-2 py-1 rounded shadow-xl opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap uppercase tracking-widest pointer-events-none" x-text="key"></span>
                                </button>
                            </div>
                        </template>
                    </div>

                </div>
            </div>

            <div class="lg:col-span-3 flex" data-aos="fade-left">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden w-full flex flex-col justify-between transition-all duration-300">
                    <div class="h-44 w-full overflow-hidden bg-slate-100 relative">
                        <img :src="branches[activeBranch].img" class="w-full h-full object-cover transition-all duration-500" :alt="branches[activeBranch].title" :key="activeBranch">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                        <span class="absolute bottom-3 left-3 bg-red-800 text-white text-[8px] font-black uppercase tracking-widest px-2.5 py-1 rounded shadow-md">GeoINHance Unit</span>
                    </div>

                    <div class="p-5 flex-grow flex flex-col justify-start">
                        <h3 class="text-base font-black text-slate-900 uppercase tracking-tight mb-2 leading-tight" x-text="branches[activeBranch].title"></h3>
                        <p class="text-slate-500 text-[11px] leading-relaxed" x-text="branches[activeBranch].desc"></p>
                    </div>

                    <div class="p-5 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-[9px] font-bold text-slate-400 uppercase tracking-wider mt-auto">
                        <span class="flex items-center gap-1.5 text-emerald-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                        </span>
                        <a href="/kontak" class="text-red-800 hover:text-slate-900 transition flex items-center gap-0.5 font-extrabold">
                            Hubungi <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="bg-slate-50 py-24 px-6 border-b border-slate-100 overflow-hidden" x-data="{
    categories: [
        { name: 'Kementerian & BUMN', count: '12+ Instansi' },
        { name: 'Kontraktor Utama', count: '20+ Perusahaan' },
        { name: 'Sektor Swasta', count: '15+ Kemitraan' }
    ]
}">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Trusted Partners</span>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Klien & Kemitraan Strategis</h2>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
            <p class="text-slate-500 text-sm max-w-xl mx-auto mt-4">Telah dipercaya oleh berbagai instansi pemerintah, BUMN, dan korporasi swasta nasional dalam menyelesaikan proyek infrastruktur strategis.</p>
        </div>

        <div class="w-full relative py-4 mb-16 select-none" data-aos="fade-up" data-aos-delay="100">
            <div class="absolute inset-y-0 left-0 w-20 md:w-40 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-20 md:w-40 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none"></div>

            <div class="flex w-max animate-marquee whitespace-nowrap items-center hover:[animation-play-state:paused]">
                
                <div class="flex gap-16 items-center shrink-0 pr-16">
                    <img src="https://i.pinimg.com/originals/bf/b4/78/bfb4785acb3aa81935470bbf6cca8aa0.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Kementerian PUPR">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/7/73/Waskita_Karya.svg/1280px-Waskita_Karya.svg.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Waskita">
                    <img src="https://ridergalau.id/wp-content/uploads/2026/01/Logo-Wijaya-Karya-WIKA.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="WIKA">
                    <img src="https://www.rukamen.com/uploads/logo_developer/1548844165_9766489.jpeg" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Adhi Karya">
                    <img src="https://www.hutamakarya.com/storage/logo-site.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Hutama Karya">
                    <img src="https://www.ptpp.co.id/_nuxt/img/site-logo.0b5b997.webp" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="PT PP">
                </div>
                
                <div class="flex gap-16 items-center shrink-0 pr-16" aria-hidden="true">
                    <img src="https://i.pinimg.com/originals/bf/b4/78/bfb4785acb3aa81935470bbf6cca8aa0.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Kementerian PUPR">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/7/73/Waskita_Karya.svg/1280px-Waskita_Karya.svg.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Waskita">
                    <img src="https://ridergalau.id/wp-content/uploads/2026/01/Logo-Wijaya-Karya-WIKA.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="WIKA">
                    <img src="https://www.rukamen.com/uploads/logo_developer/1548844165_9766489.jpeg" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Adhi Karya">
                    <img src="https://www.hutamakarya.com/storage/logo-site.png" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Hutama Karya">
                    <img src="https://www.ptpp.co.id/_nuxt/img/site-logo.0b5b997.webp" class="h-12 w-32 object-contain grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="PT PP">
                </div>

            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6" data-aos="fade-up" data-aos-delay="200">
            <template x-for="cat in categories">
                <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm flex items-center justify-between group hover:border-red-800/40 hover:shadow-md transition-all duration-300">
                    <div class="flex flex-col">
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-wider mb-1" x-text="cat.count"></span>
                        <h4 class="text-sm font-black text-slate-800 uppercase tracking-tight group-hover:text-red-800 transition-colors" x-text="cat.name"></h4>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-slate-50 group-hover:bg-red-50 text-slate-400 group-hover:text-red-800 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
</style>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
</style>

<style>
    @keyframes marquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 25s linear infinite;
    }
    /* Pause jalan logo saat kursor user menempel di atasnya */
    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>
        <section id="portfolio" class="bg-slate-100 py-24 px-6 border-t border-slate-200">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-end mb-16" data-aos="fade-up">
                    <div class="mb-6 md:mb-0">
                        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Success Stories</span>
                        <h2 class="text-5xl font-black text-slate-900 uppercase tracking-tighter">Proyek Strategis</h2>
                    </div>
                    <a href="#" class="text-red-800 font-bold text-sm border-b-2 border-red-800 pb-1 hover:text-slate-900 hover:border-slate-900 transition-all">
                        Lihat Semua Portofolio &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="group bg-white rounded-2xl overflow-hidden card-shadow hover:shadow-2xl transition-all duration-500" data-aos="fade-up">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="https://images.unsplash.com/photo-1590348697170-717bdc85414f?w=600" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-800 text-white text-[10px] font-bold px-4 py-1.5 rounded-full shadow-lg uppercase tracking-widest">Geoteknik</span>
                            </div>
                        </div>
                        <div class="p-8 border-b-8 border-transparent group-hover:border-red-800 transition-all duration-500">
                            <h4 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-800 transition-colors">Analisis Bendungan X</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">Analisis stabilitas struktur tanah dan fondasi untuk bendungan kapasitas besar.</p>
                            <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Jawa Tengah</span>
                                <span class="text-[10px] font-black text-red-800 uppercase tracking-widest">2024</span>
                            </div>
                        </div>
                    </div>
                    <div class="group bg-white rounded-2xl overflow-hidden card-shadow hover:shadow-2xl transition-all duration-500" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="https://images.unsplash.com/photo-1541888946425-d81bb19480c5?w=600" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-800 text-white text-[10px] font-bold px-4 py-1.5 rounded-full shadow-lg uppercase tracking-widest">Infrastruktur</span>
                            </div>
                        </div>
                        <div class="p-8 border-b-8 border-transparent group-hover:border-red-800 transition-all duration-500">
                            <h4 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-800 transition-colors">Jalan Tol Lintas Z</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">Perencanaan struktur jembatan layang menggunakan teknologi MSE Wall terbaru.</p>
                            <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Sumatera</span>
                                <span class="text-[10px] font-black text-red-800 uppercase tracking-widest">2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="group bg-white rounded-2xl overflow-hidden card-shadow hover:shadow-2xl transition-all duration-500" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-800 text-white text-[10px] font-bold px-4 py-1.5 rounded-full shadow-lg uppercase tracking-widest">Survey</span>
                            </div>
                        </div>
                        <div class="p-8 border-b-8 border-transparent group-hover:border-red-800 transition-all duration-500">
                            <h4 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-800 transition-colors">Kawasan Industri Global</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">Pemetaan lahan seluas 200 hektar menggunakan LiDAR presisi tinggi.</p>
                            <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Kalimantan</span>
                                <span class="text-[10px] font-black text-red-800 uppercase tracking-widest">2026</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                <p>© 1945 PT GeoINHance Solusi Rekayasa. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="{{ url('/privacy-policy') }}" class="hover:text-red-800 transition-colors">Privacy Policy</a>
                    <a href="{{ url('/terms-of-service') }}" class="hover:text-red-800 transition-colors">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>

    <a href="https://wa.me/6285720062009" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        window.onscroll = function() {
            const nav = document.querySelector('nav');
            if (window.pageYOffset > 50) {
                nav.classList.add('shadow-md');
            } else {
                nav.classList.remove('shadow-md');
            }
        };
    </script>
    @livewireScripts
</body>
</html>