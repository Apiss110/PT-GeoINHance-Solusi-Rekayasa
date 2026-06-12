<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Silabus & Materi Training | GeoINHance</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        .nav-glass{
            background: rgba(255,255,255,.97);
            backdrop-filter: blur(12px);
        }

        .training-card{
            transition: all .35s ease;
        }

        .training-card:hover{
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
    <header class="fixed top-0 left-0 w-full z-[999] nav-glass border-b border-gray-200 shadow-sm">

        @include('partials.navbar')

    </header>

    {{-- HERO --}}
<section class="relative overflow-hidden bg-slate-900 pt-36 pb-28">

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,#1e293b,transparent_40%)]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">

        <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-red-800/20 border border-red-700/30 text-red-400 text-xs font-bold uppercase tracking-[0.3em]">
            {{ __('syllabus.hero_badge') }}
        </span>

        <h1 class="mt-7 text-5xl md:text-6xl font-black uppercase tracking-tight leading-none text-white">
            {{ __('syllabus.hero_title_1') }}
            <span class="text-red-500">
                {{ __('syllabus.hero_title_2') }}
            </span>
        </h1>

        <p class="mt-7 max-w-3xl mx-auto text-slate-300 leading-relaxed text-lg">
            {{ __('syllabus.hero_desc') }}
        </p>

    </div>

</section>

{{-- FILTER + SEARCH --}}
<section class="py-8 bg-white border-b border-gray-200 sticky top-28 z-40 shadow-sm">

    <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row gap-4 justify-between items-center">

        {{-- FILTER --}}
        <div class="flex flex-wrap gap-2 w-full lg:w-auto">

            <button class="filter-btn bg-red-800 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-sm transition"
                    data-category="all">
                {{ __('syllabus.filter_all') }}
            </button>

            <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                    data-category="plaxis">
                {{ __('syllabus.filter_plaxis') }}
            </button>

            <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                    data-category="geostudio">
                {{ __('syllabus.filter_geostudio') }}
            </button>

            <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                    data-category="structural">
                {{ __('syllabus.filter_structural') }}
            </button>

            <button class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition"
                    data-category="foundation">
                {{ __('syllabus.filter_foundation') }}
            </button>

        </div>

        {{-- SEARCH --}}
        <div class="relative w-full lg:w-80">

            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>

            <input
                type="text"
                id="searchInput"
                placeholder="{{ __('syllabus.search_placeholder') }}"
                class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-700 focus:bg-white transition">

        </div>

    </div>

</section>

{{-- CONTENT --}}
<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div id="trainingGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- PLAXIS 2D BASIC --}}
            <div class="training-item"
                 data-name="{{ strtolower(__('syllabus.card1_search')) }}"
                 data-category="plaxis">

                <div class="training-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                    <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                        <i class="fa-solid fa-layer-group text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-red-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            {{ __('syllabus.tag_plaxis') }}
                        </span>

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                            {{ __('syllabus.card1_title') }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                            {{ __('syllabus.card1_desc') }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <span class="bg-red-50 text-red-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.level_beginner') }}
                            </span>

                            <span class="bg-slate-100 text-slate-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.modules_12') }}
                            </span>

                        </div>

                        <a href="#"
                           class="mt-7 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                            {{ __('syllabus.btn_view') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            {{-- NUMERICAL MODELING ADVANCED --}}
            <div class="training-item"
                 data-name="{{ strtolower(__('syllabus.card2_search')) }}"
                 data-category="plaxis">

                <div class="training-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                    <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                        <i class="fa-solid fa-chart-line text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-orange-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            {{ __('syllabus.tag_advanced') }}
                        </span>

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                            {{ __('syllabus.card2_title') }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                            {{ __('syllabus.card2_desc') }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <span class="bg-yellow-50 text-yellow-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.level_intermediate') }}
                            </span>

                            <span class="bg-slate-100 text-slate-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.modules_18') }}
                            </span>

                        </div>

                        <a href="#"
                           class="mt-7 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                            {{ __('syllabus.btn_view') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            {{-- SEEPAGE & FLOW ANALYSIS --}}
            <div class="training-item"
                 data-name="{{ strtolower(__('syllabus.card3_search')) }}"
                 data-category="geostudio">

                <div class="training-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                    <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                        <i class="fa-solid fa-water text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-cyan-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            {{ __('syllabus.tag_geostudio') }}
                        </span>

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                            {{ __('syllabus.card3_title') }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                            {{ __('syllabus.card3_desc') }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <span class="bg-emerald-50 text-emerald-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.level_professional') }}
                            </span>

                            <span class="bg-slate-100 text-slate-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.modules_10') }}
                            </span>

                        </div>

                        <a href="#"
                           class="mt-7 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                            {{ __('syllabus.btn_view') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            {{-- STRUCTURAL ANALYSIS --}}
            <div class="training-item"
                 data-name="{{ strtolower(__('syllabus.card4_search')) }}"
                 data-category="structural">

                <div class="training-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                    <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                        <i class="fa-solid fa-building-columns text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-blue-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            {{ __('syllabus.tag_structural') }}
                        </span>

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                            {{ __('syllabus.card4_title') }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                            {{ __('syllabus.card4_desc') }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <span class="bg-indigo-50 text-indigo-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.tag_structural') }}
                            </span>

                            <span class="bg-slate-100 text-slate-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.modules_15') }}
                            </span>

                        </div>

                        <a href="#"
                           class="mt-7 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                            {{ __('syllabus.btn_view') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            {{-- FOUNDATION ENGINEERING --}}
            <div class="training-item"
                 data-name="{{ strtolower(__('syllabus.card5_search')) }}"
                 data-category="foundation">

                <div class="training-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                    <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                        <i class="fa-solid fa-screwdriver-wrench text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-amber-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            {{ __('syllabus.tag_foundation') }}
                        </span>

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                            {{ __('syllabus.card5_title') }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                            {{ __('syllabus.card5_desc') }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <span class="bg-red-50 text-red-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.level_geotechnical') }}
                            </span>

                            <span class="bg-slate-100 text-slate-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.modules_14') }}
                            </span>

                        </div>

                        <a href="#"
                           class="mt-7 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                            {{ __('syllabus.btn_view') }}
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

            {{-- SLOPE STABILITY ANALYSIS --}}
            <div class="training-item"
                 data-name="{{ strtolower(__('syllabus.card6_search')) }}"
                 data-category="geostudio">

                <div class="training-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group">

                    <div class="bg-slate-900 h-52 flex items-center justify-center relative overflow-hidden">

                        <i class="fa-solid fa-mountain text-[80px] text-red-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-emerald-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            {{ __('syllabus.tag_stability') }}
                        </span>

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-red-700 transition">
                            {{ __('syllabus.card6_title') }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                            {{ __('syllabus.card6_desc') }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <span class="bg-emerald-50 text-emerald-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.level_analysis') }}
                            </span>

                            <span class="bg-slate-100 text-slate-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                                {{ __('syllabus.modules_11') }}
                            </span>

                        </div>

                        <a href="#"
                           class="mt-7 inline-flex items-center gap-2 text-red-700 font-bold text-sm hover:gap-3 transition-all">
                            {{ __('syllabus.btn_view') }}
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
        const items = document.querySelectorAll('.training-item');
        const buttons = document.querySelectorAll('.filter-btn');

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