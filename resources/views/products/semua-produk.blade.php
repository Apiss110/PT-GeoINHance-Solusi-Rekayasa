<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('product.page_title') }}</title>

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
<body class="bg-slate-50 font-sans antialiased text-slate-900 flex flex-col min-h-screen">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    <main class="flex-grow">
        {{-- HERO SECTION --}}
        <section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden pt-36">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3">
                    {{ __('product.hero_badge') }}
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
                    {{ __('product.hero_title') }}
                </h1>
                <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                    {{ __('product.hero_desc') }}
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
                        placeholder="{{ __('product.search_placeholder') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition-all duration-300">
                </div>

            </div>
        </section>

{{-- GRID PRODUK SECTION --}}
        <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            
            <div id="productGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- LOOPING DATA PRODUK DARI DATABASE --}}
                @forelse($allProductsNavbar as $product)
                @php
                    // Decode JSON description
                    $details = json_decode($product->description, true);
                    
                    // Ambil isi 'hero_description' jika berformat JSON objek. 
                    // Jika gagal decode / teks biasa (data lama), pakai isi description aslinya langsung.
                    $rawDesc = isset($details['hero_description']) ? $details['hero_description'] : $product->description;
                    
                    // Bersihkan dari tag HTML/Spasi berlebih
                    $cleanedDesc = strip_tags($rawDesc);
                    
                    // Ambil kategori produk aman
                    $categoryName = is_object($product->category) ? $product->category->name : ($product->category['name'] ?? 'Perangkat Lunak');
                    
                    // Deteksi Brand dinamis dari JSON jika ada, jika tidak set default "BENTLEY SYSTEMS"
                    $brandName = isset($details['brand']) ? $details['brand'] : 'BENTLEY SYSTEMS';
                @endphp

                <div class="product-item transition-all duration-300" 
                     data-name="{{ strtolower(auto_translate($product->title ?? $product->name)) }}">
                    
                    <article class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[480px] h-full">
                        <div>
                            {{-- Thumbnail / Banner Area Produk --}}
                            <div class="relative overflow-hidden h-56 bg-slate-900 flex items-center justify-center">
                                @if(isset($product->image_path) && $product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ auto_translate($product->title ?? $product->name) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 to-red-950 opacity-90"></div>
                                    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:10px_10px]"></div>
                                    <i class="fa-solid fa-box-open text-[60px] text-red-500/30 group-hover:scale-110 transition-transform duration-700 relative z-10"></i>
                                @endif
                            </div>

                            {{-- Content Area Produk --}}
                            <div class="p-6 space-y-2">
                                {{-- Meta Info Atas (Brand & Kategori Utama) untuk mengisi ruang yang sebelumnya kosong --}}
                                <p class="text-slate-400 text-[11px] font-bold tracking-widest uppercase">
                                    {{ strtoupper(auto_translate($brandName)) }} • {{ strtoupper(auto_translate($categoryName)) }}
                                </p>

                                {{-- Judul Produk --}}
                                <h3 class="text-lg font-black text-slate-900 leading-tight group-hover:text-red-700 transition line-clamp-2 pt-1 uppercase">
                                    <a href="{{ route('produk.detail', $product->id) }}">
                                        {{ auto_translate($product->title ?? $product->name) }}
                                    </a>
                                </h3>

                                {{-- Deskripsi Singkat (Limit karakter dinaikkan sedikit agar proporsi tinggi card seimbang) --}}
                                <div class="text-slate-600 text-xs leading-relaxed line-clamp-3 pt-1">
                                    {{ Str::limit(auto_translate($cleanedDesc), 130, '...') }}
                                </div>
                            </div>
                        </div>

                        {{-- Action Button Area --}}
                        <div class="p-6 pt-0">
                            <a href="{{ route('produk.detail', $product->id) }}" class="inline-flex items-center text-xs font-bold text-red-600 hover:translate-x-1 transition-transform uppercase tracking-wider">
                                {{ __('product.view_specs') }}
                                <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
                @empty
                {{-- DATA EMPTY STATE PRODUK --}}
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-3xl border border-slate-200 shadow-sm">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <p class="text-slate-500 font-medium">{{ __('product.empty_state') }}</p>
                </div>
                @endforelse

            </div>
        </section>

    {{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
    @include('partials.pagination')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

{{-- JAVASCRIPT LOGIC --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({ duration: 800, once: true });

        const searchInput = document.getElementById('searchInput');
        const items = Array.from(document.querySelectorAll('.product-item'));

        const itemsPerPage = 6; 
        let currentPage = 1;
        let currentSearchQuery = '';
        let filteredItems = [...items]; 

        function applySearch() {
            filteredItems = items.filter(item => {
                return item.dataset.name.includes(currentSearchQuery);
            });

            currentPage = 1;
            updatePagination();
        }

        function updatePagination() {
            const totalItems = filteredItems.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

            items.forEach(item => item.style.display = 'none');

            filteredItems.slice(startIndex, endIndex).forEach(item => {
                item.style.display = 'block';
            });

            document.getElementById('infoStart').textContent = totalItems === 0 ? 0 : startIndex + 1;
            document.getElementById('infoEnd').textContent = endIndex;
            document.getElementById('infoTotal').textContent = totalItems;

            const pageNumbersContainer = document.getElementById('pageNumbers');
            pageNumbersContainer.innerHTML = '';

            const range = 1;
            let pagesToRender = [];

            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= currentPage - range && i <= currentPage + range)) {
                    pagesToRender.push(i);
                }
            }

            let lastPageAdded = null;
            pagesToRender.forEach(page => {
                if (lastPageAdded !== null && page - lastPageAdded > 1) {
                    const dots = document.createElement('span');
                    dots.textContent = '...';
                    dots.className = 'px-3 py-2 text-xs font-medium text-slate-400 bg-white border-r border-slate-200 select-none';
                    pageNumbersContainer.appendChild(dots);
                }

                const btn = document.createElement('button');
                btn.textContent = page;
                btn.className = `px-3.5 py-2 text-xs font-bold border-r border-slate-200 transition ${
                    page === currentPage 
                    ? 'bg-red-800 text-white' 
                    : 'bg-white text-slate-700 hover:bg-slate-50'
                }`;
                btn.addEventListener('click', () => {
                    currentPage = page;
                    updatePagination();
                    document.getElementById('productGrid').scrollIntoView({ behavior: 'smooth', block: 'center' });
                });
                pageNumbersContainer.appendChild(btn);
                
                lastPageAdded = page;
            });

            document.getElementById('btnPrev').disabled = (currentPage === 1);
            document.getElementById('btnNext').disabled = (currentPage === totalPages);
        }

        document.getElementById('btnPrev').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
            }
        });

        document.getElementById('btnNext').addEventListener('click', () => {
            const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
            }
        });

        searchInput.addEventListener('input', function() {
            currentSearchQuery = this.value.toLowerCase().trim();
            applySearch();
        });

        applySearch();
    });
</script>
    @livewireStyles
</body>
</html>