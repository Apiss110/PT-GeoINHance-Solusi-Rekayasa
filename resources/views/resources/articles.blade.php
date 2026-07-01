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
        <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">
            {{ __('blog.hero_badge') }}
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none">
            {{ __('blog.hero_title') }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('blog.hero_desc') }}
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">

    @if($blogs->isEmpty())
        <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            <p class="text-slate-500 font-medium">{{ __('blog.empty_state') }}</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
                @php
                    $dbCategory = strtoupper(trim($blog->category));
                @endphp

                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[480px]">
                    
                    <div>
                        <div class="relative overflow-hidden h-56 bg-slate-100">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs font-medium">
                                    {{ __('blog.no_image') }}
                                </div>
                            @endif

                            <div class="absolute top-4 left-4">
                                <span class="{{ $dbCategory === 'GEOTECHNIK' || $dbCategory === 'GEOTEKNIK' ? 'bg-[#002d62]' : 'bg-red-800' }} text-white text-[10px] font-bold px-3 py-1 uppercase tracking-widest rounded-full">
                                    {{ $blog->category }}
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
                            {{ __('blog.read_more') }} 
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
        <h3 class="text-3xl font-black uppercase mb-6 tracking-tight">
            {{ __('blog.cta_title') }}
        </h3>
        <p class="text-slate-300 text-sm md:text-base mb-10 leading-relaxed font-medium">
            {{ __('blog.cta_desc') }}
        </p>
        <div class="flex justify-center gap-4">
            <a href="#" class="inline-flex items-center bg-white hover:bg-slate-200 text-[#002d62] font-black text-xs uppercase tracking-widest px-8 py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1">
                {{ __('blog.cta_btn') }}
            </a>
        </div>
    </div>
</section>
@include('partials.footer')