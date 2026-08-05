<x-app-layout>
<div class="container mx-auto px-6 py-8">

    {{-- Header & Tombol Kembali --}}
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-gray-700 text-3xl font-medium">
                Edit Sektor: {{ $sector->name }}
            </h3>
            <p class="text-gray-500 text-sm mt-1">
                Perbarui nama sektor, foto banner, atau deskripsi konten sektor
            </p>
        </div>
        <a href="{{ route('admin.sector.index') }}" 
           class="px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition shadow-sm">
            &larr; Kembali
        </a>
    </div>

    {{-- Alert Error jika Validasi Gagal --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl shadow-sm mb-6">
            <p class="text-sm font-semibold mb-1">Terdapat kesalahan input:</p>
            <ul class="list-disc list-inside text-xs space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card Form Edit Sektor --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-gray-700">Formulir Edit Sektor</h3>
            <p class="text-gray-500 text-sm mt-1">Ubah data sektor industri dan solusinya.</p>
        </div>

        <form action="{{ route('admin.sector.update', $sector->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama Sektor --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Sektor <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name', $sector->name) }}" required
                       placeholder="Contoh: Pertambangan, Infrastruktur Transportasi"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                @error('name')
                    <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Foto Banner Sektor --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Foto Banner Sektor <span class="text-gray-400 font-normal text-xs">(Pilih file baru jika ingin mengganti)</span>
                </label>

                {{-- Banner Saat Ini --}}
                @if($sector->banner_image)
                    <div class="mb-4 p-3 bg-gray-50 border border-gray-200 rounded-xl max-w-md">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Banner Saat Ini:</p>
                        <div class="h-36 w-full bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                            <img src="{{ asset('storage/' . $sector->banner_image) }}" alt="Current Banner" class="w-full h-full object-cover">
                        </div>
                    </div>
                @endif

                <input type="file" name="banner_image" accept="image/*"
                       class="w-full text-sm border border-gray-200 bg-white rounded-lg p-2 cursor-pointer text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#0e1d82] file:text-white hover:file:bg-[#0e1d82]/90">
                <p class="mt-1.5 text-xs text-gray-500">Maksimal ukuran file: 5MB.</p>
                @error('banner_image')
                    <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Deskripsi / Isi Konten Sektor --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi / Isi Konten Sektor <span class="text-red-500">*</span>
                </label>
                <textarea name="description" id="description" rows="12"
                          placeholder="Tuliskan peran geoteknik/geodesi serta solusi detail di sektor ini..."
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition min-h-[200px]">{{ old('description', $sector->description) }}</textarea>
                @error('description')
                    <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            {{-- Footer Button --}}
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.sector.index') }}" 
                   class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition cursor-pointer">
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