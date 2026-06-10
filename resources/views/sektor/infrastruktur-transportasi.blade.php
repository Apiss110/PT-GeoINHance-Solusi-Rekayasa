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

     @include('partials.navbar')
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
@include('partials.footer')

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