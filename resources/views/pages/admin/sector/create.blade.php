<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Tambah Sektor Baru</h3>
                <p class="text-gray-500 text-sm mt-1">Dendaftarkan sektor baru beserta banner dan isi konten detailnya</p>
            </div>
            <div>
                <a href="{{ route('admin.sector.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm inline-flex items-center transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <form action="{{ route('admin.sector.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- 1. Input Nama Sektor --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Sektor <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('name') border-red-500 @enderror"
                            placeholder="Contoh: Pertambangan, Infrastruktur Transportasi">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 2. Input Foto Banner Sektor --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Foto Banner Sektor
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-[#0e1d82] transition dynamic-file-zone">
                            <div class="space-y-1 text-center w-full">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20L32 8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M28 8v12h12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="sectorBannerInput" class="relative cursor-pointer bg-white rounded-md font-medium text-[#0e1d82] hover:text-[#0e1d82]/80 focus-within:outline-none">
                                        <span>Unggah file banner</span>
                                        <input id="sectorBannerInput" name="banner_image" type="file" accept=".jpg,.jpeg,.png,.webp" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">Format standar: JPG, JPEG, PNG, WEBP (Maksimal 5MB).</p>
                                <p id="sector-banner-name" class="text-sm font-semibold text-emerald-600 mt-2 hidden"></p>
                            </div>
                        </div>
                        @error('banner_image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 3. Input Deskripsi Sektor (TinyMCE) --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi / Isi Konten Sektor <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" id="description" rows="12"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('description') border-red-500 @enderror"
                            placeholder="Tuliskan peran geoteknik/geodesi serta solusi detail di sektor ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end pt-4 border-t border-gray-100 space-x-3">
                    <a href="{{ route('admin.sector.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition">
                        Simpan & Daftarkan Sektor
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Mengubah CDN ke Cloudflare cdnjs agar benar-benar lepas dari deteksi Cloud API Key TinyMCE --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Helper Preview Nama File Banner Sektor
            const bannerInput = document.getElementById('sectorBannerInput');
            const bannerName = document.getElementById('sector-banner-name');
            if (bannerInput) {
                bannerInput.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        bannerName.textContent = "Terpilih: " + e.target.files[0].name;
                        bannerName.classList.remove('hidden');
                    } else {
                        bannerName.classList.add('hidden');
                    }
                });
            }

            // Inisialisasi TinyMCE Premium-Look (Clean Version)
            tinymce.init({
                selector: '#description',
                height: 420,
                
                // KUNCI UTAMA: Menghilangkan tombol "Upgrade" & Watermark teks TinyMCE di bawah
                promotion: false,
                branding: false,
                
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview | insertfile image media link codesample | code',
                toolbar_sticky: true,
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                content_style: 'body { font-family:Plus Jakarta Sans,Helvetica,Arial,sans-serif; font-size:14px }'
            });
        });
    </script>
</x-app-layout>