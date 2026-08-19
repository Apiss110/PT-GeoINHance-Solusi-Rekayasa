<x-app-layout>
    {{-- Alpine.js untuk fitur Bulk Selection (Centang Massal) --}}
<div class="container mx-auto px-6 py-8" x-data="{ 
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
    
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-gray-700 text-3xl font-medium">
                Manajemen Proyek Strategis
            </h3>
            <p class="text-gray-500 text-sm mt-1">
                Slider Portofolio & Sektor Proyek Pembangunan
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-xl shadow-sm mb-6 flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded-xl shadow-sm mb-6 flex items-center justify-between">
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- FORM TAMBAH PROYEK BARU --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-gray-700">Tambah Proyek Baru</h3>
            <p class="text-gray-500 text-sm mt-1">Lengkapi formulir di bawah untuk mendaftarkan portofolio proyek baru.</p>
        </div>
        
        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Halaman Proyek <span class="text-red-500">*</span></label>
                    <select name="project_category_id" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                        <option value="">-- Pilih Halaman Kategori --</option>
                        @foreach(\App\Models\ProjectPage::where('is_active', 1)->get() as $page)
                            <option value="{{ $page->id }}" {{ old('project_category_id') == $page->id ? 'selected' : '' }}>
                                {{ $page->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Sektor Dropdown <span class="text-red-500">*</span></label>
                    <select name="sector_id" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                        <option value="">-- Pilih Sektor Halaman --</option>
                        @foreach($sectors as $sector)
                            <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>
                                {{ $sector->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama / Judul Proyek <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition" placeholder="Contoh: ANALISIS STABILITAS LERENG TOL">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi / Isi Konten <span class="text-red-500">*</span></label>
                <textarea id="projectDescription" name="description" rows="4" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition" placeholder="Tuliskan deskripsi lengkap proyek...">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi <span class="text-red-500">*</span></label>
                    <input type="text" name="location" value="{{ old('location') }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" name="year" min="2000" max="2100" value="{{ old('year', 2026) }}" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Proyek <span class="text-red-500">*</span></label>
                    <input type="file" id="projectImageInput" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm border border-gray-200 bg-white rounded-lg p-2 cursor-pointer text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#0e1d82] file:text-white hover:file:bg-[#0e1d82]/90" required>
                </div>
            </div>

            <div id="projectPreviewContainer" class="p-4 bg-gray-50 border border-dashed border-gray-200 rounded-xl hidden flex justify-center items-center">
                <img id="projectImagePreview" src="#" class="w-full max-h-[450px] object-contain rounded-lg shadow-sm">
            </div>
            
            <div class="flex justify-end pt-4 border-t border-gray-100">
                <button type="submit" class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition cursor-pointer">
                    Simpan & Daftarkan Proyek
                </button>
            </div>
        </form>
    </div>

    {{-- DAFTAR PROYEK AKTIF --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <form id="bulkDeleteForm" action="{{ route('admin.project.bulk-destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data proyek yang dipilih?')">
            @csrf
            @method('DELETE')

            <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-xl font-semibold text-gray-700">Daftar Proyek Aktif</h3>
                    <p class="text-gray-500 text-sm mt-1">Kelola dan pantau portofolio proyek strategis yang sedang tayang.</p>
                </div>
                
                <div x-show="selectedIds.length > 0" x-cloak x-transition>
                    <button type="submit" class="text-xs font-bold text-white bg-red-600 hover:bg-red-700 px-4 py-2.5 rounded-lg transition shadow-sm cursor-pointer">
                        Hapus Terpilih (<span x-text="selectedIds.length"></span>)
                    </button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th scope="col" class="p-4 w-10 text-center">
                                <input type="checkbox" @click="toggleAll()" :checked="selectedIds.length === allIds.length && allIds.length > 0" class="w-4 h-4 rounded cursor-pointer accent-[#0e1d82]">
                            </th>
                            <th scope="col" class="px-6 py-3.5 w-44 font-semibold">Preview</th>
                            <th scope="col" class="px-6 py-3.5 font-semibold">Detail Proyek</th>
                            <th scope="col" class="px-6 py-3.5 text-center w-40 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($projects as $project)
                            <tr class="bg-white hover:bg-gray-50/60 transition-colors">
                                <td class="p-4 text-center align-middle">
                                    <input type="checkbox" name="ids[]" value="{{ $project->id }}" x-model="selectedIds" class="w-4 h-4 rounded cursor-pointer accent-[#0e1d82]">
                                </td>
                                <td class="px-6 py-4 align-middle">
                                    <img src="{{ asset('storage/' . $project->image_path) }}" class="w-36 h-24 object-cover rounded-lg border border-gray-200 shadow-sm">
                                </td>
                                <td class="px-6 py-4 align-middle">
                                    <div class="flex flex-wrap gap-2 mb-1.5">
                                        <span class="bg-red-50 text-red-700 text-[10px] font-bold px-2 py-0.5 rounded-md border border-red-100 uppercase">
                                            📁 {{ $project->projectPage->name ?? 'Tanpa Kategori' }}
                                        </span>
                                        <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded-md border border-blue-100 uppercase">
                                            ⚓ {{ $project->sector->name ?? 'Tanpa Sektor' }}
                                        </span>
                                    </div>
                                    <div class="text-base font-bold text-gray-800 uppercase">{{ $project->title }}</div>
                                    <p class="text-xs text-gray-400 mt-1 line-clamp-2">{!! strip_tags($project->description) !!}</p>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap align-middle">
                                    <div class="flex items-center justify-center space-x-3">
                                        {{-- ✅ PERBAIKAN: Memakai route edit proyek & $project->id --}}
                                        <a href="{{ route('admin.project.edit', $project->id) }}" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition" title="Edit Proyek">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <span class="text-gray-200">|</span>
                                        {{-- ✅ PERBAIKAN: Memakai route destroy proyek & $project->id --}}
                                        <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data proyek ini?')" class="inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg transition" title="Hapus Proyek">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada portofolio proyek strategis.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>
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
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline | numlist bullist | fullscreen preview | code',
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