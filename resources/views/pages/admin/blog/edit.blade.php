<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.blog.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Artikel / Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <!-- PERBAIKAN: Mengubah max-w-4xl menjadi w-full agar layout form melebar penuh -->
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto / Gambar Sampul Saat Ini</label>
                        @if($blog->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $blog->image) }}" class="w-40 h-24 object-cover rounded-md border" alt="Current Image">
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 border border-gray-300 rounded-md p-1">
                        <p class="mt-1 text-xs text-gray-400">Biarkan kosong jika tidak ingin mengganti gambar pendukung.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Isi Konten Berita</label>
                        <!-- ID EDITOR UNTUK INDUKTANSI TINYMCE -->
                        <textarea name="content" id="editor" rows="12" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('content', $blog->content) }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#0e1d82] hover:bg-[#0c196e] text-white px-6 py-2.5 rounded-lg text-sm font-semibold shadow-sm transition">
                            Perbarui Berita
                        </button>
                    </div>
                </form>
            </div>
        </div>
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