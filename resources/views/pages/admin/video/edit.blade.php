<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Edit Video Dokumentasi') }}
            </h2>
            <a href="{{ route('admin.video.index') }}" class="text-xs bg-slate-100 hover:bg-slate-200 text-gray-700 font-semibold px-4 py-2 rounded-lg transition-all">
                ← Kembali ke List
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="w-full mx-auto">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <h3 class="text-base font-bold text-gray-900 mb-4 pb-3 border-b border-slate-100 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-[#0e1d82]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    Ubah Detail Informasi Video
                </h3>

                <form action="{{ route('admin.video.update', $video->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Judul Video <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required value="{{ old('title', $video->title) }}"
                               class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                               placeholder="Contoh: Simulasi Konten 3D Finite Element Method">
                        @error('title') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Kategori Konten <span class="text-red-500">*</span></label>
                        <select name="category" required
                                class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all bg-white">
                            <option value="3D Simulation & Animation" {{ old('category', $video->category) == '3D Simulation & Animation' ? 'selected' : '' }}>3D Simulation & Animation</option>
                            <option value="Project Documentation" {{ old('category', $video->category) == 'Project Documentation' ? 'selected' : '' }}>Project Documentation</option>
                            <option value="Technical Tutorials & Webinars" {{ old('category', $video->category) == 'Technical Tutorials & Webinars' ? 'selected' : '' }}>Technical Tutorials & Webinars</option>
                        </select>
                        @error('category') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Link URL Video (YouTube/Drive) <span class="text-red-500">*</span></label>
                        <input type="url" name="video_url" required value="{{ old('video_url', $video->video_url) }}"
                               class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                               placeholder="https://www.youtube.com/watch?v=...">
                        @error('video_url') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Tahun Produksi <span class="text-red-500">*</span></label>
                            <input type="number" name="production_year" required min="2000" max="2030" value="{{ old('production_year', $video->production_year) }}"
                                class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                            @error('production_year') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <input type="hidden" name="published_at" value="{{ $video->published_at }}">

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Gambar Thumbnail</label>
                        
                        <div class="mb-2 flex items-center space-x-3 bg-slate-50 p-2 rounded-lg border border-slate-200">
                            <div class="w-24 aspect-video rounded overflow-hidden bg-slate-200 border">
                                <img src="{{ asset('storage/' . $video->thumbnail_path) }}" class="w-full h-full object-cover" alt="Current Cover">
                            </div>
                            <span class="text-[11px] text-slate-500 font-medium">Thumbnail aktif saat ini. Biarkan kosong jika tidak ingin mengubahnya.</span>
                        </div>

                        <div class="mt-1 flex justify-center px-6 pt-4 pb-4 border-2 border-slate-300 border-dashed rounded-lg hover:border-blue-500 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-8 w-8 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4-4m6-6h10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-xs text-slate-600 justify-center">
                                    <label class="relative cursor-pointer bg-white rounded-md font-bold text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                        <span>Ganti File Thumbnail</span>
                                        <input type="file" name="thumbnail" class="sr-only" accept="image/*">
                                    </label>
                                </div>
                                <p class="text-[10px] text-slate-400">PNG, JPG up to 5MB</p>
                            </div>
                        </div>
                        @error('thumbnail') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Deskripsi Ringkas</label>
                        <textarea name="description" rows="3" 
                                  class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                                  placeholder="Tulis ringkasan mengenai isi dokumentasi teknis ini...">{{ old('description', $video->description) }}</textarea>
                        @error('description') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full bg-[#0e1d82] hover:bg-[#0c196e] text-white text-sm font-bold py-2.5 px-4 rounded-lg shadow-sm transition-all text-center cursor-pointer">
                        Perbarui Informasi Video
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>