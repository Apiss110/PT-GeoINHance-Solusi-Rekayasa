<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.video.index') }}" class="p-2 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition-colors" title="Kembali">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Video Dokumentasi Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
            <div class="mb-6 pb-4 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#0e1d82]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Formulir Tambah Video
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">Lengkapi seluruh informasi data video di bawah ini dengan benar.</p>
                </div>
            </div>

            <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Judul Video --}}
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                            Judul Video <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" required value="{{ old('title') }}"
                               class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                               placeholder="Contoh: Simulasi Konten 3D Finite Element Method">
                        @error('title') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    {{-- Kategori Konten --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                            Kategori Konten <span class="text-red-500">*</span>
                        </label>
                        <select name="category" required
                                class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all bg-white">
                            <option value="" disabled selected>Pilih Kategori...</option>
                            <option value="3D Simulation & Animation" {{ old('category') == '3D Simulation & Animation' ? 'selected' : '' }}>3D Simulation & Animation</option>
                            <option value="Project Documentation" {{ old('category') == 'Project Documentation' ? 'selected' : '' }}>Project Documentation</option>
                            <option value="Technical Tutorials & Webinars" {{ old('category') == 'Technical Tutorials & Webinars' ? 'selected' : '' }}>Technical Tutorials & Webinars</option>
                        </select>
                        @error('category') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tahun Produksi --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                            Tahun Produksi <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="production_year" required min="2000" max="2030" value="{{ old('production_year', date('Y')) }}"
                               class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                               placeholder="Contoh: 2026">
                        @error('production_year') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    {{-- Link URL Video --}}
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                            Link URL Video (YouTube / Drive) <span class="text-red-500">*</span>
                        </label>
                        <input type="url" name="video_url" required value="{{ old('video_url') }}"
                               class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                               placeholder="https://www.youtube.com/watch?v=...">
                        @error('video_url') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    {{-- Gambar Thumbnail --}}
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                            Gambar Thumbnail <span class="text-red-500">*</span>
                        </label>
                        
                        <div class="mt-1 flex justify-center px-6 pt-6 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:border-blue-500 transition-colors relative bg-slate-50/50">
                            
                            {{-- State Sebelum Upload --}}
                            <div id="upload-placeholder" class="space-y-2 text-center">
                                <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4-4m6-6h10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex justify-center text-xs text-slate-600">
                                    <label class="relative cursor-pointer bg-white px-3 py-1.5 rounded-lg border border-slate-200 font-bold text-blue-600 hover:text-blue-500 hover:bg-blue-50 focus-within:outline-none shadow-sm transition-all">
                                        <span>Unggah File Thumbnail</span>
                                        <input type="file" name="thumbnail" id="thumbnail-input" required class="sr-only" accept="image/*">
                                    </label>
                                </div>
                                <p class="text-[11px] text-slate-400">PNG, JPG, WEBP hingga 5MB</p>
                            </div>

                            {{-- State Preview Setelah Memilih Gambar --}}
                            <div id="thumbnail-preview-container" class="hidden w-full flex flex-col items-center justify-center">
                                <div class="relative border rounded-xl overflow-hidden bg-white shadow-md max-w-sm">
                                    <img id="thumbnail-preview" src="#" alt="Preview" class="h-44 w-auto object-cover">
                                    
                                    <button type="button" id="remove-thumbnail" class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full transition-colors shadow-md z-10" title="Batal / Ganti Gambar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-slate-500 font-medium mt-2">
                                    Klik tombol merah untuk mengganti gambar.
                                </p>
                            </div>

                        </div>
                        @error('thumbnail') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    {{-- Deskripsi Ringkas --}}
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">
                            Deskripsi Ringkas
                        </label>
                        <textarea name="description" rows="4" 
                                  class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all" 
                                  placeholder="Tulis ringkasan mengenai isi dokumentasi teknis ini...">{{ old('description') }}</textarea>
                    </div>
                </div>

                {{-- Tombol Aksi Simpan / Batal --}}
                <div class="pt-4 border-t border-slate-100 flex items-center justify-end space-x-3">
                    <a href="{{ route('admin.video.index') }}" class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition-all">
                        Batal
                    </a>
                    <button type="submit" class="bg-[#0e1d82] hover:bg-[#0c196e] text-white text-sm font-bold py-2.5 px-6 rounded-xl shadow-sm transition-all cursor-pointer">
                        Simpan Data Video
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- Script JavaScript Preview Thumbnail --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fileInput = document.getElementById('thumbnail-input');
            const placeholder = document.getElementById('upload-placeholder');
            const previewContainer = document.getElementById('thumbnail-preview-container');
            const previewImg = document.getElementById('thumbnail-preview');
            const removeBtn = document.getElementById('remove-thumbnail');

            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        placeholder.classList.add('hidden');
                        previewContainer.classList.remove('hidden');
                    }

                    reader.readAsDataURL(file);
                } else {
                    resetThumbnailPreview();
                }
            });

            removeBtn.addEventListener('click', function() {
                resetThumbnailPreview();
            });

            function resetThumbnailPreview() {
                fileInput.value = '';
                previewImg.src = '#';
                previewContainer.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>