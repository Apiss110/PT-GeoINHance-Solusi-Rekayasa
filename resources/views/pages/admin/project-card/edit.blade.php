<x-app-layout>
    <!-- KONTENER UTAMA: Menggunakan lebar maksimal penuh (w-full) dengan latar terang -->
    <div class="w-full px-4 py-6 sm:px-6 lg:px-8 bg-gray-50 min-h-screen text-gray-900">
    
        <!-- Header Halaman -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Portofolio Proyek</h1>
            <p class="text-sm text-gray-500">Ubah spesifikasi, detail deskripsi, atau ganti foto hasil proyek rekayasa.</p>
        </div>

        <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- KONTENER VERTIKAL: Semua card otomatis melebar maksimal ke samping -->
            <div class="space-y-6 w-full">
                
                <!-- Card 1: Kategori Dropdown (Lebar Maksimal) -->
                <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-sm space-y-4 w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Halaman Proyek *</label>
                            <select name="project_category_id" class="w-full bg-white text-gray-900 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 shadow-sm">
                                @foreach($projectPages as $page)
                                    <option value="{{ $page->id }}" {{ $project->project_category_id == $page->id ? 'selected' : '' }}>{{ $page->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Sektor Dropdown *</label>
                            <select name="sector_id" class="w-full bg-white text-gray-900 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 shadow-sm">
                                @foreach($sectors as $sector)
                                    <option value="{{ $sector->id }}" {{ $project->sector_id == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Nama / Judul Proyek (Lebar Maksimal) -->
                <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-sm w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama / Judul Proyek *</label>
                    <input type="text" name="title" value="{{ $project->title }}" class="w-full bg-white text-gray-900 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 shadow-sm" placeholder="Masukkan nama / judul proyek...">
                </div>

                <!-- Card 3: Text Editor Deskripsi TinyMCE (Lebar Maksimal & Sangat Lega) -->
                <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-sm w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Lengkap Proyek *</label>
                    <div class="w-full bg-white rounded-lg text-gray-900">
                        <textarea name="description" id="editor" class="w-full bg-white text-gray-900 border-gray-300 rounded-lg p-2.5" rows="15">{{ $project->description }}</textarea>
                    </div>
                </div>

                <!-- Card 4: Atribut Metadata Lokasi & Tahun (Sudah Turun ke Bawah & Lebar) -->
                <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-sm w-full">
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3">Informasi Tambahan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi *</label>
                            <input type="text" name="location" value="{{ $project->location ?? '' }}" class="w-full bg-white text-gray-900 border-gray-300 rounded-lg p-2.5 shadow-sm" placeholder="Contoh: Bandung">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tahun *</label>
                            <input type="number" name="year" value="{{ $project->year ?? '2026' }}" class="w-full bg-white text-gray-900 border-gray-300 rounded-lg p-2.5 shadow-sm" placeholder="2026">
                        </div>
                    </div>
                </div>

                <!-- Card 5: Dokumentasi & Foto Proyek (Lebar Maksimal) -->
                <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-sm space-y-4 w-full">
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Dokumentasi & Foto Proyek</h3>
                    <hr class="border-gray-100">
                    
                    <label class="block text-sm font-medium text-gray-600 mb-1">Foto Terpasang / Preview:</label>
                    
                    <!-- Wadah Preview Gambar -->
                    <div id="editPreviewContainer" class="w-full rounded-xl overflow-hidden border border-gray-200 bg-gray-50 p-4 flex justify-center items-center {{ $project->image_path ? '' : 'hidden' }}">
                        <img id="editImagePreview" src="{{ $project->image_path ? asset('storage/' . $project->image_path) : '#' }}" class="w-full max-h-[500px] object-contain rounded-lg shadow-sm" alt="Foto Proyek">
                    </div>

                    <!-- Placeholder jika foto kosong -->
                    @if(!$project->image_path)
                        <div id="noImagePlaceholder" class="w-full rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 py-12 text-center text-sm text-gray-400">
                            Belum ada foto proyek yang terpasang. Silakan unggah foto di bawah ini.
                        </div>
                    @endif

                    <!-- Input File -->
                    <div class="space-y-2 pt-2">
                        <label class="block text-sm font-medium text-gray-700">Pilih Dokumen Foto Baru</label>
                        <input type="file" name="image" id="editImageInput" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                        <p class="text-xs text-gray-400">Biarkan kosong jika tidak ingin mengubah dokumentasi foto.</p>
                    </div>
                </div>

                <!-- Card 6: Tombol Aksi Simpan & Batal (Berjajar Rapi di Paling Bawah) -->
                <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-sm flex flex-col sm:flex-row items-center justify-end gap-4 w-full">
                    <a href="{{ route('admin.project.index') }}" class="w-full sm:w-auto text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-6 rounded-lg transition duration-200 minimum-w-[120px]">
                        Batal dan Kembali
                    </a>
                    <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-lg transition duration-200 shadow-md cursor-pointer">
                        Simpan Perubahan
                    </button>
                </div>

            </div>
            
        </form>
    </div>

    {{-- Script Validasi TinyMCE & Live Preview --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#editor',
                height: 450, // Dinaikkan sedikit agar mengetik teks deskripsi jauh lebih puas
                promotion: false,
                branding: false,
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | fullscreen preview | code',
                // Tetap mempertahankan warna putih bersih di kanvas ketik
                content_style: 'body { font-family:Plus Jakarta Sans,Arial,sans-serif; font-size:14px; background-color: #ffffff; color: #111827; }'
            });

            // Preview Live File Upload
            const editInput = document.getElementById('editImageInput');
            const previewContainer = document.getElementById('editPreviewContainer');
            const imagePreview = document.getElementById('editImagePreview');
            const placeholder = document.getElementById('noImagePlaceholder');

            editInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.setAttribute('src', e.target.result);
                        previewContainer.classList.remove('hidden');
                        if (placeholder) {
                            placeholder.classList.add('hidden');
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</x-app-layout>