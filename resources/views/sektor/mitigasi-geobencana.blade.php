<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitigasi Geobencana | GeoINHance</title>

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
    <section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">
                {{ __('geodisaster.hero_sector') }}
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
                {{ __('geodisaster.hero_title_1') }} <span class="text-blue-400">{{ __('geodisaster.hero_title_2') }}</span>
            </h1>
            <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                {{ __('geodisaster.hero_desc') }}
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
                    placeholder="{{ __('geodisaster.search_placeholder') }}"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
            </div>

        </div>
    </section>

    {{-- PROJECT GRID SECTION --}}
    <section class="max-w-7xl mx-auto pt-16 pb-8 px-4 sm:px-6 lg:px-8">
        
        <div id="projectGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- LOOPING DATA DARI ADMIN DASHBOARD SECARA DINAMIS --}}
            @forelse($projects as $project)
            <div class="project-item transition-all duration-300" data-name="{{ strtolower($project->title) }}">
                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[480px]">
                    <div>
                        {{-- Thumbnail Area --}}
                        <div class="relative overflow-hidden h-56 bg-slate-900 flex items-center justify-center">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                            @else
                                <i class="fa-solid fa-mountain text-[80px] text-blue-500/10 group-hover:scale-110 transition duration-700"></i>
                            @endif
                        </div>

                        {{-- Content Area --}}
                        <div class="p-6 space-y-3">
                            <p class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                                <i class="fa-solid fa-location-dot text-blue-500 mr-1"></i> {{ $project->location }}, Indonesia
                            </p>
                            <h3 class="text-lg font-black text-slate-900 leading-tight group-hover:text-blue-700 transition line-clamp-2 min-h-[3rem] uppercase">
                                {{ $project->title }}
                            </h3>
                            <div class="text-slate-600 text-xs leading-relaxed line-clamp-3 min-h-[3.3rem]">
                                {!! strip_tags($project->description) !!}
                            </div>
                        </div>
                    </div>

                    {{-- Footer/Tags Area --}}
                    <div class="p-6 pt-0 space-y-4">
                        <div class="flex flex-wrap gap-1.5 border-t border-slate-100 pt-4">
                            <span class="bg-slate-100 text-slate-700 text-[10px] font-semibold px-2.5 py-1 rounded-md border border-slate-200">
                                {{ $project->category->name ?? 'Mitigasi' }}
                            </span>
                            <span class="bg-slate-100 text-slate-700 text-[10px] font-semibold px-2.5 py-1 rounded-md border border-slate-200">
                                {{ $project->year }}
                            </span>
                        </div>
                        <a href="#" class="inline-flex items-center text-xs font-bold text-blue-600 hover:translate-x-1 transition-transform uppercase tracking-wider">
                            {{ __('geodisaster.project_detail') ?? 'Lihat Detail' }}
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
            @empty
            {{-- TAMPILAN JIKA DATA DI DATABASE MASIH KOSONG --}}
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 bg-white rounded-3xl border border-slate-200">
                <i class="fa-solid fa-folder-open text-slate-300 text-5xl mb-3"></i>
                <p class="text-sm text-slate-500 font-medium">Belum ada data proyek mitigasi geobencana yang diinput oleh admin.</p>
            </div>
            @endforelse

        </div>
    </section>

    {{-- PAGINATION NAVIGATION INTERFACE --}}
    <section class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:px-8 border-t border-slate-200 pt-6">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            {{-- Teks Info Kiri --}}
            <div id="paginationInfo" class="text-xs text-slate-500 font-medium">
                Menampilkan <span id="infoStart" class="font-bold text-slate-800">0</span> sampai <span id="infoEnd" class="font-bold text-slate-800">0</span> dari <span id="infoTotal" class="font-bold text-slate-800">0</span> rekaman proyek
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

    {{-- CTA SECTION --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-[#002d62] via-[#001f44] to-slate-950 text-white py-20 px-6">
        <div class="absolute inset-0 opacity-[0.03] bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        <div class="relative z-10 max-w-3xl mx-auto text-center">
            <h3 class="text-3xl font-black uppercase mb-6 tracking-tight">
                {{ __('blog.cta_title') ?? 'Ready to Start Your Project?' }}
            </h3>
            <p class="text-slate-300 text-sm md:text-base mb-10 leading-relaxed font-medium">
                {{ __('blog.cta_desc') ?? 'Connect with our engineering experts to get reliable analysis and professional technical design.' }}
            </p>
            <div class="flex justify-center gap-4">
                <a href="#" class="inline-flex items-center bg-white hover:bg-slate-200 text-[#002d62] font-black text-xs uppercase tracking-widest px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1">
                    {{ __('blog.cta_btn') ?? 'Contact Us' }}
                </a>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- JAVASCRIPT LOGIC: SEARCH FILTER & PAGINATION KELIPATAN 6 --}}
    <script>
        const searchInput = document.getElementById('searchInput');
        const items = Array.from(document.querySelectorAll('.project-item'));
        
        const itemsPerPage = 6; // Aturan layout: Batasi maksimal 6 item per halaman
        let currentPage = 1;
        let filteredItems = [...items]; 

        function updatePagination() {
            const totalItems = filteredItems.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

            // Sembunyikan seluruh items bawaan
            items.forEach(item => item.style.display = 'none');

            // Tampilkan items yang sesuai filter pencarian & halaman saat ini
            filteredItems.slice(startIndex, endIndex).forEach(item => {
                item.style.display = 'block';
            });

            // Update keterangan text info kiri
            document.getElementById('infoStart').textContent = totalItems === 0 ? 0 : startIndex + 1;
            document.getElementById('infoEnd').textContent = endIndex;
            document.getElementById('infoTotal').textContent = totalItems;

            // Generate nomor halaman angka
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
                    document.getElementById('projectGrid').scrollIntoView({ behavior: 'smooth', block: 'center' });
                });
                pageNumbersContainer.appendChild(btn);
            }

            // Lock / unlock status state tombol prev & next
            document.getElementById('btnPrev').disabled = (currentPage === 1);
            document.getElementById('btnNext').disabled = (currentPage === totalPages);
        }

        // Action tombol Prev
        document.getElementById('btnPrev').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
            }
        });

        // Action tombol Next
        document.getElementById('btnNext').addEventListener('click', () => {
            const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
            }
        });

        // Live Search Sync Filter
        searchInput.addEventListener('input', function(){
            let value = this.value.toLowerCase().trim();
            
            filteredItems = items.filter(item => {
                let name = item.dataset.name.toLowerCase();
                return name.includes(value);
            });

            currentPage = 1; // Kembali ke halaman awal setiap melakukan pencarian
            updatePagination();
        });

        // Trigger inisialisasi awal saat DOM siap
        document.addEventListener('DOMContentLoaded', () => {
            updatePagination();
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
    @livewireScripts
</body>
</html>