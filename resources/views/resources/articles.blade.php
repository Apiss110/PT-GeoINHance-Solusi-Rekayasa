<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
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
            animation: marquee 25s linear infinite;
        }
        /* Pause jalan logo saat kursor user menempel di atasnya */
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

@include('partials.navbar')

<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
            {{ __('blog.hero_title') }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('blog.hero_desc') }}
        </p>
    </div>
</section>

{{-- NAVIGATION BAR: SEARCH FILTER --}}
<section class="sticky top-0 z-40 bg-white border-b border-slate-200 shadow-sm py-5 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end items-center">
        
        {{-- SEARCH BAR --}}
        <div class="relative w-full sm:w-80">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </span>
            <input
                type="text"
                id="searchInput"
                placeholder="{{ __('blog.search_placeholder') ?? 'Cari Semua Proyek Sektor...' }}"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
        </div>

    </div>
</section>

<section id="blogSection" class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">

    @if($blogs->isEmpty())
        <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            <p class="text-slate-500 font-medium">{{ __('blog.empty_state') }}</p>
        </div>
    @else
        {{-- Container Grid Utama --}}
        <div id="blogGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
                @php
                    $dbCategory = strtoupper(trim($blog->category ?? ''));
                @endphp

                <article class="blog-card bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[480px]"
                         data-title="{{ strtolower(auto_translate($blog->title)) }}">
                    
                    <div>
                        <div class="relative overflow-hidden h-56 bg-slate-100">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ auto_translate($blog->title) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs font-medium">
                                    {{ __('blog.no_image') }}
                                </div>
                            @endif

                            <div class="absolute top-4 left-4">
                                <span class="{{ $dbCategory === 'GEOTECHNIK' || $dbCategory === 'GEOTEKNIK' ? 'bg-[#002d62]' : 'bg-red-800' }} text-white text-[10px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">
                                    {{ auto_translate($blog->category) }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <p class="text-slate-400 text-[11px] font-bold tracking-widest mb-2 uppercase">
                                {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y') : $blog->created_at->format('d M Y') }}
                            </p>
                            
                            <h3 class="text-lg font-black text-slate-900 leading-tight mb-3 group-hover:text-red-800 transition line-clamp-2">
                                {{ auto_translate($blog->title) }}
                            </h3>
                            
                            <div class="text-slate-600 text-xs leading-relaxed line-clamp-3">
                                {!! auto_translate(strip_tags($blog->content)) !!}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="{{ route('article.show', $blog->slug) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:translate-x-1 transition-transform uppercase tracking-wider">
                            {{ __('blog.read_more') }} 
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Pesan pencarian nihil --}}
        <div id="noMatchMessage" class="hidden text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm w-full">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <p class="text-slate-500 font-medium">Tidak ada artikel yang cocok dengan pencarian Anda.</p>
        </div>
    @endif
</section>

    {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
    <section class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:px-8 border-t border-slate-200 pt-6">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            {{-- Teks Info Kiri --}}
            <div id="paginationInfo" class="text-xs text-slate-500 font-medium">
                {{ __('pagination.showing') }} <span id="infoStart" class="font-bold text-slate-800">0</span> {{ __('pagination.to') }} <span id="infoEnd" class="font-bold text-slate-800">0</span> {{ __('pagination.of') }} <span id="infoTotal" class="font-bold text-slate-800">0</span> {{ __('pagination.records') }}
            </div>
            
            {{-- Tombol Halaman Kanan --}}
            <nav id="paginationWrapper" class="inline-flex items-center -space-x-px rounded-lg bg-white border border-slate-200 shadow-sm overflow-hidden">
                <button id="btnPrev" class="px-3 py-2 text-slate-500 hover:bg-slate-50 transition border-r border-slate-200 disabled:opacity-40 disabled:hover:bg-transparent">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>
                
                <div id="pageNumbers" class="flex items-center -space-x-px"></div>
                
                <button id="btnNext" class="px-3 py-2 text-slate-500 hover:bg-slate-50 transition border-l border-slate-200 disabled:opacity-40 disabled:hover:bg-transparent">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </nav>
        </div>
    </section>

<section class="relative overflow-hidden bg-gradient-to-br from-[#002d62] via-[#001f44] to-slate-950 text-white py-20 px-6">
    <div class="absolute inset-0 opacity-[0.03] bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:24px_24px]"></div>
    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <h3 class="text-3xl font-black uppercase mb-6 tracking-tight">
            {{ __('blog.cta_title') }}
        </h3>
        <p class="text-slate-300 text-sm md:text-base mb-10 leading-relaxed font-medium">
            {{ __('blog.cta_desc') }}
        </p>
        <div class="flex justify-center gap-4">
            <a href="#" class="inline-flex items-center bg-white hover:bg-slate-200 text-[#002d62] font-black text-xs uppercase tracking-widest px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1">
                {{ __('blog.cta_btn') }}
            </a>
        </div>
    </div>
</section>

@include('partials.footer')

{{-- SCRIPTS LOGIC FOR FILTERS & PAGINATION --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const blogGrid = document.getElementById('blogGrid');
    const noMatchMessage = document.getElementById('noMatchMessage');
    
    // Elements for pagination
    const infoStart = document.getElementById('infoStart');
    const infoEnd = document.getElementById('infoEnd');
    const infoTotal = document.getElementById('infoTotal');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const pageNumbersContainer = document.getElementById('pageNumbers');

    if (!blogGrid) return; // Guard clause if empty state handles view

    const allCards = Array.from(blogGrid.querySelectorAll('.blog-card'));
    const itemsPerPage = 6;
    let currentPage = 1;
    let filteredCards = [...allCards];

    function updateUI() {
        // Sembunyikan semua kartu terlebih dahulu
        allCards.forEach(card => card.classList.add('hidden'));

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Validasi boundary page
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Munculkan kartu yang berada pada rentang halaman aktif
        const activeCards = filteredCards.slice(startIndex, endIndex);
        activeCards.forEach(card => card.classList.remove('hidden'));

        // Handle Empty State pencarian
        if (totalItems === 0) {
            blogGrid.classList.add('hidden');
            noMatchMessage.classList.remove('hidden');
            infoStart.textContent = '0';
            infoEnd.textContent = '0';
        } else {
            blogGrid.classList.remove('hidden');
            noMatchMessage.classList.add('hidden');
            infoStart.textContent = startIndex + 1;
            infoEnd.textContent = endIndex;
        }
        
        infoTotal.textContent = totalItems;

        // Atur status tombol prev/next
        btnPrev.disabled = (currentPage === 1);
        btnNext.disabled = (currentPage === totalPages);

        buildNumericControls(totalPages);
    }

    function buildNumericControls(totalPages) {
        pageNumbersContainer.innerHTML = '';
        
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = i;
            
            if (i === currentPage) {
                btn.className = "px-4 py-2 text-xs font-bold text-white bg-[#002d62] transition";
            } else {
                btn.className = "px-4 py-2 text-xs font-medium text-slate-600 hover:bg-slate-50 transition border-r border-slate-100";
            }

            btn.addEventListener('click', () => {
                currentPage = i;
                updateUI();
                scrollToGrid();
            });

            pageNumbersContainer.appendChild(btn);
        }
    }

    function scrollToGrid() {
        const target = document.getElementById('blogSection');
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Event Listeners Navigasi
    btnPrev.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            updateUI();
            scrollToGrid();
        }
    });

    btnNext.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updateUI();
            scrollToGrid();
        }
    });

    // Event Listener Live Search Input
    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();

        filteredCards = allCards.filter(card => {
            const title = card.getAttribute('data-title') || '';
            return title.includes(keyword);
        });

        currentPage = 1; // reset ke halaman pertama saat melakukan pencarian
        updateUI();
    });

    // Jalankan kalkulasi pertama kali saat DOM siap
    updateUI();
});
</script>
</body>
</html>