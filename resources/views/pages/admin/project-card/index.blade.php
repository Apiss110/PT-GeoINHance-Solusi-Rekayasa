<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Proyek Strategis (Slider Portofolio & Sektor)') }}
        </h2>
    </x-slot>

    {{-- Alpine.js hanya digunakan untuk fitur Bulk Selection (Centang Massal) --}}
    <div class="py-6" x-data="{ 
        selectedIds: [],
        allIds: [],
        toggleAll() {
            if (this.selectedIds.length === this.allIds.length) {
                this.selectedIds = [];
            } else {
                this.selectedIds = [...this.allIds];
            }
        }
    }" x-init="allIds = [ @foreach($projects as $p) '{{ $p->id }}', @endforeach ]">
        
        <!-- 📁 PERBAIKAN UTAMA: Mengubah max-w-7xl menjadi w-full agar melebar maksimal ke samping -->
        <div class="w-full px-4 sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg shadow mb-2">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORM TAMBAH PROYEK BARU (Lebar Maksimal) --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 w-full">
                <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2">
                    Tambah Proyek Baru
                </h2>
                
                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Kategori Halaman Proyek <span class="text-red-500">*</span></label>
                            <select name="project_category_id" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- Pilih Halaman Kategori --</option>
                                @foreach(\App\Models\ProjectPage::where('is_active', 1)->get() as $page)
                                    <option value="{{ $page->id }}" {{ old('project_category_id') == $page->id ? 'selected' : '' }}>
                                        {{ $page->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Kategori Sektor Dropdown <span class="text-red-500">*</span></label>
                            <select name="sector_id" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- Pilih Sektor Halaman --</option>
                                @foreach($sectors as $sector)
                                    <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>
                                        {{ $sector->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Nama / Judul Proyek <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: ANALISIS STABILITAS LERENG TOL">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Deskripsi / Isi Konten <span class="text-red-500">*</span></label>
                        <textarea id="projectDescription" name="description" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Tuliskan deskripsi lengkap proyek...">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Lokasi <span class="text-red-500">*</span></label>
                            <input type="text" name="location" value="{{ old('location') }}" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Tahun <span class="text-red-500">*</span></label>
                            <input type="number" name="year" min="2000" max="2100" value="{{ old('year', 2026) }}" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Foto Proyek <span class="text-red-500">*</span></label>
                            <input type="file" id="projectImageInput" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-1.5 cursor-pointer text-gray-500" required>
                        </div>
                    </div>

                    <!-- Wadah Live Preview Mengikuti Lebar Penuh -->
                    <div id="projectPreviewContainer" class="mt-3 p-4 bg-gray-50 dark:bg-gray-900 border border-dashed border-gray-300 dark:border-gray-700 rounded-xl hidden flex justify-center items-center">
                        <img id="projectImagePreview" src="#" class="w-full max-h-[450px] object-contain rounded-lg shadow-sm">
                    </div>
                    
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center transition shadow-sm cursor-pointer">
                            Simpan & Daftarkan Proyek
                        </button>
                    </div>
                </form>
            </div>

            {{-- DAFTAR PROYEK AKTIF (Ikut Melebar Otomatis) --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 w-full">
                <form id="bulkDeleteForm" action="{{ route('admin.project.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                    @csrf
                    @method('DELETE')

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-100 dark:border-gray-700 pb-3 mb-4 gap-2">
                        <h2 class="text-xl font-semibold text-gray-700 dark:text-white">Daftar Proyek Aktif</h2>
                        <div x-show="selectedIds.length > 0" x-cloak>
                            <button type="submit" class="text-xs font-bold text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg transition shadow-sm">
                                Hapus Terpilih (<span x-text="selectedIds.length"></span>)
                            </button>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4 w-10 text-center">
                                        <input type="checkbox" @click="toggleAll()" :checked="selectedIds.length === allIds.length && allIds.length > 0" class="w-4 h-4 rounded cursor-pointer">
                                    </th>
                                    <th scope="col" class="px-4 py-3 w-44">Preview</th>
                                    <th scope="col" class="px-4 py-3">Detail Proyek</th>
                                    <th scope="col" class="px-4 py-3 text-center w-32">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $project)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                        <td class="p-4 text-center align-middle">
                                            <input type="checkbox" name="ids[]" value="{{ $project->id }}" x-model="selectedIds" class="w-4 h-4 rounded cursor-pointer">
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <img src="{{ asset('storage/' . $project->image_path) }}" class="w-36 h-24 object-cover rounded-md border border-gray-200 dark:border-gray-600">
                                        </td>
                                        <td class="px-4 py-3 align-middle">
                                            <div class="flex flex-wrap gap-1.5">
                                                <span class="bg-red-100 text-red-800 text-[10px] font-bold px-2 py-0.5 rounded dark:bg-red-900/40 dark:text-red-300 uppercase">
                                                    📁 {{ $project->projectPage->name ?? 'Tanpa Kategori' }}
                                                </span>
                                                <span class="bg-blue-100 text-blue-800 text-[10px] font-bold px-2 py-0.5 rounded dark:bg-blue-900/40 dark:text-blue-300 uppercase">
                                                    ⚓ {{ $project->sector->name ?? 'Tanpa Sektor' }}
                                                </span>
                                            </div>
                                            <div class="text-base font-bold text-gray-900 dark:text-white mt-1 uppercase">{{ $project->title }}</div>
                                            <p class="text-xs text-gray-400 mt-1 line-clamp-2">{!! strip_tags($project->description) !!}</p>
                                        </td>
                                        <td class="px-4 py-3 text-center whitespace-nowrap align-middle">
                                            <a href="{{ route('admin.project.edit', $project->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 transition">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">Belum ada portofolio proyek strategis.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#projectDescription',
                height: 350,
                promotion: false,
                branding: false,
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline | numlist bullist | fullscreen preview | code',
                // Tetap mempertahankan kanvas putih bersih sesuai screenshot referensi kamu
                content_style: 'body { font-family:Plus Jakarta Sans,Arial,sans-serif; font-size:14px; background-color: #ffffff; color: #111827; }'
            });

            // Preview Image Create Form
            const imageInput = document.getElementById('projectImageInput');
            const previewContainer = document.getElementById('projectPreviewContainer');
            const imagePreview = document.getElementById('projectImagePreview');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.setAttribute('src', e.target.result);
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</x-app-layout>