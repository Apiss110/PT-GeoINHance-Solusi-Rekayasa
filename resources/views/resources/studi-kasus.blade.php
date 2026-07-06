<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(0%); }
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
<body class="bg-slate-50 font-sans antialiased text-slate-900 ">

@include('partials.navbar')

<section class="bg-slate-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-blue-900/20 via-transparent to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="flex mb-4 text-sm text-slate-400 font-medium">
            <span class="text-slate-500">{{ __('casestudy.breadcrumb_resources') }}</span>
            <span class="mx-2">/</span>
            <span class="text-blue-400">{{ __('casestudy.breadcrumb_active') }}</span>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight">
            {{ __('casestudy.hero_title') }}
        </h1>
        <p class="mt-3 text-base text-slate-300 max-w-3xl leading-relaxed">
            {{ __('casestudy.hero_desc') }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- INPUT FILTERS --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200/80 mb-10">
            <form id="filterFormCaseStudy" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        {{ __('casestudy.label_search') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" id="inputNamaCaseStudy" placeholder="{{ __('casestudy.placeholder_search') }}" 
                               class="w-full bg-slate-50 border border-gray-200 rounded-lg pl-9 pr-4 py-2 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        {{ __('casestudy.label_sector') }}
                    </label>
                    <select id="selectKategoriCaseStudy" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('casestudy.option_sector_all') }}</option>
                        <option value="geotechnical">{{ __('casestudy.option_sec_geo') }}</option>
                        <option value="structural">{{ __('casestudy.option_sec_struct') }}</option>
                        <option value="infrastructure">{{ __('casestudy.option_sec_forensic') }}</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        {{ __('casestudy.label_year') }}
                    </label>
                    <select id="selectTahunCaseStudy" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('casestudy.option_year_all') }}</option>
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-slate-900 hover:bg-blue-700 text-white font-bold text-xs tracking-widest py-2.5 rounded-lg transition duration-200 shadow-sm uppercase text-center flex items-center justify-center gap-2">
                        <i class="fa-solid fa-sliders text-[10px]"></i> {{ __('casestudy.btn_filter') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('casestudy.archive_title') }} <strong class="text-slate-900">{{ __('casestudy.archive_subtitle') }}</strong>
            </span>
        </div>

        {{-- GRID DATA --}}
        <div id="caseStudyGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($caseStudies as $study)
                {{-- CARD DINAMIS --}}
                <div class="case-card bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex flex-col justify-between hover:shadow-md transition group"
                     data-nama="{{ strtolower($study->title) }}"
                     data-kategori="{{ Str::slug($study->sector) }}"
                     data-tahun="{{ $study->year }}">
                    <div>
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="p-3 bg-red-50 rounded-lg text-red-600">
                                <i class="fa-solid fa-file-pdf text-2xl"></i>
                            </div>
                            <span class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded border border-slate-200 uppercase">
                                PDF - {{ $study->file_size ?? 'N/A' }}
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2 mb-2">
                            {{ $study->title }}
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2 mb-4">
                            {{ $study->description ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </div>
                    <div class="border-t border-slate-100 pt-4 mt-2 flex items-center justify-between text-[11px] text-slate-400">
                        <div>
                            {{ __('casestudy.label_year_card') }} 
                            <span class="font-semibold text-slate-700">{{ $study->year }}</span>
                        </div>
                        
                        {{-- PERBAIKAN: Mengubah Tautan Download Berkas Menjadi Halaman Detail Studi Kasus --}}
                        <a href="{{ route('resources.studi-kasus.detail', $study->slug ?? $study->id) }}" class="inline-flex items-center gap-1.5 font-bold text-blue-600 hover:text-blue-800 transition">
                            <i class="fa-solid fa-book-open"></i> Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                {{-- Tampilan jika database kosong --}}
                <div class="col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                    <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                    {{ __('casestudy.empty_message') }}
                </div>
            @endforelse

            {{-- Pesan fallback murni untuk penanganan filtering Javascript --}}
            <div id="noCaseStudyMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('casestudy.empty_message') }}
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-gray-200 pt-6">
            <div class="text-sm text-slate-500 font-medium">
                {{ __('casestudy.footer_showing') }} <span id="countDisplayedCaseStudy" class="text-slate-700 font-bold">0</span> {{ __('casestudy.footer_of') }} <span id="countTotalCaseStudy" class="text-slate-700 font-bold">0</span> {{ __('casestudy.footer_records') }}
            </div>
            
            <div id="paginationCaseStudyControls" class="inline-flex rounded-lg bg-[#1E293B] p-0.5 text-white shadow-sm overflow-hidden">
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi Elemen DOM khusus Halaman Case Study
    const filterForm = document.getElementById('filterFormCaseStudy');
    const inputNama = document.getElementById('inputNamaCaseStudy');
    const selectKategori = document.getElementById('selectKategoriCaseStudy');
    const selectTahun = document.getElementById('selectTahunCaseStudy');
    const gridContainer = document.getElementById('caseStudyGrid');
    const allCards = Array.from(gridContainer.querySelectorAll('.case-card'));
    const noMatchMessage = document.getElementById('noCaseStudyMessage');
    
    const countDisplayed = document.getElementById('countDisplayedCaseStudy');
    const countTotal = document.getElementById('countTotalCaseStudy');
    const paginationControls = document.getElementById('paginationCaseStudyControls');

    // 2. Konfigurasi Logika Pagination Internal
    const itemsPerPage = 3; // Jumlah kartu per halaman yang diizinkan tampil
    let currentPage = 1;
    let filteredCards = [...allCards]; // Salinan awal kumpulan data kartu aktif

    // 3. Fungsi Inti Sinkronisasi Tampilan UI (Filter + Pagination terintegrasi)
    function renderCaseStudyUI() {
        // Sembunyikan semua kartu terlebih dahulu sebelum kalkulasi rentang halaman
        allCards.forEach(card => card.classList.add('hidden'));

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Validasi pengunci halaman aktif agar tidak out of bounds setelah filter berubah
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        // Hitung batas indeks data yang diizinkan tampil pada halaman aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Ambil kartu sesuai kalkulasi halaman lalu tampilkan kembali ke layar
        const activePageCards = filteredCards.slice(startIndex, endIndex);
        activePageCards.forEach(card => card.classList.remove('hidden'));

        // Kendalikan penampakan blok info data kosong
        if (totalItems === 0) {
            noMatchMessage.classList.remove('hidden');
        } else {
            noMatchMessage.classList.add('hidden');
        }

        // Perbarui teks counter informasi data real-time
        countDisplayed.textContent = activePageCards.length;
        countTotal.textContent = totalItems;

        // Render susunan struktur tombol navigasi halaman baru
        buildPaginationButtons(totalPages);
    }

    // 4. Fungsi Pembuat Tombol Navigasi Halaman Secara Dinamis
    function buildPaginationButtons(totalPages) {
        paginationControls.innerHTML = '';

        // Tombol Kembali / Sebelumnya (Chevron Left)
        const prevButton = document.createElement('button');
        prevButton.type = 'button';
        prevButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === 1 ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        prevButton.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
        if (currentPage > 1) {
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderCaseStudyUI();
            });
        }
        paginationControls.appendChild(prevButton);

        // Deretan Nomor Halaman Urut
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.type = 'button';
            pageButton.className = `px-4 py-2 text-xs font-bold transition ${currentPage === i ? 'bg-slate-700 text-white' : 'text-slate-400 hover:bg-slate-700/50'}`;
            pageButton.textContent = i;
            
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderCaseStudyUI();
            });
            paginationControls.appendChild(pageButton);
        }

        // Tombol Lanjut / Selanjutnya (Chevron Right)
        const nextButton = document.createElement('button');
        nextButton.type = 'button';
        nextButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === totalPages ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        nextButton.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
        if (currentPage < totalPages) {
            nextButton.addEventListener('click', () => {
                currentPage++;
                renderCaseStudyUI();
            });
        }
        paginationControls.appendChild(nextButton);
    }

    // 5. Intersept Proses Submit Form Saringan
    filterForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Mengunci default submit form agar tidak terjadi reload page

        const searchKeyword = inputNama.value.toLowerCase().trim();
        const selectedKategori = selectKategori.value;
        const selectedTahun = selectTahun.value;

        // Eksekusi pemfilteran berbasis pencocokan atribut data-
        filteredCards = allCards.filter(card => {
            const cardName = card.getAttribute('data-nama');
            const cardKategori = card.getAttribute('data-kategori');
            const cardTahun = card.getAttribute('data-tahun');

            const matchSearch = !searchKeyword || cardName.includes(searchKeyword);
            const matchKategori = !selectedKategori || cardKategori === selectedKategori;
            const matchTahun = !selectedTahun || cardTahun === selectedTahun;

            return matchSearch && matchKategori && matchTahun;
        });

        // Kembalikan penunjuk halaman ke angka 1 setiap filter dieksekusi ulang
        currentPage = 1;
        renderCaseStudyUI();
    });

    // 6. Jalankan eksekusi perdana saat komponen siap dimuat
    renderCaseStudyUI();
});
</script>

@include('partials.footer')