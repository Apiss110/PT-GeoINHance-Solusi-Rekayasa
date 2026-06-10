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
                    <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">Structural Analysis & Design</span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none">
                        STAAD.<span class="text-blue-400">Pro</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-300 max-w-2xl font-light leading-relaxed">
                        A powerful and integrated finite element analysis and design application. Analyze any structure exposed to static, dynamic, wind, earthquake, thermal, and moving loads.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="#variants" class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-400 transition shadow-lg shadow-blue-500/20">View Variants</a>
                        <a href="#features" class="bg-transparent border border-slate-500 text-slate-300 px-6 py-3 rounded-md font-semibold hover:bg-slate-800 hover:text-white transition">Explore Features</a>
                    </div>
                </div>
                <div class="lg:col-span-5 relative">
                    <div class="bg-slate-800/60 backdrop-blur-md p-6 rounded-xl border border-slate-700 shadow-2xl relative aspect-[4/3] flex flex-col justify-between">
                        <div class="flex items-center justify-between border-b border-slate-700 pb-3">
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            </div>
                            <span class="text-xs text-slate-400 font-mono">STAAD.Pro FEA Engine v24</span>
                        </div>
                        <div class="flex-1 flex items-center justify-center">
                            <i class="fa-solid fa-cubes text-7xl text-blue-400/40 animate-pulse"></i>
                        </div>
                        <div class="bg-slate-900/80 p-3 rounded-lg border border-slate-700 text-xs font-mono text-slate-300 space-y-1">
                            <p><span class="text-green-400">></span> Automated Load Generation: Done</p>
                            <p><span class="text-green-400">></span> 50+ International Design Codes Loaded</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="flex gap-4 items-start">
                    <div class="bg-blue-50 p-3 rounded-lg text-blue-600 shrink-0">
                        <i class="fa-solid fa-city text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Any Project Type</h3>
                        <p class="text-sm text-gray-600">Versatile design for buildings, culverts, plants, bridges, stadiums, and marine structures.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="bg-blue-50 p-3 rounded-lg text-blue-600 shrink-0">
                        <i class="fa-solid fa-wand-magic-sparkles text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Automated Loading</h3>
                        <p class="text-sm text-gray-600">Reduces hours by automating forces from gravity, wind, earthquakes, snow, or vehicles.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="bg-blue-50 p-3 rounded-lg text-blue-600 shrink-0">
                        <i class="fa-solid fa-globe text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Global Standards</h3>
                        <p class="text-sm text-gray-600">Easily accommodate global requirements including U.S., European, Indian, Chinese, and Japanese codes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">Extremely Flexible Modeling Environment</h2>
                <p class="text-gray-600">Equipped with sophisticated visualization, an open architecture for heavy customization, and a 25-year track record of rock-solid reliability.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">OpenSTAAD API Integration</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Extract STAAD data directly into custom programs or tools like Microsoft Word or Excel. Use OpenSTAAD to fully drive model creation, run analyses, and view results via your own tailored macro interfaces.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-file-cad"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">CAD Interoperability</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Import CAD models in DXF formats seamlessly to use as base wireframes, structural grids, or outlines for complex decks that require robust finite element meshing. Exchange CIS/2 data with advanced steel design packages.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-pencil-ruler"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Integrated Concrete & Steel Design</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Access over 50 steel design codes globally. Enjoy integrated steel drawing production via Steel Autodrafter, or unlock full concrete design, detailing, and drawing production with specialized extensions.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                    <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Advanced Non-Linear Analysis</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Export your structural analytical models directly to ADINA to solve highly sophisticated, complex, or extreme non-linear physical problems with high convergence stability.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="variants" class="py-20 bg-white border-t border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
                <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">Choose Your Tier</span>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">STAAD.Pro Flexible Variants</h2>
                <p class="text-gray-600">Pilih varian yang paling sesuai dengan kompleksitas beban struktur, kriteria seismik, dan integrasi fondasi proyek Anda.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 items-stretch">
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 flex flex-col justify-between relative hover:border-blue-300 transition">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">STAAD.Pro</h3>
                            <p class="text-xs text-blue-600 font-semibold mt-1">Standard Core Edition</p>
                        </div>
                        <p class="text-sm text-gray-600">Solusi mendasar untuk analisis struktur harian menggunakan metode analisis elemen hingga standar.</p>
                        <hr class="border-gray-200">
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> Static & basic dynamic loading</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> Comprehensive FEM tools</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> 50+ International design codes</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> OpenSTAAD customization API</li>
                        </ul>
                    </div>
                    <div class="pt-8">
                        <a href="#contact" class="block text-center bg-white border border-gray-300 text-gray-700 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-100 transition">Request Quote</a>
                    </div>
                </div>

                <div class="bg-slate-900 p-8 rounded-2xl border-2 border-blue-500 flex flex-col justify-between relative text-white transform lg:-translate-y-2 shadow-xl shadow-blue-950/20">
                    <div class="absolute top-0 right-6 transform -translate-y-1/2 bg-blue-500 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                        Most Popular
                    </div>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-bold">STAAD.Pro Advanced</h3>
                            <p class="text-xs text-blue-400 font-semibold mt-1">High-Performance & Non-Linear</p>
                        </div>
                        <p class="text-sm text-slate-300">Menyelesaikan masalah struktural yang jauh lebih kompleks dengan kecepatan komputasi super cepat.</p>
                        <hr class="border-slate-800">
                        <ul class="space-y-3 text-sm text-slate-300">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> Semua fitur versi STAAD.Pro</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> Higher-order non-linear analysis</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> Advanced Seismic & Dynamic solver</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> Multi-threaded processing capabilities</li>
                        </ul>
                    </div>
                    <div class="pt-8">
                        <a href="#contact" class="block text-center bg-blue-500 text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-600 transition shadow-md shadow-blue-500/10">Upgrade to Advanced</a>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 flex flex-col justify-between relative hover:border-blue-300 transition">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Structural WorkSuite</h3>
                            <p class="text-xs text-blue-600 font-semibold mt-1">Complete Bundle System</p>
                        </div>
                        <p class="text-sm text-gray-600">Paket komprehensif terintegrasi mencakup analisis super, desain fondasi, dan koneksi baja spesifik.</p>
                        <hr class="border-gray-200">
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> Termasuk STAAD.Pro Advanced</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> STAAD Foundation Advanced</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> RAM Connection & RAM Concept</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> Integrated Concrete detailing tools</li>
                        </ul>
                    </div>
                    <div class="pt-8">
                        <a href="#contact" class="block text-center bg-white border border-gray-300 text-gray-700 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-100 transition">Get Full Suite</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-slate-900 text-white py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
            <h2 class="text-3xl font-bold tracking-tight">Ready to optimize your structural workflows?</h2>
            <p class="text-slate-400 max-w-2xl mx-auto text-sm leading-relaxed">
                STAAD.Pro can be purchased directly on Bentley's eStore or via Virtuosity. Untuk konsultasi implementasi lisensi perusahaan Anda, hubungi tim kami segera.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 pt-4">
                <a href="https://virtuosity.com" target="_blank" class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-blue-700 transition w-full sm:w-auto">
                    Buy via Virtuosity eStore
                </a>
                <a href="#" class="bg-slate-800 text-slate-300 font-semibold px-8 py-3 rounded-md hover:bg-slate-700 transition w-full sm:w-auto border border-slate-700">
                    Contact Specialist
                </a>
            </div>
        </div>
    </section>

<footer class="bg-slate-900 text-slate-400 text-xs py-12 px-6 md:px-16 border-t border-slate-800">
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