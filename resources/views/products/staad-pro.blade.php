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
                    {{ __('staad_pro.hero.badge') }}
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none">
                    STAAD.<span class="text-blue-400">Pro</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-300 max-w-2xl font-light leading-relaxed">
                    {{ __('staad_pro.hero.description') }}
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#variants" class="bg-blue-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-400 transition shadow-lg shadow-blue-500/20">
                        {{ __('staad_pro.hero.btn_variants') }}
                    </a>
                    <a href="#features" class="bg-transparent border border-slate-500 text-slate-300 px-6 py-3 rounded-md font-semibold hover:bg-slate-800 hover:text-white transition">
                        {{ __('staad_pro.hero.btn_features') }}
                    </a>
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
                        <span class="text-xs text-slate-400 font-mono">
                            {{ __('staad_pro.hero.engine_status') }}
                        </span>
                    </div>
                    <div class="flex-1 flex items-center justify-center">
                        <i class="fa-solid fa-cubes text-7xl text-blue-400/40 animate-pulse"></i>
                    </div>
                    <div class="bg-slate-900/80 p-3 rounded-lg border border-slate-700 text-xs font-mono text-slate-300 space-y-1">
                        <p><span class="text-green-400">></span> {{ __('staad_pro.hero.log_load') }}</p>
                        <p><span class="text-green-400">></span> {{ __('staad_pro.hero.log_codes') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="flex gap-4 items-start">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 shrink-0">
                    <i class="fa-solid fa-city text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">{{ __('staad_pro.benefits.project_type_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('staad_pro.benefits.project_type_desc') }}</p>
                </div>
            </div>
            <div class="flex gap-4 items-start">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 shrink-0">
                    <i class="fa-solid fa-wand-magic-sparkles text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">{{ __('staad_pro.benefits.auto_loading_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('staad_pro.benefits.auto_loading_desc') }}</p>
                </div>
            </div>
            <div class="flex gap-4 items-start">
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600 shrink-0">
                    <i class="fa-solid fa-globe text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">{{ __('staad_pro.benefits.global_standards_title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('staad_pro.benefits.global_standards_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="features" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">{{ __('staad_pro.features.section_title') }}</h2>
            <p class="text-gray-600">{{ __('staad_pro.features.section_subtitle') }}</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-code"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ __('staad_pro.features.openstaad_title') }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ __('staad_pro.features.openstaad_desc') }}
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-file-cad"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ __('staad_pro.features.cad_title') }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ __('staad_pro.features.cad_desc') }}
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-pencil-ruler"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ __('staad_pro.features.concrete_steel_title') }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ __('staad_pro.features.concrete_steel_desc') }}
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-4 hover:shadow-md transition">
                <div class="bg-blue-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ __('staad_pro.features.nonlinear_title') }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ __('staad_pro.features.nonlinear_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>

<section id="variants" class="py-20 bg-white border-t border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">{{ __('staad_pro.variants.badge') }}</span>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">{{ __('staad_pro.variants.section_title') }}</h2>
            <p class="text-gray-600">{{ __('staad_pro.variants.section_subtitle') }}</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-stretch">
            
            <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 flex flex-col justify-between relative hover:border-blue-300 transition">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ __('staad_pro.variants.standard.title') }}</h3>
                        <p class="text-xs text-blue-600 font-semibold mt-1">{{ __('staad_pro.variants.standard.subtitle') }}</p>
                    </div>
                    <p class="text-sm text-gray-600">{{ __('staad_pro.variants.standard.desc') }}</p>
                    <hr class="border-gray-200">
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.standard.bullet_1') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.standard.bullet_2') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.standard.bullet_3') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.standard.bullet_4') }}</li>
                    </ul>
                </div>
                <div class="pt-8">
                    <a href="#contact" class="btn-product-action block text-center bg-white border border-gray-300 text-gray-700 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-100 transition" data-variant="Standard Core Edition">
                        {{ __('staad_pro.variants.standard.btn') }}
                    </a>
                </div>
            </div>

            <div class="bg-slate-900 p-8 rounded-2xl border-2 border-blue-500 flex flex-col justify-between relative text-white transform lg:-translate-y-2 shadow-xl shadow-blue-950/20">
                <div class="absolute top-0 right-6 transform -translate-y-1/2 bg-blue-500 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                    Most Popular
                </div>
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold">{{ __('staad_pro.variants.advanced.title') }}</h3>
                        <p class="text-xs text-blue-400 font-semibold mt-1">{{ __('staad_pro.variants.advanced.subtitle') }}</p>
                    </div>
                    <p class="text-sm text-slate-300">{{ __('staad_pro.variants.advanced.desc') }}</p>
                    <hr class="border-slate-800">
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> {{ __('staad_pro.variants.advanced.bullet_1') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> {{ __('staad_pro.variants.advanced.bullet_2') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> {{ __('staad_pro.variants.advanced.bullet_3') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-blue-400"></i> {{ __('staad_pro.variants.advanced.bullet_4') }}</li>
                    </ul>
                </div>
                <div class="pt-8">
                    <a href="#contact" class="btn-product-action block text-center bg-blue-500 text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-600 transition shadow-md shadow-blue-500/10" data-variant="Advanced Edition">
                        {{ __('staad_pro.variants.advanced.btn') }}
                    </a>
                </div>
            </div>

            <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 flex flex-col justify-between relative hover:border-blue-300 transition">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ __('staad_pro.variants.worksuite.title') }}</h3>
                        <p class="text-xs text-blue-600 font-semibold mt-1">{{ __('staad_pro.variants.worksuite.subtitle') }}</p>
                    </div>
                    <p class="text-sm text-gray-600">{{ __('staad_pro.variants.worksuite.desc') }}</p>
                    <hr class="border-gray-200">
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.worksuite.bullet_1') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.worksuite.bullet_2') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.worksuite.bullet_3') }}</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> {{ __('staad_pro.variants.worksuite.bullet_4') }}</li>
                    </ul>
                </div>
                <div class="pt-8">
                    <a href="#contact" class="btn-product-action block text-center bg-white border border-gray-300 text-gray-700 py-2.5 rounded-lg text-sm font-semibold hover:bg-gray-100 transition" data-variant="Structural WorkSuite">
                        {{ __('staad_pro.variants.worksuite.btn') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="contact" class="bg-slate-900 text-white py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <h2 class="text-3xl font-bold tracking-tight">{{ __('staad_pro.contact.title') }}</h2>
        <p class="text-slate-400 max-w-2xl mx-auto text-sm leading-relaxed">
            {{ __('staad_pro.contact.desc') }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 pt-4">
            <a href="https://virtuosity.com" target="_blank" class="btn-product-action bg-blue-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-blue-700 transition w-full sm:w-auto" data-variant="Virtuosity eStore External">
                {{ __('staad_pro.contact.btn_store') }}
            </a>
            <a href="#" class="btn-product-action bg-slate-800 text-slate-300 font-semibold px-8 py-3 rounded-md hover:bg-slate-700 transition w-full sm:w-auto border border-slate-700" data-variant="Specialist Direct Contact">
                {{ __('staad_pro.contact.btn_specialist') }}
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Ambil status login user secara real-time dari session Laravel Auth
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    
    // 2. Kumpulkan seluruh tombol varian penawaran / beli
    const actionButtons = document.querySelectorAll('.btn-product-action');

    // 3. Pasangkan event listener interceptor ke setiap tombol
    actionButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            
            // Jika user dideteksi belum terautentikasi (Visitor)
            if (!isUserLoggedIn) {
                // Kunci aksi link asli agar tidak berpindah ke target #contact atau url eksternal
                event.preventDefault();
                event.stopPropagation();
                
                // Ambil info nama varian untuk kebutuhan track analitik jika diperlukan kelak
                const targetVariant = this.getAttribute('data-variant');
                console.log(`Visitor mencoba mengakses varian: ${targetVariant}. Mengalihkan ke login...`);
                
                // Dialihkan secara instan langsung ke arah login (menggunakan route bawaan Laravel auth)
                window.location.href = "{{ route('login') }}";
            }
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Ambil status login user secara real-time dari session Laravel Auth
    // Jika Anda ingin melakukan testing manual saat ini, ganti sintaks blade di bawah menjadi: false
    const isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    
    // 2. Kumpulkan seluruh tombol varian penawaran / beli
    const actionButtons = document.querySelectorAll('.btn-product-action');

    // 3. Pasangkan event listener interceptor ke setiap tombol
    actionButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            
            // Jika user dideteksi belum terautentikasi (Visitor)
            if (!isUserLoggedIn) {
                // Kunci aksi link asli agar tidak berpindah ke target #contact atau url eksternal
                event.preventDefault();
                event.stopPropagation();
                
                // Ambil info nama varian untuk kebutuhan track analitik jika diperlukan kelak
                const targetVariant = this.getAttribute('data-variant');
                console.log(`Visitor mencoba mengakses varian: ${targetVariant}. Mengalihkan ke login...`);
                
                // Dialihkan secara instan langsung ke arah login (menggunakan route bawaan Laravel auth)
                window.location.href = "{{ route('login') }}";
                
                // Pilihan alternatif fallback jika Anda tidak memakai penamaan named route:
                // window.location.href = "/login";
            }
        });
    });
});
</script>

@include('partials.footer')


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>