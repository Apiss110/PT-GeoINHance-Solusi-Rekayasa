<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kawasan Industri - GeoINHance</title>

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

        .line-clamp-3{
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

    </style>

</head>

<body class="bg-gray-50 text-slate-900 antialiased">

    {{-- NAVBAR --}}
    <div class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-200 shadow-sm">
        @include('partials.navbar')
    </div>

    {{-- HERO --}}
<section class="relative overflow-hidden bg-slate-900 pt-36 pb-24">

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,#1e293b,transparent_40%)]"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">

        <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-amber-500/10 border border-amber-400/20 text-amber-300 text-xs font-bold uppercase tracking-[0.3em]">
            {{ __('industrial.hero_sector') }}
        </span>

        <h1 class="mt-7 text-5xl md:text-6xl font-black uppercase tracking-tight leading-none text-white">
            {{ __('industrial.hero_title_1') }}
            <span class="text-amber-400">
                {{ __('industrial.hero_title_2') }}
            </span>
        </h1>

        <p class="mt-7 max-w-3xl mx-auto text-slate-300 leading-relaxed text-lg">
            {{ __('industrial.hero_desc') }}
        </p>

    </div>

</section>

{{-- SEARCH --}}
<section class="sticky top-[88px] z-40 bg-white border-b border-gray-200 shadow-sm py-6">

    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center flex-col lg:flex-row gap-4">

        <div>
            <h2 class="text-2xl font-black text-slate-900 uppercase">
                {{ __('industrial.project_title') }}
            </h2>
        </div>

        <div class="relative w-full lg:w-80">

            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>

            <input
                type="text"
                id="searchInput"
                placeholder="{{ __('industrial.search_placeholder') }}"
                class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-600 focus:bg-white transition">

        </div>

    </div>

</section>

{{-- PROJECT GRID --}}
<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div id="projectGrid" class="grid md:grid-cols-2 lg:grid-cols-1 gap-8">

            {{-- PROJECT --}}
            <div class="project-item"
                 data-name="stockyard smelter mapawah">

                <div class="project-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden group max-w-3xl mx-auto">

                    <div class="bg-slate-900 h-64 flex items-center justify-center relative overflow-hidden">

                        <i class="fa-solid fa-industry text-[100px] text-amber-500/20 group-hover:scale-110 transition duration-300"></i>

                        <span class="absolute bottom-4 left-4 bg-amber-700 text-white text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-full">
                            {{ __('industrial.card_badge') }}
                        </span>

                    </div>

                    <div class="p-8">

                        <h3 class="text-3xl font-black text-slate-900 mb-5 group-hover:text-amber-700 transition">
                            {{ __('industrial.card_title') }}
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                            {{ __('industrial.card_desc') }}
                        </p>

                        <a href="#"
                           class="mt-8 inline-flex items-center gap-2 text-amber-700 font-bold text-sm hover:gap-3 transition-all">
                            {{ __('industrial.btn_view_project') }}
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

    </script>

</body>
</html>