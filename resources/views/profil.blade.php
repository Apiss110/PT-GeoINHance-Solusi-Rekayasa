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


<div class="pt-[95px]">
    
<section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative z-10" data-aos="zoom-in">
            <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">
                {{ __('profile.hero_sub') }}
            </span>
            <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">
                {{ __('profile.hero_title') }}
            </h1>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
        </div>
    </section>

    <section class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.who_we_are_sub') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                    {!! __('profile.who_we_are_title') !!}
                </h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    {{ __('profile.who_we_are_p1') }}
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    {{ __('profile.who_we_are_p2') }}
                </p>

                <div class="grid grid-cols-3 gap-4 border-t border-slate-200 pt-6">
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">12+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                            {{ __('profile.stat_exp') }}
                        </span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">250+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                            {{ __('profile.stat_projects') }}
                        </span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">40+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                            {{ __('profile.stat_engineers') }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="relative group" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-slate-200 bg-slate-900">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800" alt="Bangunan Kantor PT GeoINHance" class="w-full h-[480px] object-cover group-hover:scale-110 group-hover:opacity-40 transition duration-700">
                    
                    <div class="absolute inset-0 flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                        <span class="text-red-500 font-bold uppercase text-[10px] tracking-widest mb-1">
                            {{ __('profile.office_badge') }}
                        </span>
                        <h4 class="text-white font-black text-xl uppercase tracking-wide">
                            {{ __('profile.office_title') }}
                        </h4>
                        <p class="text-slate-300 text-xs mt-2 leading-relaxed">
                            {{ __('profile.office_desc') }}
                        </p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-red-800/10 rounded-full blur-2xl -z-10"></div>
            </div>
        </div>
    </section>

<section id="visi-misi" class="bg-slate-50 py-24 px-6 border-t border-b border-slate-100 relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none select-none">
        <div class="absolute top-12 left-12 w-32 h-32 border border-slate-900 grid grid-cols-3 grid-rows-3">
            <div class="border-r border-b border-slate-900"></div>
            <div class="border-r border-b border-slate-900"></div>
            <div class="border-b border-slate-900"></div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">
        
        <div class="mb-16 text-center" data-aos="fade-up">
            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                {{ __('profile.principles_sub') }}
            </span>
            <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tight">
                {{ __('profile.principles_title') }}
            </h2>
            <div class="w-12 h-0.5 bg-red-800 mx-auto mt-3"></div>
        </div>

        <div class="mb-16 text-center mx-auto max-w-3xl" data-aos="fade-up">
            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400 mb-4">
                {{ __('profile.vision_title') }}
            </h3>
            <p class="text-slate-600 leading-relaxed">
                {{ __('profile.vision_desc') }}
            </p>
        </div>

        <div class="space-y-8" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center mb-4">
            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400 mb-4">
                {{ __('profile.mission_title') }}
            </h3>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#002d62]">
                    {{ __('profile.mission_desc') }}
                </span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-red-800/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-red-800 group-hover:text-white group-hover:border-red-800 transition-all duration-300 shrink-0 shadow-sm">
                        01
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_1') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-[#002d62]/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-[#002d62] group-hover:text-white group-hover:border-[#002d62] transition-all duration-300 shrink-0 shadow-sm">
                        02
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_2') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-red-800/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-red-800 group-hover:text-white group-hover:border-red-800 transition-all duration-300 shrink-0 shadow-sm">
                        03
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_3') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-[#002d62]/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-[#002d62] group-hover:text-white group-hover:border-[#002d62] transition-all duration-300 shrink-0 shadow-sm">
                        04
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_4') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-red-800/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-red-800 group-hover:text-white group-hover:border-red-800 transition-all duration-300 shrink-0 shadow-sm">
                        05
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_5') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-[#002d62]/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-[#002d62] group-hover:text-white group-hover:border-[#002d62] transition-all duration-300 shrink-0 shadow-sm">
                        06
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_6') }}
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

    <section id="legalitas" class="bg-white py-24 px-6 border-b border-slate-200">
        <div class="max-w-7xl mx-auto">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.legality_sub') ?? 'Kepatuhan & Transparansi' }}
                </span>
                <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">
                    {{ __('profile.legality_title') ?? 'Company Legality' }}
                </h2>
                <div class="w-12 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-500 text-sm mt-4 max-w-2xl mx-auto leading-relaxed">
                    {{ __('profile.legality_desc') ?? 'PT GeoINHance Solusi Rekayasa is officially established and legally registered under the laws of the Republic of Indonesia.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-file-signature text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_akta_title') ?? 'Articles of Incorporation' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            No: 01 (December 1, 2025)
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_akta_desc') ?? 'Officially established before Notary Listiani Nurhasanah, S.H., M.Kn. as a verified Limited Liability Company.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[11px] font-semibold text-slate-500 bg-slate-100/80 p-2 rounded text-center">
                        Notary: Listiani Nurhasanah, S.H., M.Kn.
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-scale-balanced text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_sk_title') ?? 'Ministry Decree' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            Kemenkumham RI
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_sk_desc') ?? 'Approved by the Ministry of Law and Human Rights of the Republic of Indonesia with official legalization code.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[10px] font-mono text-slate-700 bg-slate-100/80 p-2 rounded text-center font-bold">
                        AHU-0273665.AH.01.11.2025
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-id-card text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_nib_title') ?? 'Business ID Number (NIB)' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            OSS System Registration
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_nib_desc') ?? 'Official business identification registry ensuring legal clearance for operational and engineering infrastructure projects.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[11px] font-mono text-slate-700 bg-slate-100/80 p-2 rounded text-center font-bold tracking-wider">
                        1712250060091
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="400">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-coins text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_tax_title') ?? 'Company Tax ID (NPWP)' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            Directorate General of Taxes
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_tax_desc') ?? 'Registered corporate tax account ensuring transparent fiscal accountability and government regulatory obedience.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[11px] font-mono text-slate-700 bg-slate-100/80 p-2 rounded text-center font-bold">
                        1000000007227494
                    </div>
                </div>

            </div>
        </div>
    </section>

<section class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto space-y-24">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">
                <div class="w-full h-[320px] md:h-[400px] rounded-2xl overflow-hidden shadow-sm border border-slate-200/60" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800" alt="Analisis Geoteknik GeoINHance" class="w-full h-full object-cover">
                </div>
                
                <div data-aos="fade-left">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                        {{ __('profile.expertise_sub') }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                        {!! __('profile.expertise_title') !!}
                    </h2>
                    <p class="text-slate-600 mb-4 leading-relaxed font-normal">
                        {{ __('profile.expertise_p1') }}
                    </p>
                    <p class="text-slate-600 leading-relaxed font-normal">
                        {{ __('profile.expertise_p2') }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center pt-4">
                <div class="order-2 md:order-1" data-aos="fade-right">
                    <span class="text-[#002d62] font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                        {{ __('profile.approach_sub') }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                        {!! __('profile.approach_title') !!}
                    </h2>
                    <p class="text-slate-600 mb-4 leading-relaxed font-normal">
                        {{ __('profile.approach_p1') }}
                    </p>
                    <p class="text-slate-600 leading-relaxed font-normal">
                        {{ __('profile.approach_p2') }}
                    </p>
                </div>
                
                <div class="w-full h-[320px] md:h-[400px] rounded-2xl overflow-hidden shadow-sm border border-slate-200/60 order-1 md:order-2" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1590069261209-f8e9b8642343?w=800" alt="Manajemen Proyek GeoINHance" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50/70 py-20 px-6 border-t border-b border-slate-100">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.commitment_sub') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 uppercase tracking-tight">
                    {{ __('profile.commitment_title') }}
                </h2>
                <div class="w-16 h-[2px] bg-red-800 mx-auto mt-4"></div>
                
                <p class="text-slate-600 mt-6 leading-relaxed font-normal text-sm md:text-base">
                    {{ __('profile.commitment_p1') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">01 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">
                        {{ __('profile.card_01_title') }}
                    </h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        {!! __('profile.card_01_desc') !!}
                    </p>
                </div>

                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">02 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">
                        {{ __('profile.card_02_title') }}
                    </h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        {{ __('profile.card_02_desc') }}
                    </p>
                </div>

                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">03 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">
                        {{ __('profile.card_03_title') }}
                    </h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        {{ __('profile.card_03_desc') }}
                    </p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto text-center border-t border-slate-200 pt-8" data-aos="fade-up" data-aos-delay="200">
                <p class="text-slate-500 text-xs leading-relaxed font-normal">
                    {{ __('profile.commitment_footer') }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 px-6 text-center bg-white">
        <div class="max-w-md mx-auto" data-aos="fade-up">
            <a href="{{ asset('documents/COMPANY PROFILE GEOINHANCE.pdf') }}" class="inline-flex items-center justify-center space-x-3 bg-red-800 hover:bg-red-700 text-white font-bold uppercase text-xs tracking-widest px-8 py-4 rounded-xl shadow-md hover:shadow-red-800/30 transition-all duration-300 transform hover:-translate-y-0.5 group w-full sm:w-auto">
                <span>{{ __('profile.btn_download') }}</span>
                <svg class="w-4 h-4 transform group-hover:translate-y-0.5 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </a>
        </div>
    </section>

    <section id="alamat-kantor" class="bg-white py-24 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.location_sub') }}
                </span>
                <h2 class="text-3xl font-black text-slate-900 uppercase mb-6 tracking-tight">
                    {{ __('profile.location_title') }}
                </h2>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 hover:shadow-md transition duration-300 cursor-pointer group">
                        <div class="text-red-800 mt-1 group-hover:scale-110 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 group-hover:text-red-800 transition">
                                {{ __('profile.addr_01_title') }}
                            </h4>
                            <p class="text-slate-600 text-sm mt-1 leading-relaxed">
                                {!! __('profile.addr_01_desc') !!}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 hover:shadow-md transition duration-300 cursor-pointer group">
                        <div class="text-red-800 mt-1 group-hover:scale-110 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 group-hover:text-red-800 transition">
                                {{ __('profile.addr_02_title') }}
                            </h4>
                            <p class="text-slate-600 text-sm mt-1 leading-relaxed">
                                {!! __('profile.addr_02_desc') !!}
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

    <a href="https://wa.me/085190441744" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
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