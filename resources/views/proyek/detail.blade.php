<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ auto_translate($proyek->title) }} - PT GeoINHance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght=300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'geo-dark': '#071c35',
                        'geo-blue': '#1e40af',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans flex flex-col min-h-screen">

@include('partials.navbar')

    <main class="flex-grow">
        
        <section class="relative bg-geo-dark text-white py-20 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-geo-dark/50 z-10"></div>
            
            <div class="absolute inset-0 z-0">
            <img src="{{ $proyek->image_path ? asset('storage/' . $proyek->image_path) : asset('images/default-banner.jpg') }}" 
                alt="{{ auto_translate($proyek->title) }}" 
                class="w-full h-full object-cover opacity-40">
            </div>

            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <span class="bg-blue-900 text-white text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded mb-4 inline-block">
                    {{ auto_translate(is_object($proyek->category) ? $proyek->category->name : ($proyek->category['name'] ?? 'Strategic Project')) }}
                </span>
                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight tracking-tight max-w-4xl">
                    {{ auto_translate($proyek->title) }}
                </h1>
            </div>
        </section>

        <section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white p-2 rounded-xl shadow-md border border-gray-100 overflow-hidden group">
                    <img src="{{ $proyek->image_path ? asset('storage/' . $proyek->image_path) : asset('images/default-banner.jpg') }}" 
                        alt="{{ auto_translate($proyek->title) }}" 
                        class="w-full h-[300px] md:h-[450px] object-cover rounded-lg group-hover:scale-[1.01] transition-transform duration-300">
                    </div>

                    <div class="border-b border-gray-200 pb-3">
                        <h2 class="text-2xl font-bold text-geo-dark flex items-center gap-2">
                            <i class="fa-solid fa-file-lines text-blue-700"></i> Deskripsi & Lingkup Kerja
                        </h2>
                    </div>

                    <div class="prose max-w-none text-gray-700 leading-relaxed text-base space-y-4">
                        {!! auto_translate(strip_tags($proyek->description)) !!}
                    </div>
                    
                    <div class="pt-6">
                        <a href="{{ route('proyek.semua') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-red-700 transition gap-2">
                            <i class="fa-solid fa-arrow-left"></i> Kembali ke Semua Proyek
                        </a>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <h3 class="text-lg font-bold text-geo-dark border-b border-gray-100 pb-3 mb-4 uppercase tracking-wide">
                            Informasi Proyek
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="text-blue-700 mt-1"><i class="fa-solid fa-tags"></i></div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase leading-none mb-1">Kategori Rekayasa</h4>
                                    <p class="text-sm font-semibold text-gray-800">
                                        {{ auto_translate(is_object($proyek->category) ? $proyek->category->name : ($proyek->category['name'] ?? 'General Engineering')) }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="text-blue-700 mt-1"><i class="fa-solid fa-building-user"></i></div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase leading-none mb-1">Klien / Pemilik</h4>
                                    <p class="text-sm font-semibold text-gray-800">{{ auto_translate($proyek->client ?? 'Rahasia / Institusi Negara') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="text-blue-700 mt-1"><i class="fa-solid fa-map-location-dot"></i></div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase leading-none mb-1">Lokasi Kerja</h4>
                                    <p class="text-sm font-semibold text-gray-800">{{ auto_translate($proyek->location ?? 'Indonesia') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="text-blue-700 mt-1"><i class="fa-solid fa-calendar-days"></i></div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase leading-none mb-1">Tahun Selesai</h4>
                                    <p class="text-sm font-semibold text-gray-800">{{ auto_translate($proyek->year ?? '2026') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-geo-dark to-blue-950 text-white rounded-xl p-6 shadow-md text-center space-y-4">
                        <i class="fa-solid fa-headset text-4xl text-yellow-500 animate-bounce"></i>
                        <h3 class="text-lg font-bold">Butuh Solusi Rekayasa Serupa?</h3>
                        <p class="text-xs text-gray-300 leading-relaxed">
                            Diskusikan kebutuhan proyek infrastruktur, geoteknik, maupun analisis struktur Anda bersama tim ahli teruji dari PT GeoINHance.
                        </p>
                        <a href="{{ route('kontak') }}" class="block bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold uppercase py-3 px-4 rounded transition shadow-md shadow-blue-500/20">
                            Hubungi Tim Ahli Kami
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </main>

@isset($otherProjects)
<section class="py-20 bg-white" id="other-projects-section">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="mb-12">
            <span class="text-xs font-bold tracking-widest text-[#c80000] uppercase block mb-2">Our Track Record</span>
            <div class="flex flex-wrap justify-between items-end gap-4">
                <div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-[#0e1d32] tracking-tight uppercase">
                        Proyek <span class="text-slate-950">Terkait</span>
                    </h2>
                    <div class="w-12 h-1 bg-[#c80000] mt-3"></div>
                </div>
                
                <div class="flex space-x-2">
                    <button id="slide-left" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition active:scale-95 shadow-sm">
                        &#10094;
                    </button>
                    <button id="slide-right" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition active:scale-95 shadow-sm">
                        &#10095;
                    </button>
                </div>
            </div>
        </div>

        <div id="slider-container" class="flex flex-row flex-nowrap overflow-x-auto gap-6 pb-6 scroll-smooth snap-x snap-mandatory" style="scrollbar-width: none; -ms-overflow-style: none;">
            
            <style>
                #slider-container::-webkit-scrollbar { display: none; }
            </style>
            
            @foreach($otherProjects as $otherProject)
                <div class="w-full sm:w-1/2 md:w-[31.5%] flex-shrink-0 snap-start bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition duration-300">
                    
                    <div class="relative h-64 overflow-hidden bg-slate-900">
                        @if($otherProject->image_path)
                            <img src="{{ asset('storage/' . $otherProject->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90" alt="{{ auto_translate($otherProject->title) }}">
                        @else
                            <img src="{{ asset('images/default-banner.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-40" alt="{{ auto_translate($otherProject->title) }}">
                        @endif
                        
                        <span class="absolute top-4 left-4 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow-sm bg-[#c80000]">
                            {{ $otherProject->year ?? '2026' }}
                        </span>
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div class="mb-5">
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-[#c80000] transition duration-200 line-clamp-2 mb-3">
                                {{ auto_translate($otherProject->title) }}
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags(auto_translate($otherProject->description)), 120) }}
                            </p>
                        </div>
                        
                        <a href="{{ route('proyek.detail', $otherProject->id) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:text-slate-900 uppercase tracking-wider transition mt-auto">
                            Pelajari Detail Proyek
                            <svg class="w-3.5 h-3.5 ml-1.5 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById('slider-container');
        const btnLeft = document.getElementById('slide-left');
        const btnRight = document.getElementById('slide-right');

        if (container && btnLeft && btnRight) {
            const getScrollAmount = () => {
                const card = container.querySelector('.flex-shrink-0');
                return card ? card.offsetWidth + 24 : 400; 
            };

            btnLeft.addEventListener('click', () => {
                container.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
            });

            btnRight.addEventListener('click', () => {
                container.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            });
        }
    });
</script>
@endisset

@include('partials.footer')

</body>
</html>