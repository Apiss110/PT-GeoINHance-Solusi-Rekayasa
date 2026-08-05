@include('partials.navbar')

{{-- HERO SECTION --}}
<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3">
            {{ __('portfolio.hero_badge') }}
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
            {{ __('portfolio.hero_title') }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('portfolio.hero_desc') }}
        </p>
    </div>
</section>

{{-- NAVIGATION BAR: SEARCH FILTER --}}
<section class="sticky top-16 z-40 bg-white border-b border-slate-200 shadow-sm py-5 transition-all duration-300 rounded-3xl mb-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-end items-center">
        
        {{-- SEARCH BAR --}}
        <div class="relative w-full sm:w-80">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </span>
            <input
                type="text"
                id="searchInput"
                placeholder="{{ __('portfolio.search_placeholder') ?? 'Cari Semua Proyek Sektor...' }}"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
        </div>

    </div>
</section>

{{-- PORTFOLIO GRID SECTION --}}
<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div id="allProjectsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($projects as $project)
                @php
                    $catName = $project->category->name ?? __('portfolio.default_category');
                    $dbCategory = strtoupper(trim($catName));
                @endphp

                <div class="project-card bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[480px]"
                    data-nama="{{ strtolower(trim($project->title ?? '')) }}"
                    data-kategori="{{ strtolower(trim($project->category->slug ?? $project->category->name ?? '')) }}">
                 
                    <div>
                        {{-- IMAGE / THUMBNAIL AREA --}}
                        <div class="relative overflow-hidden h-56 bg-slate-100">
                            @if($project->image_path || $project->image)
                                <img src="{{ asset('storage/' . ($project->image_path ?? $project->image)) }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                                     alt="{{ ($project->title) }}"
                                     onerror="this.onerror=null; this.src='https://placehold.co/600x400?text=Format+Storage+Error';">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-900 to-blue-950 flex flex-col items-center justify-center gap-2 group-hover:scale-105 transition-transform duration-700 relative">
                                    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:10px_10px]"></div>
                                    <i class="fa-solid fa-building text-blue-500/30 text-5xl"></i>
                                </div>
                            @endif
                        </div>

                        {{-- CONTENT AREA --}}
                        <div class="p-6 space-y-2">
                            <p class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                                {{ ($project->location) }} • {{ $project->year }}
                            </p>

                            <h3 class="text-lg font-black text-slate-900 leading-tight group-hover:text-red-800 transition line-clamp-2 pt-1">
                                <a href="{{ route('proyek.detail', $project->id) }}">
                                    {{ ($project->title) }}
                                </a>
                            </h3>

                            <div class="text-slate-600 text-xs leading-relaxed line-clamp-3 pt-1">
                                {!! (Str::limit(strip_tags($project->description), 180)) !!}
                            </div>
                        </div>
                    </div>

                    {{-- FOOTER ACTION CALL TO ACTION --}}
                    <div class="p-6 pt-0">
                        <a href="{{ route('proyek.detail', $project->id) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:translate-x-1 transition-transform uppercase tracking-wider">
                            {{ __('portfolio.view_detail') }}
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                </div>
            @endforeach

            {{-- Pesan Pencarian Nihil --}}
            <div id="noProjectsFoundMessage" class="hidden col-span-full text-center py-20 bg-white rounded-3xl border border-slate-200 shadow-sm">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <p class="text-slate-500 font-medium">Tidak ada proyek yang sesuai dengan kata kunci tersebut.</p>
            </div>

        </div>

        {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
        @include('partials.pagination')

    </div>
</section>

{{-- CONTACT / CTA SECTION --}}
<section id="contact" class="bg-slate-900 text-white py-16 border-t border-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-3xl font-bold tracking-tight">
            {{ __('portfolio.cta_title') }}
        </h2>
        <h2 class="text-slate-400 max-w-xl mx-auto text-xs leading-relaxed">
            {{ __('portfolio.cta_desc') }}
        </h2>
        <div class="pt-4">
            <a href="#" class="bg-red-600 text-white font-semibold px-8 py-3 rounded-md text-xs hover:bg-blue-700 transition shadow-md shadow-blue-500/10 inline-block">
                {{ __('portfolio.cta_btn') }}
            </a>
        </div>
    </div>
</section>

@include('partials.footer')

{{-- FLOAT WHATSAPP BUTTON --}}
<a href="https://wa.me/6285190441744" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
</a>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
    
    window.onscroll = function() {
        const nav = document.querySelector('nav');
        if (nav && window.pageYOffset > 50) {
            nav.classList.add('shadow-md');
        } else if (nav) {
            nav.classList.remove('shadow-md');
        }
    };

    // LOGIKA PAGINATION & LIVE FILTER TERINTEGRASI (FIXED KELIPATAN 6)
    const searchInput = document.getElementById('searchInput');
    const cards = Array.from(document.querySelectorAll('.project-card'));
    const noMessage = document.getElementById('noProjectsFoundMessage');
    
    const infoStart = document.getElementById('infoStart');
    const infoEnd = document.getElementById('infoEnd');
    const infoTotal = document.getElementById('infoTotal');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const pageNumbersContainer = document.getElementById('pageNumbers');

    const itemsPerPage = 6;
    let currentPage = 1;
    let filteredCards = [...cards];

    function applyFiltersAndPagination() {
        const searchText = searchInput.value.toLowerCase().trim();
        
        // 1. Jalankan Filter berdasarkan teks input
        filteredCards = cards.filter(card => {
            const cardNama = card.getAttribute('data-nama') || '';
            return searchText === '' || cardNama.includes(searchText);
        });

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Amankan index page agar tidak out-of-bounds
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }
        if (currentPage < 1) {
            currentPage = 1;
        }

        // 2. Sembunyikan semua item terlebih dahulu
        cards.forEach(card => card.style.display = 'none');

        // 3. Tampilkan item yang sesuai slice index halaman aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        filteredCards.slice(startIndex, endIndex).forEach(card => {
            card.style.display = 'flex';
        });

        // 4. Update Teks Info Angka (Bagian Kiri)
        if (totalItems === 0) {
            infoStart.textContent = 0;
            infoEnd.textContent = 0;
            infoTotal.textContent = 0;
            noMessage.classList.remove('hidden');
        } else {
            infoStart.textContent = startIndex + 1;
            infoEnd.textContent = endIndex;
            infoTotal.textContent = totalItems;
            noMessage.classList.add('hidden');
        }

        // 5. Gambar ulang tombol angka navigasi halaman
        renderPageNumbers(totalPages);

        // 6. Atur status tombol chevron prev/next
        btnPrev.disabled = (currentPage === 1);
        btnNext.disabled = (currentPage === totalPages);
    }

    function renderPageNumbers(totalPages) {
        pageNumbersContainer.innerHTML = '';
        
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            btn.className = `px-3.5 py-2 text-xs font-semibold border-r border-slate-200 transition last:border-r-0`;
            
            if (i === currentPage) {
                btn.className += ` bg-red-800 text-white`;
            } else {
                btn.className += ` text-slate-800 hover:bg-slate-50`;
            }

            btn.addEventListener('click', () => {
                currentPage = i;
                applyFiltersAndPagination();
                scrollToGrid();
            });

            pageNumbersContainer.appendChild(btn);
        }
    }

    function scrollToGrid() {
        const gridElement = document.getElementById('allProjectsGrid');
        if (gridElement) {
            gridElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Event Listener untuk Tombol Navigasi Chevron kiri/kanan
    btnPrev.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            applyFiltersAndPagination();
            scrollToGrid();
        }
    });

    btnNext.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            applyFiltersAndPagination();
            scrollToGrid();
        }
    });

    // Menggunakan event 'input' agar pembersihan atau paste dengan mouse terdeteksi seketika
    searchInput.addEventListener('input', () => {
        currentPage = 1; 
        applyFiltersAndPagination();
    });

    // Jalankan kalkulasi saat halaman pertama kali terbuka
    document.addEventListener("DOMContentLoaded", function() {
        applyFiltersAndPagination();
    });
</script>