<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            animation: marquee 25s linear infinite;
        }
        /* Pause jalan logo saat kursor user menempel di atasnya */
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900 ">

    <nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 w-full z-[100] transition-all duration-300">
        <div class="bg-[#002d62] text-white/90 py-2 px-3 sm:px-6 md:px-16 text-[11px] flex justify-between items-center tracking-wider w-full overflow-hidden">
            <div class="flex items-center space-x-3 sm:space-x-8 truncate max-w-[70%] sm:max-w-none">
                <span class="flex items-center truncate">
                    <svg class="w-3.5 h-3.5 mr-1.5 text-yellow-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg> 
                    <span class="truncate">{{ __('nav.top.location') }}</span>
                </span>
                <a href="tel:+6285190441744" class="hidden sm:flex items-center shrink-0 hover:text-yellow-500 transition">
                    <svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg> 
                    +62 851-9044-1744
                </a>
            </div>
            <div class="flex space-x-2 text-xs font-bold shrink-0 ml-2">
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

        <div class="nav-glass border-b border-slate-200 py-2 px-3 md:px-16 flex justify-between items-center shadow-sm">
            <div class="flex items-center">
                <div class="leading-none" style="cursor: pointer;" onclick="window.location.href='/'">
                    <img src="{{ asset('images/inh 2.png') }}" alt="GeoINHance Logo" class="h-12 w-auto md:h-20 object-contain">
                </div>
            </div>

            {{-- 🟢 MENU DESKTOP --}}
            <div class="hidden lg:flex items-center space-x-8 text-[12px] font-bold uppercase tracking-widest text-slate-600">
                <a href="/profil"  class="nav-link transition
                    {{ request()->is('profil') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}"> {{ __('nav.menu.profile') }}</a>
                
                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
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
                        
                        @foreach($globalSectors as $gs)
                            <a href="{{ route('front.sector.show', $gs->slug) }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">
                                {{ auto_translate($gs->name) }}
                            </a>
                        @endforeach

                        <a href="{{ route('sektor.semua-sektor') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">
                            {{ __('nav.sectors.all') }}
                        </a>
                    </div>
                </div>

                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link flex items-center space-x-1
                        {{ request()->is('produk/*') || request()->is('produk') ? 'text-red-800 active' : 'text-slate-600 hover:text-red-800' }}">
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
                        class="absolute left-0 mt-4 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal" 
                        x-cloak>
                        
                        @foreach($allProductsNavbar as $item)
                        <a href="{{ route('produk.detail', $item->id) }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition truncate">
                            {{ auto_translate($item->title ?? $item->name) }}
                        </a>
                        @endforeach

                        <a href="{{ route('product.all') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">
                            {{ __('nav.products.all') }}
                        </a>
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
                        class="absolute left-0 mt-4 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal max-h-96 overflow-y-auto" 
                        x-cloak>
                        
                        @forelse($dynamicProjectPages as $page)
                            <a href="{{ route('proyek.category', $page->slug) }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition whitespace-normal leading-tight">
                                {{ auto_translate($page->name) }}
                            </a>
                        @empty
                            <span class="block px-4 py-2 text-xs text-gray-400 italic">Belum ada halaman proyek</span>
                        @endforelse

                        <a href="{{ route('proyek.semua') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">
                            {{ __('nav.projects.all') }}
                        </a>
                    </div>
                </div>

                {{-- 1️⃣ UPDATE: PROGRES SAYA (NAVBAR UTAMA DESKTOP) --}}
                @auth
                    @if(auth()->user()->role === 'client')
                        <a href="{{ route('client.progress.index') }}" 
                           class="nav-link transition flex items-center space-x-1 text-blue-700 hover:text-red-800 font-extrabold
                           {{ request()->routeIs('client.progress.index') ? 'text-red-800 active' : '' }}">
                            <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span>PROGRES SAYA</span>
                        </a>
                    @endif
                @endauth

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
                        <a href="{{ route('blog.index') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.articles') }}</a>
                        <a href="{{ route('resources.news-events') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.news') }}</a>
                        <a href="{{ route('resources.video') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Video</a>
                        <a href="{{ route('resources.studi-kasus') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.case_study') }}</a>
                        <a href="{{ route('resources.semua') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.resources.all') }}</a>
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
                        <a href="{{ route('training.silabus') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.training.syllabus') }}</a>
                        <a href="{{ route('training.fasilitas') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.training.facilities') }}</a>
                        <a href="/training/pendaftaran" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">{{ __('nav.training.register') }}</a>
                    </div>
                </div>
                
                <a href="/kontak" class="nav-link transition
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
                            
                            @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'superadmin']))
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Dashboard Panel
                                </a>
                            @endif

                            {{-- 2️⃣ UPDATE: PROGRES SAYA (DROPDOWN PROFILE DESKTOP) --}}
                            @if(auth()->check() && auth()->user()->role === 'client')
                                <a href="{{ route('client.progress.index') }}" 
                                   class="block px-4 py-2 text-xs text-blue-700 font-bold hover:bg-blue-50 transition flex items-center space-x-2">
                                    <span class="material-symbols-outlined text-blue-600 text-base">analytics</span>
                                    <span>Progres Saya</span>
                                </a>
                            @endif

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

            {{-- 🟢 TOMBOL HAMBURGER MOBILE --}}
            <div class="flex lg:hidden items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-slate-700 hover:text-red-800 focus:outline-none p-2 rounded-lg bg-slate-100">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- 🟢 MENU MOBILE DROPDOWN --}}
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden bg-white border-b border-slate-200 px-6 py-4 space-y-3 max-h-[80vh] overflow-y-auto text-sm font-semibold text-slate-700 shadow-xl"
             x-cloak>
            
            <a href="/profil" class="block py-2 hover:text-red-800 border-b border-slate-100 uppercase">
                {{ __('nav.menu.profile') }}
            </a>

            <div x-data="{ subOpen: false }" class="border-b border-slate-100 pb-2">
                <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center py-2 hover:text-red-800">
                    <span>{{ __('nav.menu.sectors') }}</span>
                    <svg class="w-4 h-4 transition-transform" :class="subOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="subOpen" class="pl-4 space-y-2 pt-1 text-xs text-slate-600">
                    @foreach($globalSectors as $gs)
                        <a href="{{ route('front.sector.show', $gs->slug) }}" class="block py-1 hover:text-red-800">{{ auto_translate($gs->name) }}</a>
                    @endforeach
                    <a href="{{ route('sektor.semua-sektor') }}" class="block py-1 font-bold text-red-800">{{ __('nav.sectors.all') }}</a>
                </div>
            </div>

            <div x-data="{ subOpen: false }" class="border-b border-slate-100 pb-2">
                <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center py-2 hover:text-red-800">
                    <span>{{ __('nav.menu.products') }}</span>
                    <svg class="w-4 h-4 transition-transform" :class="subOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="subOpen" class="pl-4 space-y-2 pt-1 text-xs text-slate-600">
                    @foreach($allProductsNavbar as $item)
                        <a href="{{ route('produk.detail', $item->id) }}" class="block py-1 hover:text-red-800 truncate">{{ auto_translate($item->title ?? $item->name) }}</a>
                    @endforeach
                    <a href="{{ route('product.all') }}" class="block py-1 font-bold text-red-800">{{ __('nav.products.all') }}</a>
                </div>
            </div>

            <div x-data="{ subOpen: false }" class="border-b border-slate-100 pb-2">
                <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center py-2 hover:text-red-800">
                    <span>{{ __('nav.menu.projects') }}</span>
                    <svg class="w-4 h-4 transition-transform" :class="subOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="subOpen" class="pl-4 space-y-2 pt-1 text-xs text-slate-600">
                    @forelse($dynamicProjectPages as $page)
                        <a href="{{ route('proyek.category', $page->slug) }}" class="block py-1 hover:text-red-800">{{ auto_translate($page->name) }}</a>
                    @empty
                        <span class="block py-1 text-slate-400 italic">Belum ada halaman proyek</span>
                    @endforelse
                    <a href="{{ route('proyek.semua') }}" class="block py-1 font-bold text-red-800">{{ __('nav.projects.all') }}</a>
                </div>
            </div>

            {{-- 3️⃣ UPDATE: PROGRES SAYA (NAVBAR MOBILE) --}}
            @auth
                @if(auth()->user()->role === 'client')
                    <a href="{{ route('client.progress.index') }}" class="block py-2 text-blue-700 font-bold hover:text-red-800 border-b border-slate-100 uppercase flex items-center space-x-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <span>PROGRES PROYEK SAYA</span>
                    </a>
                @endif
            @endauth

            <div x-data="{ subOpen: false }" class="border-b border-slate-100 pb-2">
                <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center py-2 hover:text-red-800">
                    <span>{{ __('nav.menu.resources') }}</span>
                    <svg class="w-4 h-4 transition-transform" :class="subOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="subOpen" class="pl-4 space-y-2 pt-1 text-xs text-slate-600">
                    <a href="{{ route('blog.index') }}" class="block py-1 hover:text-red-800">{{ __('nav.resources.articles') }}</a>
                    <a href="{{ route('resources.news-events') }}" class="block py-1 hover:text-red-800">{{ __('nav.resources.news') }}</a>
                    <a href="{{ route('resources.video') }}" class="block py-1 hover:text-red-800">Video</a>
                    <a href="{{ route('resources.studi-kasus') }}" class="block py-1 hover:text-red-800">{{ __('nav.resources.case_study') }}</a>
                    <a href="{{ route('resources.semua') }}" class="block py-1 font-bold text-red-800">{{ __('nav.resources.all') }}</a>
                </div>
            </div>

            <div x-data="{ subOpen: false }" class="border-b border-slate-100 pb-2">
                <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center py-2 hover:text-red-800">
                    <span>{{ __('nav.menu.training') }}</span>
                    <svg class="w-4 h-4 transition-transform" :class="subOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="subOpen" class="pl-4 space-y-2 pt-1 text-xs text-slate-600">
                    <a href="{{ route('training.silabus') }}" class="block py-1 hover:text-red-800">{{ __('nav.training.syllabus') }}</a>
                    <a href="{{ route('training.fasilitas') }}" class="block py-1 hover:text-red-800">{{ __('nav.training.facilities') }}</a>
                    <a href="/training/pendaftaran" class="block py-1 hover:text-red-800">{{ __('nav.training.register') }}</a>
                </div>
            </div>

            <a href="/kontak" class="block py-2 hover:text-red-800 border-b border-slate-100 uppercase">
                {{ __('nav.menu.contact') }}
            </a>

            @auth
                <div class="pt-2 border-t border-slate-100 space-y-2">
                    <div class="text-xs font-bold text-slate-800">Login sebagai: {{ Auth::user()->name }}</div>
                    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'superadmin']))
                        <a href="{{ route('dashboard') }}" class="block py-1 text-xs text-blue-600 font-bold">Dashboard Panel</a>
                    @endif
                    
                    {{-- 4️⃣ UPDATE: PROGRES SAYA (AREA PROFILE MOBILE) --}}
                    @if(auth()->check() && auth()->user()->role === 'client')
                        <a href="{{ route('client.progress.index') }}" class="block py-1 text-xs text-blue-700 font-bold flex items-center space-x-1">
                            <span>📊 Progres Proyek Saya</span>
                        </a>
                    @endif
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs text-red-700 font-bold py-1">Logout</button>
                    </form>
                </div>
            @else
                <div class="pt-2">
                    <a href="{{ route('login') }}" class="block w-full text-center bg-slate-900 text-white py-2 rounded font-bold hover:bg-red-800 transition">
                        {{ __('nav.auth.login') }}
                    </a>
                </div>
            @endauth
        </div>
    </nav>
    <div class="pt-[95px]"></div>