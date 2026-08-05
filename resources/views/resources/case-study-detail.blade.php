<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ auto_translate($caseStudy->title) }} | GeoINHance</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Desain Tipografi Artikel agar Rapi saat Render HTML dari Text Editor */
        .geo-article-container {
            font-size: 1rem;
            line-height: 1.75;
            color: #334155;
        }
        .geo-article-container p {
            margin-bottom: 1.5rem;
        }
        .geo-article-container h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .geo-article-container h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #0f172a;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .geo-article-container ul, .geo-article-container ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }
        .geo-article-container ul {
            list-style-type: disc;
        }
        .geo-article-container ol {
            list-style-type: decimal;
        }
        .nav-glass {
            background: rgba(255, 255, 255, .97);
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-gray-50 text-slate-900 antialiased font-sans">

    {{-- NAVBAR --}}
    <header class="fixed top-0 left-0 w-full z-[999] nav-glass border-b border-gray-200 shadow-sm">
        @include('partials.navbar')
    </header>

    {{-- HERO SECTION --}}
    <section class="relative bg-slate-950 text-white pt-40 pb-24 lg:pt-48 lg:pb-32 w-full text-center bg-cover bg-center bg-no-repeat" 
             style="background-image: url('{{ $caseStudy->image ? asset('storage/' . $caseStudy->image) : asset('images/default-banner.jpg') }}');">
        
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-[2px]"></div>
        
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-block bg-red-600 text-white text-[10px] font-extrabold uppercase tracking-widest px-3 py-1 rounded mb-4">
                {{ $caseStudy->sector ? auto_translate($caseStudy->sector) : 'Studi Kasus' }}
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black leading-tight tracking-tight drop-shadow-md uppercase">
                {{ ($caseStudy->title) }}
            </h1>
        </div>
    </section>

    <main class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 sm:px-8">
            
            <div class="text-gray-500 font-medium text-sm mb-10 flex items-center justify-between pb-4">
                <div class="flex items-center gap-2">
                    📅 {{ $caseStudy->published_at ? \Carbon\Carbon::parse($caseStudy->published_at)->format('j M, Y') : $caseStudy->created_at->format('j M, Y') }}
                </div>
                <div>
                    Tahun : <span class="font-bold text-slate-800">{{ $caseStudy->publication_year ?? '-' }}</span>
                </div>
            </div>

            {{-- ==================== PDF COMPONENT WINDOW (FIXED DATABASE COLUMN) ==================== --}}
            <div class="mt-12 space-y-4 pt-8">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Lampiran Dokumen Terkait
                    </h3>
                    <span class="text-[10px] font-mono bg-slate-100 text-slate-600 px-2 py-0.5 rounded border border-slate-200 uppercase">
                        PDF - {{ $caseStudy->file_size ?? 'N/A' }}
                    </span>
                </div>
                
                <div class="w-full h-[650px] border border-gray-300 rounded-xl overflow-hidden shadow-md bg-[#1e1e1e]">
                    {{-- Mengecek kolom file_path sesuai dengan hasil dump database --}}
                    @if(isset($caseStudy->file_path) && $caseStudy->file_path)
                        <object 
                            data="{{ asset('storage/' . $caseStudy->file_path) }}#toolbar=1" 
                            type="application/pdf" 
                            class="w-full h-full bg-[#1e1e1e]">
                            
                            <iframe src="{{ asset('storage/' . $caseStudy->file_path) }}#toolbar=1" class="w-full h-full border-none bg-[#1e1e1e]">
                                <div class="flex flex-col items-center justify-center h-full p-6 text-center text-white">
                                    <p class="text-sm mb-4 font-medium">Pratinjau langsung tidak tersedia di browser Anda.</p>
                                    <a href="{{ asset('storage/' . $caseStudy->file_path) }}" target="_blank" class="inline-flex items-center gap-2 bg-red-600 text-white text-xs font-bold uppercase py-2.5 px-5 rounded-lg shadow-sm">
                                        Buka Dokumen PDF Secara Langsung
                                    </a>
                                </div>
                            </iframe >
                        </object>
                    @else
                        <div class="flex flex-col items-center justify-center h-full p-6 text-center bg-slate-50">
                            <svg class="w-14 h-14 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h4 class="text-sm font-bold text-slate-700 mb-1">Dokumen Belum Tersedia</h4>
                            <p class="text-xs text-slate-400 max-w-xs leading-relaxed">Lampiran berkas PDF untuk studi kasus ini belum diunggah atau tidak ditemukan di sistem database.</p>
                        </div>
                    @endif
                </div>
            </div>
            {{-- ====================================================================================== --}}

            {{-- 🟢 PERBAIKAN UTAMA: Mengubah dari $caseStudy->content menjadi $caseStudy->description --}}
            <div class="geo-article-container font-light whitespace-pre-line">
                @if(!empty($caseStudy->description))
                    {!! ($caseStudy->description) !!}
                @else
                    <p class="text-gray-400 italic">{{ __('Tidak ada ringkasan deskripsi untuk studi kasus teknik ini.') }}</p>
                @endif
            </div>

            <div class="mt-20 pt-8 border-t border-gray-100 text-center space-y-6">
                <a href="{{ route('kontak') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold uppercase tracking-widest py-3.5 px-8 rounded-xl text-xs transition shadow-sm">
                    Diskusikan Proyek Serupa Bersama Kami
                </a>
                
                <div class="pt-4">
                    <a href="{{ route('resources.studi-kasus') }}" class="inline-flex items-center text-xs font-bold text-gray-500 hover:text-red-600 transition uppercase tracking-widest">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali ke Kumpulan Studi Kasus
                    </a>
                </div>
            </div>

        </div>
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>