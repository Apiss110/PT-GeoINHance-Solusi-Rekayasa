<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Video Dokumentasi') }}
            </h2>
            <span class="text-xs bg-blue-100 text-[#0e1d82] font-semibold px-3 py-1 rounded-full">
                {{ $videos->count() }} Total Video
            </span>
        </div>
    </x-slot>

    <div class="py-6">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl text-green-700 text-sm font-medium shadow-sm flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sticky top-6">
                <h3 class="text-base font-bold text-gray-900 mb-4 pb-3 border-b border-slate-100 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-[#0e1d82]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Tambah Video Baru
                </h3>

                <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Judul Video <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required value="{{ old('title') }}"
                               class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                               placeholder="Contoh: Simulasi Konten 3D Finite Element Method">
                        @error('title') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Kategori Konten <span class="text-red-500">*</span></label>
                        <select name="category" required
                                class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all bg-white">
                            <option value="" disabled selected>Pilih Kategori...</option>
                            <option value="3D Simulation & Animation" {{ old('category') == '3D Simulation & Animation' ? 'selected' : '' }}>3D Simulation & Animation</option>
                            <option value="Project Documentation" {{ old('category') == 'Project Documentation' ? 'selected' : '' }}>Project Documentation</option>
                            <option value="Technical Tutorials & Webinars" {{ old('category') == 'Technical Tutorials & Webinars' ? 'selected' : '' }}>Technical Tutorials & Webinars</option>
                        </select>
                        @error('category') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Link URL Video (YouTube/Drive) <span class="text-red-500">*</span></label>
                        <input type="url" name="video_url" required value="{{ old('video_url') }}"
                               class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                               placeholder="https://www.youtube.com/watch?v=...">
                        @error('video_url') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Tahun Produksi <span class="text-red-500">*</span></label>
                            <input type="number" name="production_year" required min="2000" max="2030" value="{{ old('production_year', date('Y')) }}"
                                class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                placeholder="Contoh: 2026">
                            @error('production_year') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Gambar Thumbnail <span class="text-red-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-4 pb-4 border-2 border-slate-300 border-dashed rounded-lg hover:border-blue-500 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-8 w-8 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4-4m6-6h10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-xs text-slate-600">
                                    <label class="relative cursor-pointer bg-white rounded-md font-bold text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                        <span>Unggah File</span>
                                        <input type="file" name="thumbnail" required class="sr-only" accept="image/*">
                                    </label>
                                </div>
                                <p class="text-[10px] text-slate-400">PNG, JPG up to 2MB</p>
                            </div>
                        </div>
                        @error('thumbnail') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Deskripsi Ringkas</label>
                        <textarea name="description" rows="3" 
                                  class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all rows-3" 
                                  placeholder="Tulis ringkasan mengenai isi dokumentasi teknis ini..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#0e1d82] hover:bg-[#0c196e] text-white text-sm font-bold py-2.5 px-4 rounded-lg shadow-sm transition-all text-center">
                        Simpan Data Video
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-base font-bold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        List Koleksi Video Aktif
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-[10px] font-bold uppercase tracking-wider">
                                <th class="py-3 px-4 w-28">Thumbnail</th>
                                <th class="py-3 px-4">Informasi Video</th>
                                <th class="py-3 px-4 w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm text-gray-700">
                            @forelse($videos as $video)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-4 px-4 vertical-top">
                                        <div class="w-24 aspect-video rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm relative">
                                            <img src="{{ asset('storage/' . $video->thumbnail_path) }}" class="w-full h-full object-cover" alt="Cover">
                                        </div>
                                    </td>
                                    
                                    <td class="py-4 px-4">
                                        <div class="mb-1">
                                            <span class="inline-block bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-wide">
                                                {{ $video->category }}
                                            </span>
                                            @if($video->duration)
                                                <span class="text-xs font-mono text-gray-400 ml-2">⏱️ {{ $video->duration }}</span>
                                            @endif
                                        </div>
                                        <h4 class="font-bold text-gray-900 leading-snug mb-1">{{ $video->title }}</h4>
                                        <p class="text-xs text-gray-400 font-medium mb-1 flex items-center">
                                            📅 {{ \Carbon\Carbon::parse($video->published_at)->translatedFormat('d F Y') }}
                                        </p>
                                        <a href="{{ $video->video_url }}" target="_blank" class="text-xs text-blue-600 hover:underline inline-flex items-center font-medium">
                                            🔗 Buka Link Source 
                                        </a>
                                    </td>

                                    <td class="py-4 px-4">
                                        <div class="flex items-center space-x-1">
                                            <a href="{{ route('admin.video.edit', $video->id) }}" 
                                               class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors cursor-pointer" 
                                               title="Edit Konten">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('admin.video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumentasi video ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors cursor-pointer" title="Hapus Konten">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-12 px-4 text-center text-slate-400">
                                        <svg class="w-10 h-10 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"></path>
                                        </svg>
                                        <p class="font-semibold text-sm">Belum ada rekaman data video.</p>
                                        <p class="text-xs text-slate-400 mt-0.5">Isi form di sebelah kiri untuk menambahkan data baru.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>