<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Pelatihan - PT GeoINHance</title>
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
                        'geo-dark': '#071c35', // Menyesuaikan warna header/footer dark blue
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
        <section class="relative bg-geo-dark text-white py-20 lg:py-24 overflow-hidden">
            <div class="absolute inset-0 z-0 opacity-10">
                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070&auto=format&fit=crop" alt="Engineering Background" class="w-full h-full object-cover grayscale">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-geo-dark via-geo-dark/90 to-transparent z-0"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <span class="text-blue-400 font-bold tracking-wider uppercase text-sm mb-3 block">Program Pelatihan Geo-Engineering</span>
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                        Fasilitas Lengkap untuk <span class="text-blue-400">Pengalaman Belajar Maksimal</span>
                    </h1>
                    <p class="text-lg text-gray-300 leading-relaxed mb-8">
                        Kami tidak hanya memberikan materi teori, tetapi juga memastikan Anda mendapatkan fasilitas pendukung terbaik agar siap mengaplikasikan ilmu geoteknik dan rekayasa struktur di dunia kerja nyata.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('training.pendaftaran') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md transition shadow-lg shadow-blue-500/30 flex items-center gap-2">
                            <i class="fa-solid fa-user-plus"></i> Daftar Sekarang
                        </a>
                        <a href="{{ route('training.silabus') }}" class="bg-transparent border border-gray-400 hover:border-white text-white font-semibold py-3 px-6 rounded-md transition flex items-center gap-2">
                            <i class="fa-solid fa-book"></i> Lihat Silabus
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Apa Saja yang Anda Dapatkan?</h2>
                    <p class="text-gray-600">Peserta pelatihan akan dibekali dengan berbagai fasilitas standar industri untuk menunjang praktik pemodelan numerik dan analisis rekayasa.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-blue-50 text-blue-700 rounded-lg flex items-center justify-center text-2xl mb-6 group-hover:bg-blue-700 group-hover:text-white transition-colors">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Lisensi Software Trial</h3>
                        <p class="text-gray-600 leading-relaxed mb-4 text-sm">
                            Tidak perlu khawatir jika Anda belum memiliki *software*. Kami menyediakan lisensi *trial* resmi dan legal selama masa pelatihan berlangsung.
                        </p>
                        <ul class="space-y-3 text-sm text-gray-700 font-medium">
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> PLAXIS 2D / 3D</li>
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> GeoStudio Suite</li>
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> STAAD.Pro (Bentley)</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-yellow-500 text-white text-[10px] font-bold px-3 py-1 rounded-bl-lg uppercase">Standard</div>

                        <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-lg flex items-center justify-center text-2xl mb-6 group-hover:bg-orange-600 group-hover:text-white transition-colors">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Modul & Studi Kasus</h3>
                        <p class="text-gray-600 leading-relaxed mb-4 text-sm">
                            Dapatkan modul eksklusif berisi materi komprehensif, mulai dari dasar teori hingga *step-by-step* penyelesaian studi kasus proyek nyata.
                        </p>
                        <ul class="space-y-3 text-sm text-gray-700 font-medium">
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> Modul Cetak (Hardcopy) *</li>
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> E-Book / Softcopy (PDF)</li>
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> Dataset Proyek untuk Praktik</li>
                        </ul>
                        <p class="text-[11px] text-gray-400 mt-5 italic">* Khusus pelatihan tatap muka (offline)</p>
                    </div>

                    <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-green-50 text-green-600 rounded-lg flex items-center justify-center text-2xl mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sertifikat Kelulusan</h3>
                        <p class="text-gray-600 leading-relaxed mb-4 text-sm">
                            Tingkatkan kredibilitas profesional Anda. Setiap peserta yang menyelesaikan pelatihan dan tugas akhir akan mendapatkan sertifikat resmi.
                        </p>
                        <ul class="space-y-3 text-sm text-gray-700 font-medium">
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> Sertifikat Fisik Berhologram *</li>
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> E-Certificate (High-Res PDF)</li>
                            <li class="flex items-center gap-3"><i class="fa-solid fa-check text-green-500"></i> Transkrip Jam Pembelajaran (JP)</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-16 bg-white border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-blue-900 rounded-2xl p-8 md:p-12 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
                    
                    <div class="z-10 text-center md:text-left">
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-2">Siap Untuk Meningkatkan Skill Anda?</h3>
                        <p class="text-blue-200 text-sm md:text-base">Bergabunglah dengan ratusan *engineer* lainnya yang telah mengikuti pelatihan kami.</p>
                    </div>
                    <div class="z-10 shrink-0">
                        <a href="{{ route('training.pendaftaran') }}" class="inline-block bg-white text-blue-900 hover:bg-gray-100 font-bold py-3 px-8 rounded-md transition-transform hover:scale-105 shadow-lg">
                            Isi Formulir Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

@include('partials.footer')

</body>
</html>