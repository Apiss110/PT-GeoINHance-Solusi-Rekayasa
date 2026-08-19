<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Tambah Halaman Proyek Baru</h3>
                <p class="text-gray-500 text-sm mt-1">Nama halaman yang Anda buat di sini akan langsung terdaftar di dropdown menu PROYEK</p>
            </div>
            <div>
                <a href="{{ route('admin.project-pages.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm inline-flex items-center transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <form action="{{ route('admin.project-pages.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <div class="space-y-6">
                    {{-- Nama Halaman Proyek --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Halaman Proyek <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('name') border-red-500 @enderror" 
                            placeholder="Contoh: Geotechnical Analysis" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Banner Image --}}
                    <div>
                        <label for="banner_image" class="block text-sm font-semibold text-gray-700 mb-2">
                            Banner Image <span class="text-gray-400 font-normal text-xs">(Opsional)</span>
                        </label>
                        
                        {{-- Live Preview Gambar --}}
                        <div id="createPreviewWrapper" class="p-3 bg-gray-50 border border-blue-200 rounded-xl hidden mb-3 max-w-xs">
                            <p class="text-xs font-semibold text-[#0e1d82] uppercase tracking-wider mb-2">Preview Gambar:</p>
                            <div class="w-40 h-24 bg-gray-100 rounded-lg overflow-hidden border border-[#0e1d82]/30">
                                <img id="createBannerPreview" src="#" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <input type="file" name="banner_image" id="createBannerInput" accept="image/*"
                            class="w-full text-sm border border-gray-200 bg-white rounded-lg p-2 cursor-pointer text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#0e1d82] file:text-white hover:file:bg-[#0e1d82]/90">
                        @error('banner_image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi Pengantar Halaman --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Pengantar Halaman <span class="text-red-500">*</span></label>
                        <textarea name="description" id="description" rows="4" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('description') border-red-500 @enderror" 
                            placeholder="Tulis deskripsi atau ringkasan penjelasan untuk halaman ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Checkbox Status Aktif --}}
                    <div class="flex items-center pt-2">
                        <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', true) ? 'checked' : '' }} 
                            class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] h-4 w-4">
                        <label for="is_active" class="ml-2.5 text-sm font-medium text-gray-700 cursor-pointer">Aktifkan halaman langsung di dropdown menu</label>
                        @error('is_active')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end pt-4 border-t border-gray-100 space-x-3">
                    <a href="{{ route('admin.project-pages.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition">
                        Simpan & Buat Halaman
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- TinyMCE Editor Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#description',
                height: 380,
                promotion: false,
                branding: false,
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview | insertfile image media link codesample | code',
                toolbar_sticky: true,
                content_style: 'body { font-family:Plus Jakarta Sans,Helvetica,Arial,sans-serif; font-size:14px }'
            });

            // Live Preview Banner
            const createInput = document.getElementById('createBannerInput');
            const createPreview = document.getElementById('createBannerPreview');
            const previewWrapper = document.getElementById('createPreviewWrapper');

            if (createInput && createPreview) {
                createInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        createPreview.src = URL.createObjectURL(file);
                        previewWrapper.classList.remove('hidden');
                    } else {
                        previewWrapper.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-app-layout>