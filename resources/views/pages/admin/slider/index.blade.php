<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Banner / Foto Halaman Utama') }}
        </h2>
    </x-slot>

    {{-- Container utama menggunakan Alpine.js untuk mengatur state Modal Edit & Bulk Selection --}}
    <div class="py-12" x-data="{ 
        openEdit: false, 
        currentSlider: {},
        selectedIds: [],
        allIds: [],
        toggleAll() {
            if (this.selectedIds.length === this.allIds.length) {
                this.selectedIds = [];
            } else {
                this.selectedIds = [...this.allIds];
            }
        }
    }" x-init="allIds = [ @foreach($sliders as $s) '{{ $s->id }}', @endforeach ]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg shadow mb-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                {{-- SISI KIRI: Form Tambah Foto Baru --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 h-fit">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2">
                        Tambah Foto Baru
                    </h2>
                    
                    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Sub-Judul (Teks Kecil Atas)</label>
                            <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: INOVASI GEOTEKNIK TERPADU">
                            @error('subtitle') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Judul Utama (Teks Besar)</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: ANALISIS TANAH & FONDASI PRESISI">
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Link Tujuan Tombol (URL)</label>
                            <input type="text" name="link_url" value="{{ old('link_url') }}" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: /karir atau /kontak atau #services">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Gunakan <strong>/karir</strong> untuk halaman internal, atau <strong>#services</strong> untuk lompat ke section bawah.
                            </p>
                            @error('link_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Pilih File Gambar <span class="text-red-500">*</span></label>
                            <input type="file" id="sliderImageInput" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm block text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-white hover:file:bg-gray-300 dark:hover:file:bg-gray-500 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-1.5 outline-none transition cursor-pointer" required>
                            <p class="text-gray-400 dark:text-gray-500 text-[11px] mt-1">Format: JPG, JPEG, PNG, WEBP (Maks 5MB).</p>
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                            {{-- Container Preview Upload --}}
                            <div id="sliderPreviewContainer" class="mt-3 p-3 bg-gray-50 dark:bg-gray-900 border border-dashed border-gray-300 dark:border-gray-700 rounded-xl hidden">
                                <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2">Preview Gambar Terpilih:</p>
                                <img id="sliderImagePreview" src="#" class="h-28 w-auto object-cover rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition shadow-sm">
                            Upload & Terapkan Banner
                        </button>
                    </form>
                </div>

                {{-- SISI KANAN: Daftar Banner Aktif (Ditambahkan Fitur Hapus Massal) --}}
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    
                    {{-- Form Induk Pembungkus untuk Menangani Aksi Bulk Delete Banner --}}
                    <form id="bulkDeleteSliderForm" action="{{ route('admin.slider.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua foto banner yang dicentang?')">
                        @csrf
                        @method('DELETE')

                        {{-- Header Susunan Flexbox: Memindahkan tombol ke kanan atas sejajar judul --}}
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-100 dark:border-gray-700 pb-3 mb-4 gap-2">
                            <h2 class="text-xl font-semibold text-gray-700 dark:text-white">
                                Daftar Banner Utama Aktif
                            </h2>
                            
                            {{-- Tombol Hapus Terpilih: Hanya muncul jika ada checkbox yang dicentang --}}
                            <div x-show="selectedIds.length > 0" x-cloak x-transition>
                                <button type="submit" class="inline-flex items-center space-x-1.5 text-xs font-bold uppercase tracking-wider text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg transition-all duration-300 shadow-sm">
                                    <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    <span>Hapus Terpilih (<span x-text="selectedIds.length"></span>)</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        {{-- Kolom Master Checkbox --}}
                                        <th scope="col" class="p-4 w-10 text-center">
                                            <input type="checkbox" @click="toggleAll()" :checked="selectedIds.length === allIds.length && allIds.length > 0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer">
                                        </th>
                                        <th scope="col" class="px-4 py-3">Preview</th>
                                        <th scope="col" class="px-4 py-3">Informasi Teks & Link</th>
                                        <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sliders as $slider)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                            {{-- Kolom Checkbox per baris --}}
                                            <td class="p-4 text-center align-middle">
                                                <input type="checkbox" name="ids[]" value="{{ $slider->id }}" x-model="selectedIds" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer">
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap align-middle">
                                                <img src="{{ asset('storage/' . $slider->image_path) }}" class="w-32 h-20 object-cover rounded-md border border-gray-200 dark:border-gray-600" alt="Preview Banner">
                                            </td>
                                            <td class="px-4 py-3 align-middle">
                                                <div class="text-xs text-gray-400 dark:text-gray-500 font-medium">{{ $slider->subtitle ?? '-' }}</div>
                                                <div class="text-base font-bold text-gray-900 dark:text-white mt-0.5">{{ $slider->title ?? '-' }}</div>
                                                
                                                <div class="mt-2 flex items-center gap-1 text-xs text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded w-fit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                                    </svg>
                                                    <span>Link: <code class="font-mono font-bold">{{ $slider->link_url ?? '#services' }}</code></span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-center whitespace-nowrap align-middle">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <button type="button" 
                                                            @click="openEdit = true; currentSlider = { id: '{{ $slider->id }}', subtitle: '{{ addslashes($slider->subtitle) }}', title: '{{ addslashes($slider->title) }}', link_url: '{{ addslashes($slider->link_url) }}' }"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 transition">
                                                        Edit
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                                Belum ada foto banner yang diunggah. Tampilan di user akan kosong atau default.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        {{-- 🟢 MODAL WINDOW POP-UP UNTUK EDIT BANNER --}}
        <div x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm" x-cloak x-transition>
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 w-full max-w-lg rounded-2xl p-6 space-y-4" @click.away="openEdit = false">
                <div class="flex justify-between items-center border-b border-gray-100 dark:border-gray-700 pb-3">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Edit Data Banner Utama</h3>
                    <button @click="openEdit = false" type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-white text-xl">&times;</button>
                </div>

                <form :action="'/admin/slider/' + currentSlider.id" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Sub-Judul (Teks Kecil Atas)</label>
                        <input type="text" name="subtitle" x-model="currentSlider.subtitle" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Judul Utama (Teks Besar)</label>
                        <input type="text" name="title" x-model="currentSlider.title" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Link Tujuan Tombol (URL)</label>
                        <input type="text" name="link_url" x-model="currentSlider.link_url" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Ganti Gambar (Biarkan kosong jika tidak diubah)</label>
                        <input type="file" id="modalSliderImageInput" name="image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm block text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:uppercase file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-white hover:file:bg-gray-300 dark:hover:file:bg-gray-500 border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 rounded-lg p-1.5 outline-none transition cursor-pointer">
                        
                        {{-- Container Preview untuk Gambar Baru di Modal --}}
                        <div id="modalSliderPreviewContainer" class="mt-3 p-2 bg-gray-50 dark:bg-gray-900 border border-dashed border-gray-300 dark:border-gray-700 rounded-xl hidden">
                            <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-1">Preview Gambar Baru:</p>
                            <img id="modalSliderImagePreview" src="#" class="h-24 w-auto object-cover rounded-lg shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 pt-2">
                        <button type="button" @click="openEdit = false" class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg text-xs font-medium hover:bg-gray-300 dark:hover:bg-gray-600 transition">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-medium hover:bg-blue-700 transition">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JavaScript Live Preview untuk Form Input Utama dan Form Modal Edit --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Preview Form Tambah Utama
            const sliderInput = document.getElementById('sliderImageInput');
            const previewContainer = document.getElementById('sliderPreviewContainer');
            const sliderPreview = document.getElementById('sliderImagePreview');

            sliderInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        sliderPreview.setAttribute('src', e.target.result);
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.classList.add('hidden');
                }
            });

            // Preview Form Di Dalam Modal Edit
            const modalInput = document.getElementById('modalSliderImageInput');
            const modalPreviewContainer = document.getElementById('modalSliderPreviewContainer');
            const modalImagePreview = document.getElementById('modalSliderImagePreview');

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