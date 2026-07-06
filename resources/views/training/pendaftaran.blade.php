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

        {{-- NOTIFIKASI SUKSES SETELAH BERHASIL DAFTAR --}}
        @if(session('success'))
            <div class="mb-8 p-5 bg-green-50 border border-green-200 text-green-800 rounded-2xl flex items-center gap-3 text-sm font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- INTEGRASI BACKEND: Ditambahkan method="POST" dan action ke rute penampung data --}}
        <form action="{{ route('training.pendaftaran.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- 1. NAMA LENGKAP (REQUIRED) --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_name') }} <span class="text-red-600">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full rounded-2xl border @error('name') border-red-500 focus:ring-red-500 @else border-slate-200 focus:ring-red-800 @enderror px-5 py-4 focus:outline-none focus:ring-2">
                @error('name')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 2. EMAIL (REQUIRED) --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_email') }} <span class="text-red-600">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full rounded-2xl border @error('email') border-red-500 focus:ring-red-500 @else border-slate-200 focus:ring-red-800 @enderror px-5 py-4 focus:outline-none focus:ring-2">
                @error('email')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 3. NOMOR WHATSAPP (REQUIRED - Name disesuaikan menjadi 'whatsapp_number') --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    Nomor WhatsApp <span class="text-red-600">*</span>
                </label>
                <div class="relative flex items-center">
                    <input type="tel" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required placeholder="08123456789"
                        pattern="[0-9]{10,13}" title="Masukkan nomor ponsel yang valid (contoh: 08123456789)"
                        class="w-full rounded-2xl border @error('whatsapp_number') border-red-500 focus:ring-red-500 @else border-slate-200 focus:ring-red-800 @enderror px-5 py-4 focus:outline-none focus:ring-2">
                </div>
                @error('whatsapp_number')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 4. PERUSAHAAN / INSTITUSI (OPTIONAL) --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_company') }}
                </label>
                <input type="text" name="company" value="{{ old('company') }}"
                       class="w-full rounded-2xl border @error('company') border-red-500 focus:ring-red-500 @else border-slate-200 focus:ring-red-800 @enderror px-5 py-4 focus:outline-none focus:ring-2">
                @error('company')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 5. PILIH TRAINING (REQUIRED - Name disesuaikan menjadi 'training_program') --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_select') }} <span class="text-red-600">*</span>
                </label>
                <select name="training_program" required
                        class="w-full rounded-2xl border @error('training_program') border-red-500 focus:ring-red-500 @else border-slate-200 focus:ring-red-800 @enderror px-5 py-4 focus:outline-none focus:ring-2 bg-white">
                    <option value="" disabled {{ old('training_program') ? '' : 'selected' }}>-- Pilih Program Training --</option>
                    <option value="Card 1 Title" {{ old('training_program') == 'Card 1 Title' ? 'selected' : '' }}>{{ __('register.card1_title') }}</option>
                    <option value="Card 2 Title" {{ old('training_program') == 'Card 2 Title' ? 'selected' : '' }}>{{ __('register.card2_title') }}</option>
                    <option value="Card 3 Title" {{ old('training_program') == 'Card 3 Title' ? 'selected' : '' }}>{{ __('register.card3_title') }}</option>
                </select>
                @error('training_program')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 6. PESAN TAMBAHAN (OPTIONAL) --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_message') }}
                </label>
                <textarea name="message" rows="4"
                          class="w-full rounded-2xl border @error('message') border-red-500 focus:ring-red-500 @else border-slate-200 focus:ring-red-800 @enderror px-5 py-4 focus:outline-none focus:ring-2">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 7. CAPTCHA CONTAINER --}}
            <div class="md:col-span-2 flex flex-col items-center justify-center my-2">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                @error('g-recaptcha-response')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">Silakan selesaikan verifikasi captcha.</span>
                @enderror
            </div>

            {{-- 8. ASPEK LEGALITAS & PERSETUJUAN CHECKBOX --}}
            <div class="md:col-span-2 flex flex-col mt-2">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="terms" name="terms" required
                           class="mt-1 h-4 w-4 rounded border-slate-300 text-red-800 focus:ring-red-800 accent-red-800 cursor-pointer">
                    <label for="terms" class="text-xs text-slate-500 leading-relaxed cursor-pointer select-none">
                        Saya menyetujui 
                        <a href="{{ route('terms') }}" class="text-red-800 underline hover:text-red-700 font-medium">Syarat & Ketentuan</a> serta 
                        <a href="{{ route('privacy') }}" class="text-red-800 underline hover:text-red-700 font-medium">Kebijakan Privasi</a> 
                        yang berlaku di PT GeoINHance Solusi Rekayasa. <span class="text-red-600">*</span>
                    </label>
                </div>
                @error('terms')
                    <span class="text-xs text-red-600 font-semibold mt-1 block pl-7">{{ $message }}</span>
                @enderror
            </div>

            {{-- BUTTON SUBMIT --}}
            <div class="md:col-span-2 text-center mt-6">
                <button type="submit"
                        class="bg-red-800 hover:bg-red-700 text-white font-black uppercase tracking-[0.2em] px-10 py-4 rounded-2xl shadow-lg transition-all duration-300 hover:-translate-y-1 w-full sm:w-auto">
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