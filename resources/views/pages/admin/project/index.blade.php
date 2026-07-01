<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Proyek Strategis (Slider Portofolio)') }}
        </h2>
    </x-slot>

    {{-- Inisialisasi Alpine.js pada Container Utama untuk mengontrol Modal --}}
    <div class="py-12" x-data="{ openEdit: false, currentProject: {} }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg shadow mb-2">
                    {{ session('success') }}
                </div>
            @endif

            {{-- 1. BAGIAN ATAS: Form Tambah Proyek Baru (Full Width / Lebar) --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2">
                    Tambah Proyek Baru
                </h2>
                
                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Kategori Proyek <span class="text-red-500">*</span></label>
                            <select name="project_category_id" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">-- Pilih Jenis / Kategori Proyek --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('project_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Nama / Judul Proyek <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: ANALISIS STABILITAS LERENG TOL">
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Deskripsi / Isi Konten <span class="text-red-500">*</span></label>
                        <textarea id="projectDescription" name="description" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Tuliskan deskripsi lengkap proyek...">{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Lokasi <span class="text-red-500">*</span></label>
                            <input type="text" name="location" value="{{ old('location') }}" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Jawa Barat">
                            @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Tahun <span class="text-red-500">*</span></label>
                            <input type="number" name="year" min="2000" max="2100" value="{{ old('year', 2026) }}" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="2026">
                            @error('year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Foto Proyek <span class="text-red-500">*</span></label>
                            <input type="file" id="projectImageInput" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm block text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-white hover:file:bg-gray-300 dark:hover:file:bg-gray-500 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-1.5 outline-none transition cursor-pointer" required>
                            <p class="text-gray-400 dark:text-gray-500 text-[11px] mt-1">Format: JPG, JPEG, PNG, WEBP (Maks 5MB).</p>
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Container Preview Upload --}}
                    <div id="projectPreviewContainer" class="mt-3 p-3 bg-gray-50 dark:bg-gray-900 border border-dashed border-gray-300 dark:border-gray-700 rounded-xl hidden">
                        <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2">Preview Gambar Terpilih:</p>
                        <img id="projectImagePreview" src="#" class="h-32 w-auto object-cover rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    </div>
                    
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center transition shadow-sm">
                            Simpan & Daftarkan Proyek
                        </button>
                    </div>
                </form>
            </div>

            {{-- 2. BAGIAN BAWAH: Daftar Proyek Aktif (Full Width / Lebar) --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2">
                    Daftar Proyek Aktif (Slider Portofolio)
                </h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 w-40">Preview</th>
                                <th scope="col" class="px-4 py-3">Detail Proyek</th>
                                <th scope="col" class="px-4 py-3 text-center w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $project)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                    <td class="px-4 py-3 whitespace-nowrap align-middle">
                                        <img src="{{ asset('storage/' . $project->image_path) }}" class="w-32 h-24 object-cover rounded-md border border-gray-200 dark:border-gray-600" alt="Preview Proyek">
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <span class="bg-red-100 text-red-800 text-[10px] font-bold px-2 py-0.5 rounded dark:bg-red-900/40 dark:text-red-300 uppercase">
                                            {{ $project->category->name ?? 'Tanpa Kategori' }}
                                        </span>
                                        <div class="text-base font-bold text-gray-900 dark:text-white mt-1 uppercase">{{ $project->title }}</div>
                                        
                                        <p class="text-xs text-gray-400 mt-1 line-clamp-2">{!! strip_tags($project->description) !!}</p>
                                        
                                        <div class="text-[11px] text-gray-500 dark:text-gray-400 mt-2 font-mono">
                                            📍 {{ $project->location }} | 🗓️ Th. {{ $project->year }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center whitespace-nowrap align-middle">
                                        <div class="flex items-center justify-center space-x-3">
                                            <button type="button" 
                                                    @click="openEdit = true; currentProject = { id: '{{ $project->id }}', title: '{{ addslashes($project->title) }}', project_category_id: '{{ $project->project_category_id }}', location: '{{ addslashes($project->location) }}', year: '{{ $project->year }}' }; tinymce.get('modalProjectDescription').setContent('{{ addslashes($project->description) }}');"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 transition">
                                                Edit
                                            </button>

                                            <span class="text-gray-300 dark:text-gray-600">|</span>

                                            <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data proyek portofolio ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400 bg-transparent border-0 cursor-pointer transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada portofolio proyek strategis yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        {{-- 🟢 MODAL POP-UP EDIT PORTFOLIO PROYEK --}}
        <div x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm" x-cloak x-transition>
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 w-full max-w-xl rounded-2xl p-6 space-y-4" @click.away="openEdit = false">
                <div class="flex justify-between items-center border-b border-gray-100 dark:border-gray-700 pb-3">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Edit Informasi Portofolio Proyek</h3>
                    <button @click="openEdit = false" type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-white text-xl">&times;</button>
                </div>

                <form :action="'/admin/project/' + currentProject.id" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Kategori Proyek *</label>
                        <select name="project_category_id" x-model="currentProject.project_category_id" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Jenis / Kategori Proyek --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Nama / Judul Proyek *</label>
                        <input type="text" name="title" x-model="currentProject.title" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Deskripsi Singkat *</label>
                        <textarea id="modalProjectDescription" name="description" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Lokasi *</label>
                            <input type="text" name="location" x-model="currentProject.location" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Tahun *</label>
                            <input type="number" name="year" min="2000" max="2100" x-model="currentProject.year" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Ganti Foto Proyek (Kosongkan jika tetap)</label>
                        <input type="file" id="modalProjectImageInput" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm block text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-white hover:file:bg-gray-300 dark:hover:file:bg-gray-500 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-1.5 outline-none transition cursor-pointer">
                        
                        <div id="modalPreviewContainer" class="mt-3 p-2 bg-gray-50 dark:bg-gray-900 border border-dashed border-gray-300 dark:border-gray-700 rounded-xl hidden">
                            <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-1">Preview Gambar Baru:</p>
                            <img id="modalImagePreview" src="#" class="h-24 w-auto object-cover rounded-lg shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-2">
                        <button type="button" @click="openEdit = false" class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg text-xs font-medium hover:bg-gray-300 dark:hover:bg-gray-600 transition">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-medium hover:bg-blue-700 transition">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script JavaScript Pendukumg Preview Gambar & Inisialisasi TinyMCE --}}
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi TinyMCE
            tinymce.init({
                selector: '#projectDescription, #modalProjectDescription',
                plugins: 'lists link image media table code wordcount',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table code',
                height: 300,
                menubar: false,
                branding: false,
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });

            // Preview Form Utama
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
                } else {
                    previewContainer.classList.add('hidden');
                }
            });

            // Preview di dalam Modal Edit
            const modalInput = document.getElementById('modalProjectImageInput');
            const modalPreviewContainer = document.getElementById('modalPreviewContainer');
            const modalImagePreview = document.getElementById('modalImagePreview');

            modalInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        modalImagePreview.setAttribute('src', e.target.result);
                        modalPreviewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    modalPreviewContainer.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>