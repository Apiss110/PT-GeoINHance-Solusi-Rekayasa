<x-app-layout>
    {{-- Jika x-app-layout tidak terbaca, coba ganti baris paling atas & paling bawah dengan <x-layouts.app> --}}
    
    <div class="container-fluid px-4 py-4 space-y-6">
        <h2 class="text-white mb-2 font-semibold text-2xl">News & Event</h2>

        {{-- BAGIAN ATAS: Form Tambah Artikel Baru (Melebar Penuh) --}}
        <div class="w-full bg-[#1e293b] rounded-lg p-6 shadow-lg">
            <h3 class="text-white font-medium text-lg mb-4 border-b border-gray-700 pb-2">Tambah Berita Baru</h3>
            
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                {{-- Grid Kategori & Tag Berdampingan agar rapi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Kategori --}}
                    <div>
                        <label class="block text-gray-300 text-sm mb-1 font-medium">Kategori Berita<span class="text-red-500">*</span></label>
                        <input type="text" name="category" value="{{ old('category') }}" class="w-full bg-[#334155] border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-blue-500" placeholder="Contoh: GEOTEKNIK, BERITA, CORPORATE" required>
                        @error('category') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tag --}}
                    <div>
                        <label class="block text-gray-300 text-sm mb-1 font-medium">Tag <span class="text-red-500">*</span></label>
                        <input type="text" name="tag" value="{{ old('tag') }}" class="w-full bg-[#334155] border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-blue-500" placeholder="Contoh: Event, Proyek, internal" required>
                        @error('tag') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Judul --}}
                <div>
                    <label class="block text-gray-300 text-sm mb-1 font-medium">Nama / Judul Berita <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-[#334155] border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-blue-500" placeholder="Tuliskan judul berita..." required>
                    @error('title') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Konten (Sekarang Jauh Lebih Luas untuk Mengetik) --}}
                <div>
                    <label class="block text-gray-300 text-sm mb-1 font-medium">Deskripsi / Isi Konten <span class="text-red-500">*</span></label>
                    <textarea name="content" id="editor" class="w-full bg-[#334155] border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-blue-500" placeholder="Tuliskan isi konten lengkap di sini...">{{ old('content') }}</textarea>
                    @error('content') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Foto Berita (PERUBAHAN: Disesuaikan ke HTML Standard tanpa atribut Livewire) --}}
                <div>
                    <label class="block text-gray-300 text-sm mb-1 font-medium">Foto Berita<span class="text-red-500">*</span></label>
                    <input type="file" name="image" id="imageInput" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm block text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-bold file:uppercase file:bg-slate-700 file:text-white hover:file:bg-slate-600 border border-gray-600 bg-[#334155] rounded p-1 outline-none transition" required>
                    <p class="mt-1 text-[11px] text-gray-400 font-medium">Format: JPG, JPEG, PNG, WEBP (Maks 5MB).</p>
                    
                    @error('image') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror

                    {{-- Container khusus untuk Preview Instan menggunakan JavaScript --}}
                    <div id="previewContainer" class="mt-3 p-2 bg-[#334155] border border-dashed border-gray-600 rounded-lg hidden">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Preview Gambar Terpilih:</p>
                        <img id="imagePreview" src="#" class="h-24 w-auto object-cover rounded shadow-sm mt-1">
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="pt-2 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-8 rounded transition duration-200 shadow-md">
                        Simpan & Daftarkan Berita
                    </button>
                </div>
            </form>
        </div>

        {{-- BAGIAN BAWAH: Daftar Artikel Aktif --}}
        <div class="w-full bg-[#1e293b] rounded-lg shadow-lg overflow-hidden">
            <h3 class="text-white font-medium text-lg p-6 border-b border-gray-700 bg-[#1e293b]">Daftar Berita Aktif</h3>
            
            {{-- Header List --}}
            <div class="grid grid-cols-12 gap-4 bg-[#0f172a] px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                <div class="col-span-3 sm:col-span-2">Preview</div>
                <div class="col-span-6 sm:col-span-8">Detail Berita</div>
                <div class="col-span-3 sm:col-span-2 text-center">Aksi</div>
            </div>

            {{-- Body List --}}
            <div class="divide-y divide-gray-700 px-6">
                @forelse($blogs as $blog)
                    <div class="grid grid-cols-12 gap-4 py-4 items-center">
                        {{-- Preview Gambar --}}
                        <div class="col-span-3 sm:col-span-2">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Preview" class="w-full h-20 object-cover rounded border border-gray-600">
                            @else
                                <div class="w-full h-20 bg-gray-700 rounded flex items-center justify-center text-xs text-gray-400">No Image</div>
                            @endif
                        </div>

                        {{-- Detail Artikel --}}
                        <div class="col-span-6 sm:col-span-8 space-y-1">
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-red-600 text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded">
                                    {{ $blog->category ?? 'BERITA' }}
                                </span>
                                <span class="bg-gray-600 text-gray-200 text-[10px] px-2 py-0.5 rounded">
                                    #{{ $blog->tag ?? 'Umum' }}
                                </span>
                            </div>
                            <h4 class="text-white font-semibold text-base line-clamp-1">{{ $blog->title }}</h4>
                            <p class="text-gray-400 text-xs line-clamp-2">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                            <span class="text-[11px] text-gray-500 block pt-1">
                                📅 {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                            </span>
                        </div>

                        {{-- Aksi --}}
                        <div class="col-span-3 sm:col-span-2 flex flex-col sm:flex-row gap-2 justify-center items-center">
                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="text-blue-500 hover:text-blue-400 text-sm font-medium transition">
                                Edit
                            </a>
                            <span class="text-gray-600 hidden sm:inline">|</span>
                            <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 text-sm font-medium transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400 text-sm">
                        Belum ada berita yang terdaftar.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi TinyMCE
            tinymce.init({
                selector: '#editor',
                height: 420,
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help charmap quickbars emoticons',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview | insertfile image media link codesample | code',
                toolbar_sticky: true,
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                content_style: 'body { font-family:Plus Jakarta Sans,Helvetica,Arial,sans-serif; font-size:14px }'
            });

            // Logika JavaScript untuk Live Preview Gambar Unggahan Kontrol Standar HTML
            const imageInput = document.getElementById('imageInput');
            const previewContainer = document.getElementById('previewContainer');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.setAttribute('src', e.target.result);
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>