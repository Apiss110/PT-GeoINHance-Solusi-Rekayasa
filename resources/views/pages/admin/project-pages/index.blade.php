<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div>
                <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Kelola Halaman Utama Portofolio') }}
                </h2>
                <p class="text-xs text-gray-500 mt-1">Buat halaman utama portofolio proyek sebelum mengisi card list proyek.</p>
            </div>
            
            {{-- Tombol Kanan Atas --}}
            <a href="{{ route('admin.project.index') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-[#0e1d82] text-white text-xs font-semibold uppercase tracking-wider rounded-lg shadow-md hover:bg-[#0c196e] transition-all duration-200 group">
                <span>Kelola Card Proyek</span>
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    </x-slot>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        {{-- KIRI: Form Tambah Halaman Utama --}}
        <div class="xl:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 sticky top-6">
                <div class="border-b border-slate-100 pb-4 mb-5">
                    <h3 class="font-bold text-gray-800 text-base">Tambah Halaman Portofolio</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Buat wadah halaman baru.</p>
                </div>

                <form action="{{ route('admin.project-pages.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Nama Halaman Kategori</label>
                        <input type="text" name="name" required placeholder="Contoh: Detailed Engineering Design" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-[#0e1d82]/20 focus:border-[#0e1d82] transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Deskripsi Singkat</label>
                        <textarea name="description" rows="3" placeholder="Masukkan deskripsi singkat halaman..." class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-[#0e1d82]/20 focus:border-[#0e1d82] transition-all"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Banner Image</label>
                        <input type="file" name="banner_image" id="createBannerInput" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-gray-700 hover:file:bg-slate-200 mb-3">
                        
                        {{-- Live Preview Kontainer Instan --}}
                        <div id="createPreviewWrapper" class="hidden">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">Preview Banner Baru:</span>
                            <div class="w-full h-28 rounded-lg overflow-hidden border border-slate-200 shadow-inner">
                                <img id="createBannerPreview" src="#" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 bg-[#0e1d82] text-white font-bold text-sm uppercase tracking-wider rounded-lg shadow-md hover:bg-[#0c196e] transition-all duration-150">
                        Simpan Halaman
                    </button>
                </form>
            </div>
        </div>

        {{-- KANAN: Tabel Wadah Halaman Menggunakan Komponen Hapus Massal --}}
        <div class="xl:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                
                {{-- 🟢 SEKARANG DATA TABEL DIBUNGKUS OLEH KOMPONEN BULK-DELETE --}}
                <x-admin.bulk-delete :route="route('admin.project-pages.destroy.bulk')" :items="$projectPages">
                    
                    {{-- Judul Komponen Atas --}}
                    <x-slot:header>
                        <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">
                            Daftar Halaman Portofolio Aktif
                        </h2>
                    </x-slot:header>

                    {{-- Header Kolom Tabel (Kolom Checkbox Master Otomatis Disisipkan Komponen) --}}
                    <x-slot:thead>
                        <th scope="col" class="p-4 text-xs font-bold uppercase tracking-wider text-gray-600">Banner</th>
                        <th scope="col" class="p-4 text-xs font-bold uppercase tracking-wider text-gray-600">Detail Halaman</th>
                        <th scope="col" class="p-4 text-xs font-bold uppercase tracking-wider text-gray-600 text-center">Aksi</th>
                    </x-slot:thead>

                    {{-- Isi Body Tabel --}}
                    <x-slot:tbody>
                        @forelse($projectPages as $page)
                            <tr class="hover:bg-slate-50/80 transition-colors border-b border-slate-100 last:border-0">
                                
                                {{-- 1. Checkbox data untuk Hapus Massal (Wajib menggunakan x-model="selectedIds") --}}
                                <td class="p-4 text-center align-middle w-12">
                                    <input type="checkbox" name="ids[]" value="{{ $page->id }}" x-model="selectedIds" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                                </td>

                                {{-- 2. Kolom Banner --}}
                                <td class="p-4 w-28 align-middle">
                                    @if($page->banner_image)
                                        <div class="w-24 h-14 bg-slate-100 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                            <img src="{{ Str::contains($page->banner_image, 'storage/') ? asset($page->banner_image) : (Str::contains($page->banner_image, 'project-banners/') ? asset('storage/' . $page->banner_image) : asset('storage/project-banners/' . $page->banner_image)) }}" 
                                                class="w-full h-full object-cover" 
                                                alt="Banner"
                                                onerror="this.onerror=null; this.src='https://placehold.co/600x400?text=Check+Symlink';">
                                        </div>
                                    @else
                                        <div class="w-24 h-14 bg-slate-100 rounded-lg border border-slate-200 border-dashed flex items-center justify-center text-slate-400 text-[10px] font-bold uppercase tracking-wider">
                                            No Banner
                                        </div>
                                    @endif
                                </td>

                                {{-- 3. Kolom Detail Halaman --}}
                                <td class="p-4 align-middle">
                                    <span class="font-bold text-gray-900 block text-base">{{ $page->name }}</span>
                                    <span class="text-xs text-gray-400 block mt-0.5">Slug: <code class="text-[#0e1d82] bg-slate-100 px-1 py-0.5 rounded font-mono">{{ $page->slug }}</code></span>
                                    <span class="text-[11px] text-slate-400 block mt-0.5">Database Path: <code class="text-emerald-600 font-mono text-[10px]">{{ $page->banner_image }}</code></span>
                                    <p class="text-xs text-gray-500 mt-1.5 line-clamp-2">{{ $page->description ?? '-' }}</p>
                                </td>

                                {{-- 4. Kolom Aksi Edit / Hapus Satuan --}}
                                <td class="p-4 w-32 align-middle">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- TOMBOL EDIT --}}
                                        <a href="{{ route('admin.project-pages.edit', $page->id) }}" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit Halaman">
                                            <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        {{-- TOMBOL HAPUS SATUAN --}}
                                        <form action="{{ route('admin.project-pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus halaman kategori ini?')" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus Halaman">
                                                <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-400 text-xs uppercase tracking-wider font-medium">
                                    Belum ada data halaman utama.
                                </td>
                            </tr>
                        @endforelse
                    </x-slot:tbody>

                </x-admin.bulk-delete>

            </div>
        </div>

    </div>

    {{-- JAVASCRIPT LIVE PREVIEW UNTUK FORM INPUT BARU --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const createInput = document.getElementById('createBannerInput');
            const createPreview = document.getElementById('createBannerPreview');
            const previewWrapper = document.getElementById('createPreviewWrapper');

            if (createInput && createPreview && previewWrapper) {
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