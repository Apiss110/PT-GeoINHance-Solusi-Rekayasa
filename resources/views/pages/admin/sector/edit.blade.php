<x-app-layout>
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit Sektor: {{ $sector->name }}
    </h2>

    <div class="px-6 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('admin.sector.update', $sector->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Nama Sektor <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name', $sector->name) }}" required
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input rounded-lg focus:border-blue-400 focus:outline-none focus:shadow-outline-blue"
                    placeholder="Contoh: Pertambangan, Infrastruktur Transportasi">
                @error('name')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Foto Banner Sektor
                </label>
                
                {{-- Tampilkan Pratinjau Gambar Banner Lama jika Ada --}}
                @if($sector->banner_image)
                    <div class="my-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Banner saat ini:</p>
                        <img src="{{ asset('storage/' . $sector->banner_image) }}" alt="Current Banner" class="w-1/3 max-h-40 object-cover rounded-lg shadow-sm border">
                    </div>
                @endif

                <input type="file" name="banner_image"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input rounded-lg focus:border-blue-400 focus:outline-none focus:shadow-outline-blue">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pilih file baru hanya jika Anda ingin mengganti foto banner di atas. Maksimal 5MB.</p>
                @error('banner_image')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                    Deskripsi / Isi Konten Sektor <span class="text-red-500">*</span>
                </label>
                <textarea name="description" id="description" rows="12"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea rounded-lg focus:border-blue-400 focus:outline-none focus:shadow-outline-blue"
                    placeholder="Tuliskan peran geoteknik/geodesi serta solusi detail di sektor ini...">{{ old('description', $sector->description) }}</textarea>
                @error('description')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.sector.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 bg-gray-100 border border-gray-300 rounded-lg dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#0e1d82] border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none">
                    Perbarui Sektor
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Memanggil skrip TinyMCE --}}
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Inisialisasi TinyMCE
        tinymce.init({
            selector: '#description', // <-- SUDAH DIPERBAIKI: Mengarah ke id="description"
            height: 420,
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help charmap quickbars emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview | insertfile image media link codesample | code',
            toolbar_sticky: true,
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            content_style: 'body { font-family:Plus Jakarta Sans,Helvetica,Arial,sans-serif; font-size:14px }'
        });
    }); // <-- SUDAH DIPERBAIKI: Penutup Event Listener yang tadi hilang
</script>
</x-app-layout>