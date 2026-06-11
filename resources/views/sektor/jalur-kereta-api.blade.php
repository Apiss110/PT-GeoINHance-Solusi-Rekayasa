<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jalur Kereta Api - GeoINHance</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        .project-card{
            transition: all .35s ease;
        }

        .project-card:hover{
            transform: translateY(-8px);
        }

    </style>

</head>

<body class="bg-gray-50 text-slate-900 font-sans antialiased">

    {{-- NAVBAR --}}
    <div class="fixed top-0 left-0 w-full z-50 bg-white shadow-sm border-b border-gray-100">
        @include('partials.navbar')
    </div>

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-slate-900 pt-36 pb-28">

        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,#1e293b,transparent_40%)]"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">

            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-red-800/20 border border-red-700/30 text-red-400 text-xs font-bold uppercase tracking-[0.3em]">
                Railway Engineering Sector
            </span>

            <h1 class="mt-7 text-5xl md:text-6xl font-black uppercase tracking-tight leading-none text-white">
                Jalur
                <span class="text-red-500">
                    Kereta Api
                </span>
            </h1>

            <p class="mt-7 max-w-3xl mx-auto text-slate-300 leading-relaxed text-lg">
                GeoINHance mendukung pengembangan infrastruktur
                perkeretaapian melalui analisis geoteknik,
                stabilitas tanah, dan engineering transportasi modern.
            </p>

        </div>

    </section>

    {{-- CONTENT --}}
    <section class="py-20">

        <div class="max-w-7xl mx-auto px-6">

            {{-- HEADER --}}
            <div class="flex items-center justify-between mb-10">

                <div>

                    <h2 class="text-3xl font-black text-slate-900">
                        Daftar Proyek
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Proyek sektor jalur kereta api GeoINHance.
                    </p>

                </div>

            </div>

            {{-- GRID --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- EMPTY CARD --}}
                <div class="project-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                    <div class="bg-slate-900 h-56 flex items-center justify-center relative overflow-hidden">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80"></div>

                        <i class="fa-solid fa-train text-[90px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-red-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            Railway
                        </span>

                    </div>

                    <div class="p-7">

                        <div class="flex items-center gap-2 mb-4">

                            <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>

                            <span class="text-xs uppercase tracking-wider text-yellow-600 font-bold">
                                Coming Soon
                            </span>

                        </div>

                        <h3 class="text-2xl font-black text-slate-900 mb-4">
                            Belum Ada Proyek Ditampilkan
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed">
                            Dokumentasi proyek pada sektor jalur kereta api
                            masih dalam proses pengembangan dan akan segera
                            diperbarui pada halaman ini.
                        </p>

                        <button
                            class="mt-7 w-full bg-gray-100 text-gray-400 border border-gray-200 py-3 rounded-xl text-sm font-bold cursor-not-allowed">

                            Segera Hadir

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>