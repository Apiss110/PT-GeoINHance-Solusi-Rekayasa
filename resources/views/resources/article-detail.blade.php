@include('partials.navbar')

<section class="relative bg-gray-900 text-white py-24 lg:py-32 w-full text-center bg-cover bg-center bg-no-repeat" 
             style="background-image: url('{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/default-banner.jpg') }}');">
        
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
        
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-tight drop-shadow-md">
                {{ $blog->title }}
            </h1>
        </div>
    </section>

    <main class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-6 sm:px-8">
            
            <div class="text-gray-500 font-medium text-sm mb-8 flex items-center gap-2 border-b border-gray-100 pb-4">
                📅 {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('j M, Y') : ($blog->created_at ? $blog->created_at->format('j M, Y') : '') }}
            </div>

            {{-- 🟢 PENINGKATAN: Ditambahkan class 'prose prose-slate max-w-none' agar format heading, paragraf, list, dan cetak tebal dari text editor tidak hilang akibat reset CSS Tailwind --}}
            <div class="geo-article-container prose prose-slate max-w-none text-slate-700 leading-relaxed">
                {!! $blog->content !!}
            </div>

            <div class="mt-20 pt-8 border-t border-gray-100 text-center space-y-6">
                
                {{-- 🟢 PENINGKATAN KEAMANAN: Memastikan route('kontak') ada di web.php agar tidak memicu Crash jika rute belum dibuat --}}
                @if(Route::has('kontak'))
                    <a href="{{ route('kontak') }}" class="inline-block bg-[#0284c7] hover:bg-[#0369a1] text-white font-bold uppercase tracking-wider py-3 px-8 rounded text-sm transition shadow-sm">
                        Hubungi Kami
                    </a>
                @else
                    <a href="#" class="inline-block bg-[#0284c7] hover:bg-[#0369a1] text-white font-bold uppercase tracking-wider py-3 px-8 rounded text-sm transition shadow-sm">
                        Hubungi Kami
                    </a>
                @endif
                
                <div class="pt-4">
                    {{-- 🟢 PERBAIKAN: Diubah dari 'resources.news-events' menjadi 'blog.index' agar saat membaca ARTIKEL, ketika klik kembali akan pulang ke halaman daftar ARTIKEL --}}
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center text-xs font-bold text-gray-500 hover:text-[#8b1c1c] transition uppercase tracking-widest">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali ke Kumpulan Artikel
                    </a>
                </div>
            </div>

        </div>
    </main>

@include('partials.footer')