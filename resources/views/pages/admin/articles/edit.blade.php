<x-app-layout>
    <div class="max-w-5xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-black text-white tracking-tight">Edit Artikel</h1>
            <p class="text-sm text-slate-400">Perbarui informasi, kategori, atau isi konten dari artikel yang dipilih.</p>
        </div>

        <form action="{{ route('admin.articles.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kiri: Pengaturan Kategori & Tag --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Kategori Artikel *</label>
                        <select name="category" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                            <option value="ARTIKEL" {{ $blog->category == 'ARTIKEL' ? 'selected' : '' }}>ARTIKEL</option>
                            <option value="GEOTECHNIK" {{ $blog->category == 'GEOTECHNIK' ? 'selected' : '' }}>GEOTECHNIK</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Tag *</label>
                        <input type="text" name="tag" value="{{ old('tag', $blog->tag) }}" placeholder="Contoh: Event, Proyek, Internal" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                    </div>
                </div>

                {{-- Kanan: Pengaturan Gambar --}}
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-3">
                    <label class="block text-sm font-medium text-slate-300">Foto Artikel</label>
                    
                    @if($blog->image)
                        <div class="w-32 h-20 bg-slate-800 rounded-lg overflow-hidden border border-slate-700">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    <input type="file" name="image" class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer">
                    <p class="text-[11px] text-slate-500">Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, JPEG, PNG, WEBP (Maks 5MB)</p>
                </div>
            </div>

            {{-- Bagian Judul --}}
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <label class="block text-sm font-medium text-slate-300 mb-1">Nama / Judul Artikel *</label>
                <input type="text" name="title" value="{{ old('title', $blog->title) }}" placeholder="Tuliskan judul artikel..." class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
            </div>

            {{-- Bagian Konten --}}
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <label class="block text-sm font-medium text-slate-300 mb-2">Deskripsi / Isi Konten *</label>
                <textarea name="content" id="editor" class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4 text-white min-h-[300px]">{{ old('content', $blog->content) }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.articles.index') }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-lg text-sm font-medium transition">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">Perbarui Artikel</button>
            </div>
        </form>
    </div>

    <!-- CDN & INITIALIZATION TINYMCE (SUPER LENGKAP) -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#editor',
                height: 480, // Sedikit ditinggikan agar proporsional dengan layar lebar
                // Plugins komplit bawaan TinyMCE gratis
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help charmap quickbars emoticons',
                menubar: 'file edit view insert format tools table help',
                // Toolbar berurutan rapi: Font, Perataan (Justify), List, Warna Teks, Media, dan Source Code HTML (<>)
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview | insertfile image media link codesample | code',
                toolbar_sticky: true,
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                content_style: 'body { font-family:Plus Jakarta Sans,Helvetica,Arial,sans-serif; font-size:14px }'
            });
        });
    </script>
</x-app-layout>