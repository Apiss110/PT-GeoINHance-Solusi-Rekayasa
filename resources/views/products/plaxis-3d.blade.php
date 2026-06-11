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

    <!-- CONTENT WRAPPER -->
<section class="relative bg-gradient-to-br from-slate-900 via-slate-950 to-blue-950 text-white py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">{{ __('p3d.hero_badge') }}</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none uppercase">
                    PLAXIS <span class="text-blue-400">3D</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-300 max-w-2xl font-light leading-relaxed">
                    {{ __('p3d.hero_description') }}
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#pricing" class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-400 transition shadow-lg shadow-blue-500/20">{{ __('p3d.btn_see_editions') }}</a>
                    <a href="#" class="btn-product-action bg-transparent border border-slate-500 text-slate-300 px-6 py-3 rounded-md font-semibold hover:bg-slate-800 hover:text-white transition" data-variant="{{ __('p3d.btn_request_quote_variant') }}">{{ __('p3d.btn_request_quote') }}</a>
                </div>
            </div>
            <div class="lg:col-span-5 relative" data-aos="zoom-in">
                <div class="bg-slate-800/60 backdrop-blur-md p-6 rounded-xl border border-slate-700 shadow-2xl relative aspect-[4/3] flex flex-col justify-between">
                    <div class="flex items-center justify-between border-b border-slate-700 pb-3">
                        <div class="flex space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <span class="text-xs text-slate-400 font-mono">{{ __('p3d.solver_status') }}</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center text-center p-4">
                        <i class="fa-solid fa-cubes text-6xl text-blue-400/40 mb-3 animate-pulse"></i>
                        <p class="text-xs font-mono text-slate-400">{{ __('p3d.mesh_framework_status') }}</p>
                    </div>
                    <div class="bg-slate-900/80 p-3 rounded-lg border border-slate-700 text-xs font-mono text-slate-300 space-y-1">
                        <p><span class="text-blue-400">></span> {{ __('p3d.staged_construction_ready') }}</p>
                        <p><span class="text-blue-400">></span> {{ __('p3d.ses_connected') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="benefits" class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 items-center mb-16">
            <div class="lg:col-span-7 space-y-4" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl uppercase">{{ __('p3d.about_title') }}</h2>
                <div class="w-12 h-1 bg-blue-600 rounded-full"></div>
                <p class="text-gray-600 leading-relaxed text-justify">{{ __('p3d.about_p1') }}</p>
                <p class="text-gray-600 leading-relaxed text-justify">{{ __('p3d.about_p2') }}</p>
                <div class="bg-slate-50 p-5 rounded-xl border-l-4 border-blue-600 italic text-sm text-slate-500 leading-relaxed">
                    {{ __('p3d.about_partner_note') }}
                </div>
            </div>
            <div class="lg:col-span-5 relative" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative border border-gray-200 bg-slate-900 group">
                    <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=800" alt="Plaxis 3D Modeling Work" class="w-full h-[380px] object-cover group-hover:scale-105 transition duration-700 opacity-90 group-hover:opacity-75">
                    <div class="absolute inset-0 flex flex-col justify-end p-6 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent text-left">
                        <span class="text-blue-400 font-bold uppercase text-[10px] tracking-widest mb-1">{{ __('p3d.card_mesh_tag') }}</span>
                        <h4 class="text-white font-extrabold text-lg uppercase tracking-wide">{{ __('p3d.card_mesh_title') }}</h4>
                        <p class="text-slate-300 text-xs mt-1 leading-relaxed">{{ __('p3d.card_mesh_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 border-t border-gray-100 pt-12" data-aos="fade-up">
            <div class="flex gap-4 p-4 rounded-xl hover:bg-slate-50 transition">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-cubes text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900">{{ __('p3d.feature_1_title') }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mt-1">{{ __('p3d.feature_1_desc') }}</p>
                </div>
            </div>
            <div class="flex gap-4 p-4 rounded-xl hover:bg-slate-50 transition">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-timeline text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-900">{{ __('p3d.feature_2_title') }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mt-1">{{ __('p3d.feature_2_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="pricing" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4" data-aos="fade-up">
            <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">{{ __('p3d.pricing_tag') }}</span>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">{{ __('p3d.pricing_title') }}</h2>
            <p class="text-gray-600">{{ __('p3d.pricing_desc') }}</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex flex-col justify-between hover:border-blue-300 transition" data-aos="fade-up" data-aos-delay="100">
                <div class="space-y-4">
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">{{ __('p3d.edition_1_title') }}</h3>
                        <span class="text-[10px] text-blue-600 font-semibold uppercase tracking-wider">{{ __('p3d.edition_1_tag') }}</span>
                    </div>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ __('p3d.edition_1_desc') }}</p>
                </div>
                <div class="pt-6">
                    <a href="#" class="btn-product-action block text-center py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition" data-variant="{{ __('p3d.edition_1_variant') }}">
                        {{ __('p3d.btn_request_quote_short') }}
                    </a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex flex-col justify-between hover:border-blue-300 transition" data-aos="fade-up" data-aos-delay="200">
                <div class="space-y-4">
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">{{ __('p3d.edition_2_title') }}</h3>
                        <span class="text-[10px] text-blue-600 font-semibold uppercase tracking-wider">{{ __('p3d.edition_2_tag') }}</span>
                    </div>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ __('p3d.edition_2_desc') }}</p>
                    <hr class="border-gray-100">
                    <ul class="text-[11px] text-gray-500 space-y-1.5 font-medium">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500 text-[9px]"></i> {{ __('p3d.feature_creep') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500 text-[9px]"></i> {{ __('p3d.feature_coupled_flow') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500 text-[9px]"></i> {{ __('p3d.feature_steady_groundwater') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500 text-[9px]"></i> {{ __('p3d.feature_thermal_flow') }}</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="#" class="btn-product-action block text-center py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition" data-variant="{{ __('p3d.edition_2_variant') }}">
                        {{ __('p3d.btn_request_quote_short') }}
                    </a>
                </div>
            </div>

            <div class="bg-slate-900 p-6 rounded-2xl border-2 border-blue-500 text-white flex flex-col justify-between relative shadow-xl shadow-blue-950/10" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-0 right-4 transform -translate-y-1/2 bg-blue-500 text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full">
                    {{ __('p3d.badge_popular') }}
                </div>
                <div class="space-y-4">
                    <div>
                        <h3 class="font-bold text-lg text-white">{{ __('p3d.edition_3_title') }}</h3>
                        <span class="text-[10px] text-blue-400 font-semibold uppercase tracking-wider">{{ __('p3d.edition_3_tag') }}</span>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">{{ __('p3d.edition_3_desc') }}</p>
                    <hr class="border-slate-800">
                    <ul class="text-[11px] text-slate-400 space-y-1.5 font-medium">
                        <li class="flex items-center gap-2 text-slate-300"><i class="fa-solid fa-circle-check text-blue-400 text-[9px]"></i> {{ __('p3d.feature_all_advanced') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400 text-[9px]"></i> {{ __('p3d.feature_dynamic_earthquake') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400 text-[9px]"></i> {{ __('p3d.feature_transient_groundwater') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400 text-[9px]"></i> {{ __('p3d.feature_transient_thermal') }}</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="#" class="btn-product-action block text-center py-2.5 bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition" data-variant="{{ __('p3d.edition_3_variant') }}">
                        {{ __('p3d.btn_request_quote_short') }}
                    </a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm flex flex-col justify-between hover:border-blue-300 transition" data-aos="fade-up" data-aos-delay="400">
                <div class="space-y-4">
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">{{ __('p3d.edition_4_title') }}</h3>
                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">{{ __('p3d.edition_4_tag') }}</span>
                    </div>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ __('p3d.edition_4_desc') }}</p>
                </div>
                <div class="pt-6">
                    <a href="#" class="btn-product-action block text-center py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition" data-variant="{{ __('p3d.edition_4_variant') }}">
                        {{ __('p3d.btn_request_quote_short') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="max-w-5xl mx-auto py-20 px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
    <div class="max-w-3xl mx-auto mb-12 space-y-3">
        <span class="text-blue-600 font-bold uppercase text-xs tracking-wider">{{ __('p3d.video_tag') }}</span>
        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">{{ __('p3d.video_title') }}</h2>
        <p class="text-gray-500 text-sm leading-relaxed max-w-2xl mx-auto">{{ __('p3d.video_desc') }}</p>
    </div>
    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-200 bg-slate-900 aspect-video w-full transition duration-500">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
    </div>
</section>

<section class="py-20 bg-white border-t border-gray-100 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    <div class="mb-12 text-center space-y-2" data-aos="fade-up">
        <span class="text-blue-600 font-bold uppercase text-xs tracking-wider">{{ __('p3d.faq_tag') }}</span>
        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">{{ __('p3d.faq_title') }}</h2>
        <p class="text-gray-500 text-sm">{{ __('p3d.faq_desc') }}</p>
    </div>

    <div class="divide-y divide-gray-200 border-t border-b border-gray-200" data-aos="fade-up">
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                <span>{{ __('p3d.faq_1_q') }}</span>
                <span class="transition group-open:rotate-180 text-gray-400"><svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg></span>
            </summary>
            <p class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed text-justify bg-slate-50 p-4 rounded-xl border border-slate-100">{{ __('p3d.faq_1_a') }}</p>
        </details>
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                <span>{{ __('p3d.faq_2_q') }}</span>
                <span class="transition group-open:rotate-180 text-gray-400"><svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg></span>
            </summary>
            <p class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed text-justify bg-slate-50 p-4 rounded-xl border border-slate-100">{{ __('p3d.faq_2_a') }}</p>
        </details>
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                <span>{{ __('p3d.faq_3_intro') }}</span>
                <span class="transition group-open:rotate-180 text-gray-400"><svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg></span>
            </summary>
            <div class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed text-left space-y-3 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <ul class="list-disc pl-5 space-y-2">
                    <li>{{ __('p3d.faq_3_li1') }}</li>
                    <li>{{ __('p3d.faq_3_li2') }}</li>
                    <li>{{ __('p3d.faq_3_li3') }}</li>
                    <li>{{ __('p3d.faq_3_li4') }}</li>
                </ul>
            </div>
        </details>
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                <span>{{ __('p3d.faq_4_q') }}</span>
                <span class="transition group-open:rotate-180 text-gray-400"><svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg></span>
            </summary>
            <div class="text-gray-600 mt-4 text-sm leading-relaxed text-left space-y-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <p>{{ __('p3d.faq_4_intro') }}</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                        <strong class="text-gray-900 block mb-2 text-xs uppercase tracking-wide">{{ __('p3d.faq_4_min_title') }}</strong>
                        <ul class="list-disc pl-4 space-y-1 text-gray-500 text-xs">
                            <li>{{ __('p3d.faq_4_min_cpu') }}</li>
                            <li>{{ __('p3d.faq_4_min_os') }}</li>
                            <li>{{ __('p3d.faq_4_min_ram') }}</li>
                            <li>{{ __('p3d.faq_4_min_storage') }}</li>
                            <li>{{ __('p3d.faq_4_min_gpu') }}</li>
                            <li>{{ __('p3d.faq_4_min_display') }}</li>
                        </ul>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                        <strong class="text-blue-600 block mb-2 text-xs uppercase tracking-wide">{{ __('p3d.faq_4_rec_title') }}</strong>
                        <ul class="list-disc pl-4 space-y-1 text-gray-500 text-xs">
                            <li>{{ __('p3d.faq_4_rec_cpu') }}</li>
                            <li>{{ __('p3d.faq_4_rec_ram') }}</li>
                            <li>{{ __('p3d.faq_4_rec_gpu') }}</li>
                            <li>{{ __('p3d.faq_4_rec_display') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </details>
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                <span>{{ __('p3d.faq_5_q') }}</span>
                <span class="transition group-open:rotate-180 text-gray-400"><svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg></span>
            </summary>
            <p class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed text-justify bg-slate-50 p-4 rounded-xl border border-slate-100">{{ __('p3d.faq_5_a') }}</p>
        </details>
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                <span>{{ __('p3d.faq_6_q') }}</span>
                <span class="transition group-open:rotate-180 text-gray-400"><svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg></span>
            </summary>
            <p class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed text-justify bg-slate-50 p-4 rounded-xl border border-slate-100">{{ __('p3d.faq_6_a') }}</p>
        </details>
        <details class="group py-5 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex justify-between items-center font-bold text-gray-900 cursor-pointer list-none text-base md:text-lg hover:text-blue-600 transition">
                <span>{{ __('p3d.faq_7_q') }}</span>
                <span class="transition group-open:rotate-180 text-gray-400"><svg fill="none" height="22" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22"><path d="M6 9l6 6 6-6"></path></svg></span>
            </summary>
            <p class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed text-justify bg-slate-50 p-4 rounded-xl border border-slate-100">{{ __('p3d.faq_7_a') }}</p>
        </details>
    </div>
</section>

<section class="py-16 bg-slate-900 text-white px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:24px_24px]"></div>
    <div class="relative z-10 max-w-3xl mx-auto space-y-6" data-aos="fade-up">
        <h3 class="text-2xl md:text-3xl font-bold uppercase tracking-tight">{{ __('p3d.contact_title') }}</h3>
        <p class="text-slate-400 text-sm max-w-2xl mx-auto leading-relaxed">{{ __('p3d.contact_desc') }}</p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 pt-4">
            <a href="https://wa.me/6285190441744" target="_blank" 
               class="btn-product-action w-full sm:w-auto inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-md transition shadow-lg shadow-blue-600/20 group"
               data-variant="{{ __('p3d.btn_whatsapp_variant') }}">
                <i class="fab fa-whatsapp mr-2 text-base text-white"></i> 
                {{ __('p3d.btn_whatsapp') }}
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Check status login via session Laravel Auth directive
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    
    // Ambil semua elemen dengan class pengaman aksi penawaran/beli
    const actionButtons = document.querySelectorAll('.btn-product-action');

    actionButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            
            // Jika status user adalah Visitor (Belum Login)
            if (!isUserLoggedIn) {
                // Intersept trigger navigasi bawaan elemen HTML atau link external
                event.preventDefault();
                event.stopPropagation();
                
                // Track data internal untuk debugging orientasi variant produk
                const chosenVariant = this.getAttribute('data-variant');
                console.log(`[Intercept Mode] Visitor ditahan mendownload/mengakses variant: ${chosenVariant}`);
                
                // Alihkan visitor langsung ke halaman login aplikasi
                window.location.href = "{{ route('login') }}";
            }
        });
    });
});
</script>

    <!-- FOOTER -->
@include('partials.footer')

    <!-- SCRIPT AKTIVASI -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
    @livewireScripts
</body>
</html>