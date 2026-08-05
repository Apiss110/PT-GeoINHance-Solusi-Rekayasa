<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        {{-- HEADER & BACK BUTTON --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Tambah Artikel Baru</h3>
                <p class="text-gray-500 text-sm mt-1">Buat dan publikasikan artikel atau insight baru ke sistem.</p>
            </div>
            <div>
                <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm inline-flex items-center transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        {{-- FORM TAMBAH ARTIKEL --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Artikel <span class="text-red-500">*</span></label>
                        <input type="text" name="category" value="{{ old('category') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('category') border-red-500 @enderror" 
                            placeholder="Masukkan kategori (misal: Proyek, Events, Geoteknik)" required>
                        @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tag --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tag <span class="text-red-500">*</span></label>
                        <input type="text" name="tag" value="{{ old('tag') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('tag') border-red-500 @enderror" 
                            placeholder="Contoh: Event, Proyek, Internal" required>
                        @error('tag') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Judul --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama / Judul Artikel <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('title') border-red-500 @enderror" 
                            placeholder="Tuliskan judul artikel..." required>
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Editor Konten (TinyMCE) --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi / Isi Konten <span class="text-red-500">*</span></label>
                        <textarea name="content" id="editor" rows="12"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                        @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Foto Artikel --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Artikel <span class="text-red-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-[#0e1d82] transition dynamic-file-zone">
                            <div class="space-y-1 text-center w-full">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20L32 8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M28 8v12h12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="imageInput" class="relative cursor-pointer bg-white rounded-md font-medium text-[#0e1d82] hover:text-[#0e1d82]/80 focus-within:outline-none">
                                        <span>Unggah file foto</span>
                                        <input id="imageInput" name="image" type="file" accept=".jpg,.jpeg,.png,.webp" class="sr-only" required>
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">Format: JPG, JPEG, PNG, WEBP (Maks 5MB).</p>
                                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                                <div id="previewContainer" class="mt-4 p-3 bg-gray-50 border border-dashed border-gray-300 rounded-xl hidden flex flex-col items-center">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Preview Gambar Terpilih:</p>
                                    <img id="imagePreview" src="#" class="h-32 w-auto object-cover rounded-xl shadow-sm border border-gray-200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="flex justify-end pt-4 border-t border-gray-100 space-x-3">
                    <a href="{{ route('admin.articles.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition">
                        Simpan & Daftarkan Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script TinyMCE & Image Preview --}}
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#editor',
                height: 420,
                promotion: false,
                branding: false,
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help charmap quickbars emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview | insertfile image media link codesample | code',
                toolbar_sticky: true,
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                content_style: 'body { font-family:Plus Jakarta Sans,Helvetica,Arial,sans-serif; font-size:14px }'
            });

            const imageInput = document.getElementById('imageInput');
            const previewContainer = document.getElementById('previewContainer');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.setAttribute('src', e.target.result);
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>