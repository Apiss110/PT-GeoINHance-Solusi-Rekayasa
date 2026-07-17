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
        
        {{-- INPUT FILTERS: Hanya search bar yang bersih --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200/80 mb-10">
            <form id="filterFormVideo" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        {{ __('video.label_search') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" id="inputNamaVideo" placeholder="{{ __('video.placeholder_search') }}" 
                               class="w-full bg-slate-50 border border-gray-200 rounded-lg pl-9 pr-4 py-2 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition">
                    </div>
                </div>
            </form>
        </div>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('casestudy.archive_title') ?? 'Technical Archive:' }} <strong class="text-slate-900">{{ __('casestudy.archive_subtitle') ?? 'Project Review Documents' }}</strong>
            </span>
        </div>

        {{-- MAIN CASE STUDY GRID CONTAINER --}}
        <div id="caseStudyGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
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
                        
                        <span class="inline-block text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md mb-3">
                            {{ str_replace('-', ' ', $study->sector) }}
                        </span>

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
                        
                        <a href="{{ route('resources.studi-kasus.detail', $study->slug ?? $study->id) }}" class="inline-flex items-center gap-1.5 font-bold text-blue-500 hover:text-blue-700 transition">
                            <i class="fa-solid fa-book-open"></i> Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                    <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                    {{ __('casestudy.empty_message') ?? 'Tidak ada data studi kasus ditemukan.' }}
                </div>
            @endforelse

            <div id="noCaseStudyMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('casestudy.empty_message') ?? 'Tidak ada data studi kasus ditemukan.' }}
            </div>
        </div>

        {{-- SYSTEM PAGINATION TRACKING & CONTROLS --}}
        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-gray-200 pt-6">
            <div class="text-sm text-slate-500 font-medium">
                {{ __('casestudy.footer_showing') ?? 'Showing' }} <span id="countDisplayedCaseStudy" class="text-slate-700 font-bold">0</span> {{ __('casestudy.footer_of') ?? 'of' }} <span id="countTotalCaseStudy" class="text-slate-700 font-bold">0</span> {{ __('casestudy.footer_records') ?? 'records' }}
            </div>
            
            <div id="paginationCaseStudyControls" class="inline-flex rounded-lg bg-[#1E293B] p-0.5 text-white shadow-sm overflow-hidden">
                {{-- Tombol navigasi dirakit otomatis secara dinamis oleh JS --}}
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi DOM Elemen dengan ID yang benar & sesuai HTML
    const filterForm = document.getElementById('filterFormCaseStudy');
    const inputNama = document.getElementById('inputNamaCaseStudy');
    const gridContainer = document.getElementById('caseStudyGrid');
    
    const allCards = Array.from(gridContainer.querySelectorAll('.case-card'));
    const noMatchMessage = document.getElementById('noCaseStudyMessage');
    
    const countDisplayed = document.getElementById('countDisplayedCaseStudy');
    const countTotal = document.getElementById('countTotalCaseStudy');
    const paginationControls = document.getElementById('paginationCaseStudyControls');

    // 2. Konfigurasi Awal Logika Pagination Internal
    const itemsPerPage = 6; // Menampilkan 6 kartu per halaman
    let currentPage = 1;
    let filteredCards = [...allCards]; 

    // 3. Fungsi Sinkronisasi Tampilan UI
    function renderCaseStudyUI() {
        allCards.forEach(card => card.classList.add('hidden'));

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        const activePageCards = filteredCards.slice(startIndex, endIndex);
        activePageCards.forEach(card => card.classList.remove('hidden'));

        if (totalItems === 0) {
            noMatchMessage.classList.remove('hidden');
        } else {
            noMatchMessage.classList.add('hidden');
        }

        countDisplayed.textContent = activePageCards.length;
        countTotal.textContent = totalItems;

        buildPaginationButtons(totalPages);
    }

    // 4. Fungsi Pembuat Navigasi Tombol Secara Dinamis
    function buildPaginationButtons(totalPages) {
        paginationControls.innerHTML = '';

        // Tombol Kembali (Chevron Left)
        const prevButton = document.createElement('button');
        prevButton.type = 'button';
        prevButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === 1 ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        prevButton.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
        if (currentPage > 1) {
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderCaseStudyUI();
                gridContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            });
        }
        paginationControls.appendChild(prevButton);

        // Angka Halaman
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.type = 'button';
            pageButton.className = `px-4 py-2 text-xs font-bold transition ${currentPage === i ? 'bg-slate-700 text-white' : 'text-slate-400 hover:bg-slate-700/50'}`;
            pageButton.textContent = i;
            
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderCaseStudyUI();
                gridContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            });
            paginationControls.appendChild(pageButton);
        }

        // Tombol Lanjut (Chevron Right)
        const nextButton = document.createElement('button');
        nextButton.type = 'button';
        nextButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === totalPages ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        nextButton.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
        if (currentPage < totalPages) {
            nextButton.addEventListener('click', () => {
                currentPage++;
                renderCaseStudyUI();
                gridContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            });
        }
        paginationControls.appendChild(nextButton);
    }

    // 5. Logika Pemfilteran Berdasarkan Search Saja
    function performSearchFilter() {
        const searchKeyword = inputNama.value.toLowerCase().trim();

        filteredCards = allCards.filter(card => {
            const cardName = card.getAttribute('data-nama') || '';
            return !searchKeyword || cardName.includes(searchKeyword);
        });

        currentPage = 1;
        renderCaseStudyUI();
    }

    // Jalankan pencarian instan sewaktu user mengetik keyboard
    inputNama.addEventListener('input', performSearchFilter);

    // Mencegah form reload page saat user menekan enter
    filterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        performSearchFilter();
    });

    // Inisialisasi awal
    renderCaseStudyUI();
});
</script>

@include('partials.footer')
</body>
</html>