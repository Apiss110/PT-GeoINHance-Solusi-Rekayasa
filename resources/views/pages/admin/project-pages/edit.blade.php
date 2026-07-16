<x-app-layout>
    <div class="max-w-5xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-black text-white tracking-tight">Edit Halaman Utama Portofolio</h1>
            <p class="text-sm text-slate-400">Ubah informasi kategori, deskripsi halaman, atau ganti gambar banner utama.</p>
        </div>

        {{-- Menampilkan Error Validasi jika Ada --}}
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Edit Halaman Proyek --}}
        <form action="{{ route('admin.project-pages.update', $projectPage->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kiri: Informasi Nama Halaman & Kategori --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Nama Halaman Kategori *</label>
                        <input type="text" name="name" value="{{ old('name', $projectPage->name) }}" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                        <p class="text-xs text-slate-500 mt-1.5">Slug saat ini: <code class="text-blue-400 font-mono">{{ $projectPage->slug }}</code></p>
                    </div>
                </div>

                {{-- Kanan: Gambar Banner Halaman --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-3">
                    <label class="block text-sm font-medium text-slate-300">Banner Image Sekarang</label>
                    
                    <div class="flex items-center gap-4">
                        @if($projectPage->banner_image)
                            <div class="w-32 h-20 bg-slate-800 rounded-lg overflow-hidden border border-slate-700 flex-shrink-0">
                                <img src="{{ asset('storage/' . $projectPage->banner_image) }}" class="w-full h-full object-cover" id="oldBannerView">
                            </div>
                        @else
                            <div class="w-32 h-20 bg-slate-800 rounded-lg border border-slate-700 border-dashed flex items-center justify-center text-slate-500 text-xs flex-shrink-0">
                                No Banner
                            </div>
                        @endif

                        {{-- Wadah Live Preview jika user memilih file baru --}}
                        <div id="newPreviewWrapper" class="w-32 h-20 bg-slate-800 rounded-lg overflow-hidden border border-blue-500/50 hidden">
                            <img id="editBannerPreview" src="#" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <input type="file" name="banner_image" id="editBannerInput" class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer" accept="image/*">
                    <p class="text-[11px] text-slate-500">Biarkan kosong jika tidak ingin mengubah banner halaman kategori.</p>
                </div>
            </div>

            {{-- Deskripsi Singkat Halaman --}}
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <label class="block text-sm font-medium text-slate-300 mb-2">Deskripsi Singkat Halaman *</label>
                {{-- PERBAIKAN: id diganti ke 'description' agar dibaca oleh inisialisasi TinyMCE baru --}}
                <textarea name="description" id="description" class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4 text-white min-h-[200px]">{{ old('description', $projectPage->description) }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.project-pages.index') }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-lg text-sm font-medium transition">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">Perbarui Halaman</button>
            </div>
        </form>
    </div>

    {{-- Mengubah CDN ke Cloudflare cdnjs agar benar-benar lepas dari deteksi Cloud API Key TinyMCE --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

            // SINKRONISASI: Script Live Preview File Gambar Baru (Tetap Dipertahankan)
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