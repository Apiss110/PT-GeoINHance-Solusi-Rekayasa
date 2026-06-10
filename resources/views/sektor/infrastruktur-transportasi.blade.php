<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

            @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

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
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900 ">

       <nav class="fixed w-full z-[100] transition-all duration-300 ">
        <div class="bg-[#002d62] text-white/90 py-2 px-6 md:px-16 text-[11px] flex justify-between items-center tracking-wider">
            <div class="flex items-center space-x-8">
                <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path></svg> {{ __('nav.top.location') }}</span>
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
                    <img src="../images/inh 2.png" alt="GeoINHance Logo" class="h-30 w-60 object-contain">
                    <!-- <span class="text-[9px] font-bold text-slate-500 tracking-[0.2em] uppercase">geotechnical insights, engineering solutions</span> -->
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-8 text-[12px] font-bold uppercase tracking-widest text-slate-600">
                <a href="/profil"  class="nav-link transition
                    {{ request()->is('profil') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}"> {{ __('nav.menu.profile') }}</a>
                
                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button  class="nav-link flex items-center space-x-1
                    {{ request()->is('sektor/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
                        <span>{{ __('nav.menu.sectors') }}</span>
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
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.geohazard') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.underground') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.power_plant') }}</a>
                    <a href="{{ route('sektor.infrastruktur') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.infra_trans') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.road') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.water') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.oil_gas') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.railway') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.airport') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.port') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.industry') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.education') }}</a>
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.sectors.all') }}</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button  class="nav-link flex items-center space-x-1
                        {{ request()->is('produk/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
                        <span>{{ __('nav.menu.products') }}</span>
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
                         <a href="{{ route('product.staadpro') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Staad Pro</a>
                         <a href="{{ route('product.geostudio') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">GeoStudio Flow</a>
                         <a href="{{ route('product.plaxis2d') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Plaxis 2D</a>
                         <a href="{{ route('product.plaxis3d') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Plaxis 3D</a>
                         <a href="https://www.bentley.com/software/plaxis-2d/" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.products.details') }}</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
                        {{ request()->is('proyek/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
                        <span>{{ __('nav.menu.projects') }}</span>
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
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">DED</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Lombok GECC Power Plant</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Design & Build of Kalibaru</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Detailed Design of Red Mud Stockyard</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Numerical Analysis Plaxis 3D</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geotechnical Analysis</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Numerical Analysis Using Plaxis 3D</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Numerical Modeling Analysis</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Slope Stability Analysis</a>
                    <a href="{{ route('proyek.semua') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Semua Proyek</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
                        {{ request()->is('resources/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
                        <span>{{ __('nav.menu.resources') }}</span>
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
                    <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">GeoInhance Engineering Hub</a>
                    <a href="{{ route('resources.articles') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.articles') }}</a>
                    <a href="{{ route('resources.news-events') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.news') }}</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Video</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.case_study') }}</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.docs') }}</a>
                    <a href="#alamat-kantor" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.all') }}</a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
                        {{ request()->is('training/*') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
                        <span>{{ __('nav.menu.training') }}</span>
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
                    <a href="/training/silabus" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.training.syllabus') }}</a>
                    <a href="/training/fasilitas" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.training.facilities') }}</a>
                    <a href="/training/pendaftaran" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.training.register') }}</a>
                    </div>
                </div>
                <a href="/kontak"class="nav-link transition
                        {{ request()->is('kontak') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">{{ __('nav.menu.contact') }}</a>

                @auth
                    <div class="relative" x-data="{ userOpen: false }" @click.away="userOpen = false">
                        <button @click="userOpen = !userOpen" class="flex items-center space-x-2.5 bg-slate-100 hover:bg-slate-200 border border-slate-200 py-1.5 px-3.5 rounded-xl transition duration-200 focus:outline-none normal-case tracking-normal">
                            <div class="w-6 h-6 bg-red-800 text-white rounded-full flex items-center justify-center font-bold text-[10px] uppercase shadow-sm shrink-0">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            
                            <div class="text-left leading-none">
                                <span class="block text-xs font-black text-slate-800 truncate max-w-[100px]">{{ Auth::user()->name }}</span>
                                <span class="block text-[8px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">{{ Auth::user()->role ?? __('nav.auth.client') }}</span>
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
                                <span>__('nav.auth.dashboard')</span>
                            </a>

                            <hr class="border-slate-100 my-1">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2.5 text-xs text-red-700 font-bold hover:bg-red-50 text-left transition">
                                    <span class="material-symbols-outlined text-red-600 text-sm">logout</span>
                                    <span>{{ __('nav.auth.logout') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-slate-900 text-white px-6 py-2.5 rounded shadow-lg hover:bg-red-800 transition-all duration-300 transform hover:-translate-y-0.5">
                        {{ __('nav.auth.login') }}
                    </a>
                @endauth
            </div>
        </div>
    </nav>

<!-- CONTENT -->
<div class="pt-[95px]">

    <!-- HERO -->
    <section class="bg-[#002d62] text-white py-28 px-6 text-center relative overflow-hidden">

        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="relative z-10 max-w-4xl mx-auto" data-aos="zoom-in">

            <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-4">
                Infrastructure Engineering Sector
            </span>

            <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight leading-tight">
                Infrastruktur <br>
                & Transportasi
            </h1>

            <p class="text-slate-300 text-sm md:text-base mt-6 max-w-2xl mx-auto leading-relaxed">
                Solusi rekayasa geoteknik modern untuk pembangunan jalan raya,
                jembatan, rel kereta api, bandara, pelabuhan, dan sistem transportasi
                masa depan berbasis analisis numerik presisi tinggi.
            </p>

            <div class="w-16 h-1 bg-red-800 mx-auto mt-6 rounded-full"></div>

        </div>
    </section>

    <!-- INTRO -->
    <section class="max-w-7xl mx-auto py-24 px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

        <div data-aos="fade-right">

            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                Civil Infrastructure
            </span>

            <h2 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight uppercase mb-6">
                Rekayasa Infrastruktur
                <span class="text-red-800">Berbasis Analisis Geoteknik</span>
            </h2>

            <p class="text-slate-600 leading-relaxed mb-6">
                PT GeoINHance Solusi Rekayasa membantu proyek infrastruktur
                skala nasional melalui pemodelan geoteknik komprehensif,
                investigasi tanah, analisis stabilitas lereng, deformasi tanah,
                hingga interaksi struktur bawah permukaan.
            </p>

            <p class="text-slate-600 leading-relaxed mb-8">
                Dengan dukungan software numerik seperti PLAXIS 2D & PLAXIS 3D,
                kami menghadirkan simulasi teknis yang mampu meningkatkan keamanan,
                efisiensi konstruksi, dan keandalan desain infrastruktur modern.
            </p>

            <div class="grid grid-cols-2 gap-6 border-t border-slate-200 pt-6">

                <div>
                    <span class="block text-3xl font-black text-[#002d62]">
                        100+
                    </span>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                        Infrastruktur Support
                    </span>
                </div>

                <div>
                    <span class="block text-3xl font-black text-[#002d62]">
                        BIM Ready
                    </span>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                        Digital Engineering
                    </span>
                </div>

            </div>
        </div>

        <div class="relative" data-aos="fade-left">

            <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-200">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200"
                     alt="Infrastructure"
                     class="w-full h-[500px] object-cover">
            </div>

            <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-red-800/10 rounded-full blur-3xl"></div>

        </div>

    </section>

    <!-- SERVICES -->
    <section class="bg-slate-100 py-24 px-6 border-y border-slate-200">

        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-16">

                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    Engineering Scope
                </span>

                <h2 class="text-3xl md:text-4xl font-black uppercase tracking-tight text-slate-900">
                    Area Infrastruktur yang Didukung
                </h2>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- CARD -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:-translate-y-2 transition duration-500">
                    <span class="material-symbols-outlined text-red-800 text-5xl mb-5">
                        route
                    </span>

                    <h3 class="text-lg font-black uppercase text-slate-900 mb-3">
                        Jalan Raya & Tol
                    </h3>

                    <p class="text-sm text-slate-600 leading-relaxed">
                        Analisis stabilitas timbunan, settlement tanah lunak,
                        serta optimasi perkuatan geotekstil dan geogrid.
                    </p>
                </div>

                <!-- CARD -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:-translate-y-2 transition duration-500">
                    <span class="material-symbols-outlined text-red-800 text-5xl mb-5">
                        train
                    </span>

                    <h3 class="text-lg font-black uppercase text-slate-900 mb-3">
                        Jalur Kereta Api
                    </h3>

                    <p class="text-sm text-slate-600 leading-relaxed">
                        Evaluasi getaran dinamis, deformasi subgrade,
                        dan interaksi tanah akibat beban siklik kereta cepat.
                    </p>
                </div>

                <!-- CARD -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:-translate-y-2 transition duration-500">
                    <span class="material-symbols-outlined text-red-800 text-5xl mb-5">
                        flight
                    </span>

                    <h3 class="text-lg font-black uppercase text-slate-900 mb-3">
                        Kawasan Bandara
                    </h3>

                    <p class="text-sm text-slate-600 leading-relaxed">
                        Simulasi runway settlement, stabilitas apron,
                        dan drainase area udara berskala besar.
                    </p>
                </div>

                <!-- CARD -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:-translate-y-2 transition duration-500">
                    <span class="material-symbols-outlined text-red-800 text-5xl mb-5">
                        directions_boat
                    </span>

                    <h3 class="text-lg font-black uppercase text-slate-900 mb-3">
                        Kawasan Pelabuhan
                    </h3>

                    <p class="text-sm text-slate-600 leading-relaxed">
                        Analisis reklamasi pantai, retaining structure,
                        dan stabilitas dermaga terhadap beban lateral.
                    </p>
                </div>

                <!-- CARD -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:-translate-y-2 transition duration-500">
                    <span class="material-symbols-outlined text-red-800 text-5xl mb-5">
                        apartment
                    </span>

                    <h3 class="text-lg font-black uppercase text-slate-900 mb-3">
                        Kawasan Perkotaan
                    </h3>

                    <p class="text-sm text-slate-600 leading-relaxed">
                        Pemodelan basement, dinding diafragma,
                        dan dampak konstruksi terhadap bangunan sekitar.
                    </p>
                </div>

                <!-- CARD -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm hover:-translate-y-2 transition duration-500">
                    <span class="material-symbols-outlined text-red-800 text-5xl mb-5">
                        tunnel
                    </span>

                    <h3 class="text-lg font-black uppercase text-slate-900 mb-3">
                        Terowongan & Underpass
                    </h3>

                    <p class="text-sm text-slate-600 leading-relaxed">
                        Simulasi penggalian bertahap, lining tunnel,
                        dan interaksi tegangan tanah tiga dimensi.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-[#002d62] text-white py-20 px-6 text-center relative overflow-hidden">

        <div class="absolute -right-24 -bottom-24 w-72 h-72 bg-red-800 rounded-full blur-3xl opacity-20"></div>

        <div class="relative z-10 max-w-3xl mx-auto" data-aos="fade-up">

            <h3 class="text-3xl md:text-4xl font-black uppercase mb-5 tracking-tight">
                Bangun Infrastruktur Dengan Presisi Rekayasa Tinggi
            </h3>

            <p class="text-slate-300 text-sm leading-relaxed mb-8">
                Konsultasikan kebutuhan analisis geoteknik proyek jalan,
                jembatan, bandara, pelabuhan, maupun sistem transportasi
                modern bersama tim engineering GeoINHance.
            </p>

            <a href="https://wa.me/622127881958"
               target="_blank"
               class="inline-flex items-center bg-red-800 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 rounded-xl transition shadow-lg">

                <i class="fab fa-whatsapp mr-3 text-base"></i>
                Hubungi Tim Engineering
            </a>

        </div>
    </section>

</div>

<!-- FOOTER -->
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
                {{ __('footer.desc') }}
            </p>
            <div class="flex space-x-4">
                <a href="https://www.linkedin.com/company/geoinhance/" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.instagram.com/geoinhance/" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/@geoinhance" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-youtube"></i></a>
                <a href="https://www.tiktok.com/@geoinhance" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>

        <div>
            <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-8">
                {{ __('footer.navigation') }}
            </h4>
            <ul class="space-y-4 text-slate-400 text-sm">
                <li><a href="/" class="hover:text-white transition">{{ __('footer.home') }}</a></li>
                <li><a href="/#services" class="hover:text-white transition">{{ __('footer.services') }}</a></li>
                <li><a href="/#portfolio" class="hover:text-white transition">{{ __('footer.projects') }}</a></li>
                <li><a href="/karir" class="hover:text-white transition">{{ __('footer.career') }}</a></li>
                <li><a href="/kontak" class="hover:text-white transition">{{ __('footer.contact') }}</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-8">
                {{ __('footer.head_office') }}
            </h4>
            <p class="text-slate-400 text-sm leading-relaxed mb-4">
                {!! __('footer.address') !!}
            </p>
            <p class="text-slate-400 text-sm mb-2">
                {{ __('footer.phone') }}: +62 851 9044 1744
            </p>
            <p class="text-slate-400 text-sm text-red-500 font-bold">geoinhance.solusirekayasa@gmail.com</p>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto pt-8 flex flex-col md:flex-row justify-between items-center text-[10px] text-slate-500 uppercase tracking-[0.2em]">
        <p>{{ __('footer.copyright') }}</p>
        <div class="flex gap-4">
            <a href="{{ url('/privacy-policy') }}" class="hover:text-red-800 transition-colors">
                {{ __('footer.privacy_policy') }}
            </a>
            <a href="{{ url('/terms-of-service') }}" class="hover:text-red-800 transition-colors">
                {{ __('footer.terms_of_service') }}
            </a>
        </div>
    </div>
</footer>

<!-- SCRIPT -->
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