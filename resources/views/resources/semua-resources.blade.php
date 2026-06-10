<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Resources - GeoINHance</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        body{
            background: #f8fafc;
        }

        .resource-card{
            transition: all .35s ease;
        }

        .resource-card:hover{
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(0,0,0,.08);
        }

        .line-clamp-3{
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

    </style>

</head>

<body class="text-slate-900 antialiased font-sans">

    {{-- NAVBAR --}}
    <header class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-200 shadow-sm">

        @include('partials.navbar')

    </header>

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-slate-900 pt-40 pb-28">

        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,#1e293b,transparent_40%)]"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">

            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-red-800/20 border border-red-700/30 text-red-400 text-xs font-bold uppercase tracking-[0.3em]">
                Knowledge Center
            </span>

            <h1 class="mt-7 text-5xl md:text-6xl font-black uppercase tracking-tight leading-none text-white">
                Semua
                <span class="text-red-500">
                    Resources
                </span>
            </h1>

            <p class="mt-7 max-w-3xl mx-auto text-slate-300 leading-relaxed text-lg">
                Pusat informasi, artikel teknik, studi kasus,
                dokumentasi engineering, serta berbagai insight profesional
                dari GeoINHance.
            </p>

        </div>

    </section>

    {{-- FILTER + SEARCH --}}
    <section class="py-8 bg-white border-b border-gray-200 sticky top-36 z-40 shadow-sm">

        <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row gap-4 justify-between items-center">

            {{-- FILTER --}}
            <div class="flex flex-wrap gap-2 w-full lg:w-auto">

                <button class="filter-btn bg-red-800 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-sm transition"
                        data-category="all">
                    Semua
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="knowledge">
                    Engineering Hub
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="article">
                    Artikel
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="event">
                    Berita & Acara
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="media">
                    Video
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="case-study">
                    Studi Kasus
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="document">
                    Dokumen
                </button>

            </div>

            {{-- SEARCH --}}
            <div class="relative w-full lg:w-72">

                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari resources..."
                    class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-700 focus:bg-white transition">

            </div>

        </div>

    </section>

    {{-- GRID --}}
    <section class="py-20">

        <div class="max-w-7xl mx-auto px-6">

            <div id="resourceGrid"
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- ENGINEERING HUB --}}
                <div class="resource-item"
                     data-name="engineering hub"
                     data-category="knowledge">

                    <div class="resource-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-brain text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-red-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Knowledge
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                GeoINHance Engineering Hub
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Pusat insight engineering, inovasi teknologi,
                                dan pengembangan solusi rekayasa modern.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Explore
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                {{-- ARTIKEL --}}
                <div class="resource-item"
                     data-name="artikel"
                     data-category="article">

                    <div class="resource-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-newspaper text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-blue-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Article
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                Artikel
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Artikel teknik sipil, geoteknik,
                                numerical modeling, hingga engineering software.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Explore
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                {{-- BERITA --}}
                <div class="resource-item"
                     data-name="berita acara"
                     data-category="event">

                    <div class="resource-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-calendar-days text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-emerald-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Event
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                Berita & Acara
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Update kegiatan perusahaan, seminar,
                                webinar engineering, dan event industri.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Explore
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                {{-- VIDEO --}}
                <div class="resource-item"
                     data-name="video"
                     data-category="media">

                    <div class="resource-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-circle-play text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-purple-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Media
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                Video
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Video pembelajaran, tutorial software,
                                presentasi engineering, dan dokumentasi proyek.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Explore
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                {{-- STUDI KASUS --}}
                <div class="resource-item"
                     data-name="studi kasus"
                     data-category="case-study">

                    <div class="resource-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-diagram-project text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-orange-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Case Study
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                Studi Kasus
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Analisis proyek nyata, solusi engineering,
                                dan studi implementasi teknologi geoteknik.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Explore
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                {{-- DOKUMEN --}}
                <div class="resource-item"
                     data-name="dokumen"
                     data-category="document">

                    <div class="resource-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-book text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-slate-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Library
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                Perpustakaan Dokumen
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Kumpulan dokumen teknis, company profile,
                                whitepaper, dan engineering references.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Explore
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- FOOTER --}}
    @include('partials.footer')

    <script>

        const searchInput = document.getElementById('searchInput');
        const items = document.querySelectorAll('.resource-item');

        // SEARCH
        searchInput.addEventListener('keyup', function(){

            let value = this.value.toLowerCase();

            items.forEach(item => {

                let name = item.dataset.name.toLowerCase();

                if(name.includes(value)){
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }

            });

        });

        // FILTER
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(button => {

            button.addEventListener('click', function(){

                buttons.forEach(btn => {

                    btn.classList.remove('bg-red-800','text-white');
                    btn.classList.add('bg-gray-100','text-gray-600');

                });

                this.classList.remove('bg-gray-100','text-gray-600');
                this.classList.add('bg-red-800','text-white');

                const category = this.dataset.category;

                items.forEach(item => {

                    if(category === 'all'){

                        item.style.display = 'block';

                    } else if(item.dataset.category === category){

                        item.style.display = 'block';

                    } else {

                        item.style.display = 'none';

                    }

                });

            });

        });

    </script>

</body>
</html>