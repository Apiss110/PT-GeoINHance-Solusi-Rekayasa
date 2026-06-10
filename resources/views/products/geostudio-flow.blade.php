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

<div class="pt-[73px] lg:pt-[77px]">

<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-20 lg:py-28 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">Groundwater & Environmental Analysis</span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none">
                        GeoStudio <span class="text-blue-400">Flow</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-300 max-w-2xl font-light leading-relaxed">
                        Simulate complex heat and mass transfer processes in 2D or 3D. Solve groundwater and environmental challenges faster with software built for diverse geo-environmental conditions.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="#pricing" class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-400 transition shadow-lg shadow-blue-500/20">View Product Plans</a>
                        <a href="#modules" class="bg-transparent border border-slate-500 text-slate-300 px-6 py-3 rounded-md font-semibold hover:bg-slate-800 hover:text-white transition">Explore Modules</a>
                    </div>
                </div>
                <div class="lg:col-span-5 relative">
                    <div class="bg-slate-800/60 backdrop-blur-md p-6 rounded-xl border border-slate-700 shadow-2xl relative aspect-[4/3] flex flex-col justify-between">
                        <div class="flex items-center justify-between border-b border-slate-700 pb-3">
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                                <div class="w-3 h-3 rounded-full bg-cyan-500"></div>
                                <div class="w-3 h-3 rounded-full bg-indigo-500"></div>
                            </div>
                            <span class="text-xs text-slate-400 font-mono">GeoStudio Multi-Physics FEA</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center justify-center text-center p-4">
                            <i class="fa-solid fa-water text-6xl text-blue-400/40 mb-3 animate-pulse"></i>
                            <p class="text-xs font-mono text-slate-400">Saturated-Unsaturated Transient Flow Solver Active</p>
                        </div>
                        <div class="bg-slate-900/80 p-3 rounded-lg border border-slate-700 text-xs font-mono text-slate-300 space-y-1">
                            <p><span class="text-blue-400">></span> Atmospheric Coupling: Connected</p>
                            <p><span class="text-blue-400">></span> Seequent Central Integration: Synchronized</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="benefits" class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">Solve Groundwater Challenges Faster</h2>
                <p class="text-gray-600">Akomodasi berbagai kebutuhan analisis lingkungan mulai dari bendungan urugan tanah, tanggul, ekskavasi, hingga tambang terbuka (*open pit*).</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="space-y-3">
                    <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center">
                        <i class="fa-solid fa-layer-group text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900">Multiphysics Integration</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Gabungkan proses fisik terkopel (*coupled*) maupun tidak terkopel yang melibatkan perpindahan air tanah, panas, zat terlarut, gas, dan udara.</p>
                </div>
                <div class="space-y-3">
                    <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center">
                        <i class="fa-solid fa-chart-nodes text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900">Analyse Complex Behaviour</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Formula matematis yang ketat untuk masalah kompleks, termasuk aliran air tanah jenuh-tidak jenuh non-linier dan proses perubahan fase (*phase change*).</p>
                </div>
                <div class="space-y-3">
                    <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center">
                        <i class="fa-solid fa-cloud-arrows-up-down text-xl"></i>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900">Seamless Collaboration</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Manfaatkan ekosistem Seequent termasuk Leapfrog dan PLAXIS untuk berbagi geometri dan material secara langsung melalui *workflow* berbasis cloud.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="modules" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">All-In-One Core Technology</span>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">Teknologi Numerik Terintegrasi</h2>
                <p class="text-gray-600">GeoStudio Flow dibangun di atas fondasi produk analisis elemen hingga legendaris untuk pemodelan lingkungan berpresisi tinggi.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                    <div>
                        <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">SEEP / W</div>
                        <h4 class="font-bold text-gray-900 text-lg mt-1">Groundwater Seepage</h4>
                        <p class="text-xs text-gray-600 mt-2 leading-relaxed">Memodelkan aliran air tanah pada media berpori. Menangani masalah kondisi tunak jenuh sederhana hingga analisis transien jenuh/tidak jenuh dengan kopling atmosfer.</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                    <div>
                        <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">TEMP / W</div>
                        <h4 class="font-bold text-gray-900 text-lg mt-1">Geothermal & Heat</h4>
                        <p class="text-xs text-gray-600 mt-2 leading-relaxed">Analisis perpindahan panas dan perubahan fase (*phase change*), mulai dari konduksi sederhana hingga simulasi energi permukaan dengan siklus beku-cair.</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                    <div>
                        <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">CTRAN / W</div>
                        <h4 class="font-bold text-gray-900 text-lg mt-1">Solute & Gas Transfer</h4>
                        <p class="text-xs text-gray-600 mt-2 leading-relaxed">Pemodelan pergerakan zat terlarut dan transfer gas dalam media berpori, didominasi difusi hingga sistem adveksi-dispersi kompleks dengan reaksi orde pertama.</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                    <div>
                        <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">AIR / W</div>
                        <h4 class="font-bold text-gray-900 text-lg mt-1">Air Flow Simulation</h4>
                        <p class="text-xs text-gray-600 mt-2 leading-relaxed">Dirancang khusus untuk simulasi transfer udara pada limbah tambang (*mine waste*) dan media berpori lainnya, mencakup interaksi udara-air terkopel.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">Flexible Dimensions</span>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">GeoStudio Flow Product Plans</h2>
                <p class="text-gray-600">Pilih opsi pemodelan dimensi yang paling sesuai dengan kebutuhan akurasi dan geometri dari tantangan lingkungan proyek Anda.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto items-stretch">
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 flex flex-col justify-between hover:border-blue-300 transition">
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">GeoStudio 2D Flow</h3>
                                <p class="text-xs text-blue-600 font-semibold mt-1">2D Environmental Protection & Seepage</p>
                            </div>
                            <span class="text-sm font-bold text-gray-500">USD $4,560.00 <span class="text-[10px] font-normal block text-right">/thn excl. tax</span></span>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">Paket handal untuk pemodelan perlindungan lingkungan, aliran air tanah, dan pembekuan tanah dalam dua dimensi.</p>
                        <hr class="border-gray-200">
                        <span class="text-xs font-bold text-gray-900 uppercase tracking-wider block">Termasuk Komponen Utama:</span>
                        <div class="grid grid-cols-2 gap-2 text-xs font-semibold text-gray-700">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> SEEP/W (2D)</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> TEMP/W (2D)</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> CTRAN/W (2D)</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> AIR/W (2D)</div>
                        </div>
                    </div>
                    <div class="pt-8">
                        <a href="#contact" class="block text-center bg-white border border-gray-300 text-gray-700 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-100 transition">Contact For Quote</a>
                    </div>
                </div>

                <div class="bg-slate-900 p-8 rounded-2xl border-2 border-blue-500 flex flex-col justify-between text-white relative shadow-xl shadow-blue-950/10">
                    <div class="absolute top-0 right-6 transform -translate-y-1/2 bg-blue-500 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                        Full Architecture
                    </div>
                    <div class="space-y-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-2xl font-bold">GeoStudio 3D Flow</h3>
                                <p class="text-xs text-blue-400 font-semibold mt-1">Comprehensive 3D Mass & Heat Solver</p>
                            </div>
                            <span class="text-sm font-bold text-blue-400">USD $11,655.00 <span class="text-[10px] font-normal block text-right text-slate-400">/thn excl. tax</span></span>
                        </div>
                        <p class="text-sm text-slate-300 leading-relaxed">Ekstensi penuh ke lingkungan 3D untuk menangani geometri kompleks dengan formulasi transfer massa dan konveksi paksa.</p>
                        <hr class="border-slate-800">
                        <span class="text-xs font-bold text-blue-400 uppercase tracking-wider block">Termasuk Komponen Utama 3D:</span>
                        <div class="grid grid-cols-2 gap-2 text-xs font-semibold text-slate-300">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> SEEP3D (3D)</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> TEMP3D (3D)</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> CTRAN3D (3D)</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> AIR3D (3D)</div>
                        </div>
                    </div>
                    <div class="pt-8">
                        <a href="https://virtuosity.com" target="_blank" class="block text-center bg-blue-500 text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-600 transition shadow-md shadow-blue-500/10">Buy on Bentley eStore</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-slate-900 text-white py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
            <h2 class="text-3xl font-bold tracking-tight">Accelerate your geo-environmental projects today</h2>
            <p class="text-slate-400 max-w-2xl mx-auto text-sm leading-relaxed">
                GeoStudio Flow dapat dibeli secara aman melalui Bentley's eStore (Virtuosity) dengan opsi lisensi *Named* 12 bulan atau lisensi korporasi (*Shared*). Hubungi kami untuk jadwal demo perangkat lunak gratis.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 pt-4">
                <a href="#" class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-blue-700 transition w-full sm:w-auto">
                    Request Live Technical Demo
                </a>
                <a href="#" class="bg-slate-800 text-slate-300 font-semibold px-8 py-3 rounded-md hover:bg-slate-700 transition w-full sm:w-auto border border-slate-700">
                    Contact Sales Specialist
                </a>
            </div>
        </div>
    </section>

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