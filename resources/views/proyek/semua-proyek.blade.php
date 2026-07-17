@include('partials.navbar')

<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3">
            {{ __('portfolio.hero_badge') }}
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none">
            {{ __('portfolio.hero_title') }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('portfolio.hero_desc') }}
        </p>
    </div>
</section>

    {{-- NAVIGATION BAR: SEARCH FILTER --}}
    <section class="sticky top-16 z-40 bg-white border-b border-slate-200 shadow-sm py-5 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end items-center">
            
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

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div id="allProjectsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($projects as $project)
            <div class="project-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                data-nama="{{ strtolower(trim(auto_translate($project->title ?? ''))) }}"
                data-kategori="{{ strtolower(trim($project->category->slug ?? $project->category->name ?? '')) }}">
             
                <div>
                    {{-- IMAGE / THUMBNAIL --}}
                    <div class="bg-slate-800 h-48 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80 z-10"></div>

                        @if($project->image_path || $project->image)
                            <img src="{{ asset('storage/' . ($project->image_path ?? $project->image)) }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                                 alt="{{ auto_translate($project->title) }}"
                                 onerror="this.onerror=null; this.src='https://placehold.co/600x400?text=Format+Storage+Error';">
                        @else
                            <i class="fa-solid fa-building text-5xl text-blue-500/30 group-hover:scale-110 transition duration-300"></i>
                        @endif

                        <span class="absolute bottom-4 left-4 z-20 bg-red-600 text-white text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded">
                            {{ auto_translate($project->category->name ?? __('portfolio.default_category')) }}
                        </span>
                    </div>

                    <div class="p-6 space-y-3">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition min-h-[3.5rem] line-clamp-2">
                            {{ auto_translate($project->title) }}
                        </h3>
                        <div class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                            {!! auto_translate(Str::limit($project->description, 180)) !!}
                        </div>
                    </div>
                </div>

                <div class="p-6 pt-0 space-y-4">
                    <div class="flex flex-wrap gap-1.5 border-t border-gray-100 pt-4">
                        <span class="bg-slate-100 text-slate-700 text-[10px] font-mono px-2 py-0.5 rounded border border-slate-200">
                            <i class="fa-solid fa-layer-group text-blue-500 mr-1"></i>
                            {{ auto_translate($project->software_used ?? $project->software ?? __('portfolio.default_software')) }}
                        </span>
                    </div>

                    <a href="{{ route('proyek.category', $project->category->slug ?? 'detailed-engineering-design') }}" class="block text-center bg-gray-50 text-gray-700 border border-gray-200 py-2 rounded-lg text-xs font-semibold hover:bg-blue-600 hover:text-white hover:border-blue-600 transition">
                        {{ __('portfolio.view_detail') }}
                    </a>
                </div>

            </div>
            @endforeach

            <div id="noProjectsFoundMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-magnifying-glass text-3xl text-slate-300 mb-2 block"></i>
                Tidak ada proyek yang sesuai dengan kata kunci tersebut.
            </div>

        </div>

        {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
        <section class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:px-8 border-t border-slate-200 pt-6 mt-12">
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

    </div>
</section>

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

<a href="https://wa.me/6285190441744" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
</a>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
    window.onscroll = function() {
        const nav = document.querySelector('nav');
        if (window.pageYOffset > 50) {
            nav.classList.add('shadow-md');
        } else {
            nav.classList.remove('shadow-md');
        }
    };

    // LOGIKA PAGINATION & LIVE FILTER TERINTEGRASI (KELIPATAN 6)
    const searchInput = document.getElementById('searchInput'); // Diperbaiki agar sesuai dengan ID input HTML
    const cards = Array.from(document.querySelectorAll('.project-card'));
    const noMessage = document.getElementById('noProjectsFoundMessage');
    
    // Penanda Elemen Pagination
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
        
        // 1. Filter data terlebih dahulu berdasarkan input pencarian
        filteredCards = cards.filter(card => {
            const cardNama = card.getAttribute('data-nama') || '';
            return searchText === '' || cardNama.includes(searchText);
        });

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Reset halaman aktif jika melebihi total halaman baru setelah difilter
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        // 2. Sembunyikan semua kartu terlebih dahulu
        cards.forEach(card => card.style.display = 'none');

        // 3. Tampilkan kartu khusus untuk halaman yang aktif saat ini
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        filteredCards.slice(startIndex, endIndex).forEach(card => {
            card.style.display = 'flex';
        });

        // 4. Perbarui Teks Info Pagination (Kiri)
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

        // 5. Render Ulang Tombol Angka Navigasi (Kanan)
        renderPageNumbers(totalPages);

        // Kasih proteksi / disable tombol prev dan next
        btnPrev.disabled = currentPage === 1;
        btnNext.disabled = currentPage === totalPages;
    }

    function renderPageNumbers(totalPages) {
        pageNumbersContainer.innerHTML = '';
        
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            btn.className = `px-3.5 py-2 text-xs font-semibold border-r border-slate-200 transition last:border-r-0`;
            
            if (i === currentPage) {
                btn.className += ` bg-blue-600 text-white`;
            } else {
                btn.className += ` text-slate-600 hover:bg-slate-50`;
            }

            btn.addEventListener('click', () => {
                currentPage = i;
                applyFiltersAndPagination();
                document.getElementById('allProjectsGrid').scrollIntoView({ behavior: 'smooth', block: 'start' });
            });

            pageNumbersContainer.appendChild(btn);
        }
    }

    // Event Listener untuk Tombol Navigasi Prev/Next
    btnPrev.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            applyFiltersAndPagination();
        }
    });

    btnNext.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            applyFiltersAndPagination();
        }
    });

    // Event Listener untuk Kolom Input Pencarian
    searchInput.addEventListener('keyup', () => {
        currentPage = 1; // Kembali ke halaman 1 tiap mengetik pencarian baru
        applyFiltersAndPagination();
    });

    // Jalankan inisialisasi awal saat halaman dimuat
    applyFiltersAndPagination();
</script>