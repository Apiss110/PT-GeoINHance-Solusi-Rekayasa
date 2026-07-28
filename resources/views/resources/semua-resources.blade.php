<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa - Resources</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Navbar Blur Effect */
        .nav-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }
        /* Underline animation */
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
            background-color: #991b1b;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        /* Custom Shadow for clean look */
        .card-shadow {
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
        }
        [x-cloak] { display: none !important; }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

@include('partials.navbar')

{{-- HERO SECTION --}}
<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
            {{ __('resources.hero_title_1') }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('resources.hero_desc') }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- INPUT FILTERS --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200/80 mb-10">
            <form id="filterFormResources" class="grid grid-cols-1 lg:grid-cols-4 gap-4 items-end">
                
                {{-- Filter Kategori Berbasis Tombol --}}
                <div class="space-y-1.5 lg:col-span-3">
                    <div class="flex flex-wrap gap-2">
                        <button type="button" class="category-btn px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider bg-slate-900 text-white transition" data-category="all">
                            {{ __('resources.filter_all') }}
                        </button>
                        <button type="button" class="category-btn px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider bg-slate-100 text-slate-600 hover:bg-slate-200 transition" data-category="news">
                            {{ __('resources.filter_all') ? 'News' : __('resources.filter_news') }}
                        </button>
                        <button type="button" class="category-btn px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider bg-slate-100 text-slate-600 hover:bg-slate-200 transition" data-category="articles">
                            {{ __('resources.filter_all') ? 'Articles' : __('resources.filter_articles') }}
                        </button>
                        <button type="button" class="category-btn px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider bg-slate-100 text-slate-600 hover:bg-slate-200 transition" data-category="videos">
                            {{ __('resources.filter_all') ? 'Videos' : __('resources.filter_videos') }}
                        </button>
                        <button type="button" class="category-btn px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider bg-slate-100 text-slate-600 hover:bg-slate-200 transition" data-category="documents">
                            {{ __('resources.filter_all') ? 'Case Studies' : __('resources.filter_case_studies') }}
                        </button>
                    </div>
                </div>

                {{-- Search Bar --}}
                <div class="space-y-1.5 w-full">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" id="inputNamaResource" placeholder="{{ __('video.placeholder_search') ?? 'Ketik kata kunci...' }}" 
                               class="w-full bg-slate-50 border border-gray-200 rounded-lg pl-9 pr-4 py-2 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition">
                    </div>
                </div>
            </form>
        </div>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('resources.catalog_title') }} <strong class="text-slate-900">{{ __('resources.catalog_brand') }}</strong>
            </span>
        </div>

        {{-- MAIN GRID CONTAINER --}}
        <div id="resourceGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            {{-- DOKUMEN: BERITA & EVENT --}}
            @foreach($newsEvents as $news)
                <div class="resource-card bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 flex flex-col justify-between hover:shadow-md transition duration-200 group" 
                     data-name="{{ strtolower(trim(auto_translate($news->title))) }}" data-category="news">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                                {{ __('resources.filter_news') }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">
                                {{ $news->created_at?->format('d M, Y') }}
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-red-600 transition line-clamp-2 mb-2">
                            <a href="{{ route('article.show', $news->slug ?? '#') }}">{{ auto_translate($news->title) }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed mb-4">
                            {{ auto_translate(strip_tags($news->content)) }}
                        </p>
                    </div>
                    <div class="border-t border-slate-100 pt-4 mt-2 flex justify-end">
                        <a href="{{ route('article.show', $news->slug ?? '#') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-red-700 hover:text-red-900 transition">
                            {{ __('resources.read_more') }} <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- DOKUMEN: ARTIKEL & INSIGHT --}}
            @foreach($articles as $article)
                <div class="resource-card bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 flex flex-col justify-between hover:shadow-md transition duration-200 group" 
                     data-name="{{ strtolower(trim(auto_translate($article->title))) }}" data-category="articles">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                                {{ __('resources.filter_articles') }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">
                                {{ $article->created_at?->format('d M, Y') }}
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-red-600 transition line-clamp-2 mb-2">
                            <a href="{{ route('article.show', $article->slug ?? '#') }}">{{ auto_translate($article->title) }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed mb-4">
                            {{ auto_translate(strip_tags($article->content)) }}
                        </p>
                    </div>
                    <div class="border-t border-slate-100 pt-4 mt-2 flex justify-end">
                        <a href="{{ route('article.show', $article->slug ?? '#') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-red-700 hover:text-red-900 transition">
                            {{ __('resources.read_article') }} <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- DOKUMEN: VIDEO TEKNIS --}}
            @foreach($videos as $video)
                <div class="resource-card bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 flex flex-col justify-between hover:shadow-md transition duration-200 group" 
                     data-name="{{ strtolower(trim(auto_translate($video->title))) }}" data-category="videos">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                                {{ __('resources.filter_videos') }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">
                                {{ $video->created_at?->format('d M, Y') }}
                            </span>
                        </div>
                        @if(!empty($video->thumbnail))
                            <div class="mb-4 aspect-video rounded-lg overflow-hidden bg-slate-100 border border-gray-100">
                                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ auto_translate($video->title) }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-red-600 transition line-clamp-2 mb-2">
                            {{ auto_translate($video->title) }}
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 mb-4">
                            {{ $video->description ? auto_translate($video->description) : 'Tonton simulasi dan explanation teknis dari tim ahli kami.' }}
                        </p>
                    </div>
                    <div class="border-t border-slate-100 pt-4 mt-2 flex justify-end">
                        <a href="{{ $video->youtube_link ?? '#' }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-red-700 hover:text-red-900 transition">
                            <i class="fa-solid fa-play text-[10px]"></i> {{ __('resources.watch_video') }}
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- DOKUMEN: CASE STUDY (DOCUMENT LIBRARY) --}}
            @foreach($caseStudies as $study)
                <div class="resource-card bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 flex flex-col justify-between hover:shadow-md transition duration-200 group" 
                     data-name="{{ strtolower(trim(auto_translate($study->title))) }}" data-category="documents">
                    <div>
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="p-3 bg-red-50 rounded-lg text-red-600">
                                <i class="fa-solid fa-file-pdf text-2xl"></i>
                            </div>
                            <span class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded border border-slate-200 uppercase">
                                PDF - {{ $study->file_size ?? 'N/A' }}
                            </span>
                        </div>
                        
                        <span class="text-slate-400 text-[11px] font-bold tracking-widest mb-2 uppercase">
                            {{ __('resources.document_library') }}
                        </span>

                        <h3 class="text-base font-bold text-slate-900 group-hover:text-red-600 transition line-clamp-2 mb-2">
                            {{ auto_translate($study->title) }}
                        </h3>
                        <span class="text-[11px] text-slate-400 block mb-2">{{ __('resources.field_sector') }}: <strong>{{ auto_translate($study->sector) }}</strong></span>
                        <p class="text-xs text-slate-500 line-clamp-2 mb-4 leading-relaxed">
                            {{ $study->description ? auto_translate($study->description) : 'Tidak ada deskripsi berkas studi kasus.' }}
                        </p>
                    </div>

                    <div class="border-t border-slate-100 pt-4 mt-2 flex items-center justify-between text-[11px] text-slate-400 font-medium">
                        <div>
                            {{ __('resources.year') }}: <span class="font-semibold text-slate-600">{{ $study->publication_year }}</span>
                        </div>
                        <a href="{{ asset('storage/' . $study->file_path) }}" target="_blank" class="inline-flex items-center gap-1.5 font-bold text-red-500 hover:text-red-700 transition">
                            <i class="fa-solid fa-cloud-arrow-down"></i> {{ __('resources.download') }}
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- Pesan Tidak Ada Hasil --}}
            <div id="noResourceMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('resources.no_data_found') ?? 'Tidak ada data yang ditemukan.' }}
            </div>
        </div>

        {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
        @include('partials.pagination')
    </div>
</section>

@include('partials.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi DOM Elemen Berdasarkan ID & Class Real di HTML
    const filterForm = document.getElementById('filterFormResources');
    const inputNama = document.getElementById('inputNamaResource');
    const categoryButtons = document.querySelectorAll('.category-btn');
    const gridContainer = document.getElementById('resourceGrid');
    const allCards = Array.from(gridContainer.querySelectorAll('.resource-card'));
    const noMatchMessage = document.getElementById('noResourceMessage');
    const paginationSection = document.getElementById('paginationSection');
    
    const infoStart = document.getElementById('infoStart');
    const infoEnd = document.getElementById('infoEnd');
    const infoTotal = document.getElementById('infoTotal');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const pageNumbersContainer = document.getElementById('pageNumbers');

    // 2. Konfigurasi Pagination Kelipatan 6 Item Per Halaman
    const itemsPerPage = 6; 
    let currentPage = 1;
    let selectedCategory = 'all';
    let filteredCards = [...allCards]; 

    // 3. Fungsi Utama Sinkronisasi UI & Logika Filter Kombinasi
    function renderResourceUI() {
        const searchKeyword = inputNama.value.toLowerCase().trim();

        // Filter data berdasarkan text input DAN tombol kategori aktif
        filteredCards = allCards.filter(card => {
            const cardName = card.getAttribute('data-name') || '';
            const cardCategory = card.getAttribute('data-category') || '';
            
            const matchSearch = !searchKeyword || cardName.includes(searchKeyword);
            const matchCategory = selectedCategory === 'all' || cardCategory === selectedCategory;

            return matchSearch && matchCategory;
        });

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Amankan index penunjuk halaman agar tidak overflow saat data menyusut
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        // Sembunyikan semua kartu secara default terlebih dahulu
        allCards.forEach(card => card.classList.add('hidden'));

        // Ambil range irisan halaman aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Tampilkan item pada page yang sedang aktif
        filteredCards.slice(startIndex, endIndex).forEach(card => card.classList.remove('hidden'));

        // Mengatur informasi teks counter di bagian bawah kiri
        if (totalItems === 0) {
            infoStart.textContent = 0;
            infoEnd.textContent = 0;
            infoTotal.textContent = 0;
            noMatchMessage.classList.remove('hidden');
            if (paginationSection) paginationSection.classList.add('hidden');
        } else {
            infoStart.textContent = startIndex + 1;
            infoEnd.textContent = endIndex;
            infoTotal.textContent = totalItems;
            noMatchMessage.classList.add('hidden');
            if (paginationSection) paginationSection.classList.remove('hidden');
        }

        // Render tombol angka lembar halaman baru & kontrol status disabled tombol chevron
        buildPaginationButtons(totalPages);
        btnPrev.disabled = currentPage === 1;
        btnNext.disabled = currentPage === totalPages;
    }

    // 4. Fungsi Pembuat Navigasi Tombol Angka Secara Dinamis
    function buildPaginationButtons(totalPages) {
        pageNumbersContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.type = 'button';
            pageButton.className = `px-3.5 py-2 text-xs font-semibold border-r border-slate-200 transition last:border-r-0`;
            pageButton.textContent = i;
            
            if (currentPage === i) {
                pageButton.className += ` bg-red-800 text-white`;
            } else {
                pageButton.className += ` text-slate-600 hover:bg-slate-50`;
            }
            
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderResourceUI();
                gridContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
            pageNumbersContainer.appendChild(pageButton);
        }
    }

    // 5. Event Listeners Kontrol Navigasi & Input
    btnPrev.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderResourceUI();
            gridContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });

    btnNext.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderResourceUI();
            gridContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });

    // Event Listener: Pencarian instan (real-time typing)
    inputNama.addEventListener('input', () => {
        currentPage = 1;
        renderResourceUI();
    });

    // Event Listener: Klik Kategori Filter
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Ubah gaya warna tombol aktif (Slate 900 Theme)
            categoryButtons.forEach(btn => {
                btn.classList.remove('bg-slate-900', 'text-white');
                btn.classList.add('bg-slate-100', 'text-slate-600', 'hover:bg-slate-200');
            });

            this.classList.remove('bg-slate-100', 'text-slate-600', 'hover:bg-slate-200');
            this.classList.add('bg-slate-900', 'text-white');

            selectedCategory = this.getAttribute('data-category');
            currentPage = 1;
            renderResourceUI();
        });
    });

    // Mencegah form reload page saat menekan enter pada input search
    filterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        currentPage = 1;
        renderResourceUI();
    });

    // Inisialisasi awal UI saat load pertama kali
    renderResourceUI();
});
</script>

</body>
</html>