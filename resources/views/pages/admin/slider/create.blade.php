<x-app-layout>
    <div class="max-w-5xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-black text-white tracking-tight">Tambah Banner Slider</h1>
            <p class="text-sm text-slate-400">Tambahkan gambar slider baru untuk ditampilkan di halaman beranda utama.</p>
        </div>

        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kiri: Informasi Teks Slider --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Judul Utama (Title) *</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Tuliskan judul banner..." class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Sub Judul (Subtitle)</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Tuliskan deskripsi singkat banner..." class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                {{-- Kanan: Upload Gambar Banner --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-3">
                    <label class="block text-sm font-medium text-slate-300">Gambar Banner *</label>
                    <input type="file" name="image" class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer" required>
                    <p class="text-[11px] text-slate-500">Rekomendasi resolusi: 1920x1085px atau rasio 16:9. Format: JPG, JPEG, PNG, WEBP (Maks 5MB)</p>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.slider.index') }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-lg text-sm font-medium transition">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">Simpan Slider</button>
            </div>
        </form>
    </div>
</x-app-layout>