<x-app-layout>
<div class="p-6 max-w-4xl mx-auto">
    
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Detail Pendaftaran Training</h1>
            <p class="text-sm text-slate-500 mt-1">Data lengkap peserta yang mendaftar program training.</p>
        </div>
        <div>
            <a href="{{ route('admin.training.index') }}" class="inline-flex items-center text-sm font-semibold text-slate-600 bg-white hover:bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-xl shadow-sm transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        
        <!-- Top Bar Inside Card -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-[#cfdde9] text-[#0e1d82] flex items-center justify-center font-bold text-lg shadow-sm">
                    {{ strtoupper(substr($reg->name ?? 'P', 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-base font-bold text-slate-800">{{ $reg->name }}</h2>
                    <p class="text-xs text-slate-400">Mendaftar pada: {{ \Carbon\Carbon::parse($reg->created_at)->format('d M Y, H:i') }} WIB</p>
                </div>
            </div>
            
            <form action="{{ route('admin.training.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data peserta {{ $reg->name }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Peserta
                </button>
            </form>
        </div>

        <!-- Detail Data Peserta -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Alamat Email</label>
                    <a href="mailto:{{ $reg->email }}" class="text-sm font-semibold text-[#0e1d82] hover:underline inline-flex items-center">
                        {{ $reg->email }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>

                <!-- WhatsApp / Telepon -->
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                    @php
                        // Formatting nomor telepon ke format internasional (62xxx) untuk WhatsApp
                        $waNumber = $reg->whatsapp_number ?? '';
                        $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);
                        if (str_starts_with($cleanWa, '0')) {
                            $cleanWa = '62' . substr($cleanWa, 1);
                        }
                    @endphp

                    @if(!empty($cleanWa))
                        <a href="https://wa.me/{{ $cleanWa }}" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700 hover:underline transition">
                            <!-- Icon WhatsApp -->
                            <svg class="w-4 h-4 mr-1.5 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                            </svg>
                            {{ $reg->whatsapp_number }}
                        </a>
                    @else
                        <span class="text-sm font-medium text-slate-500">-</span>
                    @endif
                </div>

                <!-- Perusahaan / Instansi -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Perusahaan / Instansi</label>
                    <p class="text-sm font-medium text-slate-700 bg-slate-50 px-3 py-2 rounded-xl border border-slate-100 inline-block">
                        {{ $reg->company_or_institution ?? 'Tidak Menyebutkan' }}
                    </p>
                </div>

                <!-- Program Training -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Program Training yang Dipilih</label>
                    <div class="text-sm font-semibold text-slate-800 bg-blue-50 border border-blue-100 px-3 py-2.5 rounded-xl">
                        {{ $reg->syllabus->title ?? $reg->training_program }}
                    </div>
                </div>
            </div>

            <hr class="border-slate-100">

            <!-- Pesan Tambahan -->
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Pesan Tambahan</label>
                <div class="text-sm text-slate-700 leading-relaxed bg-slate-50 border border-slate-200 rounded-2xl p-5 whitespace-pre-line min-h-[120px] shadow-inner">
                    {{ $reg->additional_message ?? 'Tidak ada pesan tambahan.' }}
                </div>
            </div>
            
        </div>
    </div>
</div>
</x-app-layout>