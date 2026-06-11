<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 25s linear infinite;
        }
        /* Pause jalan logo saat kursor user menempel di atasnya */
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900 ">

@include('partials.navbar')

<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">resources</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none">
                News & Events
            </h1>
            <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                Menampilkan rekam jejak dedikasi kami dalam menyelesaikan tantangan infrastruktur rumit secara presisi menggunakan teknologi analisis mutakhir.
            </p>
        </div>
    </section>

<section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8" x-data="{ activeCategory: 'all' }">
    
    <div class="flex justify-center flex-wrap gap-4 mb-12">
        <button @click="activeCategory = 'all'" :class="activeCategory === 'all' ? 'bg-red-800 text-white' : 'bg-white text-slate-600 border border-slate-200'" class="px-6 py-2.5 rounded-full font-bold uppercase text-xs tracking-widest transition-all duration-300 shadow-sm">Semua</button>
        <button @click="activeCategory = 'project'" :class="activeCategory === 'project' ? 'bg-red-800 text-white' : 'bg-white text-slate-600 border border-slate-200'" class="px-6 py-2.5 rounded-full font-bold uppercase text-xs tracking-widest transition-all duration-300 shadow-sm">Proyek</button>
        <button @click="activeCategory = 'event'" :class="activeCategory === 'event' ? 'bg-red-800 text-white' : 'bg-white text-slate-600 border border-slate-200'" class="px-6 py-2.5 rounded-full font-bold uppercase text-xs tracking-widest transition-all duration-300 shadow-sm">Events</button>
        <button @click="activeCategory = 'news'" :class="activeCategory === 'news' ? 'bg-red-800 text-white' : 'bg-white text-slate-600 border border-slate-200'" class="px-6 py-2.5 rounded-full font-bold uppercase text-xs tracking-widest transition-all duration-300 shadow-sm">Company News</button>
    </div>

    @if($blogs->isEmpty())
        <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            <p class="text-slate-500 font-medium">Belum ada berita atau event yang dipublikasikan.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
                @php
                    // Konversi kategori dari database agar cocok dengan tombol filter Alpine.js
                    $dbCategory = strtoupper(trim($blog->category));
                    
                    if ($dbCategory === 'PROYEK' || $dbCategory === 'PROJECT') {
                        $alpineCategory = 'project';
                    } elseif ($dbCategory === 'EVENT' || $dbCategory === 'EVENTS') {
                        $alpineCategory = 'event';
                    } else {
                        $alpineCategory = 'news'; // Default untuk BERITA atau COMPANY NEWS
                    }
                @endphp

                <article 
                    x-show="activeCategory === 'all' || activeCategory === '{{ $alpineCategory }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[480px]">
                    
                    <div>
                        <div class="relative overflow-hidden h-56 bg-slate-100">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs font-medium">
                                    No Image Available
                                </div>
                            @endif

                            <div class="absolute top-4 left-4">
                                <span class="{{ $alpineCategory === 'project' ? 'bg-red-800' : ($alpineCategory === 'event' ? 'bg-blue-900' : 'bg-slate-800') }} text-white text-[10px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">
                                    {{ $blog->category ?? 'News' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <p class="text-slate-400 text-[11px] font-bold tracking-widest mb-2 uppercase">
                                {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y') : $blog->created_at->format('d M Y') }}
                            </p>
                            
                            <h3 class="text-lg font-black text-slate-900 leading-tight mb-3 group-hover:text-red-800 transition line-clamp-2">
                                {{ $blog->title }}
                            </h3>
                            
                            <div class="text-slate-600 text-xs leading-relaxed line-clamp-3">
                                {!! strip_tags($blog->content) !!}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:translate-x-1 transition-transform uppercase tracking-wider">
                            PELAJARI SELENGKAPNYA 
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</section>

<section class="relative overflow-hidden bg-gradient-to-br from-[#002d62] via-[#001f44] to-slate-950 text-white py-20 px-6">
    <div class="absolute inset-0 opacity-[0.03] bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:24px_24px]"></div>
    <div class="relative z-10 max-w-3xl mx-auto text-center">
        <h3 class="text-3xl font-black uppercase mb-6 tracking-tight">Ingin Tahu Lebih Banyak?</h3>
        <p class="text-slate-300 text-sm md:text-base mb-10 leading-relaxed font-medium">
            Ikuti kami di media sosial untuk update harian mengenai proyek-proyek terbaru kami atau hubungi tim GeoINHance untuk konsultasi teknis.
        </p>
        <div class="flex justify-center gap-4">
            <a href="#" class="inline-flex items-center bg-white hover:bg-slate-200 text-[#002d62] font-black text-xs uppercase tracking-widest px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1">
                Ikuti Linkedin Kami
            </a>
        </div>
    </div>
</section>

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