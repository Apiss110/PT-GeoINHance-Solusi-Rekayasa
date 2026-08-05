<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                    {{ __('Tambah Produk Baru') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Lengkapi formulir di bawah ini untuk menambahkan produk baru beserta lisensi, fitur, video, dan FAQ.</p>
            </div>
            <div>
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-300 rounded-xl font-semibold text-xs text-slate-700 uppercase tracking-wider hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- 1. BAGIAN HERO --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                        <div class="p-2 bg-blue-50 rounded-xl text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-base">1. Bagian Hero (Atas Halaman)</h3>
                            <p class="text-xs text-slate-500">Informasi utama produk yang akan ditampilkan pada header banner publik.</p>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Nama Produk Utama <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                    class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                    placeholder="Contoh: PLAXIS 2D" required>
                                @error('name') <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="hero_badge" class="block text-sm font-semibold text-slate-700 mb-1.5">Hero Badge / Label Kecil</label>
                                <input type="text" name="hero_badge" id="hero_badge" value="{{ old('hero_badge') }}" 
                                    class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                    placeholder="Contoh: Software Analisis Geoteknik">
                                @error('hero_badge') <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                Hero Deskripsi Singkat <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" id="description" rows="3" 
                                class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                placeholder="Tuliskan ringkasan deskripsi yang muncul di banner utama..." required>{{ old('description') }}</textarea>
                            @error('description') <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- 2. DETAIL TENTANG PRODUK & MEDIA --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                        <div class="p-2 bg-indigo-50 rounded-xl text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-base">2. Detail Tentang Produk & Media</h3>
                            <p class="text-xs text-slate-500">Penjelasan mendalam produk, catatan kemitraan, dan gambar pendukung.</p>
                        </div>
                    </div>

                    <div class="p-6 space-y-5">
                        <div>
                            <label for="about_title" class="block text-sm font-semibold text-slate-700 mb-1.5">Judul Bagian Tentang</label>
                            <input type="text" name="about_title" id="about_title" value="{{ old('about_title') }}" 
                                class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                placeholder="Judul ringkasan sekilas produk">
                            @error('about_title') <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="about_description" class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi Detail Tentang Produk</label>
                            <textarea name="about_description" id="about_description" 
                                class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                placeholder="Tuliskan rincian penjelasan produk lengkap disini...">{{ old('about_description') }}</textarea>
                            @error('about_description') <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="about_partner_note" class="block text-sm font-semibold text-slate-700 mb-1.5">Catatan/Note Kaki Kotak Abu-Abu</label>
                            <input type="text" name="about_partner_note" id="about_partner_note" value="{{ old('about_partner_note') }}" 
                                class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                placeholder="Contoh: PT GeoINHance Solusi Rekayasa adalah mitra resmi...">
                            @error('about_partner_note') <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-semibold text-slate-700 mb-1.5">Gambar Banner Produk (Samping Teks Tentang)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:border-blue-400 transition-colors bg-slate-50/50">
                                <div class="space-y-2 text-center">
                                    <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.01" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-slate-600 justify-center">
                                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-semibold text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 px-2 py-0.5 border border-slate-200 shadow-sm">
                                            <span>Unggah gambar</span>
                                            <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                        </label>
                                        <p class="pl-1">atau tarik dan lepas</p>
                                    </div>
                                    <p class="text-xs text-slate-500">PNG, JPG, WEBP hingga 5MB</p>
                                </div>
                            </div>
                            @error('image') <p class="text-xs text-red-600 mt-1 font-medium">{{ $message }}</p> @enderror

                            {{-- ELEMEN PREVIEW GAMBAR --}}
                            <div id="image-preview-container" class="mt-4 hidden">
                                <p class="text-xs font-semibold text-slate-600 mb-2">Preview Gambar Dipilih:</p>
                                <div class="relative inline-block border rounded-xl overflow-hidden bg-white shadow-md group">
                                    <img id="image-preview" src="#" alt="Preview" class="h-44 w-auto object-cover">
                                    <button type="button" id="remove-image" class="absolute top-2 right-2 bg-red-600/90 hover:bg-red-700 text-white p-1.5 rounded-full transition-colors shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3. FITUR UTAMA --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-emerald-50 rounded-xl text-emerald-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-base">3. Fitur Utama</h3>
                                <p class="text-xs text-slate-500">Daftar keunggulan dan fitur unggulan dari produk ini.</p>
                            </div>
                        </div>
                        <button type="button" id="add-feature" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambah Fitur</span>
                        </button>
                    </div>

                    <div class="p-6">
                        <div id="feature-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 relative group feature-row space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold bg-blue-100 text-blue-700">Fitur Item</span>
                                    <button type="button" class="remove-feature-btn text-xs text-red-600 hover:text-red-800 font-semibold hidden flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                                <input type="text" name="features[0][title]" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Judul Fitur">
                                <textarea name="features[0][desc]" rows="2" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Deskripsi pendek Fitur"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 4. MANAJEMEN LISENSI --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-amber-50 rounded-xl text-amber-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-base">4. Manajemen Lisensi (Pricing)</h3>
                                <p class="text-xs text-slate-500">Pilihan paket lisensi atau varian harga yang ditawarkan.</p>
                            </div>
                        </div>
                        <button type="button" id="add-license" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambah Paket</span>
                        </button>
                    </div>

                    <div class="p-6">
                        <div id="license-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 relative license-row space-y-3">
                                <button type="button" class="remove-license-btn absolute top-3 right-3 text-slate-400 hover:text-red-500 p-1 rounded-md transition-colors hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <input type="text" name="licenses[0][name]" placeholder="Nama Paket (cth: Standard Edition)" class="w-full text-sm border-slate-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400">
                                <textarea name="licenses[0][desc]" placeholder="Deskripsi paket..." class="w-full text-sm border-slate-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" rows="2"></textarea>
                                <label class="flex items-center gap-2 cursor-pointer pt-1">
                                    <input type="checkbox" name="licenses[0][is_popular]" value="1" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                    <span class="text-xs font-medium text-slate-700">Tandai sebagai Populer</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 5. DEMONSTRASI VIDEO --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                        <div class="p-2 bg-rose-50 rounded-xl text-rose-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-base">5. Demonstrasi Video (YouTube)</h3>
                            <p class="text-xs text-slate-500">Tautan video presentasi atau tutorial singkat penggunaan produk.</p>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="md:col-span-1">
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Link URL Video (YouTube/Drive)</label>
                                <input type="url" name="video_url" required value="{{ old('video_url') }}"
                                    class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                    placeholder="https://www.youtube.com/watch?v=...">
                                @error('video_url') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label for="video_title" class="block text-sm font-semibold text-slate-700 mb-1.5">Judul Section Video</label>
                                <input type="text" name="video_title" id="video_title" value="{{ old('video_title') }}" 
                                    class="w-full rounded-xl border-slate-300 shadow-sm text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" 
                                    placeholder="Contoh: Saksikan Demonstrasi Perangkat Lunak">
                                @error('video_title') <span class="text-xs text-red-500 mt-1 block font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 6. MANAJEMEN FAQ --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-purple-50 rounded-xl text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-base">6. Manajemen FAQ Penting</h3>
                                <p class="text-xs text-slate-500">Pertanyaan umum yang sering ditanyakan oleh calon pembeli.</p>
                            </div>
                        </div>
                        <button type="button" id="add-faq" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambah FAQ</span>
                        </button>
                    </div>

                    <div class="p-6">
                        <div id="faq-container" class="space-y-4">
                            <div class="p-4 bg-slate-50/70 rounded-xl border border-slate-200 faq-row space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold bg-slate-200 text-slate-700">FAQ Item</span>
                                    <button type="button" class="remove-faq-btn text-xs text-red-600 hover:text-red-800 font-semibold hidden flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                                <input type="text" name="faqs[0][question]" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Tuliskan pertanyaan disini...">
                                <textarea name="faqs[0][answer]" rows="2" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Tuliskan jawaban FAQ disini..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- STATUS PUBLIKASI & ACTION BUTTONS --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', true) ? 'checked' : '' }} 
                            class="focus:ring-blue-500 h-5 w-5 text-blue-600 border-slate-300 rounded cursor-pointer">
                        <label for="is_active" class="text-sm font-semibold text-slate-700 cursor-pointer select-none">
                            Aktifkan Halaman Produk Publik
                        </label>
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                        <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition text-center">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition shadow-md shadow-blue-500/20 inline-flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Simpan & Publikasikan</span>
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    {{-- Kumpulan Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById('image');
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
            const removeButton = document.getElementById('remove-image');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    }

                    reader.readAsDataURL(file);
                } else {
                    resetPreview();
                }
            });

            // Event saat tombol 'silang/hapus' di-klik
            removeButton.addEventListener('click', function() {
                resetPreview();
            });

            function resetPreview() {
                imageInput.value = ''; // Reset file input
                previewImage.src = '#';
                previewContainer.classList.add('hidden');
            }
        });
    </script>
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
            div.className = 'p-4 bg-slate-50/70 rounded-xl border border-slate-200 relative license-row space-y-3';
            div.innerHTML = `
                <button type="button" class="remove-license-btn absolute top-3 right-3 text-slate-400 hover:text-red-500 p-1 rounded-md transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <input type="text" name="licenses[${licenseIndex}][name]" placeholder="Nama Paket" class="w-full text-sm border-slate-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400">
                <textarea name="licenses[${licenseIndex}][desc]" placeholder="Deskripsi paket..." class="w-full text-sm border-slate-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" rows="2"></textarea>
                <label class="flex items-center gap-2 cursor-pointer pt-1">
                    <input type="checkbox" name="licenses[${licenseIndex}][is_popular]" value="1" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-xs font-medium text-slate-700">Tandai sebagai Populer</span>
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
            newFeatureCard.className = 'p-4 bg-slate-50/70 rounded-xl border border-slate-200 relative group feature-row space-y-3';
            newFeatureCard.innerHTML = `
                <div class="flex justify-between items-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold bg-blue-100 text-blue-700">Fitur Item</span>
                    <button type="button" class="remove-feature-btn text-xs text-red-600 hover:text-red-800 font-semibold flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </div>
                <input type="text" name="features[${featureIndex}][title]" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Judul Fitur">
                <textarea name="features[${featureIndex}][desc]" rows="2" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Deskripsi pendek Fitur"></textarea>
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
            newFaqCard.className = 'p-4 bg-slate-50/70 rounded-xl border border-slate-200 faq-row space-y-3';
            newFaqCard.innerHTML = `
                <div class="flex justify-between items-center">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold bg-slate-200 text-slate-700">FAQ Item</span>
                    <button type="button" class="remove-faq-btn text-xs text-red-600 hover:text-red-800 font-semibold flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </div>
                <input type="text" name="faqs[${faqIndex}][question]" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Tuliskan pertanyaan disini...">
                <textarea name="faqs[${faqIndex}][answer]" rows="2" class="w-full rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 placeholder:text-slate-400" placeholder="Tuliskan jawaban FAQ disini..."></textarea>
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