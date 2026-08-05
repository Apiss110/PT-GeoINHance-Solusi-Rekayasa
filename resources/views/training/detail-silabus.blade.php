@include('partials.navbar')

<div class="bg-slate-900 text-white pt-28 pb-16 border-b border-slate-800">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <div class="flex flex-wrap items-center gap-3 mb-5">
            <span class="bg-red-600 text-white text-xs font-bold px-3 py-1 rounded">
                {{ ($syllabus->software_category) }}
            </span>
            <span class="bg-slate-700 text-slate-200 text-xs font-medium px-3 py-1 rounded">
                {{ __('Level:') }} {{ ($syllabus->level) }}
            </span>
        </div>
        
        <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight max-w-4xl mb-4">
            {{ ($syllabus->title) }}
        </h1>
        
        <p class="text-slate-400 text-base md:text-lg max-w-3xl leading-relaxed">
            {{ ($syllabus->description) }}
        </p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10 mt-10 pt-8 border-t border-slate-800 text-sm">
            <div class="flex flex-col justify-start">
                <span class="block text-slate-500 uppercase tracking-wider text-xs font-semibold">{{ __('Durasi Kelas') }}</span>
                <span class="text-slate-200 font-medium text-base flex items-start gap-2 mt-2">
                    <i class="fa-regular fa-clock text-red-500 mt-1 flex-shrink-0"></i> 
                    <span>{{ $syllabus->durasi ? ($syllabus->durasi) : '-' }}</span>
                </span>
            </div>

            <div class="flex flex-col justify-start">
                <span class="block text-slate-500 uppercase tracking-wider text-xs font-semibold">{{ __('Jadwal Terdekat') }}</span>
                <span class="text-slate-200 font-medium text-base flex items-start gap-2 mt-2">
                    <i class="fa-regular fa-calendar text-red-500 mt-1 flex-shrink-0"></i> 
                    <span class="leading-snug">{{ $syllabus->jadwal_terdekat ? ($syllabus->jadwal_terdekat) : '-' }}</span>
                </span>
            </div>

            <div class="flex flex-col justify-start">
                <span class="block text-slate-500 uppercase tracking-wider text-xs font-semibold">{{ __('Format Pembelajaran') }}</span>
                <span class="text-slate-200 font-medium text-base flex items-start gap-2 mt-2">
                    <i class="fa-solid fa-video text-red-500 mt-1 flex-shrink-0"></i> 
                    <span>{{ ($syllabus->format_kelas) }}</span>
                </span>
            </div>

            <div class="flex flex-col justify-start">
                <span class="block text-slate-500 uppercase tracking-wider text-xs font-semibold">{{ __('Sertifikasi CPD') }}</span>
                <span class="text-slate-200 font-medium text-base flex items-start gap-2 mt-2">
                    <i class="fa-solid fa-award text-red-500 mt-1 flex-shrink-0"></i> 
                    <span>{{ $syllabus->poin_cpd ?? '0' }} {{ __('Poin PDH') }}</span>
                </span>
            </div>
        </div>
        
    </div>
</div>

<div class="container mx-auto px-4 max-w-6xl py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <h2 class="text-xl font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <span class="w-1 h-6 bg-red-600 rounded"></span> {{ __('Overview & Manfaat Kursus') }}
                </h2>
                <p class="text-slate-600 leading-relaxed whitespace-pre-line">{{ ($syllabus->manfaat_kursus ?? $syllabus->description) }}</p>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <h2 class="text-xl font-bold text-slate-800 mb-2 flex items-center gap-2">
                    <span class="w-1 h-6 bg-red-600 rounded"></span> {{ __('Silabus & Materi Pembelajaran') }}
                </h2>
                <p class="text-sm text-slate-500 mb-4">{{ __('Materi dipecah menjadi') }} {{ $syllabus->modules_count }} {{ __('Modul Pembelajaran intensif:') }}</p>
                
                <div class="space-y-3">
                    @if($syllabus->modul_materi && is_array($syllabus->modul_materi))
                        @foreach($syllabus->modul_materi as $index => $modul)
                            <div class="border border-gray-200 rounded-lg p-4 font-semibold text-slate-700 bg-slate-50">
                                <span>{{ ($modul) }}</span>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm text-slate-400 italic">{{ __('Detail susunan modul belum diinputkan.') }}</p>
                    @endif
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="w-1 h-6 bg-red-600 rounded"></span> {{ __('Pertanyaan yang Sering Diajukan (FAQ)') }}
                </h2>
                <div class="space-y-3">
                    @if($syllabus->faq_list && is_array($syllabus->faq_list))
                        @foreach($syllabus->faq_list as $faq)
                            <details class="group border-b border-gray-200 pb-3">
                                <summary class="flex justify-between items-center font-medium py-2 text-slate-800 hover:text-red-600 cursor-pointer list-none transition [&::-webkit-details-marker]:hidden">
                                    <span class="text-base font-semibold">{{ isset($faq['pertanyaan']) ? ($faq['pertanyaan']) : '' }}</span>
                                    <span class="transition group-open:rotate-180 text-slate-400">
                                        <i class="fa-solid fa-plus text-xs group-open:hidden"></i>
                                        <i class="fa-solid fa-minus text-xs hidden group-open:inline"></i>
                                    </span>
                                </summary>
                                <div class="mt-2 text-sm text-slate-600 leading-relaxed pl-1">
                                    {{ isset($faq['jawaban']) ? ($faq['jawaban']) : '' }}
                                </div>
                            </details>
                        @endforeach
                    @else
                        <p class="text-sm text-slate-400 italic">{{ __('Belum ada FAQ khusus untuk kelas ini.') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-xl border-2 border-red-500 shadow-md lg:sticky lg:top-6">
                <h3 class="text-lg font-bold text-slate-800 mb-4">{{ __('Pilihan Paket Investasi') }}</h3>
                
                <div class="space-y-4 mb-6">
                    <div class="p-3 bg-slate-50 rounded-lg border border-gray-100">
                        <span class="block text-xs font-semibold text-slate-500 uppercase">{{ __('Mahasiswa / Fresh Graduate') }}</span>
                        <span class="text-2xl font-bold text-red-600">Rp{{ number_format($syllabus->harga_mahasiswa, 0, ',', '.') }}</span>
                    </div>
                    <div class="p-3 bg-slate-50 rounded-lg border border-gray-100">
                        <span class="block text-xs font-semibold text-slate-500 uppercase">{{ __('Umum / Profesional') }}</span>
                        <span class="text-2xl font-bold text-slate-800">Rp{{ number_format($syllabus->harga_profesional, 0, ',', '.') }}</span>
                    </div>
                </div>

                <a href="{{ route('training.pendaftaran', ['syllabus_id' => $syllabus->id]) }}" class="block w-full text-center bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition shadow-sm mb-4">
                    {{ __('Daftar Training Sekarang') }} <i class="fa-solid fa-arrow-right text-xs ml-1"></i>
                </a>

                <div class="border-t border-gray-100 pt-4 mt-4 space-y-3 text-xs text-slate-600">
                    <div class="flex items-start gap-2">
                        <i class="fa-solid fa-laptop text-slate-400 mt-0.5"></i>
                        <div>
                            <strong class="text-slate-700 block">{{ __('Kebutuhan Hardware:') }}</strong>
                            {{ $syllabus->minimal_ram ? ($syllabus->minimal_ram) : __('RAM Minimal 8GB') }}
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fa-solid fa-key text-slate-400 mt-0.5"></i>
                        <div>
                            <strong class="text-slate-700 block">{{ __('Lisensi Software:') }}</strong>
                            {{ $syllabus->lisensi_software ? ($syllabus->lisensi_software) : __('Disediakan oleh tim teknis panitia') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm">
                <h4 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">{{ __('Instruktur Pengajar') }}</h4>
                <div class="flex items-center gap-3 mb-3">
                    @if($syllabus->foto_instruktur)
                        <img src="{{ asset('storage/' . $syllabus->foto_instruktur) }}" alt="{{ __('Foto Instruktur') }}" class="w-12 h-12 rounded-full object-cover border">
                    @else
                        <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center text-slate-500">
                            <i class="fa-solid fa-user text-sm"></i>
                        </div>
                    @endif
                    <div>
                        <h5 class="font-bold text-slate-800 text-sm leading-tight">{{ $syllabus->nama_instruktur ? ($syllabus->nama_instruktur) : __('Expert Trainer GeoINHance') }}</h5>
                        <span class="text-xs text-red-600 font-semibold">{{ __('Geotechnical Expert') }}</span>
                    </div>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed whitespace-pre-line border-t border-gray-100 pt-2">
                    {{ $syllabus->proyek_instruktur ? ($syllabus->proyek_instruktur) : __('Praktisi senior dengan jam terbang tinggi di bidang pemodelan numerik elemen hingga dan rekayasa infrastruktur sipil.') }}
                </p>
            </div>
            
            <div class="bg-slate-50 p-5 rounded-xl border border-gray-200 text-xs space-y-3">
                <div>
                    <span class="font-bold text-slate-700 block mb-1">💡 {{ __('Target Peserta:') }}</span>
                    <p class="text-slate-600 leading-relaxed">{{ $syllabus->target_peserta ? ($syllabus->target_peserta) : '-' }}</p>
                </div>
                <div class="border-t border-gray-200 pt-2">
                    <span class="font-bold text-slate-700 block mb-1">📘 {{ __('Prasyarat Dasar:') }}</span>
                    <p class="text-slate-600 leading-relaxed">{{ $syllabus->prasyarat_peserta ? ($syllabus->prasyarat_peserta) : '-' }}</p>
                </div>
            </div>

        </div>
        
    </div>
</div>
@include('partials.footer')