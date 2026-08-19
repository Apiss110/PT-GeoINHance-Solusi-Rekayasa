<x-app-layout>
    <div class="container mx-auto px-6 py-8">

    {{-- Header & Tombol Kembali --}}
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-gray-700 text-3xl font-medium">
                Edit Halaman Utama Portofolio
            </h3>
            <p class="text-gray-500 text-sm mt-1">
                Ubah informasi kategori, deskripsi halaman, atau ganti gambar banner utama.
            </p>
        </div>
        <a href="{{ route('admin.project-pages.index') }}" 
           class="px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition shadow-sm">
            &larr; Kembali
        </a>
    </div>

    {{-- Alert Error jika Validasi Gagal --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl shadow-sm mb-6">
            <p class="text-sm font-semibold mb-1">Terdapat kesalahan input:</p>
            <ul class="list-disc list-inside text-xs space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card Form Edit --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-gray-700">Formulir Edit Halaman Portofolio</h3>
            <p class="text-gray-500 text-sm mt-1">Perbarui informasi halaman kategori portofolio.</p>
        </div>
        
        <form action="{{ route('admin.project-pages.update', $projectPage->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama Halaman Kategori --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Halaman Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $projectPage->name) }}" required
                       placeholder="Masukkan nama halaman kategori..."
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                <p class="text-xs text-gray-500 mt-1.5">Slug saat ini: <code class="text-[#0e1d82] font-mono font-semibold">{{ $projectPage->slug }}</code></p>
            </div>

            {{-- Banner Image --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Banner Image <span class="text-gray-400 font-normal text-xs">(Biarkan kosong jika tidak ingin mengubah)</span>
                </label>

                {{-- Gambar Saat Ini & Preview Baru --}}
                <div class="flex flex-wrap items-center gap-4 mb-4">
                    @if($projectPage->banner_image)
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-xl">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Banner Saat Ini:</p>
                            <div class="w-40 h-24 bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                                <img src="{{ asset('storage/' . $projectPage->banner_image) }}" class="w-full h-full object-cover" id="oldBannerView">
                            </div>
                        </div>
                    @else
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-xl">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Banner Saat Ini:</p>
                            <div class="w-40 h-24 bg-gray-100 rounded-lg border border-gray-300 border-dashed flex items-center justify-center text-gray-400 text-xs">
                                No Banner
                            </div>
                        </div>
                    @endif

                    {{-- Live Preview Gambar Baru --}}
                    <div id="newPreviewWrapper" class="p-3 bg-gray-50 border border-blue-200 rounded-xl hidden">
                        <p class="text-xs font-semibold text-[#0e1d82] uppercase tracking-wider mb-2">Preview Baru:</p>
                        <div class="w-40 h-24 bg-gray-100 rounded-lg overflow-hidden border border-[#0e1d82]/30">
                            <img id="editBannerPreview" src="#" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <input type="file" name="banner_image" id="editBannerInput" accept="image/*"
                       class="w-full text-sm border border-gray-200 bg-white rounded-lg p-2 cursor-pointer text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#0e1d82] file:text-white hover:file:bg-[#0e1d82]/90">
            </div>

            {{-- Deskripsi Singkat Halaman --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Singkat Halaman <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition min-h-[200px]">{{ old('description', $projectPage->description) }}</textarea>
            </div>

            {{-- Status Aktif --}}
            <div class="flex items-center pt-2">
                <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $projectPage->is_active ?? true) ? 'checked' : '' }} 
                    class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] h-4 w-4">
                <label for="is_active" class="ml-2.5 text-sm font-medium text-gray-700 cursor-pointer">Aktifkan halaman di dropdown menu</label>
            </div>

            {{-- Footer Button --}}
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.project-pages.index') }}" 
                   class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition cursor-pointer">
                    Perbarui Halaman
                </button>
            </div>
        </form>
    </div>
</div>

    {{-- Script TinyMCE & Preview Gambar --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#description',
                height: 420,
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

            // Live Preview Script
            const editInput = document.getElementById('editBannerInput');
            const editPreview = document.getElementById('editBannerPreview');
            const previewWrapper = document.getElementById('newPreviewWrapper');

            if (editInput && editPreview) {
                editInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        editPreview.src = URL.createObjectURL(file);
                        previewWrapper.classList.remove('hidden');
                    } else {
                        previewWrapper.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-app-layout>