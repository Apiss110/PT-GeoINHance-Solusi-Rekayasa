<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekayasa Bawah Tanah - GeoINHance</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        .nav-glass{
            background: rgba(255,255,255,.97);
            backdrop-filter: blur(12px);
        }

        .project-card{
            transition: all .35s ease;
        }

        .project-card:hover{
            transform: translateY(-8px);
        }

        .line-clamp-3{
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

    </style>

</head>

<body class="bg-gray-50 text-slate-900">

    {{-- NAVBAR --}}
<header class="fixed top-0 left-0 w-full z-[999] nav-glass border-b border-gray-200 shadow-sm">

        @include('partials.navbar')

    </header>

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-slate-900 pt-36 pb-24">

        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,#1e293b,transparent_40%)]"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">

            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-red-800/20 border border-red-700/30 text-red-400 text-xs font-bold uppercase tracking-[0.3em]">
                Underground Engineering
            </span>

            <h1 class="mt-6 text-5xl md:text-6xl font-black uppercase tracking-tight text-white">
                Rekayasa
                <span class="text-red-500">
                    Bawah Tanah
                </span>
            </h1>

            <p class="mt-6 max-w-3xl mx-auto text-slate-300 leading-relaxed text-lg">
                Solusi engineering bawah tanah untuk tunnel,
                deep excavation, retaining system,
                dan pembangunan infrastruktur perkotaan modern.
            </p>

        </div>

    </section>

    {{-- FILTER + SEARCH --}}
    <section class="sticky top-[88px] z-40 bg-white border-b border-gray-200 shadow-sm py-6">

        <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row gap-4 justify-between items-center">

            {{-- FILTER --}}
            <div class="flex flex-wrap gap-2 w-full lg:w-auto">

                <button class="filter-btn bg-red-800 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-sm transition"
                        data-category="all">
                    Semua
                </button>

                <button class="filter-btn bg-gray-100 text-gray-700 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="excavation">
                    Excavation
                </button>

                <button class="filter-btn bg-gray-100 text-gray-700 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="tunnel">
                    Tunnel
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
                    placeholder="Cari proyek..."
                    class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-700 focus:bg-white transition">

            </div>

        </div>

    </section>

    {{-- PROJECT --}}
    <section class="py-20">

        <div class="max-w-7xl mx-auto px-6">

            <div id="projectGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- PROJECT 1 --}}
                <div class="project-item"
                     data-name="deep excavation tol hbr 2"
                     data-category="excavation">

                    <div class="project-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-56 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-person-digging text-[90px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-red-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Excavation
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                Deep Excavation Tol HBR 2
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Analisis stabilitas deep excavation,
                                retaining wall, dan deformasi tanah
                                pada pembangunan jalan tol HBR 2.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                {{-- PROJECT 2 --}}
                <div class="project-item"
                     data-name="tunnel jacking underpass tatakan"
                     data-category="tunnel">

                    <div class="project-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                        <div class="bg-slate-900 h-56 flex items-center justify-center relative overflow-hidden">

                            <i class="fa-solid fa-road-circle-exclamation text-[90px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                            <span class="absolute bottom-4 left-4 bg-blue-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                                Tunnel
                            </span>

                        </div>

                        <div class="p-7">

                            <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                                Tunnel Jacking Underpass Tatakan
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                                Numerical analysis dan tunnel jacking
                                untuk pembangunan underpass Tatakan
                                dengan metode konstruksi bawah tanah modern.
                            </p>

                            <a href="#"
                               class="mt-6 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                                Lihat Detail
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

    {{-- SCRIPT --}}
    <script>

        const searchInput = document.getElementById('searchInput');
        const items = document.querySelectorAll('.project-item');

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
                    btn.classList.add('bg-gray-100','text-gray-700');

                });

                this.classList.remove('bg-gray-100','text-gray-700');
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