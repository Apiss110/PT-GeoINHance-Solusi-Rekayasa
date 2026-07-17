<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('register.meta_title') }}</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Memuat script reCAPTCHA jika diperlukan --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">

@include('partials.navbar')

{{-- HERO SECTION --}}
<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
        <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3">
            {{ __('register.hero_badge') }}
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none uppercase">
            {{ __('register.hero_title_1') }}
        </h1>
        <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('register.hero_desc') }}
        </p>
    </div>
</section>

{{-- FORM SECTION --}}
<section class="bg-slate-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl border border-gray-200/80 shadow-sm p-8 md:p-12" data-aos="fade-up">

        <div class="mb-10 text-center">
            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">
                {{ __('register.form_badge') }}
            </span>
            <h2 class="text-2xl md:text-3xl font-black uppercase text-slate-900">
                {{ __('register.form_title') }}
            </h2>
        </div>

        {{-- NOTIFIKASI SUKSES SETELAH BERHASIL DAFTAR --}}
        @if(session('success'))
            <div class="mb-8 p-5 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center gap-3 text-sm font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('training.pendaftaran.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- 1. NAMA LENGKAP --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_name') }} <span class="text-red-600">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full bg-slate-50 border @error('name') border-red-500 focus:ring-red-500 @else border-gray-200 focus:ring-slate-900 @enderror rounded-lg px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:bg-white transition">
                @error('name')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 2. EMAIL --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_email') }} <span class="text-red-600">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full bg-slate-50 border @error('email') border-red-500 focus:ring-red-500 @else border-gray-200 focus:ring-slate-900 @enderror rounded-lg px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:bg-white transition">
                @error('email')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 3. NOMOR WHATSAPP --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_whatsapp') }} <span class="text-red-600">*</span>
                </label>
                <input type="tel" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required placeholder="08123456789"
                       pattern="[0-9]{10,13}" title="Masukkan nomor ponsel yang valid (contoh: 08123456789)"
                       class="w-full bg-slate-50 border @error('whatsapp_number') border-red-500 focus:ring-red-500 @else border-gray-200 focus:ring-slate-900 @enderror rounded-lg px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:bg-white transition">
                @error('whatsapp_number')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 4. PERUSAHAAN / INSTITUSI --}}
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_company') }}
                </label>
                <input type="text" name="company" value="{{ old('company') }}"
                       class="w-full bg-slate-50 border @error('company') border-red-500 focus:ring-red-500 @else border-gray-200 focus:ring-slate-900 @enderror rounded-lg px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:bg-white transition">
                @error('company')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 5. PILIH TRAINING --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_select') }} <span class="text-red-600">*</span>
                </label>
                <select name="syllabus_id" required
                        class="w-full bg-slate-50 border @error('syllabus_id') border-red-500 focus:ring-red-500 @else border-gray-200 focus:ring-slate-900 @enderror rounded-lg px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:bg-white transition">
                    <option value="" disabled {{ old('syllabus_id', $selectedSyllabusId) ? '' : 'selected' }}>{{ __('register.select_placeholder') }}</option>
                    @foreach($syllabi as $sys)
                        <option value="{{ $sys->id }}" {{ old('syllabus_id', $selectedSyllabusId) == $sys->id ? 'selected' : '' }}>
                            {{ $sys->title }} ({{ $sys->software_category }})
                        </option>
                    @endforeach
                </select>
                @error('syllabus_id')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 6. PESAN TAMBAHAN --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    {{ __('register.label_message') }}
                </label>
                <textarea name="message" rows="4"
                          class="w-full bg-slate-50 border @error('message') border-red-500 focus:ring-red-500 @else border-gray-200 focus:ring-slate-900 @enderror rounded-lg px-4 py-3 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:bg-white transition">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- 7. CAPTCHA CONTAINER --}}
            <div class="md:col-span-2 flex flex-col items-center justify-center my-2">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                @error('g-recaptcha-response')
                    <span class="text-xs text-red-600 font-semibold mt-1 block">{{ __('register.captcha_error_msg') }}</span>
                @enderror
            </div>

            {{-- 8. ASPEK LEGALITAS & PERSETUJUAN CHECKBOX --}}
            <div class="md:col-span-2 flex flex-col mt-2">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="terms" name="terms" required
                           class="mt-1 h-4 w-4 rounded border-slate-300 text-red-800 focus:ring-red-800 accent-red-800 cursor-pointer">
                    <label for="terms" class="text-xs text-slate-500 leading-relaxed cursor-pointer select-none">
                        {{ __('register.terms_part_1') }} 
                        <a href="{{ route('terms') }}" class="text-red-800 underline hover:text-red-700 font-medium">{{ __('register.terms_link_text_1') }}</a> {{ __('register.terms_part_2') }} 
                        <a href="{{ route('privacy') }}" class="text-red-800 underline hover:text-red-700 font-medium">{{ __('register.terms_link_text_2') }}</a> 
                        {{ __('register.terms_part_3') }} <span class="text-red-600">*</span>
                    </label>
                </div>
                @error('terms')
                    <span class="text-xs text-red-600 font-semibold mt-1 block pl-7">{{ $message }}</span>
                @enderror
            </div>

            {{-- BUTTON SUBMIT --}}
            <div class="md:col-span-2 text-center mt-6">
                <button type="submit"
                        class="bg-slate-900 hover:bg-slate-800 text-white font-bold uppercase tracking-wider px-8 py-3.5 rounded-lg shadow-sm transition duration-150 w-full sm:w-auto">
                    {{ __('register.btn_submit') }}
                </button>
            </div>

        </form>

    </div>
</section>

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