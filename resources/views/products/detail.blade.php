<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        .nav-glass { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px); }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -4px; left: 0; background-color: #991b1b; transition: width 0.3s ease; }
        .nav-link:hover::after { width: 100%; }
        .card-shadow { box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05); }
        [x-cloak] { display: none !important; }
        @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .animate-marquee { animation: marquee 25s linear infinite; }
        .animate-marquee:hover { animation-play-state: paused; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

@include('partials.navbar')
        
<section class="relative bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">
                    {{ $hero_badge }}
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none uppercase">
                    {{ $product->name }}
                </h1>
                <p class="text-lg sm:text-xl text-slate-300 max-w-2xl font-light leading-relaxed">
                    {{ $hero_description }}
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#pricing" class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-400 transition shadow-lg shadow-blue-500/20">Lihat Edisi</a>
                    <a href="#contact" class="btn-product-action bg-transparent border border-slate-500 text-slate-300 px-6 py-3 rounded-md font-semibold hover:bg-slate-800 hover:text-white transition" data-variant="Quote - {{ $product->name }}">Minta Penawaran</a>
                </div>
            </div>
            <div class="lg:col-span-5 relative">
                <div class="bg-slate-800/60 backdrop-blur-md p-6 rounded-xl border border-slate-700 shadow-2xl relative aspect-[4/3] flex flex-col justify-between">
                    <div class="flex items-center justify-between border-b border-slate-700 pb-3">
                        <div class="flex space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <span class="text-xs text-slate-400 font-mono">Engine Solver Active</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center text-center p-4">
                        <i class="fa-solid fa-vector-square text-6xl text-blue-400/40 mb-3 animate-pulse"></i>
                        <p class="text-xs font-mono text-slate-400">Mesh Core Framework</p>
                    </div>
                    <div class="bg-slate-900/80 p-3 rounded-lg border border-slate-700 text-xs font-mono text-slate-300 space-y-1">
                        <p><span class="text-blue-400">></span> Staged Construction Ready</p>
                        <p><span class="text-blue-400">></span> License SES Connected</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="benefits" class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 items-center mb-16">
            <div class="lg:col-span-7 space-y-4">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl uppercase">{{ $about_title }}</h2>
                <div class="w-12 h-1 bg-blue-600 rounded-full"></div>
                <p class="text-gray-600 leading-relaxed text-justify">{{ $about_p1 }}</p>
                @if(!empty($about_p2))
                <p class="text-gray-600 leading-relaxed text-justify">{{ $about_p2 }}</p>
                @endif
                @if(!empty($about_partner_note))
                <div class="bg-slate-50 p-5 rounded-xl border-l-4 border-blue-600 italic text-sm text-slate-500 leading-relaxed">{{ $about_partner_note }}</div>
                @endif
            </div>
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative border border-gray-200 bg-slate-900 group">
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-[380px] object-cover group-hover:scale-105 transition duration-700 opacity-90 group-hover:opacity-75">
                    @else
                        <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=800" alt="Default Product Banner" class="w-full h-[380px] object-cover group-hover:scale-105 transition duration-700 opacity-90 group-hover:opacity-75">
                    @endif
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 border-t border-gray-100 pt-12">
            @foreach($features as $feature)
                @if(!empty($feature['title']))
                <div class="flex gap-4 p-4 rounded-xl hover:bg-slate-50 transition">
                    <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-layer-group text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mt-1">{{ $feature['desc'] ?? '' }}</p>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<section id="pricing" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">Opsi Edisi</span>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">Pilihan Lisensi Terintegrasi</h2>
        </div>

        @if(!empty($licenses) && count($licenses) > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch justify-center max-w-5xl mx-auto">
                @foreach($licenses as $license)
                    <div class="p-6 rounded-2xl border {{ isset($license['is_popular']) && $license['is_popular'] == '1' ? 'bg-slate-900 text-white ring-2 ring-blue-500' : 'bg-white border-slate-200 shadow-sm' }} flex flex-col justify-between hover:border-blue-300 transition">
                        <div class="space-y-4">
                            @if(isset($license['is_popular']) && $license['is_popular'] == '1')
                                <span class="text-[10px] font-bold uppercase bg-blue-500 px-2 py-1 rounded text-white">POPULER</span>
                            @endif
                            <h3 class="font-bold text-lg">{{ $license['name'] ?? 'Nama Paket' }}</h3>
                            <p class="text-xs {{ isset($license['is_popular']) && $license['is_popular'] == '1' ? 'opacity-80' : 'text-gray-600' }} leading-relaxed">
                                {{ $license['desc'] ?? 'Deskripsi paket belum diatur.' }}
                            </p>
                        </div>
                        <div class="pt-6">
                            <a href="https://wa.me/6285190441744" class="block text-center py-2.5 {{ isset($license['is_popular']) && $license['is_popular'] == '1' ? 'bg-blue-600 hover:bg-blue-700' : 'bg-slate-900 hover:bg-slate-800 text-white' }} text-white text-xs font-bold uppercase tracking-wider rounded-xl transition">
                                {{ isset($license['is_popular']) && $license['is_popular'] == '1' ? 'MINTA PENAWARAN' : 'HUBUNGI SALES' }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-12 bg-white rounded-2xl border-2 border-dashed border-gray-200 max-w-2xl mx-auto">
                <p class="text-gray-500 font-medium">Belum ada paket lisensi yang tersedia untuk produk ini.</p>
            </div>
        @endif
    </div>
</section>
<main class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-6 sm:px-8">
        
        <div class="mb-4">
            <span class="text-blue-600 font-bold uppercase text-xs tracking-wider block mb-1">Video Demonstration</span>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">{{ $video->title ?? $video_title }}</h1>
        </div>

        <div class="geo-article-container mt-6">
            <p class="text-gray-600 text-base leading-relaxed whitespace-pre-line">{{ $video->description ?? 'Tidak ada deskripsi tambahan untuk dokumentasi teknis ini.' }}</p>
        </div>

        <div class="text-gray-500 font-medium text-sm mb-8 flex flex-wrap items-center gap-4 border-b border-gray-100 pb-4">
            @if(isset($video->duration) && $video->duration)
                <span class="text-gray-300">|</span>
                <span class="flex items-center gap-1.5">⏱️ Durasi: <strong>{{ $video->duration }}</strong></span>
            @endif
        </div>

        

        @php
            $videoId = '';
            if (isset($video->video_url) && preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {
                $videoId = $match[1];
            } elseif (isset($youtube_id)) {
                $videoId = $youtube_id; // Fallback jika controller mengirimkan $youtube_id mentah
            }
        @endphp
        

        <div class="bg-black rounded-2xl overflow-hidden shadow-2xl aspect-video w-full mb-8 border border-gray-100">
            @if($videoId)
                <iframe class="w-full h-full" 
                        src="https://www.youtube.com/embed/{{ $videoId }}?rel=0" 
                        title="{{ $video->title ?? $video_title }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                </iframe>
            @else
                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 gap-2 p-6 text-center bg-gray-50">
                    <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-medium text-sm">Format tautan video tidak didukung pemutar internal.</span>
                    @if(isset($video->video_url))
                        <a href="{{ $video->video_url }}" target="_blank" class="text-sky-600 hover:underline text-xs mt-1 font-semibold inline-flex items-center gap-1">
                            Buka Tautan Sumber <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    @endif
                </div>
            @endif
        </div>

        @if(isset($otherVideos) && $otherVideos->count() > 0)
            <div class="mt-16 pt-10 border-t border-gray-100">
                <h3 class="text-md font-bold uppercase tracking-wider text-gray-900 mb-6 flex items-center gap-2">
                    🎥 Video Publikasi Terbaru Lainnya
                </h3>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
                    @foreach($otherVideos as $item)
                        @php
                            $itemVideoId = '';
                            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item->video_url, $itemMatch)) {
                                $itemVideoId = $itemMatch[1];
                            }
                        @endphp
                        <div class="bg-white rounded-xl overflow-hidden border border-gray-200/70 hover:shadow-md transition duration-200 flex flex-col h-full">
                            <div class="relative aspect-video bg-gray-900 overflow-hidden">
                                @if($item->thumbnail_path)
                                    <img src="{{ asset('storage/' . $item->thumbnail_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                @elseif($itemVideoId)
                                    <img src="https://img.youtube.com/vi/{{ $itemVideoId }}/mqdefault.jpg" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                @endif
                                <a href="{{ route('resources.video.show', $item->id) }}" class="absolute inset-0 flex items-center justify-center bg-black/10 hover:bg-black/30 transition">
                                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow text-gray-900 pl-0.5">
                                        <svg class="w-3 h-3 text-gray-800 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</main>

<section class="py-20 bg-white border-t border-gray-100 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    <div class="mb-12 text-center">
        <h2 class="text-3xl font-bold text-gray-900">FAQ</h2>
    </div>
    <div class="divide-y divide-gray-200 border-t border-b border-gray-200">
        @foreach($faqs as $faq)
            @if(!empty($faq['question']))
            <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                    <span>{{ $faq['question'] }}</span>
                    <span class="transition group-open:rotate-180 text-gray-400"><i class="fa fa-chevron-down"></i></span>
                </summary>
                <p class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed text-justify">{{ $faq['answer'] ?? '' }}</p>
            </details>
            @endif
        @endforeach
    </div>
</section>

@include('partials.footer')
</body>
</html>