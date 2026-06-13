@include('partials.navbar')
<div class="bg-white py-12">
    <div class="max-w-5xl mx-auto px-6">
        
        <a href="{{ route('proyek.semua') }}" class="text-red-800 hover:text-red-900 font-bold mb-6 inline-block">
            &larr; Kembali ke Daftar Proyek
        </a>

        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 uppercase tracking-tighter">
                {{ $proyek->name }}
            </h1>
            <div class="mt-4 flex items-center space-x-4 text-sm text-slate-500">
                <span>📍 Lokasi: <strong>{{ $proyek->lokasi ?? 'Indonesia' }}</strong></span>
                <span>📅 Tahun: <strong>{{ $proyek->tahun ?? '2026' }}</strong></span>
            </div>
        </div>

        <div class="mb-10">
            @if($proyek->image)
                <img src="{{ asset('storage/' . $proyek->image) }}" 
                     alt="{{ $proyek->name }}" 
                     class="w-full h-auto rounded-lg shadow-xl">
            @else
                <div class="w-full h-64 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400">
                    Tidak ada gambar
                </div>
            @endif
        </div>

        <div class="prose prose-lg max-w-none text-slate-700">
            {!! $proyek->description !!}
        </div>

        <div class="mt-12 pt-8 border-t border-slate-200">
            <p class="text-sm text-slate-400 italic">
                Terakhir diperbarui: {{ $proyek->updated_at->format('d F Y') }}
            </p>
        </div>

    </div>
</div>
@include('partials.footer')