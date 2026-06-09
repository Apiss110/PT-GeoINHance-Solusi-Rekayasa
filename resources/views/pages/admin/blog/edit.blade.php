<x-app-layout>
    <!-- Slot Header Atas -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Artikel Blog & News') }}
        </h2>
    </x-slot>

    <!-- Container Lebar Form (Meniru persis layout kelola-admin kamu) -->
    <div class="max-w-2xl">
        
        <!-- Header Ringkas & Tombol Kembali -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider">Formulir Perbaruan Artikel</h3>
            <a href="{{ route('admin.blog.index') }}" class="inline-flex items-center justify-center bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-medium text-sm py-2 px-4 rounded-lg transition shadow-sm">
                Kembali
            </a>
        </div>

        <!-- Balikan Validasi Error Jika Input Salah -->
        @if ($errors->any())
            <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                <div class="font-semibold mb-1">Mohon koreksi beberapa kesalahan berikut:</div>
                <ul class="list-disc list-inside space-y-0.5 text-xs text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card Form dengan Aksen Garis Kiri Tebal Biru Utama (#0e1d82) -->
        <div class="bg-white rounded-xl border-l-4 border-[#0e1d82] border-y border-r border-slate-200 shadow-sm">
            <div class="p-6">
                <!-- Ditambahkan enctype="multipart/form-data" wajib untuk upload file gambar -->
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT') <!-- Wajib di Laravel untuk proses Update/Edit -->

                    <!-- Kolom Kategori & Tag (Dibuat Grid Kanan-Kiri agar Ringkas) -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="category" class="block text-sm font-medium text-slate-700 mb-1">Kategori (Label Merah Atas)</label>
                            <input type="text" 
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition" 
                                   id="category" 
                                   name="category" 
                                   value="{{ old('category', $blog->category) }}" 
                                   required>
                        </div>
                        <div>
                            <label for="tag" class="block text-sm font-medium text-slate-700 mb-1">Tag (Label Abu-Abu)</label>
                            <input type="text" 
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition" 
                                   id="tag" 
                                   name="tag" 
                                   value="{{ old('tag', $blog->tag) }}" 
                                   required>
                        </div>
                    </div>

                    <!-- Kolom Judul Artikel -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Judul Artikel / Berita</label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $blog->title) }}" 
                               required>
                    </div>

                    <!-- Kolom Tanggal Rilis & Upload Cover Gambar -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="published_at" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Rilis Konten</label>
                            <input type="date" 
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition" 
                                   id="published_at" 
                                   name="published_at" 
                                   value="{{ old('published_at', $blog->published_at) }}" 
                                   required>
                        </div>
                        <div>
                            <label for="image" class="block text-sm font-medium text-slate-700 mb-1">Ganti Foto Cover</label>
                            <input type="file" 
                                   class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer" 
                                   id="image" 
                                   name="image">
                            @if($blog->image)
                                <p class="text-[11px] text-slate-400 mt-1">File saat ini: <span class="font-mono text-slate-600">{{ basename($blog->image) }}</span></p>
                            @endif
                        </div>
                    </div>

                    <!-- Kolom Isi Ringkasan Konten -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-slate-700 mb-1">Ringkasan / Isi Konten Berita</label>
                        <textarea id="content" 
                                  name="content" 
                                  rows="5" 
                                  class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition" 
                                  required>{{ old('content', $blog->content) }}</textarea>
                    </div>

                    <!-- Tombol Submit Perubahan Warna Biru Utama Korporat -->
                    <div class="pt-2">
                        <button type="submit" class="w-full bg-[#0e1d82] hover:bg-[#0c196e] text-white font-semibold text-sm py-2.5 px-4 rounded-lg transition shadow-sm cursor-pointer text-center">
                            Perbarui Data Artikel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>