<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa - Case Studies</title>
    
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
            {{ __('casestudy.hero_title') ?? 'Technical Case Studies' }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('casestudy.hero_desc') ?? 'Explore our comprehensive archive of geotechnical engineering analyses, structural failure forensics, and structural implementation reports.' }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- NAVIGATION BAR: SEARCH FILTER --}}
        <section class="sticky top-0 z-40 bg-white border-b border-slate-200 shadow-sm py-5 transition-all duration-300 rounded-xl mb-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end items-center">
                
                {{-- SEARCH BAR --}}
                <div class="relative w-full sm:w-80">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="{{ __('casestudy.label_search') ?? 'Cari studi kasus...' }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
                </div>

            </div>
        </section>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('casestudy.archive_title') ?? 'Technical Archive:' }} <strong class="text-slate-900">{{ __('casestudy.archive_subtitle') ?? 'Project Review Documents' }}</strong>
            </span>
        </div>

        {{-- MAIN CASE STUDY GRID CONTAINER --}}
        <div id="caseStudyGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($caseStudies as $study)
                <div class="case-card bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 flex flex-col justify-between hover:shadow-md transition duration-200 group"
                     data-nama="{{ strtolower(auto_translate($study->title)) }}">
                    
                    <div>
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="p-3 bg-red-50 rounded-lg text-red-600">
                                <i class="fa-solid fa-file-pdf text-2xl"></i>
                            </div>
                            <span class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded border border-slate-200 uppercase">
                                PDF - {{ $study->file_size ?? 'N/A' }}
                            </span>
                        </div>
                        
                        <p class="text-slate-400 text-[11px] font-bold tracking-widest mb-2 uppercase">
                            {{ str_replace('-', ' ', $study->sector) }}
                        </p>

                        <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2 mb-2">
                            <a href="{{ route('resources.studi-kasus.detail', $study->slug ?? $study->id) }}">
                                {{ auto_translate($study->title) }}
                            </a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 mb-4 leading-relaxed">
                            {{ $study->description ? auto_translate($study->description) : (__('casestudy.no_description') ?? 'Tidak ada deskripsi.') }}
                        </p>
                    </div>

                    <div class="border-t border-slate-100 pt-4 mt-2 flex items-center justify-between text-[11px] text-slate-400 font-medium">
                        <div>
                            {{ __('casestudy.label_year_card') ?? 'Year:' }} 
                            <span class="font-semibold text-slate-600">{{ $study->year }}</span>
                        </div>
                        
                        <a href="{{ route('resources.studi-kasus.detail', $study->slug ?? $study->id) }}" class="inline-flex items-center gap-1.5 font-bold text-red-500 hover:text-red-700 transition">
                            <i class="fa-solid fa-book-open"></i> {{ __('casestudy.label_readmore') ?? 'Read More' }}
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                    <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                    {{ __('casestudy.empty_message') ?? 'Tidak ada data studi kasus ditemukan.' }}
                </div>
            @endforelse

            {{-- ELEMENT PESAN KOSONG SAAT SEARCH TIDAK MENCOCOKKAN APAPUN --}}
            <div id="noCaseStudyMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('casestudy.empty_message') ?? 'Tidak ada data studi kasus ditemukan.' }}
            </div>
        </div>

        {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
        <section class="max-w-7xl mx-auto pb-16 border-t border-slate-200 pt-6">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                {{-- Teks Info Kiri --}}
                <div id="paginationInfo" class="text-xs text-slate-500 font-medium">
                    {{ __('pagination.showing') ?? 'Showing' }} 
                    <span id="infoStart" class="font-bold text-slate-800">0</span> 
                    {{ __('pagination.to') ?? 'to' }} 
                    <span id="infoEnd" class="font-bold text-slate-800">0</span> 
                    {{ __('pagination.of') ?? 'of' }} 
                    <span id="infoTotal" class="font-bold text-slate-800">0</span> 
                    {{ __('pagination.records') ?? 'records' }}
                </div>
                
                {{-- Tombol Halaman Kanan --}}
                <nav id="paginationWrapper" class="inline-flex items-center -space-x-px rounded-lg bg-white border border-slate-200 shadow-sm overflow-hidden">
                    <button id="btnPrev" class="px-3 py-2 text-slate-500 hover:bg-slate-50 transition border-r border-slate-200 disabled:opacity-40 disabled:hover:bg-transparent disabled:cursor-not-allowed">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                    
                    <div id="pageNumbers" class="flex items-center -space-x-px"></div>
                    
                    <button id="btnNext" class="px-3 py-2 text-slate-500 hover:bg-slate-50 transition border-l border-slate-200 disabled:opacity-40 disabled:hover:bg-transparent disabled:cursor-not-allowed">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </nav>
            </div>
        </section>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi DOM Elemen dengan sinkronisasi ID yang tepat
    const searchInput = document.getElementById('searchInput');
    const gridContainer = document.getElementById('caseStudyGrid');
    const allCards = Array.from(gridContainer.querySelectorAll('.case-card'));
    const noMatchMessage = document.getElementById('noCaseStudyMessage');
    
    // Elemen Info Pagination
    const infoStart = document.getElementById('infoStart');
    const infoEnd = document.getElementById('infoEnd');
    const infoTotal = document.getElementById('infoTotal');
    
    // Elemen Tombol Navigasi Pagination
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const pageNumbersContainer = document.getElementById('pageNumbers');

    // 2. Konfigurasi Logika Utama
    const itemsPerPage = 6; // Menampilkan 6 kartu per halaman
    let currentPage = 1;
    let filteredCards = [...allCards]; 

    // 3. Fungsi Render Utama (Sinkronisasi Tampilan Data dengan Halaman Aktif)
    function renderCaseStudyUI() {
        // Sembunyikan semua kartu terlebih dahulu
        allCards.forEach(card => card.classList.add('hidden'));

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Proteksi penunjuk halaman agar tidak out of bound
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Tampilkan kartu yang aktif saja pada halaman yang sedang dibuka
        const activePageCards = filteredCards.slice(startIndex, endIndex);
        activePageCards.forEach(card => card.classList.remove('hidden'));

        // Handle pesan error apabila tidak ada studi kasus yang dicari
        if (totalItems === 0) {
            noMatchMessage.classList.remove('hidden');
        } else {
            noMatchMessage.classList.add('hidden');
        }

        // Sinkronisasi teks status info kiri
        infoStart.textContent = totalItems === 0 ? 0 : startIndex + 1;
        infoEnd.textContent = endIndex;
        infoTotal.textContent = totalItems;

        // Kontrol aktif/tidaknya tombol Prev & Next
        btnPrev.disabled = currentPage === 1;
        btnNext.disabled = currentPage === totalPages || totalItems === 0;

        // Susun kembali tombol angka halaman di tengah
        buildPageNumbers(totalPages);
    }

    // 4. Fungsi Pembuat Angka Halaman Dinamis
    function buildPageNumbers(totalPages) {
        pageNumbersContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.type = 'button';
            pageButton.textContent = i;
            
            // Styling aktif vs nonaktif
            if (currentPage === i) {
                pageButton.className = "px-4 py-2 text-xs font-bold bg-red-800 text-white transition-all";
            } else {
                pageButton.className = "px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 transition-all border-r border-slate-100";
            }
            
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderCaseStudyUI();
                // Scroll ke kontainer grid secara mulus
                gridContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
            pageNumbersContainer.appendChild(pageButton);
        }
    }

    // 5. Listener Tombol Navigasi Kiri (Prev) & Kanan (Next)
    btnPrev.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderCaseStudyUI();
            gridContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });

    btnNext.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / itemsPerPage) || 1;
        if (currentPage < totalPages) {
            currentPage++;
            renderCaseStudyUI();
            gridContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });

    // 6. Logika Pemfilteran Berdasarkan Input Pencarian (Live-Search)
    function performSearchFilter() {
        const searchKeyword = searchInput.value.toLowerCase().trim();

        // Cari berdasarkan data-nama (title studi kasus yang telah di-translate)
        filteredCards = allCards.filter(card => {
            const cardName = card.getAttribute('data-nama') || '';
            return !searchKeyword || cardName.includes(searchKeyword);
        });

        // Kembalikan ke halaman 1 setiap kali user merubah input teks pencarian
        currentPage = 1;
        renderCaseStudyUI();
    }

    // Pasang listener input real-time
    searchInput.addEventListener('input', performSearchFilter);

    // Jalankan inisialisasi awal saat halaman siap dibuka
    renderCaseStudyUI();
});
</script>

@include('partials.footer')
</body>
</html>