@include('partials.navbar')

<div class="relative w-full h-[300px] md:h-[450px] bg-cover bg-center flex items-center justify-center text-center" 
     style="background-image: linear-gradient(rgba(14, 29, 50, 0.75), rgba(14, 29, 50, 0.75)), url('{{ $category->banner_image ? asset('storage/' . $category->banner_image) : asset('images/default-banner.jpg') }}');">
    <div class="container mx-auto px-6 max-w-7xl">
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-wide leading-tight max-w-4xl mx-auto">
            {{ ($category->name ?? 'Detail Kategori') }}
        </h1>
    </div>
</div>

{{-- 2. Main Content & Description Section --}}
<div class="py-16 bg-slate-50 min-h-[50vh]">
    <div class="container mx-auto px-6 max-w-7xl">
        
        {{-- Box Deskripsi Utama Kategori --}}
        <div class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-slate-100 max-w-5xl mx-auto mb-16">
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed font-normal text-sm md:text-base">
                {!! (strip_tags($category->description ?? $category->content)) !!}
            </div>
        </div>

        <hr class="border-slate-200 max-w-5xl mx-auto mb-16">

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
                        placeholder="{{ __('portfolio.search_placeholder') ?? 'Cari Proyek di Sektor Ini...' }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
                </div>

            </div>
        </section>

        {{-- Info List Title --}}
        <div class="mb-8 flex flex-wrap justify-between items-center border-b border-slate-200 pb-4 max-w-7xl mx-auto gap-2">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('portfolio.list_title') }} <strong class="text-slate-900">{{ ($category->name) }}</strong>
            </span>
            
            @if(request('from') == 'all')
                <a href="{{ route('proyek.semua') }}" class="text-xs font-bold text-[#c80000] hover:text-slate-900 transition flex items-center gap-1 uppercase tracking-wider">
                    <i class="fa-solid fa-arrow-left"></i> {{ __('portfolio.back_to_all') }}
                </a>
            @endif
        </div>

        {{-- 4. Projects Grid --}}
        <div class="max-w-7xl mx-auto">
            <div id="projectGridDynamic" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @foreach($projects as $project)
                    <div class="project-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md hover:-translate-y-1 transition duration-300"
                         data-nama="{{ strtolower(trim($project->title)) }}"
                         data-tahun="{{ $project->year }}"
                         data-kategori="{{ $category->slug }}"
                         data-lokasi="{{ strtolower(trim($project->location)) }}">
                        
                        {{-- Foto Cover Proyek --}}
                        <div class="relative h-56 overflow-hidden bg-slate-900">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ ($project->title) }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-800">
                                    <i class="fa-solid fa-helmet-safety text-5xl text-red-500/20 group-hover:scale-110 transition duration-300"></i>
                                </div>
                            @endif
                        </div>

                        {{-- Konten Informasi Proyek --}}
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="mb-5">
                                @if($project->location)
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-2 flex items-center">
                                        {{ ($project->location) }} • {{ $project->year }}
                                    </span>
                                @endif
                                <h3 class="text-base font-bold text-slate-900 group-hover:text-[#c80000] transition duration-200 line-clamp-2 mb-2">
                                    {{ ($project->title) }}
                                </h3>

                                <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                                    {{ (strip_tags($project->description)) }}
                                </p>
                            </div>

                            <a href="{{ route('proyek.detail', $project->id) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:text-slate-900 uppercase tracking-wider transition mt-auto">
                                {{ __('portfolio.read_more') }}
                                <svg class="w-3.5 h-3.5 ml-1.5 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- State Ketika Hasil Pencarian Kosong --}}
                <div id="noProjectMessageDynamic" class="hidden col-span-full text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200 p-8 max-w-5xl mx-auto">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-magnifying-glass text-2xl text-slate-300"></i>
                    </div>
                    <h4 class="text-sm font-bold text-slate-800 mb-1">Tidak Ada Kecocokan</h4>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto">
                        Belum ada proyek yang cocok dengan kata kunci pencarian Anda.
                    </p>
                </div>

            </div>

            @if($projects->isEmpty())
                <div class="text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200 p-8 max-w-5xl mx-auto mt-4">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-slate-800 mb-1">Belum Ada Proyek</h4>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto">
                        Saat ini belum ada data proyek strategis yang didaftarkan untuk kategori ini.
                    </p>
                </div>
            @endif

            {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
            @include('partials.pagination')
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const cards = Array.from(document.querySelectorAll('.project-card'));
    const noMessage = document.getElementById('noProjectMessageDynamic');
    const paginationSection = document.getElementById('paginationSection');
    
    // Elements Pagination Info & Control
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
        
        // 1. Filter kartu berdasarkan input teks (mencari kecocokan nama atau lokasi proyek)
        filteredCards = cards.filter(card => {
            const cardNama = card.getAttribute('data-nama') || '';
            const cardLokasi = card.getAttribute('data-lokasi') || '';
            return searchText === '' || cardNama.includes(searchText) || cardLokasi.includes(searchText);
        });

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Jaga agar current page tidak melompat keluar batas lembar baru
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        // 2. Sembunyikan semua kartu terlebih dahulu
        cards.forEach(card => {
            card.style.display = 'none';
        });

        // 3. Tampilkan kartu sesuai irisan (slice) indeks halaman aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        filteredCards.slice(startIndex, endIndex).forEach(card => {
            card.style.display = 'flex';
        });

        // 4. Update Teks Tampilan Informasi Info Records (Bagian Kiri)
        if (totalItems === 0) {
            infoStart.textContent = 0;
            infoEnd.textContent = 0;
            infoTotal.textContent = 0;
            noMessage.classList.remove('hidden');
            if(paginationSection) paginationSection.classList.add('hidden');
        } else {
            infoStart.textContent = startIndex + 1;
            infoEnd.textContent = endIndex;
            infoTotal.textContent = totalItems;
            noMessage.classList.add('hidden');
            if(paginationSection) paginationSection.classList.remove('hidden');
        }

        // 5. Render ulang tombol angka halaman di pembungkus nav
        renderPageNumbers(totalPages);

        // Kunci tombol prev & next bila menyentuh ujung halaman awal/akhir
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
                btn.className += ` bg-red-800 text-white`;
            } else {
                btn.className += ` text-slate-600 hover:bg-slate-50`;
            }

            btn.addEventListener('click', () => {
                currentPage = i;
                applyFiltersAndPagination();
                document.getElementById('projectGridDynamic').scrollIntoView({ behavior: 'smooth', block: 'start' });
            });

            pageNumbersContainer.appendChild(btn);
        }
    }

    // Listener Tombol Navigasi Kiri (Previous)
    btnPrev.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            applyFiltersAndPagination();
        }
    });

    // Listener Tombol Navigasi Kanan (Next)
    btnNext.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            applyFiltersAndPagination();
        }
    });

    // Listener untuk Input Kolom Pencarian Real-Time
    searchInput.addEventListener('input', () => {
        currentPage = 1; // Reset balik ke halaman pertama tiap user mengetik kata baru
        applyFiltersAndPagination();
    });

    // Jalankan kalkulasi pertama kali halaman dibuka
    applyFiltersAndPagination();
});
</script>

@include('partials.footer')