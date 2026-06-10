@include('partials.navbar')

{{-- @section('content') DIHAPUS karena menggunakan include manual --}}
<div class="max-w-5xl mx-auto py-12 px-4 md:px-8">
    
    <div class="mb-6">
        <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 transition inline-flex items-center gap-2 font-medium">
            &larr; Kembali ke Beranda
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 md:p-8">
        
        <span class="text-xs font-bold text-red-800 uppercase block mb-2 tracking-wider">
            {{ $project->category }}
        </span>
        
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">
            {{ $project->title }}
        </h1>

        <div class="rounded-2xl overflow-hidden mb-8 shadow-sm bg-slate-100">
            @if($project->image_path)
                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-auto max-h-[500px] object-cover">
            @else
                <div class="w-full h-64 flex items-center justify-center text-slate-400">
                    Tidak ada gambar untuk proyek ini
                </div>
            @endif
        </div>

        <div class="flex flex-wrap gap-6 text-sm text-slate-500 font-medium mb-8 pb-4 border-b border-slate-100">
            <div class="flex items-center gap-1">
                <span>📍 Lokasi:</span>
                <strong class="text-slate-800">{{ $project->location ?? '-' }}</strong>
            </div>
            <div class="flex items-center gap-1">
                <span>📅 Tahun Pelaksanaan:</span>
                <strong class="text-slate-800">Th. {{ $project->year ?? '-' }}</strong>
            </div>
        </div>

        <div class="prose max-w-none text-slate-700 leading-relaxed text-base">
            {!! nl2br(e($project->description)) !!}
        </div>
        
    </div>

</div>

@include('partials.footer')