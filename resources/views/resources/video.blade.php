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
            <span class="text-slate-500">{{ __('video.breadcrumb_resources') }}</span>
            <span class="mx-2">/</span>
            <span class="text-blue-400">{{ __('video.breadcrumb_video') }}</span>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight">
            {{ __('video.hero_title') }}
        </h1>
        <p class="mt-3 text-base text-slate-300 max-w-3xl leading-relaxed">
            {{ __('video.hero_desc') }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
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

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        {{ __('video.label_category') }}
                    </label>
                    <select id="selectKategoriVideo" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('video.option_all_categories') }}</option>
                        <option value="3d-simulation-animation">{{ __('video.option_cat_simulasi') }}</option>
                        <option value="project-documentation">{{ __('video.option_cat_dokumentasi') }}</option>
                        <option value="technical-tutorials-webinars">{{ __('video.option_cat_tutorial') }}</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        {{ __('video.label_year') }}
                    </label>
                    <select id="selectTahunVideo" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('video.option_all_years') }}</option>
                        {{-- Mengambil daftar tahun unik langsung dari database secara dinamis --}}
                        @foreach($videos->pluck('production_year')->unique()->sortDesc() as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-slate-900 hover:bg-blue-700 text-white font-bold text-xs tracking-widest py-2.5 rounded-lg transition duration-200 shadow-sm uppercase text-center flex items-center justify-center gap-2">
                        <i class="fa-solid fa-sliders text-[10px]"></i> {{ __('video.btn_filter') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('video.playlist_title') }} <strong class="text-slate-900">{{ __('video.playlist_subtitle') }}</strong>
            </span>
        </div>

        {{-- CONTAINER UTAMA KARTU VIDEO --}}
        <div id="videoGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($videos as $video)
                @php
                    // Membuat slug kategori agar sinkron dengan value pada <select> kategori di atas
                    $slugKategori = Str::slug($video->category);

                    // Ambil ID Youtube jika link menggunakan format share/full URL
                    $videoId = '';
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {
                        $videoId = $match[1];
                    }
                @endphp

                <div class="video-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-200/80 hover:shadow-md transition duration-200"
                     data-nama="{{ strtolower($video->title) }}"
                     data-kategori="{{ $slugKategori }}"
                     data-tahun="{{ $video->production_year }}">
                    
                    <div class="relative aspect-video bg-slate-900 overflow-hidden group">
                        @if($video->thumbnail_path)
                            <img src="{{ asset('storage/' . $video->thumbnail_path) }}" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @elseif($videoId)
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-800 text-slate-600">
                                <i class="fa-solid fa-video text-3xl"></i>
                            </div>
                        @endif
                        
                        <a href="{{ $video->video_url }}" target="_blank" class="absolute inset-0 flex items-center justify-center bg-slate-950/40 opacity-100 group-hover:bg-slate-950/50 transition">
                            <div class="w-12 h-12 rounded-full bg-white/90 flex items-center justify-center shadow-md group-hover:scale-110 transition text-slate-900 pl-1">
                                <i class="fa-solid fa-play text-lg"></i>
                            </div>
                        </a>

                        @if($video->duration)
                            <span class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-bold px-2 py-0.5 rounded backdrop-blur-sm">
                                {{ $video->duration }}
                            </span>
                        @endif
                    </div>

                    <div class="p-5">
                        <span class="inline-block text-[10px] font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md mb-3">
                            {{ $video->category }}
                        </span>
                        
                        <h3 class="text-base font-bold text-slate-900 line-clamp-2 mb-2 hover:text-blue-600 transition">
                            <a href="{{ $video->video_url }}" target="_blank">{{ $video->title }}</a>
                        </h3>
                        
                        <p class="text-xs text-slate-500 line-clamp-2 mb-4 leading-relaxed">
                            {{ $video->description ?? 'Tidak ada deskripsi.' }}
                        </p>

                        <div class="flex items-center justify-between border-t border-slate-100 pt-3 text-[11px] text-slate-400 font-medium">
                            <span>Year: <strong class="text-slate-600">{{ $video->production_year }}</strong></span>
                            <a href="{{ $video->video_url }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-semibold flex items-center gap-1">
                                View Details <i class="fa-solid fa-arrow-right text-[9px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pesan Error Jika Hasil Pencarian/Filter Kosong --}}
            <div id="noVideoMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('video.empty_message') }}
            </div>

        </div>

        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-gray-200 pt-6">
            <div class="text-sm text-slate-500 font-medium">
                {{ __('video.footer_showing') }} <span id="countDisplayedVideo" class="text-slate-700 font-bold">0</span> {{ __('video.footer_of') }} <span id="countTotalVideo" class="text-slate-700 font-bold">0</span> {{ __('video.footer_records') }}
            </div>
            
            <div id="paginationVideoControls" class="inline-flex rounded-lg bg-[#1E293B] p-0.5 text-white shadow-sm overflow-hidden">
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi Elemen DOM khusus Halaman Video
    const filterForm = document.getElementById('filterFormVideo');
    const inputNama = document.getElementById('inputNamaVideo');
    const selectKategori = document.getElementById('selectKategoriVideo');
    const selectTahun = document.getElementById('selectTahunVideo');
    const gridContainer = document.getElementById('videoGrid');
    const allCards = Array.from(gridContainer.querySelectorAll('.video-card'));
    const noMatchMessage = document.getElementById('noVideoMessage');
    
    const countDisplayed = document.getElementById('countDisplayedVideo');
    const countTotal = document.getElementById('countTotalVideo');
    const paginationControls = document.getElementById('paginationVideoControls');

    // 2. Konfigurasi Logika Pagination Internal
    const itemsPerPage = 3; // Jumlah kartu video per halaman yang diizinkan tampil
    let currentPage = 1;
    let filteredCards = [...allCards]; // Menyalin default penampung seluruh data kartu awal

    // 3. Fungsi Inti Sinkronisasi Tampilan UI (Filter + Pagination terintegrasi)
    function renderVideoUI() {
        // Sembunyikan semua kartu terlebih dahulu tanpa terkecuali
        allCards.forEach(card => card.classList.add('hidden'));

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Validasi pengunci halaman aktif agar tidak melompat keluar setelah filter berubah
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        // Hitung batas indeks porsi data yang valid untuk ditampilkan di halaman aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Ambil elemen kartu sesuai kalkulasi halaman lalu munculkan kembali
        const activePageCards = filteredCards.slice(startIndex, endIndex);
        activePageCards.forEach(card => card.classList.remove('hidden'));

        // Kendalikan visibilitas pesan notifikasi pencarian nihil
        if (totalItems === 0) {
            noMatchMessage.classList.remove('hidden');
        } else {
            noMatchMessage.classList.add('hidden');
        }

        // Perbarui komponen teks counter info data real-time
        countDisplayed.textContent = activePageCards.length;
        countTotal.textContent = totalItems;

        // Rakit susunan ulang blok navigasi tombol pagination dinamis
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
                renderVideoUI();
            });
        }
        paginationControls.appendChild(prevButton);

        // Deretan Nomor Indeks Halaman Urut
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.type = 'button';
            pageButton.className = `px-4 py-2 text-xs font-bold transition ${currentPage === i ? 'bg-slate-700 text-white' : 'text-slate-400 hover:bg-slate-700/50'}`;
            pageButton.textContent = i;
            
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderVideoUI();
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
                renderVideoUI();
            });
        }
        paginationControls.appendChild(nextButton);
    }

    // 5. Intersept Proses Submit Form Saringan data video
    filterForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Mengunci default submit form agar tidak memicu reload halaman

        const searchKeyword = inputNama.value.toLowerCase().trim();
        const selectedKategori = selectKategori.value;
        const selectedTahun = selectTahun.value;

        // Proses eliminasi data berbasis pencocokan kecocokan string atribut data-
        filteredCards = allCards.filter(card => {
            const cardName = card.getAttribute('data-nama');
            const cardKategori = card.getAttribute('data-kategori');
            const cardTahun = card.getAttribute('data-tahun');

            const matchSearch = !searchKeyword || cardName.includes(searchKeyword);
            const matchKategori = !selectedKategori || cardKategori === selectedKategori;
            const matchTahun = !selectedTahun || cardTahun === selectedTahun;

            return matchSearch && matchKategori && matchTahun;
        });

        // Setel penunjuk penanggalan indeks ke halaman 1 di awal setiap pemfilteran dilakukan
        currentPage = 1;
        renderVideoUI();
    });

    // 6. Eksekusi fungsi pertama kali saat file skrip siap dimuat
    renderVideoUI();
});
</script>

@include('partials.footer')