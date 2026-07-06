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
    <section class="py-6 bg-white border-b border-gray-200 sticky top-20 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row gap-4 justify-between items-center">

            {{-- SEARCH BAR --}}
            <div class="relative w-full lg:w-80">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input
                    type="text"
                    id="searchInput"
                    placeholder="{{ __('syllabus.search_placeholder') }}"
                    class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-11 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-700 focus:bg-white transition">
            </div>

        </div>
    </section>

    {{-- CONTENT CARDS --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6"> {{-- 🟢 Pembungkus pembatas grid dikembalikan agar letak tidak berantakan --}}
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($syllabi as $item)
                    <div class="training-card bg-white rounded-2xl shadow-sm border border-gray-200/60 p-6 flex flex-col justify-between hover:shadow-md transition duration-300">
                        <div>
                            <div class="flex justify-between items-start mb-5">
                                <div class="w-14 h-14 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-[#0e1d82]">
                                    @if($item->icon)
                                        <i class="{{ $item->icon }} text-2xl"></i>
                                    @else
                                        <svg class="w-7 h-7 opacity-70" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>
                                    @endif
                                </div>
                                <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md bg-red-50 text-red-600 border border-red-100">
                                    {{ $item->software_category }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $item->title }}</h3>
                            <p class="text-sm text-slate-600 line-clamp-3 mb-5 leading-relaxed font-light">
                                {{ $item->description }}
                            </p>
                        </div>

                        <div class="border-t border-gray-100 pt-4 mt-2">
                            <div class="flex items-center space-x-3 mb-4">
                                <span class="text-xs font-bold px-2.5 py-0.5 bg-amber-50 text-amber-700 border border-amber-200 rounded">
                                    {{ $item->level }}
                                </span>
                                <span class="text-xs text-slate-400 font-medium">
                                    {{ $item->modules_count }} Modul
                                </span>
                            </div>
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#0e1d82] hover:text-red-600 transition group">
                                Lihat Materi 
                                <span class="ml-1.5 transform group-hover:translate-x-1 transition duration-200">&rarr;</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 border-2 border-dashed border-gray-200 rounded-2xl bg-white shadow-sm">
                        <p class="text-gray-400 font-medium text-base">Belum ada silabus training yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

</body>
</html>

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