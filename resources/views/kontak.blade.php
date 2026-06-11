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
                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3">{{ __('contact.hero_sub') }}</span>
                <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">{{ __('contact.hero_title') }}</h1>
                <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
            </div>
        </section>

<section class="bg-white py-20 px-4 overflow-x-auto">
    <div class="max-w-6xl mx-auto min-w-[1000px]">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-black text-[#002d62] uppercase tracking-tight mb-3">{{ __('contact.team_title') }}</h2>
            <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
                {{ __('contact.team_desc') }}
            </p>
        </div>

        <div class="flex flex-col items-center">
            
            <div class="relative pb-10">
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden w-[240px] flex flex-col hover:shadow-md transition duration-300">
                    <div class="w-full h-44 bg-slate-100 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400" alt="Dr.techn. Indra Noer Hamdhan" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="bg-slate-50 border-t border-slate-150 p-3.5 text-center">
                        <span class="text-red-800 font-black uppercase text-[9px] tracking-widest block mb-1">{{ __('contact.role_advisor') }}</span>
                        <h3 class="text-[#002d62] font-extrabold text-xs leading-snug">Dr.techn. Indra Noer Hamdhan, S.T., M.T.</h3>
                    </div>
                </div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[2px] h-10 bg-[#002d62]/30"></div>
            </div>

            <div class="relative pt-6 pb-12">
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden w-[240px] flex flex-col hover:shadow-md transition duration-300">
                    <div class="w-full h-44 bg-slate-100 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400" alt="Rinaldi Alamsyah" class="w-full h-full object-cover object-top">
                    </div>
                    <div class="bg-slate-50 border-t border-slate-150 p-3.5 text-center">
                        <span class="text-red-800 font-black uppercase text-[9px] tracking-widest block mb-1">{{ __('contact.role_director') }}</span>
                        <h3 class="text-[#002d62] font-extrabold text-xs leading-snug">Rinaldi Alamsyah, S.T.</h3>
                    </div>
                </div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[2px] h-12 bg-[#002d62]/30"></div>
            </div>

            <div class="w-full relative flex flex-col items-center">
                
                <div class="absolute top-0 left-[7.14%] right-[7.14%] h-[2px] bg-[#002d62]/30"></div>
                
                <div class="w-full flex justify-between text-center items-start pt-0">
                    
                    <div class="w-[14.28%] flex flex-col items-center">
                        <div class="w-[2px] h-6 bg-[#002d62]/30 shrink-0"></div>
                        <div class="px-2 w-full">
                            <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm min-h-[75px] flex items-center justify-center hover:border-red-800 hover:shadow-md transition duration-300">
                                <h4 class="text-slate-800 font-black text-[11px] uppercase tracking-wide leading-tight">{{ __('contact.div_engineering') }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="w-[14.28%] flex flex-col items-center">
                        <div class="w-[2px] h-24 bg-[#002d62]/30 shrink-0"></div>
                        <div class="px-2 w-full">
                            <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm min-h-[75px] flex items-center justify-center hover:border-red-800 hover:shadow-md transition duration-300">
                                <h4 class="text-slate-800 font-black text-[11px] uppercase tracking-wide leading-tight">{!! __('contact.div_survey') !!}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="w-[14.28%] flex flex-col items-center">
                        <div class="w-[2px] h-6 bg-[#002d62]/30 shrink-0"></div>
                        <div class="px-2 w-full">
                            <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm min-h-[75px] flex items-center justify-center hover:border-red-800 hover:shadow-md transition duration-300">
                                <h4 class="text-slate-800 font-black text-[11px] uppercase tracking-wide leading-tight">{!! __('contact.div_qhse') !!}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="w-[14.28%] flex flex-col items-center">
                        <div class="w-[2px] h-24 bg-[#002d62]/30 shrink-0"></div>
                        <div class="px-2 w-full">
                            <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm min-h-[75px] flex items-center justify-center hover:border-red-800 hover:shadow-md transition duration-300">
                                <h4 class="text-slate-800 font-black text-[11px] uppercase tracking-wide leading-tight">{{ __('contact.div_finance') }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="w-[14.28%] flex flex-col items-center">
                        <div class="w-[2px] h-6 bg-[#002d62]/30 shrink-0"></div>
                        <div class="px-2 w-full">
                            <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm min-h-[75px] flex items-center justify-center hover:border-red-800 hover:shadow-md transition duration-300">
                                <h4 class="text-slate-800 font-black text-[11px] uppercase tracking-wide leading-tight">{{ __('contact.div_marketing') }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="w-[14.28%] flex flex-col items-center">
                        <div class="w-[2px] h-24 bg-[#002d62]/30 shrink-0"></div>
                        <div class="px-2 w-full">
                            <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm min-h-[75px] flex items-center justify-center hover:border-red-800 hover:shadow-md transition duration-300">
                                <h4 class="text-slate-800 font-black text-[11px] uppercase tracking-wide leading-tight">{!! __('contact.div_admin') !!}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="w-[14.28%] flex flex-col items-center">
                        <div class="w-[2px] h-6 bg-[#002d62]/30 shrink-0"></div>
                        <div class="px-2 w-full">
                            <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm min-h-[75px] flex items-center justify-center hover:border-red-800 hover:shadow-md transition duration-300">
                                <h4 class="text-slate-800 font-black text-[11px] uppercase tracking-wide leading-tight">{{ __('contact.div_procurement') }}</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

        <section id="alamat-kantor" class="bg-slate-100 py-24 px-6 border-t border-b border-slate-200">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
                
                <div class="lg:col-span-5 space-y-8" data-aos="fade-right">
                    <div>
                        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">{{ __('contact.connect_us') }}</span>
                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">{{ __('contact.office_title') }}</h2>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4 p-4 rounded-xl bg-white border border-slate-200 card-shadow transition duration-300">
                            <div class="text-red-800 mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">{{ __('contact.office_main_title') }}</h4>
                                <p class="text-slate-600 text-xs mt-1 leading-relaxed">
                                    {!! __('contact.office_mail_desc') !!}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 rounded-xl bg-white border border-slate-200 card-shadow transition duration-300">
                            <div class="text-red-800 mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">{{ __('contact.office_studio_title') }}</h4>
                                <p class="text-slate-600 text-xs mt-1 leading-relaxed">
                                    {!! __('contact.office_studio_desc') !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full h-[280px] bg-slate-200 rounded-2xl overflow-hidden shadow-inner border border-slate-300">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3074543124296!2d107.6191223!3d-6.8909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTMnMjcuMiJTIDEwN8KwMzcnMDguOCJF!5e0!3m2!1sid!2sid!4v1715600000000!5m2!1sid!2sid" 
                            class="w-full h-full border-0 filter grayscale contrast-125" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>

                <div class="lg:col-span-7 bg-white p-8 md:p-10 rounded-3xl border border-slate-200 shadow-xl" data-aos="fade-left">
                    <h3 class="text-xl font-black uppercase text-slate-900 tracking-tight mb-2">{{ __('contact.form_title') }}</h3>
                    <p class="text-slate-500 text-xs mb-8">{{ __('contact.form_desc') }}</p>
                    
                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">{{ __('contact.label_name') }}</label>
                                <input type="text" required placeholder="{{ __('contact.placeholder_name') }}" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">{{ __('contact.label_email') }}</label>
                                <input type="email" required placeholder="{{ __('contact.placeholder_email') }}" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">{{ __('contact.label_phone') }}</label>
                                <input type="tel" required placeholder="{{ __('contact.placeholder_phone') }}" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">{{ __('contact.label_company') }}</label>
                                <input type="text" placeholder="{{ __('contact.placeholder_company') }}" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">{{ __('contact.label_subject') }}</label>
                            <input type="text" placeholder="{{ __('contact.placeholder_subject') }}" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition">
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-500 mb-2">{{ __('contact.label_message') }}</label>
                            <textarea required rows="4" placeholder="{{ __('contact.placeholder_message') }}" 
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-red-800 focus:bg-white transition resize-none"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" 
                                class="w-full bg-slate-900 text-white font-bold uppercase text-xs tracking-widest py-4 rounded-xl shadow-lg hover:bg-red-800 transition duration-300 transform hover:-translate-y-0.5">
                                {{ __('contact.btn_submit') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </section>

@include('partials.footer')
    </div>

    <a href="https://wa.me/085190441744" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
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