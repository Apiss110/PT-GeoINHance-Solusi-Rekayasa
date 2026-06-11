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

<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">
                    {{ __('geostudio_flow.hero.badge') }}
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none">
                    GeoStudio <span class="text-blue-400">Flow</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-300 max-w-2xl font-light leading-relaxed">
                    {{ __('geostudio_flow.hero.description') }}
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#pricing" class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-400 transition shadow-lg shadow-blue-500/20">
                        {{ __('geostudio_flow.hero.btn_plans') }}
                    </a>
                    <a href="#modules" class="bg-transparent border border-slate-500 text-slate-300 px-6 py-3 rounded-md font-semibold hover:bg-slate-800 hover:text-white transition">
                        {{ __('geostudio_flow.hero.btn_modules') }}
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 relative">
                <div class="bg-slate-800/60 backdrop-blur-md p-6 rounded-xl border border-slate-700 shadow-2xl relative aspect-[4/3] flex flex-col justify-between">
                    <div class="flex items-center justify-between border-b border-slate-700 pb-3">
                        <div class="flex space-x-2">
                            <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                            <div class="w-3 h-3 rounded-full bg-cyan-500"></div>
                            <div class="w-3 h-3 rounded-full bg-indigo-500"></div>
                        </div>
                        <span class="text-xs text-slate-400 font-mono">
                            {{ __('geostudio_flow.hero.engine_status') }}
                        </span>
                    </div>
                    <div class="flex-1 flex flex-col items-center justify-center text-center p-4">
                        <i class="fa-solid fa-water text-6xl text-blue-400/40 mb-3 animate-pulse"></i>
                        <p class="text-xs font-mono text-slate-400">{{ __('geostudio_flow.hero.log_solver') }}</p>
                    </div>
                    <div class="bg-slate-900/80 p-3 rounded-lg border border-slate-700 text-xs font-mono text-slate-300 space-y-1">
                        <p><span class="text-blue-400">></span> {{ __('geostudio_flow.hero.log_atmospheric') }}</p>
                        <p><span class="text-blue-400">></span> {{ __('geostudio_flow.hero.log_seequent') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="benefits" class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">
                {{ __('geostudio_flow.benefits.title') }}
            </h2>
            <p class="text-gray-600">
                {{ __('geostudio_flow.benefits.subtitle') }}
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="space-y-3">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center">
                    <i class="fa-solid fa-layer-group text-xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-900">{{ __('geostudio_flow.benefits.b1_title') }}</h3>
                <p class="text-sm text-gray-600 leading-relaxed">{{ __('geostudio_flow.benefits.b1_desc') }}</p>
            </div>
            <div class="space-y-3">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center">
                    <i class="fa-solid fa-chart-nodes text-xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-900">{{ __('geostudio_flow.benefits.b2_title') }}</h3>
                <p class="text-sm text-gray-600 leading-relaxed">{{ __('geostudio_flow.benefits.b2_desc') }}</p>
            </div>
            <div class="space-y-3">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 w-12 h-12 flex items-center justify-center">
                    <i class="fa-solid fa-cloud-arrows-up-down text-xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-900">{{ __('geostudio_flow.benefits.b3_title') }}</h3>
                <p class="text-sm text-gray-600 leading-relaxed">{{ __('geostudio_flow.benefits.b3_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<section id="modules" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">{{ __('geostudio_flow.modules.badge') }}</span>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">{{ __('geostudio_flow.modules.title') }}</h2>
            <p class="text-gray-600">{{ __('geostudio_flow.modules.subtitle') }}</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                <div>
                    <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">SEEP / W</div>
                    <h4 class="font-bold text-gray-900 text-lg mt-1">{{ __('geostudio_flow.modules.m1_title') }}</h4>
                    <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ __('geostudio_flow.modules.m1_desc') }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                <div>
                    <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">TEMP / W</div>
                    <h4 class="font-bold text-gray-900 text-lg mt-1">{{ __('geostudio_flow.modules.m2_title') }}</h4>
                    <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ __('geostudio_flow.modules.m2_desc') }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                <div>
                    <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">CTRAN / W</div>
                    <h4 class="font-bold text-gray-900 text-lg mt-1">{{ __('geostudio_flow.modules.m3_title') }}</h4>
                    <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ __('geostudio_flow.modules.m3_desc') }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4 flex flex-col justify-between hover:border-blue-300 transition">
                <div>
                    <div class="text-blue-600 font-extrabold text-sm tracking-widest font-mono">AIR / W</div>
                    <h4 class="font-bold text-gray-900 text-lg mt-1">{{ __('geostudio_flow.modules.m4_title') }}</h4>
                    <p class="text-xs text-gray-600 mt-2 leading-relaxed">{{ __('geostudio_flow.modules.m4_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="pricing" class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">{{ __('geostudio_flow.pricing.badge') }}</span>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">{{ __('geostudio_flow.pricing.title') }}</h2>
            <p class="text-gray-600">{{ __('geostudio_flow.pricing.subtitle') }}</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto items-stretch">
            
            <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 flex flex-col justify-between hover:border-blue-300 transition">
                <div class="space-y-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ __('geostudio_flow.pricing.plan_2d.title') }}</h3>
                            <p class="text-xs text-blue-600 font-semibold mt-1">{{ __('geostudio_flow.pricing.plan_2d.subtitle') }}</p>
                        </div>
                        <span class="text-sm font-bold text-gray-500">USD $4,560.00 <span class="text-[10px] font-normal block text-right">{{ __('geostudio_flow.pricing.price_subtext') }}</span></span>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ __('geostudio_flow.pricing.plan_2d.desc') }}</p>
                    <hr class="border-gray-200">
                    <span class="text-xs font-bold text-gray-900 uppercase tracking-wider block">{{ __('geostudio_flow.pricing.includes_title') }}</span>
                    <div class="grid grid-cols-2 gap-2 text-xs font-semibold text-gray-700">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> SEEP/W (2D)</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> TEMP/W (2D)</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> CTRAN/W (2D)</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-500"></i> AIR/W (2D)</div>
                    </div>
                </div>
                <div class="pt-8">
                    <a href="#contact" class="btn-product-action block text-center bg-white border border-gray-300 text-gray-700 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-100 transition" data-variant="GeoStudio 2D Flow">
                        {{ __('geostudio_flow.pricing.plan_2d.btn') }}
                    </a>
                </div>
            </div>

            <div class="bg-slate-900 p-8 rounded-2xl border-2 border-blue-500 flex flex-col justify-between text-white relative shadow-xl shadow-blue-950/10">
                <div class="absolute top-0 right-6 transform -translate-y-1/2 bg-blue-500 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                    Full Architecture
                </div>
                <div class="space-y-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold">{{ __('geostudio_flow.pricing.plan_3d.title') }}</h3>
                            <p class="text-xs text-blue-400 font-semibold mt-1">{{ __('geostudio_flow.pricing.plan_3d.subtitle') }}</p>
                        </div>
                        <span class="text-sm font-bold text-blue-400">USD $11,655.00 <span class="text-[10px] font-normal block text-right text-slate-400">{{ __('geostudio_flow.pricing.price_subtext') }}</span></span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">{{ __('geostudio_flow.pricing.plan_3d.desc') }}</p>
                    <hr class="border-slate-800">
                    <span class="text-xs font-bold text-blue-400 uppercase tracking-wider block">{{ __('geostudio_flow.pricing.includes_3d_title') }}</span>
                    <div class="grid grid-cols-2 gap-2 text-xs font-semibold text-slate-300">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> SEEP3D (3D)</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> TEMP3D (3D)</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> CTRAN3D (3D)</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-blue-400"></i> AIR3D (3D)</div>
                    </div>
                </div>
                <div class="pt-8">
                    <a href="https://virtuosity.com" target="_blank" class="btn-product-action block text-center bg-blue-500 text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-600 transition shadow-md shadow-blue-500/10" data-variant="GeoStudio 3D Flow">
                        {{ __('geostudio_flow.pricing.plan_3d.btn') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="contact" class="bg-slate-900 text-white py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <h2 class="text-3xl font-bold tracking-tight">{{ __('geostudio_flow.contact.title') }}</h2>
        <p class="text-slate-400 max-w-2xl mx-auto text-sm leading-relaxed">
            {{ __('geostudio_flow.contact.desc') }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 pt-4">
            <a href="#" class="btn-product-action bg-blue-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-blue-700 transition w-full sm:w-auto" data-variant="Request Live Technical Demo">
                {{ __('geostudio_flow.contact.btn_demo') }}
            </a>
            <a href="#" class="btn-product-action bg-slate-800 text-slate-300 font-semibold px-8 py-3 rounded-md hover:bg-slate-700 transition w-full sm:w-auto border border-slate-700" data-variant="Contact Sales Specialist">
                {{ __('geostudio_flow.contact.btn_sales') }}
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Check status login via session Laravel Auth directive
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    
    // Ambil semua elemen dengan class pengaman aksi
    const actionButtons = document.querySelectorAll('.btn-product-action');

    actionButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            
            // Jika status user adalah Visitor (Belum Login)
            if (!isUserLoggedIn) {
                // Intersept trigger navigasi bawaan elemen HTML
                event.preventDefault();
                event.stopPropagation();
                
                // Track data internal jika diperlukan ke depannya
                const chosenVariant = this.getAttribute('data-variant');
                console.log(`[Intercept] Visitor mencoba mengakses: ${chosenVariant}. Redirecting...`);
                
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