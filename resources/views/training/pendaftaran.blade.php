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

    <!-- HERO -->
<section class="bg-[#002d62] text-white py-24 px-6 text-center relative overflow-hidden">

    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>

    <div class="relative z-10 max-w-4xl mx-auto" data-aos="zoom-in">

        <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-4">
            {{ __('register.hero_badge') }}
        </span>

        <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight leading-tight">
            {{ __('register.hero_title_1') }} <br>
            {{ __('register.hero_title_2') }}
        </h1>

        <p class="text-slate-300 mt-6 max-w-2xl mx-auto leading-relaxed text-sm md:text-base">
            {{ __('register.hero_desc') }}
        </p>

    </div>

</section>

<section class="max-w-7xl mx-auto py-24 px-6">

    <div class="text-center mb-20" data-aos="fade-up">

        <span class="inline-block px-5 py-2 rounded-full border border-red-100 bg-red-50 text-red-800 text-xs font-extrabold uppercase tracking-[0.35em] shadow-sm">
            {{ __('register.prog_badge') }}
        </span>

        <h2 class="mt-6 text-4xl md:text-5xl font-black uppercase text-slate-900 leading-tight">
            {{ __('register.prog_title_1') }}
            <span class="text-red-800">
                {{ __('register.prog_title_2') }}
            </span>
        </h2>

        <p class="max-w-2xl mx-auto mt-6 text-lg leading-8 text-slate-500">
            {{ __('register.prog_desc') }}
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

            <div class="mb-8 flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-red-800 to-red-900 shadow-lg">
                <span class="material-symbols-outlined text-[60px] text-white">
                    engineering
                </span>
            </div>

            <h3 class="mb-4 text-2xl font-black text-slate-900">
                {{ __('register.card1_title') }}
            </h3>

            <p class="leading-8 text-slate-500 mb-6">
                {{ __('register.card1_desc') }}
            </p>

            <span class="inline-block bg-red-50 text-red-800 text-xs font-bold px-4 py-2 rounded-full">
                {{ __('register.card1_level') }}
            </span>

        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

            <div class="mb-8 flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-red-800 to-red-900 shadow-lg">
                <span class="material-symbols-outlined text-[60px] text-white">
                    dataset
                </span>
            </div>

            <h3 class="mb-4 text-2xl font-black text-slate-900">
                {{ __('register.card2_title') }}
            </h3>

            <p class="leading-8 text-slate-500 mb-6">
                {{ __('register.card2_desc') }}
            </p>

            <span class="inline-block bg-red-50 text-red-800 text-xs font-bold px-4 py-2 rounded-full">
                {{ __('register.card2_level') }}
            </span>

        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

            <div class="mb-8 flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-red-800 to-red-900 shadow-lg">
                <span class="material-symbols-outlined text-[60px] text-white">
                    school
                </span>
            </div>

            <h3 class="mb-4 text-2xl font-black text-slate-900">
                {{ __('register.card3_title') }}
            </h3>

            <p class="leading-8 text-slate-500 mb-6">
                {{ __('register.card3_desc') }}
            </p>

            <span class="inline-block bg-red-50 text-red-800 text-xs font-bold px-4 py-2 rounded-full">
                {{ __('register.card3_level') }}
            </span>

        </div>

    </div>

</section>

<section class="bg-slate-100 py-24 px-6 border-t border-slate-200">

    <div class="max-w-4xl mx-auto bg-white rounded-[2rem] border border-slate-200 shadow-sm p-10 md:p-14">

        <div class="mb-12 text-center">

            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-3">
                {{ __('register.form_badge') }}
            </span>

            <h2 class="text-4xl font-black uppercase text-slate-900">
                {{ __('register.form_title') }}
            </h2>

        </div>

        <form class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_name') }}
                </label>
                <input type="text"
                       class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-red-800">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_email') }}
                </label>
                <input type="email"
                       class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-red-800">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_company') }}
                </label>
                <input type="text"
                       class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-red-800">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_select') }}
                </label>
                <select class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-red-800">
                    <option>{{ __('register.card1_title') }}</option>
                    <option>{{ __('register.card2_title') }}</option>
                    <option>{{ __('register.card3_title') }}</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_message') }}
                </label>
                <textarea rows="5"
                          class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-red-800"></textarea>
            </div>

            <div class="md:col-span-2 text-center mt-4">
                <button type="submit"
                        class="bg-red-800 hover:bg-red-700 text-white font-black uppercase tracking-[0.2em] px-10 py-4 rounded-2xl shadow-lg transition-all duration-300 hover:-translate-y-1">
                    {{ __('register.btn_submit') }}
                </button>
            </div>

        </form>

    </div>

</section>

</div>

<!-- FOOTER -->
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