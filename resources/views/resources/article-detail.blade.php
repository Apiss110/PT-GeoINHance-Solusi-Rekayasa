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

    <a href="https://wa.me/6285720062009" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        window.onscroll = function() {
            const nav = document.querySelector('nav');
            if (window.pageYOffset > 50) {
                nav.classList.add('shadow-md');
            } else {
                nav.classList.remove('shadow-md');
            }
        };
    </script>
    @livewireScripts
</body>
</html>