<x-app-layout>
    {{-- Inisialisasi Alpine.js di elemen pembungkus untuk memantau ID artikel yang dicentang --}}
    <div class="container-fluid px-4 py-4 space-y-6"
         x-data="{ 
            selectedIds: [],
            allIds: [],
            toggleAll() {
                if (this.selectedIds.length === this.allIds.length) {
                    this.selectedIds = [];
                } else {
                    this.selectedIds = [...this.allIds];
                }
            }
         }" 
         x-init="allIds = [ @foreach($articles as $article) '{{ $article->id }}', @endforeach ]">
         
        <h2 class="text-white mb-2 font-semibold text-2xl">Artikel & Insight</h2>

        {{-- BAGIAN ATAS: Form Tambah Artikel Baru (Melebar Penuh) --}}
        <div class="w-full bg-[#1e293b] rounded-lg p-6 shadow-lg">
            <h3 class="text-white font-medium text-lg mb-4 border-b border-gray-700 pb-2">Tambah Artikel Baru</h3>
            
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Kategori --}}
                    <div>
                        <div class="mb-4">
                            <label class="block text-gray-300 text-sm mb-1 font-medium">Kategori Artikel <span class="text-red-500">*</span></label>
                            <input 
                                type="text" 
                                name="category" 
                                value="{{ old('category') }}" 
                                placeholder="Masukkan kategori artikel (misal: Proyek, Events, Geoteknik)" 
                                class="w-full bg-[#334155] border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-blue-500" 
                                required
                            >
                            @error('category') 
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>
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
                    <label class="block text-gray-300 text-sm mb-1 font-medium">Nama / Judul Artikel <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-[#334155] border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-blue-500" placeholder="Tuliskan judul berita..." required>
                    @error('title') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Konten --}}
                <div>
                    <label class="block text-gray-300 text-sm mb-1 font-medium">Deskripsi / Isi Konten <span class="text-red-500">*</span></label>
                    <textarea name="content" id="editor" class="w-full bg-[#334155] border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-blue-500" placeholder="Tuliskan isi konten lengkap di sini...">{{ old('content') }}</textarea>
                    @error('content') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                {{-- Foto Artikel --}}
                <div>
                    <label class="block text-gray-300 text-sm mb-1 font-medium">Foto Artikel <span class="text-red-500">*</span></label>
                    <input type="file" name="image" id="imageInput" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm block text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-bold file:uppercase file:bg-slate-700 file:text-white hover:file:bg-slate-600 border border-gray-600 bg-[#334155] rounded p-1 outline-none transition" required>
                    <p class="mt-1 text-[11px] text-gray-400 font-medium">Format: JPG, JPEG, PNG, WEBP (Maks 5MB).</p>
                    @error('image') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror

                    <div id="previewContainer" class="mt-3 p-2 bg-[#334155] border border-dashed border-gray-600 rounded-lg hidden">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Preview Gambar Terpilih:</p>
                        <img id="imagePreview" src="#" class="h-24 w-auto object-cover rounded shadow-sm mt-1">
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="pt-2 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-8 rounded transition duration-200 shadow-md cursor-pointer">
                        Simpan & Daftarkan Artikel
                    </button>
                </div>
            </form>
        </div>

        {{-- BAGIAN BAWAH: Daftar Artikel Aktif --}}
        <div class="w-full bg-[#1e293b] rounded-lg shadow-lg overflow-hidden">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 border-b border-gray-700 bg-[#1e293b] gap-2">
                <h3 class="text-white font-medium text-lg">Daftar Artikel Aktif</h3>
                
                {{-- Tombol Hapus Terpilih Muncul Otomatis Saat Ada Baris Dicentang --}}
                <div x-show="selectedIds.length > 0" x-cloak x-transition>
                    <button type="submit" form="bulkDeleteForm" class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold py-2 px-4 rounded transition shadow-md cursor-pointer">
                        Hapus Terpilih (<span x-text="selectedIds.length"></span>)
                    </button>
                </div>
            </div>
            
            {{-- Form Pembungkus Utama untuk Aksi Hapus Massal --}}
            <form id="bulkDeleteForm" action="{{ route('admin.articles.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus massal semua artikel yang dipilih?')">
                @csrf
                @method('DELETE')

                {{-- Header List Konten --}}
                <div class="grid grid-cols-12 gap-4 bg-[#0f172a] px-6 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider items-center">
                    <div class="col-span-1 text-center">
                        <input type="checkbox" @click="toggleAll()" :checked="selectedIds.length === allIds.length && allIds.length > 0" class="w-4 h-4 rounded bg-[#334155] border-gray-600 text-blue-600 focus:ring-blue-500 cursor-pointer">
                    </div>
                    <div class="col-span-2 sm:col-span-2">Preview</div>
                    <div class="col-span-6 sm:col-span-6">Detail Artikel</div>
                    <div class="col-span-3 sm:col-span-3 text-center">Aksi</div>
                </div>

                {{-- Body List Konten --}}
                <div class="divide-y divide-gray-700 px-6">
                    @forelse($articles as $article)
                        <div class="grid grid-cols-12 gap-4 py-4 items-center hover:bg-[#334155]/20 transition-colors -mx-6 px-6">
                            
                            {{-- Checkbox Satuan Konten --}}
                            <div class="col-span-1 text-center">
                                <input type="checkbox" name="ids[]" value="{{ $article->id }}" x-model="selectedIds" class="w-4 h-4 rounded bg-[#334155] border-gray-600 text-blue-600 focus:ring-blue-500 cursor-pointer">
                            </div>

                            {{-- Preview Gambar --}}
                            <div class="col-span-2 sm:col-span-2">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Preview" class="w-full h-16 sm:h-20 object-cover rounded border border-gray-600">
                                @else
                                    <div class="w-full h-16 sm:h-20 bg-gray-700 rounded flex items-center justify-center text-xs text-gray-400">No Image</div>
                                @endif
                            </div>

                            {{-- Detail Artikel --}}
                            <div class="col-span-6 sm:col-span-6 space-y-1">
                                <div class="flex flex-wrap gap-2">
                                    <span class="bg-red-600 text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded">
                                        {{ $article->category ?? 'ARTIKEL' }}
                                    </span>
                                    <span class="bg-gray-600 text-gray-200 text-[10px] px-2 py-0.5 rounded">
                                        #{{ $article->tag ?? 'Umum' }}
                                    </span>
                                </div>
                                <h4 class="text-white font-semibold text-base line-clamp-1 uppercase">{{ $article->title }}</h4>
                                <p class="text-gray-400 text-xs line-clamp-2">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                                <span class="text-[11px] text-gray-500 block pt-1">
                                    📅 {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                                </span>
                            </div>

                            {{-- Aksi --}}
                            <div class="col-span-3 sm:col-span-3 flex flex-col sm:flex-row gap-2 justify-center items-center">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="text-blue-500 hover:text-blue-400 text-sm font-medium transition">
                                    Edit
                                </a>
                                <span class="text-gray-600 hidden sm:inline">|</span>
                                {{-- Eksekusi form bayangan hapus tunggal agar tidak mengganggu jalannya form bulk delete --}}
                                <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus artikel ini?')) { document.getElementById('single-delete-{{ $article->id }}').submit(); }" class="text-red-500 hover:text-red-400 text-sm font-medium transition cursor-pointer bg-transparent border-0 p-0">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-400 text-sm">
                            Belum ada artikel yang terdaftar.
                        </div>
                    @endforelse
                </div>
            </form>
        </div>

        {{-- Wadah Form Tersembunyi Khusus untuk Aksi Hapus Satuan per Item --}}
        @foreach($articles as $article)
            <form id="single-delete-{{ $article->id }}" action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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