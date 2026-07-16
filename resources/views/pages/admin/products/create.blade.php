<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk Baru (Revisi Template Dinamis)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6 border-b pb-4">
                    <h3 class="text-lg font-medium text-gray-900">Formulir Kontrol Template Lengkap + Video & FAQ Dinamis</h3>
                    <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">
                        &larr; Kembali
                    </a>
                </div>

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- 1. BAGIAN HERO --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider mb-4">1. Bagian Hero (Atas Halaman)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk Utama <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Contoh: PLAXIS 2D" required>
                            </div>
                            <div>
                                <label for="hero_badge" class="block text-sm font-medium text-gray-700">Hero Badge / Label Kecil</label>
                                <input type="text" name="hero_badge" id="hero_badge" value="{{ old('hero_badge') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Contoh: Software Analisis Geoteknik">
                            </div>
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Hero Deskripsi Singkat <span class="text-red-500">*</span></label>
                                <textarea name="description" id="description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Tuliskan ringkasan deskripsi yang muncul di banner hitam atas..." required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- 2. DETAIL TENTANG PRODUK & MEDIA --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider mb-4">2. Detail Tentang Produk & Media</h4>
                        <div class="space-y-4">
                            <div>
                                <label for="about_title" class="block text-sm font-medium text-gray-700">Judul Bagian Tentang</label>
                                <input type="text" name="about_title" id="about_title" value="{{ old('about_title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Judul">
                            </div>

                            <div>
                                <label for="about_description" class="block text-sm font-medium text-gray-700">Deskripsi Detail Tentang Produk</label>
                                <textarea name="about_description" id="about_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Tuliskan rincian penjelasan produk lengkap disini...">{{ old('about_description') }}</textarea>
                            </div>

                            <div>
                                <label for="about_partner_note" class="block text-sm font-medium text-gray-700">Catatan/Note Kaki Kotak Abu-Abu</label>
                                <input type="text" name="about_partner_note" id="about_partner_note" value="{{ old('about_partner_note') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Contoh: PT GeoINHance Solusi Rekayasa adalah mitra resmi...">
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Banner Produk (Samping Teks Tentang)</label>
                                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>
                    </div>

                    {{-- 3. FITUR UTAMA --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">3. Fitur Utama</h4>
                            <button type="button" id="add-feature" class="inline-flex items-center px-3 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                + Tambah Fitur
                            </button>
                        </div>
                        
                        <div id="feature-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-3 bg-white rounded-lg border relative group feature-row">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="block text-xs font-bold text-blue-600 uppercase">Fitur</label>
                                    <button type="button" class="remove-feature-btn text-xs text-red-600 hover:text-red-800 font-semibold hidden">Hapus</button>
                                </div>
                                <input type="text" name="features[0][title]" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm mb-2" placeholder="Judul Fitur">
                                <textarea name="features[0][desc]" rows="2" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Deskripsi pendek Fitur"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- 4. MANAJEMEN LISENSI --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">4. Manajemen Lisensi (Pricing)</h4>
                            <button type="button" id="add-license" class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded uppercase hover:bg-blue-700">
                                + Tambah Paket
                            </button>
                        </div>
                        
                        <div id="license-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-white rounded-lg border relative license-row">
                                <button type="button" class="remove-license-btn absolute top-2 right-2 text-red-500 hidden">✕</button>
                                <input type="text" name="licenses[0][name]" placeholder="Nama Paket (cth: Standard Edition)" class="w-full mb-2 text-sm border-gray-300 rounded">
                                <textarea name="licenses[0][desc]" placeholder="Deskripsi paket..." class="w-full text-sm border-gray-300 rounded"></textarea>
                                <label class="flex items-center mt-2 text-xs">
                                    <input type="checkbox" name="licenses[0][is_popular]" value="1"> &nbsp; Tandai sebagai Populer
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- 5. DEMONSTRASI VIDEO --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider mb-4">5. Demonstrasi Video (YouTube)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Link URL Video (YouTube/Drive)</label>
                                <input type="url" name="video_url" required value="{{ old('video_url') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" 
                                    placeholder="https://www.youtube.com/watch?v=...">
                                @error('video_url') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label for="video_title" class="block text-sm font-medium text-gray-700">Judul Section Video</label>
                                <input type="text" name="video_title" id="video_title" value="{{ old('video_title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Contoh: Saksikan Demonstrasi Perangkat Lunak">
                            </div>
                        </div>
                    </div>

                    {{-- 6. MANAJEMEN FAQ --}}
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider">6. Manajemen FAQ Penting</h4>
                            <button type="button" id="add-faq" class="inline-flex items-center px-3 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                + Tambah FAQ
                            </button>
                        </div>
                        
                        <div id="faq-container" class="space-y-4">
                            <div class="p-3 bg-white rounded-lg border faq-row">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="block text-xs font-bold text-slate-800 uppercase">Pertanyaan & Jawaban FAQ</label>
                                    <button type="button" class="remove-faq-btn text-xs text-red-600 hover:text-red-800 font-semibold hidden">Hapus</button>
                                </div>
                                <input type="text" name="faqs[0][question]" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm mb-2" placeholder="Tuliskan pertanyaan disini...">
                                <textarea name="faqs[0][answer]" rows="2" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Tuliskan jawaban FAQ disini..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start px-2">
                        <div class="flex items-center h-5">
                            <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_active" class="font-medium text-gray-700">Aktifkan Halaman Produk Publik</label>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 border-t">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-700 transition shadow-sm">
                            Simpan & Publikasikan Hasil Revisi
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Kumpulan Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // Inisialisasi TinyMCE Premium-Look khusus untuk Deskripsi Detail Bagian Tentang
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

        // === SCRIPT PACKET LICENSE ===
        const licenseContainer = document.getElementById('license-container');
        let licenseIndex = 1;

        document.getElementById('add-license').addEventListener('click', () => {
            const div = document.createElement('div');
            div.className = 'p-4 bg-white rounded-lg border relative license-row';
            div.innerHTML = `
                <button type="button" class="remove-license-btn absolute top-2 right-2 text-red-500">✕</button>
                <input type="text" name="licenses[${licenseIndex}][name]" placeholder="Nama Paket" class="w-full mb-2 text-sm border-gray-300 rounded">
                <textarea name="licenses[${licenseIndex}][desc]" placeholder="Deskripsi paket..." class="w-full text-sm border-gray-300 rounded"></textarea>
                <label class="flex items-center mt-2 text-xs">
                    <input type="checkbox" name="licenses[${licenseIndex}][is_popular]" value="1"> &nbsp; Tandai sebagai Populer
                </label>
            `;
            licenseContainer.appendChild(div);
            licenseIndex++;
            div.querySelector('.remove-license-btn').addEventListener('click', () => div.remove());
        });

        // === SCRIPT FOR FEATURES ===
        let featureIndex = 1;
        const featureContainer = document.getElementById('feature-container');
        const addFeatureBtn = document.getElementById('add-feature');

        function checkFeatureDeleteButtons() {
            const rows = featureContainer.querySelectorAll('.feature-row');
            rows.forEach((row) => {
                const deleteBtn = row.querySelector('.remove-feature-btn');
                if (rows.length > 1) {
                    deleteBtn.classList.remove('hidden');
                } else {
                    deleteBtn.classList.add('hidden');
                }
            });
        }

        addFeatureBtn.addEventListener('click', function() {
            const newFeatureCard = document.createElement('div');
            newFeatureCard.className = 'p-3 bg-white rounded-lg border relative feature-row';
            newFeatureCard.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-xs font-bold text-blue-600 uppercase">Fitur</label>
                    <button type="button" class="remove-feature-btn text-xs text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                </div>
                <input type="text" name="features[${featureIndex}][title]" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm mb-2" placeholder="Judul Fitur">
                <textarea name="features[${featureIndex}][desc]" rows="2" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Deskripsi pendek Fitur"></textarea>
            `;
            featureContainer.appendChild(newFeatureCard);
            featureIndex++;
            
            newFeatureCard.querySelector('.remove-feature-btn').addEventListener('click', function() {
                newFeatureCard.remove();
                checkFeatureDeleteButtons();
            });

            checkFeatureDeleteButtons();
        });

        // === SCRIPT FOR FAQ ===
        let faqIndex = 1;
        const faqContainer = document.getElementById('faq-container');
        const addFaqBtn = document.getElementById('add-faq');

        function checkFaqDeleteButtons() {
            const rows = faqContainer.querySelectorAll('.faq-row');
            rows.forEach((row) => {
                const deleteBtn = row.querySelector('.remove-faq-btn');
                if (rows.length > 1) {
                    deleteBtn.classList.remove('hidden');
                } else {
                    deleteBtn.classList.add('hidden');
                }
            });
        }

        addFaqBtn.addEventListener('click', function() {
            const newFaqCard = document.createElement('div');
            newFaqCard.className = 'p-3 bg-white rounded-lg border faq-row';
            newFaqCard.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-xs font-bold text-slate-800 uppercase">Pertanyaan & Jawaban FAQ</label>
                    <button type="button" class="remove-faq-btn text-xs text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                </div>
                <input type="text" name="faqs[${faqIndex}][question]" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm mb-2" placeholder="Tuliskan pertanyaan disini...">
                <textarea name="faqs[${faqIndex}][answer]" rows="2" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Tuliskan jawaban FAQ disini..."></textarea>
            `;
            faqContainer.appendChild(newFaqCard);
            faqIndex++;

            newFaqCard.querySelector('.remove-faq-btn').addEventListener('click', function() {
                newFaqCard.remove();
                checkFaqDeleteButtons();
            });

            checkFaqDeleteButtons();
        });

        // Event listener awal proteksi
        featureContainer.querySelectorAll('.remove-feature-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                btn.closest('.feature-row').remove();
                checkFeatureDeleteButtons();
            });
        });

        faqContainer.querySelectorAll('.remove-faq-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                btn.closest('.faq-row').remove();
                checkFaqDeleteButtons();
            });
        });
    });
    </script>
</x-app-layout>