<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('syllabus.meta_title') ?? 'Silabus & Materi Training | GeoINHance' }}</title>

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
        <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3">
            {{ __('syllabus.hero_badge') }}
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none">
            {{ __('syllabus.hero_title_1') }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('syllabus.hero_desc') }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- INPUT FILTERS --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200/80 mb-10">
            <form id="filterFormSyllabus" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end items-center">

            {{-- SEARCH BAR --}}
            <div class="relative w-full sm:w-80">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </span>
                <input
                    type="text"
                    id="searchInput"
                    placeholder="{{ __('syllabus.search_placeholder') ?? 'Cari Semua Proyek Sektor...' }}"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
            </div>
            </form>
        </div>


        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('syllabus.catalog_title') ?? 'Katalog Program Training:' }} <strong class="text-slate-900">GeoINHance Syllabus</strong>
            </span>
        </div>

        {{-- MAIN GRID CONTAINER --}}
        <div id="syllabusGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($syllabi as $item)
                <div class="training-card bg-white rounded-xl shadow-sm border border-gray-200/80 p-5 flex flex-col justify-between hover:shadow-md transition duration-200 group" 
                     data-name="{{ strtolower(($item->title)) }}">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-red-900">
                                @if($item->icon)
                                    <i class="{{ $item->icon }} text-xl"></i>
                                @else
                                    <svg class="w-6 h-6 opacity-70" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                @endif
                            </div>
                            <span class="text-[10px] font-bold uppercase px-2.5 py-1 rounded bg-blue-50 text-red-600 border border-red-100">
                                {{ ($item->software_category) }}
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-slate-900 group-hover:text-red-600 transition line-clamp-2 mb-2">
                            <a href="{{ route('training.syllabus.show', $item->id) }}">{{ ($item->title) }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed mb-4 font-light">
                            {{ ($item->description) }}
                        </p>
                    </div>

                    <div class="border-t border-slate-100 pt-4 mt-2">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="text-[10px] font-bold px-2.5 py-0.5 bg-blue-50 text-red-600 border border-red-200 rounded">
                                {{ ($item->level) }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">
                                {{ $item->modules_count }} {{ __('syllabus.modules_count_suffix') ?? 'Modul' }}
                            </span>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('training.syllabus.show', $item->id) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-red-700 hover:text-red-900 transition">
                                {{ __('syllabus.view_material') ?? 'Lihat Materi' }} <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pesan Jika Tidak Ada Hasil --}}
            <div id="noSyllabusMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('syllabus.no_data_found') ?? 'Belum ada silabus training yang tersedia saat ini.' }}
            </div>
        </div>

        {{-- SYSTEM PAGINATION TRACKING & CONTROLS --}}
        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-gray-200 pt-6">
            <div class="text-sm text-slate-500 font-medium">
                {{ __('resources.showing') ?? 'Showing' }} <span id="countDisplayedSyllabus" class="text-slate-700 font-bold">0</span> {{ __('resources.to_of') ?? 'of' }} <span id="countTotalSyllabus" class="text-slate-700 font-bold">0</span> {{ __('resources.records') ?? 'records' }}
            </div>
            
            <div id="paginationSyllabusControls" class="inline-flex rounded-lg bg-[#1E293B] p-0.5 text-white shadow-sm overflow-hidden">
                {{-- Tombol navigasi dirakit otomatis secara dinamis oleh JS --}}
            </div>
        </div>
    </div>
</section>

@include('partials.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterFormSyllabus');
    const searchInput = document.getElementById('searchInput');
    const gridContainer = document.getElementById('syllabusGrid');
    
    const allCards = Array.from(gridContainer.querySelectorAll('.training-card'));
    const noMatchMessage = document.getElementById('noSyllabusMessage');
    
    const countDisplayed = document.getElementById('countDisplayedSyllabus');
    const countTotal = document.getElementById('countTotalSyllabus');
    const paginationControls = document.getElementById('paginationSyllabusControls');

    const itemsPerPage = 6; 
    let currentPage = 1;
    let filteredCards = [...allCards]; 

    function renderSyllabusUI() {
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

    function buildPaginationButtons(totalPages) {
        paginationControls.innerHTML = '';

        // Tombol Kembali
        const prevButton = document.createElement('button');
        prevButton.type = 'button';
        prevButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === 1 ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        prevButton.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
        if (currentPage > 1) {
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderSyllabusUI();
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
                renderSyllabusUI();
                gridContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            });
            paginationControls.appendChild(pageButton);
        }

        // Tombol Lanjut
        const nextButton = document.createElement('button');
        nextButton.type = 'button';
        nextButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === totalPages ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        nextButton.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
        if (currentPage < totalPages) {
            nextButton.addEventListener('click', () => {
                currentPage++;
                renderSyllabusUI();
                gridContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            });
        }
        paginationControls.appendChild(nextButton);
    }

    function performSearchFilter() {
        const searchKeyword = searchInput.value.toLowerCase().trim();

        filteredCards = allCards.filter(card => {
            const cardName = card.getAttribute('data-name') || '';
            return !searchKeyword || cardName.includes(searchKeyword);
        });

        currentPage = 1;
        renderSyllabusUI();
    }

    searchInput.addEventListener('input', performSearchFilter);

    filterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        performSearchFilter();
    });

    renderSyllabusUI();
});
</script>

</body>
</html>