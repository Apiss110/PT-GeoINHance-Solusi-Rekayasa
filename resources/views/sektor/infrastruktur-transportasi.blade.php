<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infrastruktur & Transportasi - PT GeoINHance Solusi Rekayasa</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        .nav-glass {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
        }

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
            transition: width .3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-900"
      x-data="{ mobileMenuOpen: false, mobileSectorDropdownOpen: false }">

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

            <!-- SEKTOR -->
            <div class="relative py-2"
                 x-data="{ open: false }"
                 @mouseenter="open = true"
                 @mouseleave="open = false">

                <button class="nav-link active text-red-800 flex items-center space-x-1 focus:outline-none">
                    <span>SEKTOR</span>

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

                    <a href="#"
                       class="block px-5 py-3 hover:bg-slate-50 hover:text-red-800 transition font-semibold">
                        Pertambangan
                    </a>

                    <a href="#"
                       class="block px-5 py-3 hover:bg-slate-50 hover:text-red-800 transition font-semibold">
                        Oil & Gas
                    </a>

                    <a href="#"
                       class="block px-5 py-3 hover:bg-slate-50 hover:text-red-800 transition font-semibold">
                        Energi
                    </a>

                    <a href="{{ route('sektor.infrastruktur') }}"
                       class="block px-5 py-3 bg-slate-50 text-red-800 font-bold">
                        Infrastruktur & Transportasi
                    </a>
                </div>
            </div>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Produk
            </a>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Proyek
            </a>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Karir
            </a>

            <a href="#" class="nav-link hover:text-red-800 transition">
                Kontak
            </a>

            <a href="{{ route('login') }}"
               class="bg-slate-900 text-white px-6 py-2.5 rounded shadow-lg hover:bg-red-800 transition-all duration-300">
                Client Area
            </a>

        </div>

        <!-- MOBILE BUTTON -->
        <div class="lg:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="text-slate-900 focus:outline-none">

                <svg class="w-6 h-6"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24"
                     x-show="!mobileMenuOpen">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>

                <svg class="w-6 h-6"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24"
                     x-show="mobileMenuOpen"
                     x-cloak>

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
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