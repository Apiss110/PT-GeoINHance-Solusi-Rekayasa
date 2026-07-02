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
                {{ __('resources.hero_badge') }}
            </span>

            <h1 class="mt-7 text-5xl md:text-6xl font-black uppercase tracking-tight leading-none text-white">
                {{ __('resources.hero_title_1') }}
                <span class="text-red-500">
                    {{ __('resources.hero_title_2') }}
                </span>
            </h1>

            <p class="mt-7 max-w-3xl mx-auto text-slate-300 leading-relaxed text-lg">
                {{ __('resources.hero_desc') }}
            </p>
        </div>
    </section>

    {{-- INTERACTIVE SEARCH & FILTER CONTROLS --}}
    <section class="pt-12 pb-4 bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            {{-- Tombol Filter --}}
            <div class="flex flex-wrap gap-2.5">
                <button class="filter-btn px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-red-800 text-white transition-all shadow-sm" data-category="all">
                    All Resources
                </button>
                <button class="filter-btn px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-600 hover:bg-gray-200 transition-all" data-category="news">
                    Berita & Event
                </button>
                <button class="filter-btn px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-600 hover:bg-gray-200 transition-all" data-category="articles">
                    Artikel & Insight
                </button>
                <button class="filter-btn px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-600 hover:bg-gray-200 transition-all" data-category="videos">
                    Video Teknis
                </button>
                <button class="filter-btn px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-600 hover:bg-gray-200 transition-all" data-category="documents">
                    Document Library
                </button>
            </div>

            {{-- Input Pencarian --}}
            <div class="relative w-full md:w-80">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </span>
                <input type="text" id="searchInput" placeholder="Cari sumber informasi..." 
                       class="w-full pl-9 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-red-800 focus:bg-white transition-all">
            </div>
        </div>
    </section>

    {{-- GRID UTAMA --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div id="resourceGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- DOKUMEN: BERITA & EVENT --}}
                @foreach($newsEvents as $news)
                    <div class="resource-item resource-card bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col justify-between overflow-hidden" 
                         data-name="{{ $news->title }}" data-category="news">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] font-bold uppercase px-2.5 py-1 rounded bg-blue-50 text-blue-600 border border-blue-100">
                                    Berita & Event
                                </span>
                                <span class="text-xs text-gray-400 font-medium">
                                    {{ $news->created_at?->format('d M, Y') }}
                                </span>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 line-clamp-2 mb-3 hover:text-red-700 transition">
                                <a href="{{ route('resources.article-detail', $news->slug ?? '#') }}">{{ $news->title }}</a>
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                                {{ strip_tags($news->content) }}
                            </p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex justify-end">
                            <a href="{{ route('resources.article-detail', $news->slug ?? '#') }}" class="text-xs font-bold text-red-700 hover:text-red-900 inline-flex items-center gap-1.5 transition">
                                Selengkapnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- DOKUMEN: ARTIKEL & INSIGHT --}}
                @foreach($articles as $article)
                    <div class="resource-item resource-card bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col justify-between overflow-hidden" 
                         data-name="{{ $article->title }}" data-category="articles">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] font-bold uppercase px-2.5 py-1 rounded bg-green-50 text-green-600 border border-green-100">
                                    Artikel & Insight
                                </span>
                                <span class="text-xs text-gray-400 font-medium">
                                    {{ $article->created_at?->format('d M, Y') }}
                                </span>
                            </div>
                            <h3 class="text-base font-bold text-slate-900 line-clamp-2 mb-3 hover:text-red-700 transition">
                                <a href="{{ route('resources.article-detail', $article->slug ?? '#') }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                                {{ strip_tags($article->content) }}
                            </p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex justify-end">
                            <a href="{{ route('resources.article-detail', $article->slug ?? '#') }}" class="text-xs font-bold text-red-700 hover:text-red-900 inline-flex items-center gap-1.5 transition">
                                Baca Artikel <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- DOKUMEN: VIDEO TEKNIS --}}
                @foreach($videos as $video)
                    <div class="resource-item resource-card bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col justify-between overflow-hidden" 
                         data-name="{{ $video->title }}" data-category="videos">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] font-bold uppercase px-2.5 py-1 rounded bg-red-50 text-red-600 border border-red-100">
                                    Video Teknis
                                </span>
                                <span class="text-xs text-gray-400 font-medium">
                                    {{ $video->created_at?->format('d M, Y') }}
                                </span>
                            </div>
                            {{-- Jika Anda menyimpan link thumbnail YouTube di db --}}
                            @if(!empty($video->thumbnail))
                                <div class="mb-4 aspect-video rounded-lg overflow-hidden bg-slate-100 border border-gray-100">
                                    <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="Video Thumbnail" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <h3 class="text-base font-bold text-slate-900 line-clamp-2 mb-2">
                                {{ $video->title }}
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-2">
                                {{ $video->description ?? 'Tonton simulasi dan penjelasan teknis dari tim ahli kami.' }}
                            </p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex justify-end">
                            <a href="{{ $video->youtube_link ?? '#' }}" target="_blank" class="text-xs font-bold text-red-700 hover:text-red-900 inline-flex items-center gap-1.5 transition">
                                <i class="fa-solid fa-play text-[10px]"></i> Tonton Video
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- DOKUMEN: CASE STUDY (DOCUMENT LIBRARY) --}}
                @foreach($caseStudies as $study)
                    <div class="resource-item resource-card bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col justify-between overflow-hidden" 
                         data-name="{{ $study->title }}" data-category="documents">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] font-bold uppercase px-2.5 py-1 rounded bg-purple-50 text-purple-600 border border-purple-100">
                                    Document Library
                                </span>
                                <span class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded border border-slate-200 uppercase font-semibold">
                                    PDF - {{ $study->file_size }}
                                </span>
                            </div>
                            
                            <div class="flex items-start gap-4 mb-3">
                                <div class="p-3 bg-red-50 rounded-lg text-red-600 shrink-0">
                                    <i class="fa-solid fa-file-pdf text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-slate-900 line-clamp-2 group-hover:text-red-700 transition">
                                        {{ $study->title }}
                                    </h3>
                                    <span class="text-[11px] text-slate-400 block mt-1">Bidang: <strong>{{ $study->sector }}</strong></span>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                {{ $study->description ?? 'Tidak ada deskripsi berkas studi kasus.' }}
                            </p>
                        </div>
                        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex items-center justify-between text-[11px] text-slate-400">
                            <div>Tahun: <span class="font-semibold text-slate-700">{{ $study->publication_year }}</span></div>
                            <a href="{{ asset('storage/' . $study->file_path) }}" target="_blank" class="inline-flex items-center gap-1.5 font-bold text-blue-600 hover:text-blue-800 transition">
                                <i class="fa-solid fa-cloud-arrow-down"></i> UNDUH
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- Pesan Jika Pencarian Kosong --}}
            <div id="noCaseStudyMessage" class="hidden text-center py-16 text-slate-500 font-medium bg-white rounded-xl border border-gray-200 mt-8">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                Tidak menemukan resources yang sesuai dengan kriteria Anda.
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- CLIENT SIDE FILTER SCRIPT --}}
    <script>
        const searchInput = document.getElementById('searchInput');
        const items = document.querySelectorAll('.resource-item');
        const noMessage = document.getElementById('noCaseStudyMessage');
        const buttons = document.querySelectorAll('.filter-btn');
        let currentCategory = 'all';

        function filterResources() {
            let searchValue = searchInput.value.toLowerCase();
            let hasVisibleItem = false;

            items.forEach(item => {
                let name = item.dataset.name.toLowerCase();
                let category = item.dataset.category;

                let matchesSearch = name.includes(searchValue);
                let matchesCategory = (currentCategory === 'all' || category === currentCategory);

                if (matchesSearch && matchesCategory) {
                    item.style.display = 'flex'; // Menggunakan flex agar struktur card konsisten tingginya
                    hasVisibleItem = true;
                } else {
                    item.style.display = 'none';
                }
            });

            if (hasVisibleItem) {
                noMessage.classList.add('hidden');
            } else {
                noMessage.classList.remove('hidden');
            }
        }

        // Event listener untuk Search Bar
        searchInput.addEventListener('keyup', filterResources);

        // Event listener untuk Tombol Filter
        buttons.forEach(button => {
            button.addEventListener('click', function(){
                buttons.forEach(btn => {
                    btn.classList.remove('bg-red-800','text-white','shadow-sm');
                    btn.classList.add('bg-gray-100','text-gray-600');
                });

                this.classList.remove('bg-gray-100','text-gray-600');
                this.classList.add('bg-red-800','text-white','shadow-sm');

                currentCategory = this.dataset.category;
                filterResources();
            });
        });
    </script>

</body>
</html>