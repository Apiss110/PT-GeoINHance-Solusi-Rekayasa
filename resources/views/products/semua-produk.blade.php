<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk & Solusi - PT GeoINHance</title>
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
        
        <section class="relative bg-geo-dark text-white py-16 overflow-hidden border-b-4 border-red-700">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>
            
            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="text-red-500 font-bold tracking-widest text-sm uppercase mb-3 block">Instrumen & Teknologi</span>
                <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                    Katalog Produk Solusi Geoteknik
                </h1>
                <p class="text-gray-300 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                    Kami menyediakan berbagai instrumen pemantauan, perangkat keras rekayasa, dan perangkat lunak analisis mutakhir untuk menjamin keberhasilan dan keamanan proyek infrastruktur Anda.
                </p>
            </div>
        </section>

        <section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-10 bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <div class="text-sm font-semibold text-gray-600 mb-3 md:mb-0">
                    Menampilkan seluruh produk tersedia
                </div>
                <div class="flex space-x-2">
                    <input type="text" placeholder="Cari instrumen..." class="text-sm border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <button class="bg-geo-dark text-white px-4 py-2 rounded-md text-sm font-bold hover:bg-blue-900 transition">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($allProductsNavbar as $product)
                @php
                    // Decode JSON description
                    $details = json_decode($product->description, true);
                    
                    // Ambil isi 'hero_description' jika berformat JSON objek. 
                    // Jika gagal decode / teks biasa (data lama), pakai isi description aslinya langsung.
                    $rawDesc = isset($details['hero_description']) ? $details['hero_description'] : $product->description;
                    
                    // Bersihkan dari tag HTML/Spasi berlebih
                    $cleanedDesc = strip_tags($rawDesc);
                @endphp
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden flex flex-col group hover:shadow-xl transition-shadow duration-300">
                    
                    <div class="relative h-56 overflow-hidden bg-gray-100 flex items-center justify-center">
                        <img src="{{ isset($product->image_path) && $product->image_path ? asset('storage/' . $product->image_path) : asset('images/default-product.jpg') }}" 
                             alt="{{ $product->title ?? $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        
                        <div class="absolute top-3 left-3 bg-red-700 text-white text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded shadow-md">
                            {{ is_object($product->category) ? $product->category->name : ($product->category['name'] ?? 'Peralatan') }}
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-geo-dark mb-2 leading-tight">
                            {{ $product->title ?? $product->name }}
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-6 flex-grow line-clamp-3">
                            {{ Str::limit($cleanedDesc, 110, '...') }}
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <a href="{{ route('produk.detail', $product->id) }}" class="flex items-center justify-between w-full bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white text-sm font-bold py-2.5 px-4 rounded transition-colors duration-300">
                                <span>Lihat Spesifikasi</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20 bg-white rounded-xl border border-dashed border-gray-300">
                    <i class="fa-solid fa-box-open text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-500">Belum Ada Produk</h3>
                    <p class="text-gray-400 text-sm mt-2">Data produk akan muncul di sini setelah ditambahkan melalui panel admin.</p>
                </div>
                @endforelse
                
            </div>
            
            @if(isset($products) && method_exists($products, 'links'))
            <div class="mt-12 flex justify-center">
                {{ $products->links('pagination::tailwind') }}
            </div>
            @endif

        </section>
    </main>

    @include('partials.footer')

</body>
</html>