
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Articles - PT GeoINHance Solusi Rekayasa</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
            background: #991b1b;
            transition: .3s;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        [x-cloak] {
            display:none !important;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-900">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50">

        <!-- TOPBAR -->
        <div class="bg-[#002d62] text-white py-2 px-6 md:px-16 text-[11px] flex justify-between">
            <div class="flex items-center space-x-6">
                <span>Bandung, West Java</span>
                <span>+62 21 2788 1958</span>
            </div>

            <div>ID | EN</div>
        </div>

        <!-- MAIN NAV -->
        <div class="nav-glass border-b border-slate-200 py-4 px-6 md:px-16 flex justify-between items-center shadow-sm">

            <!-- LOGO -->
            <div class="leading-none">
                <span class="font-black text-xl uppercase">
                    Geo<span class="text-red-800">INHance</span>
                </span>

                <span class="block text-[9px] tracking-[0.2em] uppercase text-slate-500">
                    Engineering Solutions
                </span>
            </div>

            <!-- MENU -->
            <div class="hidden lg:flex items-center space-x-10 text-[12px] font-bold uppercase tracking-widest text-slate-600">

                <a href="/" class="nav-link hover:text-red-800 transition">
                    Home
                </a>

                <a href="#" class="nav-link active text-red-800">
                    Resources
                </a>

                <a href="#" class="nav-link hover:text-red-800 transition">
                    Produk
                </a>

                <a href="#" class="nav-link hover:text-red-800 transition">
                    Proyek
                </a>

                <a href="#" class="nav-link hover:text-red-800 transition">
                    Kontak
                </a>

            </div>

        </div>
    </nav>

    <!-- WRAPPER -->
    <div class="pt-[95px]">

        <!-- HERO -->
        <section class="bg-[#002d62] text-white py-24 px-6 relative overflow-hidden">

            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>

            <div class="relative z-10 max-w-5xl mx-auto text-center">

                <span class="text-red-500 uppercase tracking-[0.3em] text-xs font-bold block mb-4">
                    Engineering Knowledge Center
                </span>

                <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight mb-6">
                    Technical Articles & Insights
                </h1>

                <p class="text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    Kumpulan artikel teknis, studi geoteknik,
                    analisis infrastruktur, serta insight rekayasa
                    modern untuk mendukung pengambilan keputusan
                    engineering secara presisi.
                </p>

            </div>

        </section>

        <!-- FEATURED ARTICLE -->
        <section class="max-w-7xl mx-auto py-24 px-6">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

                <div>
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200"
                         class="rounded-3xl shadow-2xl h-[420px] object-cover w-full">
                </div>

                <div>

                    <span class="text-red-800 text-xs uppercase tracking-[0.3em] font-bold">
                        Featured Article
                    </span>

                    <h2 class="text-4xl font-black uppercase leading-tight mt-4 mb-6">
                        Modern Geotechnical
                        Investigation for
                        Tunnel Infrastructure
                    </h2>

                    <p class="text-slate-600 leading-relaxed mb-8">
                        Pembahasan mendalam mengenai investigasi
                        geoteknik modern pada proyek terowongan
                        transportasi cepat, termasuk slope stability,
                        settlement prediction, hingga finite element
                        modelling menggunakan pendekatan numerik.
                    </p>

                    <a href="#"
                       class="bg-red-800 hover:bg-red-700 text-white uppercase tracking-widest text-xs px-8 py-4 rounded-xl font-bold transition">

                        Read Full Article
                    </a>

                </div>

            </div>

        </section>

        <!-- ARTICLE GRID -->
        <section class="bg-slate-100 py-24 px-6 border-t border-b border-slate-200">

            <div class="max-w-7xl mx-auto">

                <div class="mb-14">

                    <span class="text-red-800 text-xs uppercase tracking-[0.3em] font-bold">
                        Latest Publications
                    </span>

                    <h2 class="text-4xl font-black uppercase mt-3">
                        Engineering Articles
                    </h2>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- CARD -->
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 hover:-translate-y-2 transition duration-500">

                        <img src="https://images.unsplash.com/photo-1513828583688-c52646db42da?q=80&w=1200"
                             class="h-56 w-full object-cover">

                        <div class="p-8">

                            <span class="text-[10px] uppercase tracking-[0.25em] text-red-800 font-bold">
                                Slope Stability
                            </span>

                            <h3 class="text-xl font-black uppercase mt-3 mb-4 leading-snug">
                                Landslide Mitigation Strategy
                                in Mountain Transportation Area
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed mb-6">
                                Analisis faktor keamanan lereng dan
                                pendekatan stabilisasi modern pada
                                area infrastruktur jalan pegunungan.
                            </p>

                            <a href="#"
                               class="text-red-800 font-bold uppercase text-xs tracking-widest">

                                Explore →
                            </a>

                        </div>

                    </div>

                    <!-- CARD -->
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 hover:-translate-y-2 transition duration-500">

                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200"
                             class="h-56 w-full object-cover">

                        <div class="p-8">

                            <span class="text-[10px] uppercase tracking-[0.25em] text-red-800 font-bold">
                                Numerical Analysis
                            </span>

                            <h3 class="text-xl font-black uppercase mt-3 mb-4 leading-snug">
                                PLAXIS 3D Workflow
                                for Deep Excavation
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed mb-6">
                                Simulasi deformasi tanah dan retaining
                                structure menggunakan finite element
                                analysis berbasis 3D.
                            </p>

                            <a href="#"
                               class="text-red-800 font-bold uppercase text-xs tracking-widest">

                                Explore →
                            </a>

                        </div>

                    </div>

                    <!-- CARD -->
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 hover:-translate-y-2 transition duration-500">

                        <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?q=80&w=1200"
                             class="h-56 w-full object-cover">

                        <div class="p-8">

                            <span class="text-[10px] uppercase tracking-[0.25em] text-red-800 font-bold">
                                Transportation
                            </span>

                            <h3 class="text-xl font-black uppercase mt-3 mb-4 leading-snug">
                                Railway Embankment
                                Settlement Evaluation
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed mb-6">
                                Evaluasi penurunan tanah pada jalur
                                kereta cepat dengan pendekatan
                                coupled consolidation analysis.
                            </p>

                            <a href="#"
                               class="text-red-800 font-bold uppercase text-xs tracking-widest">

                                Explore →
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- CTA -->
        <section class="bg-[#002d62] text-white py-20 px-6 text-center relative overflow-hidden">

            <div class="absolute -right-24 -bottom-24 w-72 h-72 bg-red-800 rounded-full blur-3xl opacity-20"></div>

            <div class="relative z-10 max-w-3xl mx-auto">

                <h2 class="text-4xl font-black uppercase mb-6">
                    Explore More Engineering Knowledge
                </h2>

                <p class="text-slate-300 leading-relaxed mb-10">
                    Dapatkan insight terbaru mengenai geoteknik,
                    rekayasa sipil, numerik modelling, dan
                    pengembangan infrastruktur modern.
                </p>

                <a href="#"
                   class="bg-red-800 hover:bg-red-700 px-8 py-4 rounded-xl uppercase tracking-widest text-xs font-bold transition">

                    View All Resources
                </a>

            </div>

        </section>

    </div>

</body>
</html>
```
