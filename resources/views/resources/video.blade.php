<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
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

        /* Pause jalan logo saat kursor user menempel di atasnya */
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

@include('partials.navbar')

<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
            {{ __('video.hero_title') ?? 'Video Library' }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('video.hero_desc') ?? 'A collection of field project video documentation, 3D simulation animation visualizations, laboratory testing records, and tutorials on geotechnical and structural numerical analysis.' }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- NAVIGATION BAR: SEARCH FILTER --}}
        <section class="sticky top-0 z-40 bg-white border-b border-slate-200 shadow-sm py-5 transition-all duration-300 rounded-2xl mb-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end items-center">
                
                {{-- SEARCH BAR --}}
                <div class="relative w-full sm:w-80">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="{{ __('video.placeholder_search') ?? 'Search Video...' }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
                </div>

            </div>
        </section>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('video.playlist_title') }} <strong class="text-slate-900">{{ __('video.playlist_subtitle') }}</strong>
            </span>
        </div>

        {{-- CONTAINER UTAMA KARTU VIDEO --}}
        <div id="videoGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

            @foreach($videos as $video)
                @php
                    // Menerjemahkan kategori video dan melakukan slugging agar sinkron dengan JS
                    $translatedCategory = auto_translate($video->category);
                    $slugKategori = Str::slug($translatedCategory);

                    // Ambil ID Youtube jika link menggunakan format share/full URL
                    $videoId = '';
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {
                        $videoId = $match[1];
                    }
                @endphp

                <div class="video-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-200/80 hover:shadow-md transition duration-200"
                     data-nama="{{ strtolower(trim(auto_translate($video->title))) }}"
                     data-kategori="{{ $slugKategori }}"
                     data-tahun="{{ $video->production_year }}">
                    
                    <div class="relative aspect-video bg-slate-900 overflow-hidden group">
                        @if($video->thumbnail_path)
                            <img src="{{ asset('storage/' . $video->thumbnail_path) }}" alt="{{ auto_translate($video->title) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @elseif($videoId)
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" alt="{{ auto_translate($video->title) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-800 text-slate-600">
                                <i class="fa-solid fa-video text-3xl"></i>
                            </div>
                        @endif
                        
                        <a href="{{ route('resources.video.show', $video->id) }}" class="absolute inset-0 flex items-center justify-center bg-slate-950/40 opacity-100 group-hover:bg-slate-950/50 transition">
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

                    <div class="p-6 space-y-2">
                        <p class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                            {{ auto_translate($video->category) }}
                        </p>
                        
                        <h3 class="text-base font-bold text-slate-900 line-clamp-2 mb-2 hover:text-red-600 transition">
                            <a href="{{ route('resources.video.show', $video->id) }}">{{ auto_translate($video->title) }}</a>
                        </h3>
                        
                        <p class="text-xs text-slate-500 line-clamp-2 mb-4 leading-relaxed">
                            {{ $video->description ? auto_translate($video->description) : (__('video.no_description') ?? 'Tidak ada deskripsi.') }}
                        </p>

                        <div class="flex items-center justify-between border-t border-slate-100 pt-3 text-[11px] text-slate-400 font-medium">
                            <span>Year: <strong class="text-slate-600">{{ $video->production_year }}</strong></span>
                            <a href="{{ route('resources.video.show', $video->id) }}" class="text-red-500 hover:text-red-700">
                                {{ __('video.btn_view_more') ?? 'View Details' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pesan Error Jika Hasil Pencarian/Filter Kosong --}}
            <div id="noVideoMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('video.empty_message') ?? 'Tidak ada video yang cocok dengan pencarian Anda.' }}
            </div>

        </div>

        {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
        @include('partials.pagination')
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi Elemen DOM Berdasarkan ID Real di HTML
    const searchInput = document.getElementById('searchInput');
    const videoGrid = document.getElementById('videoGrid');
    const allCards = Array.from(videoGrid.querySelectorAll('.video-card'));
    const noMatchMessage = document.getElementById('noVideoMessage');
    const paginationSection = document.getElementById('paginationSection');
    
    const infoStart = document.getElementById('infoStart');
    const infoEnd = document.getElementById('infoEnd');
    const infoTotal = document.getElementById('infoTotal');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const pageNumbersContainer = document.getElementById('pageNumbers');

    // 2. Konfigurasi Kelipatan 6 Item Per Halaman
    const itemsPerPage = 6; 
    let currentPage = 1;
    let filteredCards = [...allCards];

    // 3. Fungsi Sinkronisasi Utama UI (Filter Teks + Pagination)
    function renderVideoUI() {
        const searchText = searchInput.value.toLowerCase().trim();

        // Proses Pemfilteran Berdasarkan Atribut Judul Video (data-nama)
        filteredCards = allCards.filter(card => {
            const cardNama = card.getAttribute('data-nama') || '';
            return searchText === '' || cardNama.includes(searchText);
        });

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Amankan penunjuk halaman agar tidak out-of-bounds setelah pencarian menyusut
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        // Sembunyikan semua kartu secara default terlebih dahulu
        allCards.forEach(card => card.classList.add('hidden'));

        // Hitung batasan porsi indeks data halaman aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Tampilkan kartu yang masuk irisan lembar halaman ini
        filteredCards.slice(startIndex, endIndex).forEach(card => card.classList.remove('hidden'));

        // Kendalikan info teks counter dan visibilitas alert kosong
        if (totalItems === 0) {
            infoStart.textContent = 0;
            infoEnd.textContent = 0;
            infoTotal.textContent = 0;
            noMatchMessage.classList.remove('hidden');
            if(paginationSection) paginationSection.classList.add('hidden');
        } else {
            infoStart.textContent = startIndex + 1;
            infoEnd.textContent = endIndex;
            infoTotal.textContent = totalItems;
            noMatchMessage.classList.add('hidden');
            if(paginationSection) paginationSection.classList.remove('hidden');
        }

        // Gambar ulang baris angka halaman & kelola status disabled tombol chevron
        buildPageNumbers(totalPages);
        btnPrev.disabled = currentPage === 1;
        btnNext.disabled = currentPage === totalPages;
    }

    // 4. Fungsi Pembuat Deretan Angka Halaman Dinamis
    function buildPageNumbers(totalPages) {
        pageNumbersContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = i;
            btn.className = `px-3.5 py-2 text-xs font-semibold border-r border-slate-200 transition last:border-r-0`;

            if (i === currentPage) {
                btn.className += ` bg-red-800 text-white`;
            } else {
                btn.className += ` text-slate-600 hover:bg-slate-50`;
            }

            btn.addEventListener('click', () => {
                currentPage = i;
                renderVideoUI();
                videoGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });

            pageNumbersContainer.appendChild(btn);
        }
    }

    // 5. Event Listeners Kontrol Navigasi
    btnPrev.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderVideoUI();
        }
    });

    btnNext.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderVideoUI();
        }
    });

    // Jalankan pencarian otomatis sewaktu user mengetik teks tanpa submit form
    searchInput.addEventListener('input', () => {
        currentPage = 1;
        renderVideoUI();
    });

    // Jalankan kompilasi awal saat halaman pertama kali termuat
    renderVideoUI();
});
</script>

@include('partials.footer')

</body>
</html>