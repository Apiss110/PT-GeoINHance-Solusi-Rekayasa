<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Proyek Strategis (Slider Portofolio)') }}
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
                        Tambah Proyek Baru
                    </h2>
                    
                    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Kategori Proyek <span class="text-red-500">*</span></label>
                            <input type="text" name="category" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: GEOTEKNIK atau INFRASTRUKTUR">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Nama / Judul Proyek <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: ANALISIS STABILITAS LERENG TOL">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                            <textarea name="description" rows="4" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Tuliskan deskripsi ringkas proyek portofolio..."></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Lokasi <span class="text-red-500">*</span></label>
                                <input type="text" name="location" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Jawa Barat">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Tahun <span class="text-red-500">*</span></label>
                                <input type="number" name="year" min="2000" max="2100" required class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white p-2.5 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="2026">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Foto Proyek <span class="text-red-500">*</span></label>
                            <input type="file" name="image" class="w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 cursor-pointer p-2" required>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, JPEG, PNG, WEBP (Maks 2MB).</p>
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition shadow-sm">
                            Simpan & Daftarkan Proyek
                        </button>
                    </form>
                </div>

                <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2">
                        Daftar Proyek Aktif (Slider Portofolio)
                    </h2>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Preview</th>
                                    <th scope="col" class="px-4 py-3">Detail Proyek</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
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
                                                {{ $project->category }}
                                            </span>
                                            <div class="text-base font-bold text-gray-900 dark:text-white mt-1 uppercase">{{ $project->title }}</div>
                                            <p class="text-xs text-gray-400 mt-1 line-clamp-2">{{ $project->description }}</p>
                                            <div class="text-[11px] text-gray-500 dark:text-gray-400 mt-2 font-mono">
                                                📍 {{ $project->location }} | 🗓️ Th. {{ $project->year }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-center whitespace-nowrap align-middle">
                                            <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data proyek portofolio ini?')">
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
                                            Belum ada portofolio proyek strategis yang ditambahkan.
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