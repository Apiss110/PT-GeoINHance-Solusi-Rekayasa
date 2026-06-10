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
        
    <section class="bg-[#002d62] text-white py-24 md:py-28 px-6 tracking-tight text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative z-10" data-aos="zoom-in">
            <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">Trusted 2D Geotechnical Analysis</span>
            <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">PLAXIS 2D</h1>
            <p class="text-slate-300 text-sm md:text-base mt-4 max-w-2xl mx-auto leading-relaxed">
                Perangkat Lunak Elemen Hingga (Finite Element) Terpercaya untuk Analisis Deformasi, Aliran Air Tanah, dan Stabilitas dalam Rekayasa Geoteknik serta Mekanika Batuan.
            </p>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-6 rounded-full"></div>

            <div class="mt-8 flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('kontak', ['product' => 'plaxis-2d']) }}" 
                   class="w-full sm:w-auto inline-flex items-center justify-center bg-gradient-to-r from-red-800 to-red-700 hover:from-red-700 hover:to-red-600 text-white font-black text-xs uppercase tracking-widest px-8 py-4 rounded-xl shadow-[0_10px_30px_-5px_rgba(153,27,27,0.4)] hover:shadow-[0_15px_35px_-5px_rgba(153,27,27,0.6)] transition-all duration-300 transform hover:-translate-y-1 group">
                    <span class="material-symbols-outlined mr-2.5 text-lg transition-transform group-hover:scale-110">monetization_on</span> 
                    Minta Penawaran Harga
                </a>
            </div>
        </div>
    </section>

<section class="max-w-7xl mx-auto py-24 px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
    <div data-aos="fade-right" class="space-y-6 text-slate-600 text-base leading-relaxed text-left">
        <div>
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-4 uppercase tracking-tight">
                Apa Itu Plaxis 2D?
            </h2>
            <div class="w-12 h-1 bg-[#002d62] mb-6 rounded-full"></div>
        </div>
        
        <p class="text-justify">
            <strong>PLAXIS 2D</strong> adalah paket program berbasis elemen hingga (*finite-element*/FE) dua dimensi yang dirancang secara khusus untuk menganalisis perilaku deformasi, konsolidasi, serta stabilitas tanah dan batuan. Dikembangkan oleh <strong>Seequent (The Bentley Subsurface Company)</strong>, solusi ini telah menjadi standar global yang diandalkan oleh konsultan terkemuka dan kontraktor internasional.
        </p>

        <p class="text-justify">
            Perangkat lunak ini memfasilitasi evaluasi tegangan dan perpindahan secara realistis melalui <em>Staged Construction Mode</em>. Fitur ini memungkinkan pengguna mengaktifkan atau menonaktifkan elemen struktur dan kluster tanah di setiap fase kalkulasi sesuai dengan tahapan konstruksi riil di lapangan, seperti pada simulasi galian dalam, terowongan, maupun fondasi.
        </p>
        
        <p class="bg-slate-50 p-5 rounded-xl border-l-4 border-[#002d62] italic text-sm text-slate-500 leading-relaxed">
            Sebagai mitra resmi di Indonesia, <strong>PT GeoINHance Solusi Rekayasa</strong> berkomitmen menyediakan pengadaan lisensi original Seequent, pembaruan versi berkelanjutan, serta dukungan teknik profesional untuk mengoptimalkan akurasi desain proyek Anda.
        </p>

        <div class="grid grid-cols-2 gap-6 border-t border-slate-200 pt-6 text-left">
            <div class="group cursor-pointer">
                <span class="block text-lg md:text-xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300 leading-snug">Plane Strain & Axisymmetric</span>
                <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 mt-1 block">Opsi Pemodelan Geometri</span>
            </div>
            <div class="group cursor-pointer">
                <span class="block text-lg md:text-xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300 leading-snug">Staged Construction</span>
                <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 mt-1 block">Simulasi Fase Konstruksi Riil</span>
            </div>
        </div>
    </div>
    
    <div class="relative group" data-aos="fade-left">
        <div class="rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-slate-200 bg-slate-900">
            <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=800" alt="Plaxis 2D Modeling Work" class="w-full h-[460px] object-cover group-hover:scale-105 group-hover:opacity-40 transition duration-700">
            
            <div class="absolute inset-0 flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent text-left">
                <span class="text-red-500 font-bold uppercase text-[10px] tracking-widest mb-1">2D Mesh Generation</span>
                <h4 class="text-white font-black text-xl uppercase tracking-wide">Jaring Elemen Otomatis</h4>
                <p class="text-slate-300 text-xs mt-2 leading-relaxed">Pembuatan jaring elemen segitiga 6-node atau 15-node secara otomatis untuk menghasilkan konvergensi hitungan yang presisi tinggi.</p>
            </div>
        </div>
        <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-[#002d62]/10 rounded-full blur-2xl -z-10"></div>
    </div>
</section>
    <section class="py-24 px-6 bg-slate-50 border-t border-b border-slate-200">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12 text-center md:text-left">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Product Variations</span>
                <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Pilihan Edisi Lisensi PLAXIS 2D</h2>
                <div class="w-12 h-1 bg-red-800 mt-3 rounded-full mx-auto md:mx-0"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white border border-slate-200 p-6 rounded-2xl flex flex-col justify-between shadow-sm hover:shadow-md transition">
                    <div>
                        <h3 class="font-black text-slate-900 text-lg mb-2">PLAXIS 2D</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Menyediakan fitur dasar esensial untuk analisis deformasi harian, stabilitas lereng, dan kalkulasi faktor keamanan (*Safety Analysis*) standar tanah maupun batuan.
                        </p>
                    </div>
                    <a href="{{ route('kontak', ['product' => 'plaxis-2d']) }}" class="mt-8 block text-center py-2.5 bg-[#002d62] hover:bg-[#001f44] text-white text-xs font-bold uppercase tracking-wider rounded-xl transition">Minta Penawaran</a>
                </div>

                <div class="bg-white border border-slate-200 p-6 rounded-2xl flex flex-col justify-between shadow-sm hover:shadow-md transition">
                    <div>
                        <h3 class="font-black text-slate-900 text-lg mb-2">PLAXIS 2D Advanced</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-4">
                            Mencakup seluruh fitur edisi dasar ditambah fungsionalitas komputasi tingkat lanjut:
                        </p>
                        <ul class="text-xs text-slate-500 space-y-2 border-t border-slate-100 pt-3">
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Analisis Rayapan (*Creep*)</li>
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Kopling Aliran-Deformasi</li>
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Aliran Air Tanah Tunak</li>
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Aliran Panas (*Thermal Flow*)</li>
                        </ul>
                    </div>
                    <a href="{{ route('kontak', ['product' => 'plaxis-2d-advanced']) }}" class="mt-8 block text-center py-2.5 bg-[#002d62] hover:bg-[#001f44] text-white text-xs font-bold uppercase tracking-wider rounded-xl transition">Minta Penawaran</a>
                </div>

                <div class="bg-white border border-slate-200 p-6 rounded-2xl flex flex-col justify-between shadow-sm hover:shadow-md transition">
                    <div>
                        <h3 class="font-black text-slate-900 text-lg mb-2 mt-1">PLAXIS 2D Ultimate</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-4">
                            Edisi terlengkap untuk simulasi kondisi lingkungan dinamis & beban eksternal ekstrem:
                        </p>
                        <ul class="text-xs text-slate-500 space-y-2 border-t border-slate-100 pt-3">
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Semua fitur edisi Advanced</li>
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Analisis Dinamis & Gempa</li>
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Level Air Tanah Transien</li>
                            <li class="flex items-start"><span class="text-red-800 mr-2">•</span> Aliran Panas Transien</li>
                        </ul>
                    </div>
                    <a href="{{ route('kontak', ['product' => 'plaxis-2d-ultimate']) }}" class="mt-8 block text-center py-2.5 bg-gradient-to-r from-red-800 to-red-700 hover:from-red-700 hover:to-red-600 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-sm">Minta Penawaran</a>
                </div>

                <div class="bg-white border border-slate-200 p-6 rounded-2xl flex flex-col justify-between shadow-sm hover:shadow-md transition">
                    <div>
                        <h3 class="font-black text-slate-900 text-lg mb-1">GA 2D WorkSuite</h3>
                        <span class="text-[10px] font-bold text-slate-400 block mb-2 uppercase tracking-wide">Integrated Bundle</span>
                        <p class="text-sm text-slate-600 leading-relaxed mb-4">
                            Paket terintegrasi penuh dari Seequent untuk menggabungkan kekuatan multi-software dalam satu lisensi.
                        </p>
                        <ul class="text-xs text-slate-500 space-y-2 border-t border-slate-100 pt-3">
                            <li class="flex items-center"><span class="text-slate-400 mr-2">•</span> PLAXIS 2D Ultimate</li>
                            <li class="flex items-center"><span class="text-slate-400 mr-2">•</span> GeoStudio 2D Ultimate</li>
                        </ul>
                    </div>
                    <a href="{{ route('kontak', ['product' => 'geotechnical-analysis-2d-worksuite']) }}" class="mt-8 block text-center py-2.5 bg-[#002d62] hover:bg-[#001f44] text-white text-xs font-bold uppercase tracking-wider rounded-xl transition">Minta Penawaran</a>
                </div>
            </div>
        </div>
    </section>

<section class="max-w-5xl mx-auto py-24 px-6 text-center" data-aos="fade-up">
    <div class="max-w-2xl mx-auto mb-12">
        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Product Showcase</span>
        <h2 class="text-3xl md:text-4xl font-black text-slate-900 uppercase tracking-tight">Video Demonstrasi PLAXIS 2D</h2>
        <div class="w-12 h-1 bg-red-800 mt-4 mx-auto rounded-full"></div>
        <p class="text-slate-500 text-sm mt-4 leading-relaxed">
            Tonton alur kerja pemodelan geoteknik, otomatisasi pembuatan jaring elemen (mesh generation), hingga visualisasi hasil analisis deformasi tanah secara interaktif.
        </p>
    </div>
    
    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 bg-slate-900 aspect-video w-full">
        <iframe 
            class="w-full h-full" 
            src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
            title="PLAXIS 2D Geotechnical Software Demonstration" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen>
        </iframe>
    </div>
</section>

<section class="py-24 px-6 max-w-4xl mx-auto border-t border-slate-100">
    <div class="mb-12 text-center">
        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Common Inquiries</span>
        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Frequently Asked Questions (FAQs)</h2>
        <p class="text-slate-500 text-sm mt-2">Pertanyaan umum mengenai lisensi, spesifikasi sistem, dan kapabilitas PLAXIS 2D.</p>
    </div>

    <div class="divide-y divide-slate-200 border-t border-b border-slate-200">
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none text-base md:text-lg hover:text-[#002d62] transition">
                <span>What is PLAXIS 2D?</span>
                <span class="transition group-open:rotate-180 text-slate-400">
                    <svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg>
                </span>
            </summary>
            <p class="text-slate-600 mt-4 text-sm md:text-base leading-relaxed text-justify">
                PLAXIS 2D adalah paket program berbasis elemen hingga (*finite-element*/FE) dua dimensi yang kuat dan mudah digunakan untuk analisis deformasi dan stabilitas dalam rekayasa geoteknik dan mekanika batuan. Program ini diandalkan secara global oleh berbagai konsultan papan atas dan lembaga akademik di industri teknik sipil.
            </p>
        </details>

        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none text-base md:text-lg hover:text-[#002d62] transition">
                <span>What is PLAXIS used for?</span>
                <span class="transition group-open:rotate-180 text-slate-400">
                    <svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg>
                </span>
            </summary>
            <p class="text-slate-600 mt-4 text-sm md:text-base leading-relaxed text-justify">
                PLAXIS 2D digunakan untuk menyelesaikan berbagai tantangan analisis tanah kompleks, mulai dari proyek galian dinding penahan (*excavations*), konstruksi stabilitas lereng dan tanggul (*embankments*), perhitungan kapasitas dukung pondasi darat maupun struktur lepas pantai (*onshore/offshore foundations*), hingga pemodelan terowongan (*tunneling*), pertambangan terbuka, serta geomekanika reservoir.
            </p>
        </details>

        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none text-base md:text-lg hover:text-[#002d62] transition">
                <span>What is the difference between the various PLAXIS 2D products?</span>
                <span class="transition group-open:rotate-180 text-slate-400">
                    <svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg>
                </span>
            </summary>
            <div class="text-slate-600 mt-4 text-sm md:text-base leading-relaxed text-left space-y-3">
                <p>Kapabilitas komputasi dibagi berdasarkan tingkatan edisi produk atau hak kepemilikan SELECT berikut:</p>
                <ul class="list-disc pl-5 space-y-2">
                    <li><strong>PLAXIS 2D (Standard):</strong> Fitur esensial untuk deformasi harian dan analisis stabilitas faktor keamanan (*slope stability*).</li>
                    <li><strong>PLAXIS 2D Advanced:</strong> Menambahkan fungsionalitas rayapan (*creep*), kopling aliran-deformasi (*coupled flow*), serta aliran air tanah tunak.</li>
                    <li><strong>PLAXIS 2D Ultimate:</strong> Edisi terlengkap yang membuka fitur analisis beban dinamis/gempa bumi serta variasi level air tanah transien secara *real-time*.</li>
                    <li><strong>Geotechnical Analysis 2D WorkSuite:</strong> Bundling lisensi komprehensif yang mengintegrasikan kapabilitas PLAXIS 2D Ultimate bersama dengan GeoStudio 2D Ultimate.</li>
                </ul>
            </div>
        </details>

        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none text-base md:text-lg hover:text-[#002d62] transition">
                <span>What are the system requirements to run PLAXIS 2D?</span>
                <span class="transition group-open:rotate-180 text-slate-400">
                    <svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg>
                </span>
            </summary>
            <div class="text-slate-600 mt-4 text-sm leading-relaxed text-left space-y-4">
                <p>Untuk memastikan proses komputasi elemen hingga berjalan lancar, berikut spesifikasi perangkat komputer yang dibutuhkan:</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <strong class="text-red-800 block mb-2 text-xs uppercase tracking-wide">Spesifikasi Minimum:</strong>
                        <ul class="list-disc pl-4 space-y-1 text-slate-500 text-xs">
                            <li><strong>CPU:</strong> Dual-core CPU</li>
                            <li><strong>OS:</strong> Windows 10 Pro (64-bit) atau Windows 11 Pro</li>
                            <li><strong>RAM:</strong> 4 GB RAM</li>
                            <li><strong>Storage:</strong> 2 GB ruang hard disk kosong</li>
                            <li><strong>GPU:</strong> GPU dengan 256 MB OpenGL 1.3</li>
                            <li><strong>Display:</strong> Resolusi layar 1280 x 800 px atau lebih baik</li>
                        </ul>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <strong class="text-[#002d62] block mb-2 text-xs uppercase tracking-wide">Spesifikasi Rekomendasi:</strong>
                        <ul class="list-disc pl-4 space-y-1 text-slate-500 text-xs">
                            <li><strong>CPU:</strong> Quad-core CPU</li>
                            <li><strong>RAM:</strong> 8 GB RAM atau lebih tinggi</li>
                            <li><strong>GPU:</strong> Nvidia GeForce atau Quadro (VRAM min. 1 GB & bus 128-bit), atau solusi setara ATI/AMD</li>
                            <li><strong>Display:</strong> Resolusi layar optimal 1920 x 1080 px</li>
                        </ul>
                    </div>
                </div>
            </div>
        </details>

        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none text-base md:text-lg hover:text-[#002d62] transition">
                <span>How is PLAXIS 2D licensing and activation managed?</span>
                <span class="transition group-open:rotate-180 text-slate-400">
                    <svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg>
                </span>
            </summary>
            <p class="text-slate-600 mt-4 text-sm md:text-base leading-relaxed text-justify">
                Aktivasi PLAXIS 2D menggunakan teknologi berbasis cloud bernama <strong>Subscription Entitlement Service (SES ID)</strong> dari Bentley. Sistem ini memberikan ID universal untuk menghubungkan seluruh aktivitas dalam aplikasi Bentley Anda. Manajemen hak lisensi dikelola langsung di tingkat pengguna (*user level*) sehingga **tidak memerlukan kunci aktivasi manual atau dongle fisik (hardware dongles)**. Pengguna juga dapat mengakses materi belajar personal, riwayat pembelajaran, serta pembaruan produk otomatis.
            </p>
        </details>

        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none text-base md:text-lg hover:text-[#002d62] transition">
                <span>Who develops PLAXIS 2D and what calculation method does it use?</span>
                <span class="transition group-open:rotate-180 text-slate-400">
                    <svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg>
                </span>
            </summary>
            <p class="text-slate-600 mt-4 text-sm md:text-base leading-relaxed text-justify">
                PLAXIS 2D dikembangkan secara resmi oleh <strong>Seequent (The Bentley Subsurface Company)</strong>. Perangkat lunak ini didukung oleh prosedur kalkulasi berbasis <strong>Finite Element Method (FEM)</strong> dua dimensi yang kokoh dan teruji. Prosedur hitung multi-core ini memastikan konvergensi hitungan yang andal untuk model sederhana maupun kompleks, serta unggul dalam menganalisis penurunan (*settlement*), termal, aliran air tanah (*groundwater flow*), konsolidasi, hingga beban gempa dinamis.
            </p>
        </details>

        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none text-base md:text-lg hover:text-[#002d62] transition">
                <span>Where can I get PLAXIS 2D training or professional support in Indonesia?</span>
                <span class="transition group-open:rotate-180 text-slate-400">
                    <svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg>
                </span>
            </summary>
            <p class="text-slate-600 mt-4 text-sm md:text-base leading-relaxed text-justify">
                Sebagai *channel partner* resmi Seequent di Indonesia, <strong>PT GeoINHance Solusi Rekayasa</strong> menyediakan layanan komprehensif yang mencakup pengadaan lisensi original Seequent, pembaruan versi berkelanjutan (*SELECT entitlement*), bantuan kendala teknis pemodelan, hingga program pelatihan (*training course*) geoteknik bersertifikat resmi untuk mengoptimalkan akurasi desain proyek Anda.
            </p>
        </details>
    </div>
</section>

    <section class="bg-[#002d62] text-white py-16 px-6 text-center relative overflow-hidden border-t border-slate-800">
        <div class="absolute -right-24 -bottom-24 w-72 h-72 bg-red-800 rounded-full blur-3xl opacity-20"></div>
        <div class="relative z-10 max-w-2xl mx-auto" data-aos="fade-up">
            <h3 class="text-2xl md:text-3xl font-black uppercase mb-4 tracking-tight">Implementasikan Pemodelan PLAXIS 2D Sekarang</h3>
            <p class="text-slate-300 text-sm mb-8 leading-relaxed">
                Tingkatkan efisiensi analisis infrastruktur Anda dengan akurasi elemen hingga yang teruji. Konsultasikan skema lisensi tahunan korporasi atau paket edukasi instansi bersama tim teknis kami.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/6285190441744" target="_blank" 
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