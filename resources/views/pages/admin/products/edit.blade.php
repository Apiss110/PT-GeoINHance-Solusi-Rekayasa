<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk: ') }} {{ $product->name }}
        </h2>
    </x-slot>

    @php
        // Decode data JSON dari database agar bisa diletakkan sebagai value di form input
        $details = json_decode($product->description, true) ?? [];
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- 1. INFORMASI DASAR PRODUK --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-4">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">1. Informasi Dasar Produk</h4>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" name="name" required value="{{ old('name', $product->name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Utama (Hero Description)</label>
                            <textarea name="description" required rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description', $details['hero_description'] ?? $product->description) }}</textarea>
                            @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Hero Badge Text</label>
                            <input type="text" name="hero_badge" value="{{ old('hero_badge', $details['hero_badge'] ?? 'Geotechnical Software') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>

                    {{-- 2. SEKILAS TENTANG PRODUK (MENGGUNAKAN TINYMCE) --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-4">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">2. Sekilas Tentang Produk</h4>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Section "Tentang"</label>
                            <input type="text" name="about_title" value="{{ old('about_title', $details['about_title'] ?? '') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="about_description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Detail Tentang Produk</label>
                            <textarea name="about_description" id="about_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Tuliskan rincian penjelasan produk lengkap disini...">{{ old('about_description', $details['about_description'] ?? ($details['about_p1'] ?? '')) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Catatan Kemitraan (Partner Note)</label>
                            <input type="text" name="about_partner_note" value="{{ old('about_partner_note', $details['about_partner_note'] ?? '') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Contoh: Authorized Partner Resmi Indonesia">
                        </div>
                    </div>

                    {{-- 3. DEMONSTRASI VIDEO --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-4">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">3. Demonstrasi Video (YouTube)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Link URL Video YouTube</label>
                                <input type="url" name="video_url" value="{{ old('video_url', $details['video_url'] ?? (isset($details['youtube_id']) ? 'https://www.youtube.com/watch?v='.$details['youtube_id'] : '')) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="https://www.youtube.com/watch?v=...">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Judul Section Video</label>
                                <input type="text" name="video_title" value="{{ old('video_title', $details['video_title'] ?? 'Saksikan Demonstrasi Perangkat Lunak') }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    {{-- 4. PAKET LISENSI --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-4">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">4. Paket Lisensi</h4>
                        
                        <div id="licenses-container" class="space-y-4">
                            @php
                                $licenses = $details['licenses_list'] ?? [];
                            @endphp

                            @forelse($licenses as $index => $license)
                                <div class="p-4 bg-white rounded-lg border border-gray-200 relative license-item shadow-sm">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="md:col-span-2 space-y-3">
                                            <div>
                                                <label class="text-xs font-semibold text-gray-600">Nama Paket</label>
                                                <input type="text" name="licenses[{{ $index }}][name]" value="{{ $license['name'] ?? '' }}" required
                                                    class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs">
                                            </div>
                                            <div>
                                                <label class="text-xs font-semibold text-gray-600">Deskripsi Paket</label>
                                                <textarea name="licenses[{{ $index }}][desc]" required rows="2" class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs">{{ $license['desc'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-between items-start md:items-end">
                                            <div class="mt-4 md:mt-0">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" name="licenses[{{ $index }}][is_popular]" value="1" {{ isset($license['is_popular']) && $license['is_popular'] == '1' ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600">
                                                    <span class="ml-2 text-xs font-medium text-gray-700">Set Berlabel Populer</span>
                                                </label>
                                            </div>
                                            <button type="button" onclick="this.closest('.license-item').remove()" class="text-xs text-red-500 hover:underline mt-4 font-semibold">
                                                <i class="fa-solid fa-trash mr-1"></i> Hapus Paket
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-xs text-gray-500 italic id-empty-note">Belum ada paket lisensi. Klik tombol di bawah untuk menambahkan.</p>
                            @endforelse
                        </div>

                        <button type="button" id="btn-add-license" class="w-full text-center py-2 border-2 border-dashed border-blue-300 rounded-lg text-xs font-bold text-blue-600 bg-blue-50 hover:bg-blue-100 transition">
                            + Tambah Opsi Paket Lisensi Baru
                        </button>
                    </div>

                    {{-- 5. PERTANYAAN UMUM (FAQ) --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-4">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">5. Pertanyaan Umum (FAQ)</h4>
                        
                        <div id="faqs-container" class="space-y-4">
                            @php
                                $faqs = $details['faqs_list'] ?? [];
                            @endphp

                            @forelse($faqs as $index => $faq)
                                <div class="p-4 bg-white rounded-lg border border-gray-200 relative faq-item shadow-sm animate-fade-in">
                                    <div class="grid grid-cols-1 gap-3">
                                        <div>
                                            <label class="text-xs font-semibold text-gray-600">Pertanyaan (Question)</label>
                                            <input type="text" name="faqs[{{ $index }}][question]" value="{{ $faq['question'] ?? '' }}" required
                                                class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs">
                                        </div>
                                        <div>
                                            <label class="text-xs font-semibold text-gray-600">Jawaban (Answer)</label>
                                            <textarea name="faqs[{{ $index }}][answer]" required rows="2" class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs">{{ $faq['answer'] ?? '' }}</textarea>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" onclick="this.closest('.faq-item').remove()" class="text-xs text-red-500 hover:underline font-semibold">
                                                <i class="fa-solid fa-trash mr-1"></i> Hapus FAQ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-xs text-gray-500 italic faq-empty-note">Belum ada FAQ. Klik tombol di bawah untuk menambahkan.</p>
                            @endforelse
                        </div>

                        <button type="button" id="btn-add-faq" class="w-full text-center py-2 border-2 border-dashed border-slate-300 rounded-lg text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                            + Tambah Pertanyaan (FAQ) Baru
                        </button>
                    </div>

                    {{-- MEDIA GAMBAR & STATUS AKTIF --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ganti Gambar Produk</label>
                            <input type="file" name="image" class="mt-1 block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <span class="text-[11px] text-gray-400 block mt-1">Kosongkan jika tidak ingin mengubah gambar saat ini.</span>
                            
                            @if($product->image_path)
                                <div class="mt-3">
                                    <span class="text-xs font-medium text-gray-500 block mb-1">Gambar saat ini:</span>
                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="h-24 w-32 object-cover rounded-lg border shadow-sm">
                                </div>
                            @endif
                        </div>

                        <div class="flex flex-col justify-center">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-5 w-5">
                                <span class="ml-3 text-sm font-medium text-gray-900">Aktifkan & Tampilkan Produk di Publik</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.products.index') }}" class="bg-gray-100 text-gray-700 px-5 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200 transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi TinyMCE Editor untuk Deskripsi Detail
        tinymce.init({
            selector: '#about_description',
            height: 420,
            promotion: false,
            branding: false,
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist list wordcount help emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview | insertfile image media link codesample | code',
            toolbar_sticky: true,
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            content_style: 'body { font-family:Plus Jakarta Sans,Helvetica,Arial,sans-serif; font-size:14px }'
        });

        // === JAVASCRIPT UNTUK PAKET LISENSI ===
        document.getElementById('btn-add-license').addEventListener('click', function() {
            const container = document.getElementById('licenses-container');
            const index = container.getElementsByClassName('license-item').length;
            
            const emptyNote = container.querySelector('.id-empty-note');
            if(emptyNote) emptyNote.remove();

            const html = `
                <div class="p-4 bg-white rounded-lg border border-gray-200 relative license-item shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-2 space-y-3">
                            <div>
                                <label class="text-xs font-semibold text-gray-600">Nama Paket</label>
                                <input type="text" name="licenses[${index}][name]" required class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs">
                            </div>
                            <div>
                                <label class="text-xs font-semibold text-gray-600">Deskripsi Paket</label>
                                <textarea name="licenses[${index}][desc]" required rows="2" class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between items-start md:items-end">
                            <div class="mt-4 md:mt-0">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="licenses[${index}][is_popular]" value="1" class="rounded border-gray-300 text-blue-600">
                                    <span class="ml-2 text-xs font-medium text-gray-700">Set Berlabel Populer</span>
                                </label>
                            </div>
                            <button type="button" onclick="this.closest('.license-item').remove()" class="text-xs text-red-500 hover:underline mt-4 font-semibold">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus Paket
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        });

        // === JAVASCRIPT UNTUK FAQ DINAMIS ===
        document.getElementById('btn-add-faq').addEventListener('click', function() {
            const container = document.getElementById('faqs-container');
            const index = container.getElementsByClassName('faq-item').length;
            
            const emptyNote = container.querySelector('.faq-empty-note');
            if(emptyNote) emptyNote.remove();

            const html = `
                <div class="p-4 bg-white rounded-lg border border-gray-200 relative faq-item shadow-sm">
                    <div class="grid grid-cols-1 gap-3">
                        <div>
                            <label class="text-xs font-semibold text-gray-600">Pertanyaan (Question)</label>
                            <input type="text" name="faqs[${index}][question]" required class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-600">Jawaban (Answer)</label>
                            <textarea name="faqs[${index}][answer]" required rows="2" class="mt-1 block w-full rounded-md border-gray-300 sm:text-xs"></textarea>
                        </div>
                    </div>
                    <div class="text-right mt-2">
                        <button type="button" onclick="this.closest('.faq-item').remove()" class="text-xs text-red-500 hover:underline font-semibold">
                            <i class="fa-solid fa-trash mr-1"></i> Hapus FAQ
                        </button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        });
    });
</script>
</x-app-layout>