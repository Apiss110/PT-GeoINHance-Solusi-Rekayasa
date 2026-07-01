<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.articles.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Artikel / Insight Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kategori Artikel</label>
                            <select name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option value="">-- Pilih Kategori Artikel --</option>
                                <option value="ARTIKEL">ARTIKEL</option>
                                <option value="GEOTECHNIK">GEOTECHNIK</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tag</label>
                            <input type="text" name="tag" placeholder="Contoh: Edukasi, Geoteknik, Lapangan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                        <input type="text" name="title" placeholder="Tuliskan judul artikel..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto / Gambar Sampul</label>
                        <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 border border-gray-300 rounded-md p-1" required>
                        <p class="mt-1 text-xs text-gray-500">Format yang didukung: JPG, JPEG, PNG, WEBP. Maksimal 5MB.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Isi Konten Artikel</label>
                        <textarea name="content" rows="6" placeholder="Tuliskan isi artikel lengkap di sini..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#0e1d82] hover:bg-[#0c196e] text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
                            Simpan Artikel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>