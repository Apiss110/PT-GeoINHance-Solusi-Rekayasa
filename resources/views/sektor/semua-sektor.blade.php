<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Sektor - PT GeoINHance Solusi Rekayasa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        .nav-glass{
            background: rgba(255,255,255,.96);
            backdrop-filter: blur(10px);
        }

        .sector-card{
            transition: all .35s ease;
        }

        .sector-card:hover{
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

<body class="bg-gray-50 text-slate-900 antialiased font-sans">

    {{-- NAVBAR --}}
    <div class="nav-glass fixed top-0 left-0 w-full z-50 shadow-sm border-b border-gray-100">
        @include('partials.navbar')
    </div>

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-slate-900 pt-36 pb-28">

        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,#1e293b,transparent_40%)]"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">

            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-red-800/20 border border-red-700/30 text-red-400 text-xs font-bold uppercase tracking-[0.3em]">
                Engineering Sector
            </span>

            <h1 class="mt-7 text-5xl md:text-6xl font-black uppercase tracking-tight leading-none text-white">
                Semua
                <span class="text-red-500">
                    Sektor
                </span>
            </h1>

            <p class="mt-7 max-w-3xl mx-auto text-slate-300 leading-relaxed text-lg">
                GeoINHance menyediakan layanan rekayasa teknik multidisiplin
                untuk berbagai sektor strategis nasional mulai dari
                transportasi, energi, geoteknik, hingga mitigasi geobencana.
            </p>

        </div>

    </section>

    {{-- FILTER + SEARCH --}}
    <section class="py-8 bg-white border-b border-gray-200 sticky top-[88px] z-40 shadow-sm">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-4 justify-between items-center">

            {{-- CATEGORY --}}
            <div class="flex flex-wrap gap-2 w-full lg:w-auto">

                <button class="filter-btn bg-red-800 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-sm transition"
                        data-category="all">
                    Semua
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="infrastruktur">
                    Infrastruktur
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="transportasi">
                    Transportasi
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="energi">
                    Energi
                </button>

                <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                        data-category="geoteknik">
                    Geoteknik
                </button>

            </div>

            {{-- SEARCH --}}
            <div class="relative w-full lg:w-72">

                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </span>

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari sektor..."
                    class="w-full bg-gray-50 border border-gray-300 rounded-lg pl-9 pr-4 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-red-700 focus:bg-white transition">

            </div>

        </div>

    </section>

    {{-- GRID --}}
    <section class="py-16 bg-gray-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div id="sectorGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($sectors as $sector)

                <div class="sector-item"
                    data-name="{{ strtolower($sector['name']) }}"
                    data-category="{{ $sector['category'] }}">

                    <div class="sector-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group h-full">

                        <div>

                            <div class="bg-slate-800 h-48 flex items-center justify-center relative overflow-hidden">

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80 z-10"></div>

                                <i class="fa-solid {{ $sector['icon'] }} text-[70px] text-red-500/30 group-hover:scale-110 transition duration-300"></i>

                                <span class="absolute bottom-4 left-4 z-20 {{ $sector['badgeColor'] }} text-white text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded">
                                    {{ $sector['badge'] }}
                                </span>

                            </div>

                            <div class="p-6 space-y-3">

                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-700 transition">
                                    {{ $sector['name'] }}
                                </h3>

                                <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                    {{ $sector['description'] }}
                                </p>

                            </div>

                        </div>

                        <div class="p-6 pt-0">

                            <a href="#"
                               class="block text-center bg-gray-50 text-gray-700 border border-gray-200 py-2 rounded-lg text-xs font-semibold hover:bg-red-800 hover:text-white hover:border-red-800 transition">
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="mt-16 flex justify-center">

                {{ $sectors->links() }}

            </div>

        </div>

    </section>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- SCRIPT --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>

        AOS.init({
            duration: 800,
            once: true
        });

        // SEARCH
        const searchInput = document.getElementById('searchInput');
        const items = document.querySelectorAll('.sector-item');

        searchInput.addEventListener('keyup', function() {

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