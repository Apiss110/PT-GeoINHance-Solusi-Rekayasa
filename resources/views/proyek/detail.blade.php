<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $proyek->title }} - PT GeoINHance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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
                alt="{{ $proyek->title }}" 
                class="w-full h-full object-cover opacity-40">
            </div>

            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <span class="bg-blue-900 text-white text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded mb-4 inline-block">
                    {{ is_object($proyek->category) ? $proyek->category->name : ($proyek->category['name'] ?? 'Strategic Project') }}
                </span>
                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight tracking-tight max-w-4xl">
                    {{ $proyek->title }}
                </h1>
            </div>
        </section>

        <section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white p-2 rounded-xl shadow-md border border-gray-100 overflow-hidden group">
                    <img src="{{ $proyek->image_path ? asset('storage/' . $proyek->image_path) : asset('images/default-banner.jpg') }}" 
                        alt="{{ $proyek->title }}" 
                        class="w-full h-[300px] md:h-[450px] object-cover rounded-lg group-hover:scale-[1.01] transition-transform duration-300">
                    </div>

                    <div class="border-b border-gray-200 pb-3">
                        <h2 class="text-2xl font-bold text-geo-dark flex items-center gap-2">
                            <i class="fa-solid fa-file-lines text-blue-700"></i> Deskripsi & Lingkup Kerja
                        </h2>
                    </div>

                    <div class="prose max-w-none text-gray-700 leading-relaxed text-base space-y-4">
                        {!! $proyek->description !!}
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
                                        {{ is_object($proyek->category) ? $proyek->category->name : ($proyek->category['name'] ?? 'General Engineering') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="text-blue-700 mt-1"><i class="fa-solid fa-building-user"></i></div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase leading-none mb-1">Klien / Pemilik</h4>
                                    <p class="text-sm font-semibold text-gray-800">{{ $proyek->client ?? 'Rahasia / Institusi Negara' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="text-blue-700 mt-1"><i class="fa-solid fa-map-location-dot"></i></div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase leading-none mb-1">Lokasi Kerja</h4>
                                    <p class="text-sm font-semibold text-gray-800">{{ $proyek->location ?? 'Indonesia' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="text-blue-700 mt-1"><i class="fa-solid fa-calendar-days"></i></div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-400 uppercase leading-none mb-1">Tahun Selesai</h4>
                                    <p class="text-sm font-semibold text-gray-800">{{ $proyek->year ?? '2026' }}</p>
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

@include('partials.footer')

</body>
</html>