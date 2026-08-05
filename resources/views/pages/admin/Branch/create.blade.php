<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">
                    {{ isset($isEdit) && $isEdit ? 'Edit Titik Peta' : 'Tambah Titik Peta Baru' }}
                </h3>
                <p class="text-gray-500 text-sm mt-1">
                    {{ isset($isEdit) && $isEdit ? 'Perbarui informasi dan koordinat titik peta proyek' : 'Tambahkan titik peta proyek baru beserta koordinat dan detailnya' }}
                </p>
            </div>
            <div>
                <a href="{{ route('admin.branches.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm inline-flex items-center transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <form action="{{ isset($isEdit) && $isEdit ? route('admin.branches.update', $branch->id) : route('admin.branches.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @if(isset($isEdit) && $isEdit)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Input Daerah --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Daerah / Kota <span class="text-red-500">*</span></label>
                        <input type="text" name="daerah" value="{{ old('daerah', $branch->daerah ?? '') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('daerah') border-red-500 @enderror" 
                            placeholder="Contoh: bandung">
                        @error('daerah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Input Judul --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Title / Nama Proyek <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $branch->title ?? '') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('title') border-red-500 @enderror" 
                            placeholder="Contoh: MAIN OFFICE - BANDUNG">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Input Deskripsi --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Proyek</label>
                        <textarea name="desc" rows="4" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition resize-none @error('desc') border-red-500 @enderror" 
                            placeholder="Tuliskan deskripsi operasional cabang...">{{ old('desc', $branch->desc ?? '') }}</textarea>
                        @error('desc') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Pilihan Relasi Proyek --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Hubungkan ke Halaman Proyek</label>
                        <select name="project_id" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition bg-white @error('project_id') border-red-500 @enderror">
                            <option value="">-- Pilih Proyek Strategis --</option>
                            @foreach($strategicProjects as $project)
                                <option value="{{ $project->id }}" 
                                    {{ (old('project_id', isset($branch) ? $branch->project_id : '') == $project->id) ? 'selected' : '' }}>
                                    {{ $project->title }} ({{ $project->year ?? 'Tanpa Tahun' }})
                                </option>
                            @endforeach
                        </select>
                        @error('project_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Input Berkas Gambar --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Proyek</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-[#0e1d82] transition dynamic-file-zone">
                            <div class="space-y-1 text-center w-full">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20L32 8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M28 8v12h12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="project-img-input" class="relative cursor-pointer bg-white rounded-md font-medium text-[#0e1d82] hover:text-[#0e1d82]/80 focus-within:outline-none">
                                        <span>Unggah foto proyek</span>
                                        <input type="file" name="img" id="project-img-input" accept="image/*" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">Format: JPG, JPEG, PNG, WEBP (Maksimal 5MB).</p>
                                @if(isset($isEdit) && $isEdit && !empty($branch->img))
                                    <p class="text-[11px] text-gray-400 mt-1">💡 Biarkan kosong jika tidak ingin mengubah foto cabang lama.</p>
                                @endif
                                @error('img') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                                {{-- Preview Gambar --}}
                                <div id="project-preview-container" class="mt-4 {{ (isset($isEdit) && $isEdit && !empty($branch->img)) ? '' : 'hidden' }}">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Preview Gambar Terpilih:</p>
                                    <div class="relative inline-block border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm max-w-xs">
                                        <img id="project-preview-image" 
                                            src="{{ (isset($isEdit) && $isEdit && !empty($branch->img)) ? asset('storage/' . $branch->img) : '#' }}" 
                                            alt="Preview Foto Proyek" 
                                            class="h-40 w-auto object-cover"
                                            data-old-src="{{ (isset($isEdit) && $isEdit && !empty($branch->img)) ? asset('storage/' . $branch->img) : '#' }}">
                                        
                                        <button type="button" id="remove-project-img" class="absolute top-1 right-1 bg-red-600 text-white p-1 rounded-full hover:bg-red-700 transition-colors shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Input Koordinat --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Latitude <span class="text-red-500">*</span></label>
                        <input type="text" name="lat" value="{{ old('lat', $branch->lat ?? '') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('lat') border-red-500 @enderror" 
                            placeholder="-6.9175">
                        @error('lat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Longitude <span class="text-red-500">*</span></label>
                        <input type="text" name="lng" value="{{ old('lng', $branch->lng ?? '') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('lng') border-red-500 @enderror" 
                            placeholder="107.6191">
                        @error('lng') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end pt-4 border-t border-gray-100 space-x-3">
                    <a href="{{ route('admin.branches.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition">
                        {{ isset($isEdit) && $isEdit ? 'Simpan Perubahan' : 'Publish ke Peta' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imgInput = document.getElementById('project-img-input');
            const previewContainer = document.getElementById('project-preview-container');
            const previewImage = document.getElementById('project-preview-image');
            const removeButton = document.getElementById('remove-project-img');
            const oldSrc = previewImage.getAttribute('data-old-src');

            imgInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    resetToDefault();
                }
            });

            removeButton.addEventListener('click', function() {
                resetToDefault();
            });

            function resetToDefault() {
                imgInput.value = '';
                if (oldSrc && oldSrc !== '#') {
                    previewImage.src = oldSrc;
                    previewContainer.classList.remove('hidden');
                } else {
                    previewImage.src = '#';
                    previewContainer.classList.add('hidden');
                }
            }
        });
    </script>
</x-app-layout>