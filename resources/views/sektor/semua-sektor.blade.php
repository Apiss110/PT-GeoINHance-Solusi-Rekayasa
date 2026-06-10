<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Sektor - PT GeoINHance Solusi Rekayasa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <style>

        .nav-glass{
            background: rgba(255,255,255,.95);
            backdrop-filter: blur(8px);
        }

        .sector-card{
            transition: all .35s ease;
        }

        .sector-card:hover{
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0,0,0,.10);
        }

    </style>

</head>

<body class="bg-slate-50 text-slate-900 font-sans antialiased">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    <div class="pt-[95px]">

        {{-- HERO --}}
        <section class="relative overflow-hidden bg-[#002d62] py-28 px-6 text-white">

            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>

            <div class="relative z-10 max-w-5xl mx-auto text-center">

                <span class="inline-block px-5 py-2 rounded-full border border-white/20 bg-white/10 text-xs font-bold uppercase tracking-[0.35em]">
                    GeoINHance Engineering Sector
                </span>

                <h1 class="mt-6 text-5xl md:text-6xl font-black uppercase leading-none">
                    Semua Sektor
                </h1>

                <p class="mt-8 max-w-3xl mx-auto text-slate-300 text-lg leading-8">
                    GeoINHance menghadirkan layanan engineering,
                    geotechnical analysis, numerical simulation,
                    dan investigasi teknis untuk berbagai sektor strategis
                    nasional dengan pendekatan modern dan presisi tinggi.
                </p>

            </div>

        </section>

        {{-- CONTENT --}}
        <section class="max-w-7xl mx-auto py-24 px-6">

            {{-- HEADER --}}
            <div class="text-center mb-20" data-aos="fade-up">

                <span class="inline-block px-5 py-2 rounded-full border border-red-100 bg-red-50 text-red-800 text-xs font-extrabold uppercase tracking-[0.35em] shadow-sm">
                    Engineering Expertise
                </span>

                <h2 class="mt-6 text-4xl md:text-5xl font-black uppercase text-slate-900 leading-tight">
                    Bidang
                    <span class="text-red-800">
                        Keahlian
                    </span>
                </h2>

                <p class="max-w-3xl mx-auto mt-6 text-lg leading-8 text-slate-500">
                    Kami mendukung berbagai sektor pembangunan melalui
                    layanan konsultasi engineering profesional,
                    investigasi geoteknik, desain teknis,
                    hingga analisis numerik berbasis teknologi modern.
                </p>

                <div class="mt-8 flex items-center justify-center gap-3">
                    <div class="h-[3px] w-12 rounded-full bg-red-200"></div>
                    <div class="h-4 w-4 rounded-full bg-red-800"></div>
                    <div class="h-[3px] w-12 rounded-full bg-red-200"></div>
                </div>

            </div>

                        {{-- SEARCH --}}
            <div class="max-w-2xl mx-auto mb-16" data-aos="fade-up">

                <div class="relative">

                    <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
                        search
                    </span>

                    <input 
                        type="text"
                        placeholder="Cari sektor engineering..."
                        class="w-full rounded-2xl border border-slate-200 bg-white py-5 pl-14 pr-6 text-sm shadow-sm focus:border-red-800 focus:ring-4 focus:ring-red-100 outline-none transition"
                    >

                </div>

            </div>

            {{-- GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Mitigasi --}}
                <a href="#"
                   class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-red-800 text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            landslide
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Mitigasi Geobencana
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Analisis stabilitas lereng,
                        mitigasi longsor,
                        rockfall protection,
                        dan disaster engineering.
                    </p>

                </a>

                {{-- Rekayasa Bawah Tanah --}}
                <a href="#"
                   class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-[#002d62] text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            foundation
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Rekayasa Bawah Tanah
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Engineering tunnel,
                        basement structure,
                        retaining wall,
                        dan konstruksi bawah tanah modern.
                    </p>

                </a>

                {{-- Pembangkit Energi --}}
                <a href="#"
                   class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-red-800 text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            bolt
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Pembangkit Energi
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Analisis geoteknik dan engineering
                        untuk fasilitas energi,
                        pembangkit listrik,
                        dan infrastruktur pendukung.
                    </p>

                </a>

                {{-- Infrastruktur --}}
                <a href="{{ route('sektor.infrastruktur') }}"
                   class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-[#002d62] text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            account_tree
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Infrastruktur & Transportasi
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Desain dan analisis teknis
                        untuk jalan, jembatan,
                        underpass,
                        dan transportasi modern.
                    </p>

                </a>

                {{-- Infrastruktur Jalan --}}
                <a href="#"
                   class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-red-800 text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            route
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Infrastruktur Jalan
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Highway engineering,
                        pavement analysis,
                        dan pengembangan akses transportasi regional.
                    </p>

                </a>

                {{-- Infrastruktur Air --}}
                <a href="#"
                   class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-[#002d62] text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            water
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Infrastruktur Air
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Bendungan,
                        irigasi,
                        flood mitigation,
                        dan hydraulic structure engineering.
                    </p>

                </a>

                {{-- Minyak Bumi Gas --}}
                <a href="#"
                class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-red-800 text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            oil_barrel
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Minyak Bumi Gas
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Offshore engineering,
                        mudmat stability analysis,
                        dan investigasi geoteknik untuk fasilitas migas.
                    </p>

                </a>

                {{-- Jalur Kereta Api --}}
                <a href="#"
                class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-[#002d62] text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            train
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Jalur Kereta Api
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Settlement analysis,
                        embankment stability,
                        dan railway infrastructure engineering modern.
                    </p>

                </a>

                {{-- Kawasan Bandar Udara --}}
                <a href="#"
                class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-red-800 text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            flight
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Kawasan Bandar Udara
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Analisis fondasi runway,
                        terminal airport,
                        dan fasilitas transportasi udara.
                    </p>

                </a>

                {{-- Kawasan Pelabuhan --}}
                <a href="#"
                class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-[#002d62] text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            sailing
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Kawasan Pelabuhan
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Marine geotechnical engineering,
                        quay wall analysis,
                        dan coastal infrastructure system.
                    </p>

                </a>

                {{-- Kawasan Industri --}}
                <a href="#"
                class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-red-800 text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            factory
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Kawasan Industri
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Solusi engineering untuk kawasan industri,
                        pergudangan,
                        dan fasilitas manufaktur modern.
                    </p>

                </a>

                {{-- Fasilitas Pendidikan --}}
                <a href="#"
                class="sector-card rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="w-20 h-20 rounded-2xl bg-[#002d62] text-white flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined !text-[42px]">
                            school
                        </span>
                    </div>

                    <h3 class="text-2xl font-black text-slate-900 mb-4">
                        Fasilitas Pendidikan
                    </h3>

                    <p class="text-slate-500 leading-8">
                        Perencanaan geoteknik
                        untuk sekolah,
                        kampus,
                        dan fasilitas pendidikan terpadu.
                    </p>

                </a>

            </div>

                        {{-- PAGINATION --}}
            <div class="mt-20 flex items-center justify-center gap-3">

                {{-- PREVIOUS --}}
                <a href="#"
                class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-500 transition hover:border-red-800 hover:text-red-800">

                    <span class="material-symbols-outlined text-[18px]">
                        arrow_back_ios
                    </span>

                    Previous

                </a>

                {{-- PAGE 1 --}}
                <a href="#"
                class="w-12 h-12 rounded-xl bg-red-800 text-white flex items-center justify-center font-black shadow-lg">
                    1
                </a>

                {{-- PAGE 2 --}}
                <a href="#"
                class="w-12 h-12 rounded-xl border border-slate-200 bg-white text-slate-600 flex items-center justify-center font-bold hover:border-red-800 hover:text-red-800 transition">
                    2
                </a>

                {{-- PAGE 3 --}}
                <a href="#"
                class="w-12 h-12 rounded-xl border border-slate-200 bg-white text-slate-600 flex items-center justify-center font-bold hover:border-red-800 hover:text-red-800 transition">
                    3
                </a>

                {{-- NEXT --}}
                <a href="#"
                class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-500 transition hover:border-red-800 hover:text-red-800">

                    Next

                    <span class="material-symbols-outlined text-[18px]">
                        arrow_forward_ios
                    </span>

                </a>

            </div>

        </section>

        

    </div>

    

    {{-- FOOTER --}}
    @include('partials.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>

        AOS.init({
            duration: 800,
            once: true
        });

    </script>

</body>
</html>