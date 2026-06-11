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
    
<section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative z-10" data-aos="zoom-in">
            <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">
                {{ __('profile.hero_sub') }}
            </span>
            <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">
                {{ __('profile.hero_title') }}
            </h1>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
        </div>
    </section>

    <section class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.who_we_are_sub') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                    {!! __('profile.who_we_are_title') !!}
                </h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    {{ __('profile.who_we_are_p1') }}
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    {{ __('profile.who_we_are_p2') }}
                </p>

                <div class="grid grid-cols-3 gap-4 border-t border-slate-200 pt-6">
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">12+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                            {{ __('profile.stat_exp') }}
                        </span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">250+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                            {{ __('profile.stat_projects') }}
                        </span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 group-hover:scale-110 transition duration-300 transform origin-left">40+</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">
                            {{ __('profile.stat_engineers') }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="relative group" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-slate-200 bg-slate-900">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800" alt="Bangunan Kantor PT GeoINHance" class="w-full h-[480px] object-cover group-hover:scale-110 group-hover:opacity-40 transition duration-700">
                    
                    <div class="absolute inset-0 flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                        <span class="text-red-500 font-bold uppercase text-[10px] tracking-widest mb-1">
                            {{ __('profile.office_badge') }}
                        </span>
                        <h4 class="text-white font-black text-xl uppercase tracking-wide">
                            {{ __('profile.office_title') }}
                        </h4>
                        <p class="text-slate-300 text-xs mt-2 leading-relaxed">
                            {{ __('profile.office_desc') }}
                        </p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-red-800/10 rounded-full blur-2xl -z-10"></div>
            </div>
        </div>
    </section>

<section id="visi-misi" class="bg-slate-50 py-24 px-6 border-t border-b border-slate-100 relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none select-none">
        <div class="absolute top-12 left-12 w-32 h-32 border border-slate-900 grid grid-cols-3 grid-rows-3">
            <div class="border-r border-b border-slate-900"></div>
            <div class="border-r border-b border-slate-900"></div>
            <div class="border-b border-slate-900"></div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">
        
        <div class="mb-16 text-center" data-aos="fade-up">
            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                {{ __('profile.principles_sub') }}
            </span>
            <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tight">
                {{ __('profile.principles_title') }}
            </h2>
            <div class="w-12 h-0.5 bg-red-800 mx-auto mt-3"></div>
        </div>

        <div class="mb-16 text-center mx-auto max-w-3xl" data-aos="fade-up">
            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400 mb-4">
                {{ __('profile.vision_title') }}
            </h3>
            <p class="text-slate-600 leading-relaxed">
                {{ __('profile.vision_desc') }}
            </p>
        </div>

        <div class="space-y-8" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center mb-4">
            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400 mb-4">
                {{ __('profile.mission_title') }}
            </h3>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#002d62]">
                    {{ __('profile.mission_desc') }}
                </span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-red-800/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-red-800 group-hover:text-white group-hover:border-red-800 transition-all duration-300 shrink-0 shadow-sm">
                        01
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_1') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-[#002d62]/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-[#002d62] group-hover:text-white group-hover:border-[#002d62] transition-all duration-300 shrink-0 shadow-sm">
                        02
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_2') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-red-800/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-red-800 group-hover:text-white group-hover:border-red-800 transition-all duration-300 shrink-0 shadow-sm">
                        03
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_3') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-[#002d62]/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-[#002d62] group-hover:text-white group-hover:border-[#002d62] transition-all duration-300 shrink-0 shadow-sm">
                        04
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_4') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-red-800/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-red-800 group-hover:text-white group-hover:border-red-800 transition-all duration-300 shrink-0 shadow-sm">
                        05
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_5') }}
                    </p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200/60 p-5 flex gap-4 items-start shadow-sm hover:shadow-md hover:border-[#002d62]/30 hover:-translate-y-0.5 transition-all duration-300 group">
                    <div class="w-9 h-9 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center font-mono font-bold text-xs text-slate-400 group-hover:bg-[#002d62] group-hover:text-white group-hover:border-[#002d62] transition-all duration-300 shrink-0 shadow-sm">
                        06
                    </div>
                    <p class="text-slate-600 leading-relaxed text-[14px] pt-1.5 group-hover:text-slate-900 transition-colors duration-200">
                        {{ __('profile.mission_6') }}
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>

    <section id="legalitas" class="bg-white py-24 px-6 border-b border-slate-200">
        <div class="max-w-7xl mx-auto">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.legality_sub') ?? 'Kepatuhan & Transparansi' }}
                </span>
                <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">
                    {{ __('profile.legality_title') ?? 'Company Legality' }}
                </h2>
                <div class="w-12 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-500 text-sm mt-4 max-w-2xl mx-auto leading-relaxed">
                    {{ __('profile.legality_desc') ?? 'PT GeoINHance Solusi Rekayasa is officially established and legally registered under the laws of the Republic of Indonesia.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-file-signature text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_akta_title') ?? 'Articles of Incorporation' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            No: 01 (December 1, 2025)
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_akta_desc') ?? 'Officially established before Notary Listiani Nurhasanah, S.H., M.Kn. as a verified Limited Liability Company.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[11px] font-semibold text-slate-500 bg-slate-100/80 p-2 rounded text-center">
                        Notary: Listiani Nurhasanah, S.H., M.Kn.
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-scale-balanced text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_sk_title') ?? 'Ministry Decree' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            Kemenkumham RI
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_sk_desc') ?? 'Approved by the Ministry of Law and Human Rights of the Republic of Indonesia with official legalization code.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[10px] font-mono text-slate-700 bg-slate-100/80 p-2 rounded text-center font-bold">
                        AHU-0273665.AH.01.11.2025
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="300">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-id-card text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_nib_title') ?? 'Business ID Number (NIB)' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            OSS System Registration
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_nib_desc') ?? 'Official business identification registry ensuring legal clearance for operational and engineering infrastructure projects.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[11px] font-mono text-slate-700 bg-slate-100/80 p-2 rounded text-center font-bold tracking-wider">
                        1712250060091
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/60 card-shadow hover:border-red-800/30 transition-all duration-300 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="400">
                    <div>
                        <div class="w-12 h-12 bg-red-50 text-red-800 rounded-xl flex items-center justify-center shrink-0 mb-6 transition-colors duration-300 group-hover:bg-red-800 group-hover:text-white">
                            <i class="fa-solid fa-coins text-xl"></i>
                        </div>
                        <h3 class="font-black text-slate-950 uppercase text-xs tracking-wider mb-2">
                            {{ __('profile.legal_tax_title') ?? 'Company Tax ID (NPWP)' }}
                        </h3>
                        <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase mb-4">
                            Directorate General of Taxes
                        </p>
                        <p class="text-slate-600 text-xs leading-relaxed">
                            {{ __('profile.legal_tax_desc') ?? 'Registered corporate tax account ensuring transparent fiscal accountability and government regulatory obedience.' }}
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-200/60 text-[11px] font-mono text-slate-700 bg-slate-100/80 p-2 rounded text-center font-bold">
                        1000000007227494
                    </div>
                </div>

            </div>
        </div>
    </section>

<section class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto space-y-24">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">
                <div class="w-full h-[320px] md:h-[400px] rounded-2xl overflow-hidden shadow-sm border border-slate-200/60" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=800" alt="Analisis Geoteknik GeoINHance" class="w-full h-full object-cover">
                </div>
                
                <div data-aos="fade-left">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                        {{ __('profile.expertise_sub') }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                        {!! __('profile.expertise_title') !!}
                    </h2>
                    <p class="text-slate-600 mb-4 leading-relaxed font-normal">
                        {{ __('profile.expertise_p1') }}
                    </p>
                    <p class="text-slate-600 leading-relaxed font-normal">
                        {{ __('profile.expertise_p2') }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center pt-4">
                <div class="order-2 md:order-1" data-aos="fade-right">
                    <span class="text-[#002d62] font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                        {{ __('profile.approach_sub') }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                        {!! __('profile.approach_title') !!}
                    </h2>
                    <p class="text-slate-600 mb-4 leading-relaxed font-normal">
                        {{ __('profile.approach_p1') }}
                    </p>
                    <p class="text-slate-600 leading-relaxed font-normal">
                        {{ __('profile.approach_p2') }}
                    </p>
                </div>
                
                <div class="w-full h-[320px] md:h-[400px] rounded-2xl overflow-hidden shadow-sm border border-slate-200/60 order-1 md:order-2" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1590069261209-f8e9b8642343?w=800" alt="Manajemen Proyek GeoINHance" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50/70 py-20 px-6 border-t border-b border-slate-100">
        <div class="max-w-6xl mx-auto">
            
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.commitment_sub') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 uppercase tracking-tight">
                    {{ __('profile.commitment_title') }}
                </h2>
                <div class="w-16 h-[2px] bg-red-800 mx-auto mt-4"></div>
                
                <p class="text-slate-600 mt-6 leading-relaxed font-normal text-sm md:text-base">
                    {{ __('profile.commitment_p1') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">01 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">
                        {{ __('profile.card_01_title') }}
                    </h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        {!! __('profile.card_01_desc') !!}
                    </p>
                </div>

                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">02 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">
                        {{ __('profile.card_02_title') }}
                    </h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        {{ __('profile.card_02_desc') }}
                    </p>
                </div>

                <div class="bg-white border border-slate-200/60 p-8 rounded-xl space-y-4 hover:shadow-[0_10px_30px_rgba(0,0,0,0.04)] hover:border-red-200 transition duration-300">
                    <div class="text-red-800 font-mono font-black text-lg tracking-wider">03 .</div>
                    <h3 class="text-slate-900 font-bold uppercase tracking-tight text-sm">
                        {{ __('profile.card_03_title') }}
                    </h3>
                    <p class="text-slate-600 text-xs md:text-sm leading-relaxed font-normal">
                        {{ __('profile.card_03_desc') }}
                    </p>
                </div>
            </div>

            <div class="max-w-4xl mx-auto text-center border-t border-slate-200 pt-8" data-aos="fade-up" data-aos-delay="200">
                <p class="text-slate-500 text-xs leading-relaxed font-normal">
                    {{ __('profile.commitment_footer') }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 px-6 text-center bg-white">
        <div class="max-w-md mx-auto" data-aos="fade-up">
            <a href="{{ asset('documents/COMPANY PROFILE GEOINHANCE.pdf') }}" class="inline-flex items-center justify-center space-x-3 bg-red-800 hover:bg-red-700 text-white font-bold uppercase text-xs tracking-widest px-8 py-4 rounded-xl shadow-md hover:shadow-red-800/30 transition-all duration-300 transform hover:-translate-y-0.5 group w-full sm:w-auto">
                <span>{{ __('profile.btn_download') }}</span>
                <svg class="w-4 h-4 transform group-hover:translate-y-0.5 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </a>
        </div>
    </section>

    <section id="alamat-kantor" class="bg-white py-24 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                    {{ __('profile.location_sub') }}
                </span>
                <h2 class="text-3xl font-black text-slate-900 uppercase mb-6 tracking-tight">
                    {{ __('profile.location_title') }}
                </h2>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 hover:shadow-md transition duration-300 cursor-pointer group">
                        <div class="text-red-800 mt-1 group-hover:scale-110 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 group-hover:text-red-800 transition">
                                {{ __('profile.addr_01_title') }}
                            </h4>
                            <p class="text-slate-600 text-sm mt-1 leading-relaxed">
                                {!! __('profile.addr_01_desc') !!}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-slate-50 hover:shadow-md transition duration-300 cursor-pointer group">
                        <div class="text-red-800 mt-1 group-hover:scale-110 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 group-hover:text-red-800 transition">
                                {{ __('profile.addr_02_title') }}
                            </h4>
                            <p class="text-slate-600 text-sm mt-1 leading-relaxed">
                                {!! __('profile.addr_02_desc') !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="h-96 rounded-3xl overflow-hidden shadow-xl border border-slate-200" data-aos="fade-left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2736184581457!2d106.80164807603417!3d-6.22761356098628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14fc2ff6113%3A0xc6c7674681643cb0!2sMenara%20Sentraya!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                        class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
</div>

@include('partials.footer')

    <a href="https://wa.me/085190441744" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi library animasi AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Handler Smooth Scroll Murni untuk navigasi hash internal (#visi-misi, #alamat-kantor)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if(targetId !== '#') {
                    e.preventDefault();
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        // Offset dikurangi 100 agar pas dengan sticky navbar tinggi
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>