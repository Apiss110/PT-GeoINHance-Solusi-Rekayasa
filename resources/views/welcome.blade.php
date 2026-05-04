<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    <!-- Tailwind CSS sudah otomatis aktif karena kamu menjalankan npm run dev -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Hero Section -->
    <header class="bg-blue-900 text-white py-20 px-10 text-center">
        <h1 class="text-4xl md:text-6xl font-bold">PT GeoINHance Solusi Rekayasa</h1>
        <p class="mt-4 text-xl text-blue-100">Solusi Rekayasa Teknik & Geoteknik Terpercaya</p>
        <div class="mt-8">
            <a href="#services" class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold py-3 px-6 rounded-lg transition">
                Lihat Layanan Kami
            </a>
        </div>
    </header>

    <!-- Bagian Layanan (Memanggil Komponen Livewire) -->
    <main id="services" class="max-w-7xl mx-auto py-16 px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Layanan Unggulan</h2>
            <p class="text-gray-600">Kami menyediakan berbagai jasa engineering berkualitas tinggi.</p>
        </div>

        <!-- DI SINI TEMPAT MEMANGGIL KOMPONEN NO 1 TADI -->
        <livewire:service-list />
    </main>

    <footer class="bg-gray-800 text-white py-8 text-center">
        <p>&copy; 2026 PT GeoINHance Solusi Rekayasa. All rights reserved.</p>
    </footer>

</body>
</html>