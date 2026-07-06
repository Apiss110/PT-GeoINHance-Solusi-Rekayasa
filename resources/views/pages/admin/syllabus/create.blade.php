<x-app-layout>
<div class="container mx-auto px-6 py-8 max-w-2xl">
    <div class="mb-6">
        <a href="{{ route('admin.syllabus.index') }}" class="text-sm text-slate-500 hover:text-slate-700">&larr; Kembali</a>
        <h2 class="text-2xl font-bold text-slate-800 mt-2">Tambah Silabus Baru</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <form action="{{ route('admin.syllabus.store') }}" method="POST">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul Silabus</label>
                    <input type="text" name="title" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: PLAXIS 2D Basic" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Kategori Software</label>
                        <select name="software_category" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" required>
                            <option value="PLAXIS">PLAXIS</option>
                            <option value="GeoStudio">GeoStudio</option>
                            <option value="Structural">Structural</option>
                            <option value="Foundation">Foundation</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Level Tingkatan</label>
                        <select name="level" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" required>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Professional">Professional</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Jumlah Modul</label>
                        <input type="number" name="modules_count" min="0" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: 12" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Icon (FontAwesome)</label>
                        <input type="text" name="icon" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: fa-solid fa-layer-group">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi Singkat</label>
                    <textarea name="description" rows="4" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" placeholder="Tuliskan deskripsi singkat silabus..." required></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('admin.syllabus.index') }}" class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg text-sm hover:bg-slate-50">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>