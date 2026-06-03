{{-- resources/views/project/geotechnical-analysis.blade.php --}}

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geotechnical Analysis Project - PT GeoINHance Solusi Rekayasa</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        .nav-glass{
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
        }

        .nav-link{
            position: relative;
        }

        .nav-link::after{
            content:'';
            position:absolute;
            width:0;
            height:2px;
            bottom:-4px;
            left:0;
            background:#991b1b;
            transition:.3s;
        }

        .nav-link:hover::after,
        .nav-link.active::after{
            width:100%;
        }

        [x-cloak]{
            display:none !important;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-900"
      x-data="{ mobileMenuOpen:false, mobileProjectDropdownOpen:false }">

<!-- NAVBAR -->
<nav class="fixed w-full z-[100] transition-all duration-300">

    <!-- TOPBAR -->
    <div class="bg-[#002d62] text-white/90 py-2 px-6 md:px-16 text-[11px] flex justify-between items-center tracking-wider">

        <div class="flex items-center space-x-8">

            <span class="flex items-center">
                <svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
                Bandung, West Java
            </span>

            <span class="hidden sm:flex items-center">
                <svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
                +62 21 2788 1958
            </span>

        </div>

        <div class="flex items-center space-x-4 font-bold">
            <a href="#" class="hover:text-yellow-500 transition">ID</a>
            <span class="opacity-20">|</span>
            <a href="#" class="hover:text-yellow-500 transition">EN</a>
        </div>

    </div>

    <!-- MAIN NAV -->
    <div class="nav-glass border-b border-slate-200 py-4 px-6 md:px-16 flex justify-between items-center shadow-sm">

        <!-- LOGO -->
        <div class="flex items-center">

            <div class="bg-red-800 p-1.5 rounded-md mr-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>

            <div class="leading-none cursor-pointer" onclick="window.location.href='/'">
                <span class="font-black text-xl tracking-tighter text-slate-900 block uppercase">
                    Geo<span class="text-red-800">INHance</span>
                </span>

                <span class="text-[9px] font-bold text-slate-500 tracking-[0.2em] uppercase">
                    Engineering Solutions
                </span>
            </div>

        </div>

        <!-- DESKTOP MENU -->
        <div class="hidden lg:flex items-center space-x-10 text-[12px] font-bold uppercase tracking-widest text-slate-600">

            <a href="/profil" class="nav-link hover:text-red-800 transition">
                Profil Perusahaan
            </a>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Sektor
            </a>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Produk
            </a>

            <!-- PROJECT DROPDOWN -->
            <div class="relative py-2"
                 x-data="{ open:false }"
                 @mouseenter="open = true"
                 @mouseleave="open = false">

                <button class="nav-link active text-red-800 flex items-center space-x-1 focus:outline-none">

                    <span>PROYEK</span>

                    <svg class="w-3 h-3 transition-transform duration-200"
                         :class="open ? 'rotate-180' : ''"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2.5"
                              d="M19 9l-7 7-7-7"></path>
                    </svg>

                </button>

                <div x-show="open"
                     class="absolute left-0 mt-4 w-72 bg-white rounded-2xl shadow-2xl border border-slate-100 py-3 z-50 normal-case font-medium text-slate-600 tracking-normal"
                     x-cloak>

                    <div class="px-5 py-2 text-[10px] uppercase tracking-widest font-black text-slate-400 border-b border-slate-100 mb-1">
                        Engineering Projects
                    </div>

                    <a href="{{ route('project.geotechnical-analysis') }}"
                       class="block px-5 py-3 bg-slate-50 text-red-800 font-bold">
                        Geotechnical Analysis
                    </a>

                    <a href="#"
                       class="block px-5 py-3 hover:bg-slate-50 hover:text-red-800 transition font-semibold">
                        Tunnel Engineering
                    </a>

                    <a href="#"
                       class="block px-5 py-3 hover:bg-slate-50 hover:text-red-800 transition font-semibold">
                        Slope Stability
                    </a>

                </div>
            </div>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Karir
            </a>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Kontak
            </a>

        </div>

    </div>
</nav>

<!-- CONTENT -->
<div class="pt-[95px]">

    <!-- HERO -->
    <section class="bg-[#002d62] text-white py-28 px-6 relative overflow-hidden">

        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center relative z-10">

            <div data-aos="fade-right">

                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-4">
                    Engineering Project Portfolio
                </span>

                <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight leading-tight mb-6">
                    Geotechnical <br>
                    Analysis
                </h1>

                <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-xl">
                    Comprehensive geotechnical investigation and engineering analysis
                    project for strategic infrastructure development including slope
                    stability evaluation, tunnel engineering, and Detailed Engineering Design.
                </p>

                <div class="w-16 h-1 bg-red-800 rounded-full mt-6"></div>

            </div>

            <div data-aos="fade-left">

                <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10">
                    <img src="https://images.unsplash.com/photo-1513828583688-c52646db42da?w=1200"
                         class="w-full h-[500px] object-cover"
                         alt="Geotechnical Project">
                </div>

            </div>

        </div>

    </section>

    <!-- PROJECT OVERVIEW -->
    <section class="max-w-7xl mx-auto py-24 px-6">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div data-aos="fade-right">

                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    Project Overview
                </span>

                <h2 class="text-3xl md:text-5xl font-black uppercase text-slate-900 leading-tight mb-6">
                    Integrated School Area <br>
                    Bendungan Village
                </h2>

                <p class="text-slate-600 leading-relaxed mb-6">
                    Conducting a comprehensive geotechnical analysis in the Integrated
                    School Area located in Bendungan Village, Jonggol District,
                    Bogor Regency as part of strategic infrastructure development.
                </p>

                <p class="text-slate-600 leading-relaxed">
                    The engineering study includes geological investigations,
                    subsurface characterization, numerical modeling,
                    and engineering recommendations to support long-term
                    construction stability and safety performance.
                </p>

            </div>

            <div class="grid grid-cols-2 gap-6" data-aos="fade-left">

                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                    <span class="material-symbols-outlined text-red-800 text-4xl mb-4">
                        landscape
                    </span>

                    <h4 class="font-black uppercase text-slate-900 mb-2">
                        Slope Stability
                    </h4>

                    <p class="text-sm text-slate-500 leading-relaxed">
                        Stability analysis and mitigation strategy for critical slopes.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                    <span class="material-symbols-outlined text-red-800 text-4xl mb-4">
                        tunnel
                    </span>

                    <h4 class="font-black uppercase text-slate-900 mb-2">
                        Tunnel Study
                    </h4>

                    <p class="text-sm text-slate-500 leading-relaxed">
                        Advanced numerical analysis for railway tunnel infrastructure.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                    <span class="material-symbols-outlined text-red-800 text-4xl mb-4">
                        engineering
                    </span>

                    <h4 class="font-black uppercase text-slate-900 mb-2">
                        DED Preparation
                    </h4>

                    <p class="text-sm text-slate-500 leading-relaxed">
                        Preparation of Detailed Engineering Design documents.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                    <span class="material-symbols-outlined text-red-800 text-4xl mb-4">
                        analytics
                    </span>

                    <h4 class="font-black uppercase text-slate-900 mb-2">
                        Numerical Modeling
                    </h4>

                    <p class="text-sm text-slate-500 leading-relaxed">
                        PLAXIS-based geotechnical simulation and interpretation.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <!-- HSR PROJECT -->
    <section class="bg-slate-100 py-24 px-6 border-y border-slate-200">

        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-16">

                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-3">
                    Railway Infrastructure
                </span>

                <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tight text-slate-900">
                    Jakarta-Bandung <br>
                    High-Speed Railway Tunnel
                </h2>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div data-aos="fade-right">

                    <img src="https://images.unsplash.com/photo-1474487548417-781cb71495f3?w=1200"
                         class="rounded-3xl shadow-2xl h-[500px] w-full object-cover"
                         alt="Tunnel Engineering">

                </div>

                <div data-aos="fade-left">

                    <p class="text-slate-600 leading-relaxed mb-6">
                        Conducting a comprehensive technical study on landslide mitigation,
                        including field investigations, geotechnical analysis,
                        slope stability evaluations, and the preparation of
                        a Detailed Engineering Design (DED).
                    </p>

                    <p class="text-slate-600 leading-relaxed mb-10">
                        The project supports strategic transportation infrastructure
                        development and serves as a technical foundation
                        for safe and sustainable tunnel construction activities.
                    </p>

                    <div class="space-y-5">

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-red-800 text-white flex items-center justify-center mr-4">
                                <i class="fas fa-check text-xs"></i>
                            </div>

                            <div>
                                <h4 class="font-black uppercase text-slate-900 text-sm">
                                    Geological Investigation
                                </h4>

                                <p class="text-sm text-slate-500">
                                    Detailed site mapping and subsurface characterization.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-red-800 text-white flex items-center justify-center mr-4">
                                <i class="fas fa-check text-xs"></i>
                            </div>

                            <div>
                                <h4 class="font-black uppercase text-slate-900 text-sm">
                                    Slope Reinforcement Analysis
                                </h4>

                                <p class="text-sm text-slate-500">
                                    Numerical evaluation of landslide mitigation systems.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-red-800 text-white flex items-center justify-center mr-4">
                                <i class="fas fa-check text-xs"></i>
                            </div>

                            <div>
                                <h4 class="font-black uppercase text-slate-900 text-sm">
                                    Tunnel Safety Engineering
                                </h4>

                                <p class="text-sm text-slate-500">
                                    Stability verification during excavation stages.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="bg-[#002d62] text-white py-20 px-6 text-center relative overflow-hidden">

        <div class="absolute -right-24 -bottom-24 w-72 h-72 bg-red-800 rounded-full blur-3xl opacity-20"></div>

        <div class="relative z-10 max-w-3xl mx-auto" data-aos="zoom-in">

            <h3 class="text-3xl md:text-4xl font-black uppercase mb-5 tracking-tight">
                Engineering Precision For Strategic Infrastructure
            </h3>

            <p class="text-slate-300 text-sm leading-relaxed mb-8">
                GeoINHance delivers advanced geotechnical analysis,
                engineering simulation, and infrastructure consulting
                for high-impact development projects across Indonesia.
            </p>

            <a href="https://wa.me/622127881958"
               target="_blank"
               class="inline-flex items-center bg-red-800 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-8 py-4 rounded-xl transition shadow-lg">

                <i class="fab fa-whatsapp mr-3"></i>
                Discuss Your Project
            </a>

        </div>

    </section>

</div>

<!-- FOOTER -->
<footer class="bg-slate-900 text-slate-400 text-xs py-12 px-6 md:px-16 border-t border-slate-800">

    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">

        <p class="uppercase tracking-[0.2em]">
            © 1945 PT GeoINHance Solusi Rekayasa
        </p>

        <div class="flex gap-4 uppercase tracking-[0.2em]">

            <a href="#" class="hover:text-red-500 transition">
                Privacy Policy
            </a>

            <a href="#" class="hover:text-red-500 transition">
                Terms of Service
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