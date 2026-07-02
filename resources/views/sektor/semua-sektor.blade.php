<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Sektor - PT GeoINHance Solusi Rekayasa</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Navbar Glass Effect */
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
            background-color: #002d62;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .card-shadow {
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

    {{-- NAVBAR --}}
        @include('partials.navbar')

    {{-- HERO SECTION --}}
    <section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden pt-36">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">
                {{ __('all_sectors.hero_sector') }}
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
                {{ __('all_sectors.hero_title_1') }} <span class="text-blue-400">{{ __('all_sectors.hero_title_2') }}</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                {{ __('all_sectors.hero_desc') }}
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
                    placeholder="{{ __('all_sectors.search_placeholder') }}"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
            </div>

        </div>
    </section>

    {{-- GRID SECTOR SECTION --}}
    <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        
        <div id="sectorGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($sectors as $sector)
            {{-- ITEM COMPONENT --}}
            <div class="sector-item transition-all duration-300" 
                 data-name="{{ strtolower(__($sector['name'])) }}"
                 data-category="{{ $sector['category'] }}">
                
                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[460px]">
                    <div>
                        {{-- Thumbnail Area --}}
                        <div class="relative overflow-hidden h-52 bg-slate-900 flex items-center justify-center">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80 z-10"></div>
                            <i class="fa-solid {{ $sector['icon'] }} text-[70px] text-blue-500/20 group-hover:scale-110 transition duration-700"></i>
                            
                            <div class="absolute bottom-4 left-4 z-20">
                                <span class="bg-[#002d62] text-white text-[10px] font-bold px-3 py-1 uppercase tracking-widest rounded-md">
                                    {{ __($sector['badge']) }}
                                </span>
                            </div>
                        </div>

                        {{-- Content Area --}}
                        <div class="p-6 space-y-3">
                            <p class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                                <i class="fa-solid fa-location-dot text-blue-500 mr-1"></i> Kendari, Indonesia
                            </p>
                            <h3 class="text-lg font-black text-slate-900 leading-tight group-hover:text-blue-700 transition line-clamp-2 min-h-[3rem]">
                                {{ __($sector['name']) }}
                            </h3>
                            <div class="text-slate-600 text-xs leading-relaxed line-clamp-3 min-h-[3.3rem]">
                                {{ __($sector['description']) }}
                            </div>
                        </div>
                    </div>

                    {{-- Action Button Area --}}
                    <div class="p-6 pt-0 space-y-4">
                        <div class="flex flex-wrap gap-1.5 border-t border-slate-100 pt-4">
                            <span class="bg-slate-100 text-slate-700 text-[10px] font-semibold px-2.5 py-1 rounded-md border border-slate-200">
                                {{ __('geodisaster.tag_slope_stability') }}
                            </span>
                            <span class="bg-slate-100 text-slate-700 text-[10px] font-semibold px-2.5 py-1 rounded-md border border-slate-200">
                                {{ __('geodisaster.tag_plaxis_2d') }}
                            </span>
                        </div>
                        <a href="#" class="inline-flex items-center text-xs font-bold text-blue-600 hover:translate-x-1 transition-transform uppercase tracking-wider">
                            {{ __('all_sectors.btn_view_detail') }}
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach

        </div>
    </section>

        {{-- BACKEND NATIVE PAGINATION INTERFACE --}}
    <section class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:px-8 border-t border-slate-200 pt-6">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            {{-- Teks Info Kiri --}}
            <div id="paginationInfo" class="text-xs text-slate-500 font-medium">
                Menampilkan <span id="infoStart" class="font-bold text-slate-800">0</span> sampai <span id="infoEnd" class="font-bold text-slate-800">0</span> dari <span id="infoTotal" class="font-bold text-slate-800">0</span> rekaman sektor
            </div>
            
            {{-- Tombol Halaman Kanan --}}
            <nav id="paginationControls" class="inline-flex items-center -space-x-px rounded-lg bg-white border border-slate-200 shadow-sm overflow-hidden">
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

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- JAVASCRIPT LOGIC: COMBINED SYNCHRONIZED SEARCH, FILTERS & PAGINATION KELIPATAN 6 --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Inisialisasi AOS Animasi
            AOS.init({ duration: 800, once: true });

            const searchInput = document.getElementById('searchInput');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const items = Array.from(document.querySelectorAll('.sector-item'));

            const itemsPerPage = 6; 
            let currentPage = 1;
            let currentCategory = 'all';
            let currentSearchQuery = '';
            let filteredItems = [...items]; 

            // Kontrol terpadu kombinasi Filter Kategori & Input Pencarian
            function applyFilterAndSearch() {
                filteredItems = items.filter(item => {
                    const matchesCategory = currentCategory === 'all' || item.dataset.category === currentCategory;
                    const matchesSearch = item.dataset.name.includes(currentSearchQuery);
                    return matchesCategory && matchesSearch;
                });

                currentPage = 1; // Reset halaman ke 1 setiap kali filter berubah
                updatePagination();
            }

            // Fungsi Sinkronisasi Logika Render Grid Card & Pagination Angka Kontrol
            function updatePagination() {
                const totalItems = filteredItems.length;
                const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

                if (currentPage > totalPages) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

                // Sembunyikan seluruh elemen item bawaan terlebih dahulu
                items.forEach(item => item.style.display = 'none');

                // Tampilkan hanya item yang masuk dalam rentang indeks halaman aktif
                filteredItems.slice(startIndex, endIndex).forEach(item => {
                    item.style.display = 'block';
                });

                // Perbarui Teks Informasi Rekam Data Sektor di Kiri Bawah
                document.getElementById('infoStart').textContent = totalItems === 0 ? 0 : startIndex + 1;
                document.getElementById('infoEnd').textContent = endIndex;
                document.getElementById('infoTotal').textContent = totalItems;

                // Render Komponen Navigasi Angka Halaman Kanan Secara Dinamis
                const pageNumbersContainer = document.getElementById('pageNumbers');
                pageNumbersContainer.innerHTML = '';

                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.textContent = i;
                    btn.className = `px-3.5 py-2 text-xs font-bold border-r border-slate-200 transition ${
                        i === currentPage 
                        ? 'bg-[#002d62] text-white' 
                        : 'bg-white text-slate-700 hover:bg-slate-50'
                    }`;
                    btn.addEventListener('click', () => {
                        currentPage = i;
                        updatePagination();
                        document.getElementById('sectorGrid').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    });
                    pageNumbersContainer.appendChild(btn);
                }

                // Kelola Status Validasi Aktif/Mati Tombol Panah Prev & Next
                document.getElementById('btnPrev').disabled = (currentPage === 1);
                document.getElementById('btnNext').disabled = (currentPage === totalPages);
            }

            // Event Handler: Navigasi Klik Tombol Filter Kategori Atas
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => {
                        btn.className = 'filter-btn bg-slate-100 text-slate-600 hover:bg-slate-200 px-4 py-2 rounded-xl text-xs font-bold transition-all duration-300';
                    });
                    this.className = 'filter-btn bg-[#002d62] text-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm transition-all duration-300';

                    currentCategory = this.dataset.category;
                    applyFilterAndSearch();
                });
            });

            // Event Handler: Tombol Klik Panah Kiri (Prev)
            document.getElementById('btnPrev').addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updatePagination();
                }
            });

            // Event Handler: Tombol Klik Panah Kanan (Next)
            document.getElementById('btnNext').addEventListener('click', () => {
                const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    updatePagination();
                }
            });

            // Event Handler: Sinkronisasi Input Teks Pencarian Real-time
            searchInput.addEventListener('input', function() {
                currentSearchQuery = this.value.toLowerCase().trim();
                applyFilterAndSearch();
            });

            // Inisialisasi awal pemanggilan sistem render pagination saat load halaman pertama kali
            applyFilterAndSearch();
        });
    </script>
    @livewireScripts
</body>
</html>