<x-app-layout>
    <div class="max-w-5xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-black text-white tracking-tight">Edit Portofolio Proyek</h1>
            <p class="text-sm text-slate-400">Ubah spesifikasi, detail deskripsi, atau ganti foto hasil proyek rekayasa.</p>
        </div>

        <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kiri: Informasi Kategori Proyek --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Kategori Layanan Proyek *</label>
                        <input type="text" name="category" value="{{ old('category', $project->category) }}" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Lokasi Proyek / Klien *</label>
                        <input type="text" name="location" value="{{ old('location', $project->location) }}" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                    </div>
                </div>

                {{-- Kanan: Gambar Dokumentasi Proyek --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-3">
                    <label class="block text-sm font-medium text-slate-300">Foto Proyek Sekarang</label>
                    
                    @if($project->image)
                        <div class="w-32 h-20 bg-slate-800 rounded-lg overflow-hidden border border-slate-700">
                            <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    <input type="file" name="image" class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                    <p class="text-[11px] text-slate-500">Biarkan kosong jika tidak ingin mengubah dokumentasi foto.</p>
                </div>
            </div>

            {{-- Judul Proyek --}}
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <label class="block text-sm font-medium text-slate-300 mb-1">Nama / Judul Proyek *</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
            </div>

            {{-- Deskripsi Ringkas Proyek --}}
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <label class="block text-sm font-medium text-slate-300 mb-2">Deskripsi Lengkap Proyek *</label>
                <textarea name="description" id="editor" class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4 text-white min-h-[250px]">{{ old('description', $project->description) }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.project.index') }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-lg text-sm font-medium transition">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">Perbarui Portofolio</button>
            </div>
        </form>
    </div>

    {{-- TinyMCE Text Editor Setup --}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'lists link table code wordcount',
            toolbar: 'undo redo | bold italic | bullist numlist | removeformat'
        });
    </script>
</x-app-layout>