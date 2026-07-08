<x-app-layout>
<div class="p-6 max-w-4xl mx-auto">
    
    <!-- Header & Tombol Kembali -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Detail Pesan Masuk</h1>
            <p class="text-sm text-slate-500 mt-1">Membaca pesan masuk resmi dari formulir kontak klien.</p>
        </div>
        <div>
            <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center text-sm font-semibold text-slate-600 bg-white hover:bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-xl shadow-sm transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>
    </div>

    <!-- Kotak Utama Konten Pesan -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        
        <!-- Bar Atas Info Pengirim & Aksi Hapus -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-[#cfdde9] text-[#0e1d82] flex items-center justify-center font-bold text-lg shadow-sm">
                    {{ strtoupper(substr($message->full_name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-base font-bold text-slate-800">{{ $message->full_name }}</h2>
                    <p class="text-xs text-slate-400">Diterima pada: {{ \Carbon\Carbon::parse($message->created_at)->format('d M Y, H:i') }} WIB</p>
                </div>
            </div>
            
            <!-- Form Tombol Hapus Pesan -->
            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan dari {{ $message->full_name }}?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-100 px-3 py-2 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Pesan
                </button>
            </form>
        </div>

        <!-- Detail Data Isian Formulir -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Email Klien -->
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Alamat Email</label>
                    <a href="mailto:{{ $message->email }}" class="text-sm font-semibold text-[#0e1d82] hover:underline inline-flex items-center">
                        {{ $message->email }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Nomor Telepon / WhatsApp</label>
                    <p class="text-sm font-medium text-slate-700">{{ $message->phone }}</p>
                </div>

                <!-- Nama Perusahaan -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Perusahaan / Instansi</label>
                    <p class="text-sm font-medium text-slate-700 bg-slate-50 px-3 py-2 rounded-xl border border-slate-100 inline-block">
                        {{ $message->company ?? 'Tidak Menyebutkan' }}
                    </p>
                </div>

                <!-- Subjek Pengiriman -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Perihal / Subjek</label>
                    <p class="text-sm font-semibold text-slate-800 bg-slate-50 border border-slate-200 px-3 py-2.5 rounded-xl">
                        {{ $message->subject }}
                    </p>
                </div>
            </div>

            <hr class="border-slate-100">

            <!-- Isi Pesan Inti -->
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Isi Pesan Lengkap</label>
                <div class="text-sm text-slate-700 leading-relaxed bg-slate-50 border border-slate-200 rounded-2xl p-5 whitespace-pre-line min-h-[180px] shadow-inner">
                    {{ $message->message }}
                </div>
            </div>
            
        </div>
    </div>
</div>
</x-app-layout>