@include('partials.navbar')

@section('content')
<!-- Header Banner Dinamis -->
<div class="bg-slate-900 text-white py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <p class="text-sm text-blue-400 font-medium mb-2">Proyek / {{ $category->name }}</p>
        <h1 class="text-3xl md:text-4xl font-extrabold uppercase tracking-wide">
            {{ $category->name }}
        </h1>
        <p class="text-slate-400 mt-2 text-sm max-w-2xl">
            Portofolio perencanaan teknis dan pengerjaan untuk kategori {{ $category->name }} oleh PT GeoINHance Solusi Rekayasa.
        </p>
    </div>
</div>

<!-- Bagian Konten Grid Proyek -->
<div class="max-w-7xl mx-auto py-12 px-4 md:px-8">
    
    <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-6 border-b border-gray-100 dark:border-gray-800 pb-3">
        Daftar Portofolio Aktif
    </h3>

    <!-- Grid Proyek Dinamis -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-slate-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition duration-300 flex flex-col">
                
                <!-- Image Proyek -->
                <div class="h-52 w-full bg-slate-100 dark:bg-gray-700 overflow-hidden relative">
                    @if($project->image_path)
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs">Tidak Ada Gambar</div>
                    @endif
                </div>

                <!-- Detail Card -->
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-[10px] font-bold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-950/40 px-2 py-1 rounded w-fit uppercase mb-3">
                        {{ $category->name }}
                    </span>
                    
                    <h4 class="text-base font-bold text-gray-900 dark:text-white mb-2 uppercase line-clamp-2">
                        {{ $project->title }}
                    </h4>
                    
                    <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-3 mb-4 leading-relaxed">
                        {{ $project->description }}
                    </p>

                    <!-- Meta Data Lokasi & Tahun -->
                    <div class="mt-auto pt-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center text-[11px] text-gray-400 font-medium font-mono">
                        <span>📍 {{ $project->location ?? '-' }}</span>
                        <span>🗓️ Th. {{ $project->year ?? '-' }}</span>
                    </div>

                    <!-- Tombol Detail Proyek -->
                    <a href="{{ route('admin.project.index') }}" class="mt-4 block text-center bg-slate-900 hover:bg-slate-800 dark:bg-blue-600 dark:hover:bg-blue-700 text-white text-xs font-semibold py-2.5 rounded-lg transition">
                        Lihat Detail Proyek
                    </a>
                </div>
            </div>
        @empty
            <!-- Tampilan Jika Kategori Ini Belum Punya Data Proyek -->
            <div class="col-span-1 md:col-span-3 text-center py-16 bg-slate-50 dark:bg-gray-800/50 rounded-2xl border border-dashed border-slate-200 dark:border-gray-700">
                <p class="text-gray-400 dark:text-gray-500 text-sm">Belum ada data proyek portofolio yang ditambahkan untuk kategori ini.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
@include('partials.footer')