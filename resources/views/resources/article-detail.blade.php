@include('partials.navbar')

<!-- 1. HERO HEADER: Background Menggunakan Foto Artikel Utama Ber-Overlay Gelap -->
    <section class="relative bg-gray-900 text-white py-24 lg:py-32 w-full text-center bg-cover bg-center bg-no-repeat" 
             style="background-image: url('{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/default-banner.jpg') }}');">
        
        <!-- Efek Gelap Transparan (Overlay) agar teks judul kontras dan mudah dibaca -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
        
        <!-- Konten Judul di Atas Overlay -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-tight drop-shadow-md">
                {{ $blog->title }}
            </h1>
        </div>
    </section>

    <!-- 2. AREA KONTEN UTAMA -->
    <main class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-6 sm:px-8">
            
            <!-- Info Tanggal -->
            <div class="text-gray-500 font-medium text-sm mb-8 flex items-center gap-2 border-b border-gray-100 pb-4">
                📅 {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('j M, Y') : $blog->created_at->format('j M, Y') }}
            </div>

            <!-- KONTEN ARTIKEL (Urut Alami Mengikuti Editor) -->
            <div class="geo-article-container">
                {!! $blog->content !!}
            </div>

            <!-- Tombol Navigasi Bawah -->
            <div class="mt-20 pt-8 border-t border-gray-100 text-center space-y-6">
                <a href="{{ route('kontak') }}" class="inline-block bg-[#0284c7] hover:bg-[#0369a1] text-white font-bold uppercase tracking-wider py-3 px-8 rounded text-sm transition shadow-sm">
                    Hubungi Kami
                </a>
                
                <div class="pt-4">
                    <a href="{{ route('resources.news-events') }}" class="inline-flex items-center text-xs font-bold text-gray-500 hover:text-[#8b1c1c] transition uppercase tracking-widest">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali ke News & Events
                    </a>
                </div>
            </div>

        </div>
    </main>

@include('partials.footer')