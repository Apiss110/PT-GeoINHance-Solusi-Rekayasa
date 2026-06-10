<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Banner / Foto Halaman Utama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg shadow mb-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700 h-fit">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2">
                        Tambah Foto Baru
                    </h2>
                    
                    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Sub-Judul (Teks Kecil Atas)</label>
                            <input type="text" name="subtitle" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: INOVASI GEOTEKNIK TERPADU">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Judul Utama (Teks Besar)</label>
                            <input type="text" name="title" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: ANALISIS TANAH & FONDASI PRESISI">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Link Tujuan Tombol (URL)</label>
                            <input type="text" name="link_url" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: /karir atau /kontak atau #services">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Gunakan <strong>/karir</strong> untuk halaman internal, atau <strong>#services</strong> untuk lompat ke section bawah.
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Pilih File Gambar <span class="text-red-500">*</span></label>
                            <input type="file" name="image" class="w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 cursor-pointer p-2" required>
                            <p class="text-gray-400 text-xs mt-1">Format: JPG, JPEG, PNG, WEBP (Maks 5MB).</p>
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition shadow-sm">
                            Upload & Terapkan Banner
                        </button>
                    </form>
                </div>

                <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2">
                        Daftar Banner Aktif
                    </h2>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Preview</th>
                                    <th scope="col" class="px-4 py-3">Informasi Teks & Link</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sliders as $slider)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
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
                                            <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto banner ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400 bg-transparent border-0 cursor-pointer transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                            Belum ada foto banner yang diunggah. Tampilan di user akan kosong atau default.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>