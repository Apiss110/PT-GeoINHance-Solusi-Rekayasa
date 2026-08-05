<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        {{-- Header Halaman --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Tambah Banner Front Page</h3>
                <p class="text-gray-500 text-sm mt-1">Unggah gambar slider baru dan tentukan tautan tujuannya</p>
            </div>
            <div>
                <a href="{{ route('admin.slider.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm inline-flex items-center transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        {{-- Kontainer Kartu Form --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Sub-Judul --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Sub-Judul (Teks Kecil Atas)</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('subtitle') border-red-500 @enderror" 
                            placeholder="Contoh: INOVASI GEOTEKNIK TERPADU">
                        @error('subtitle')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Judul Utama --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Utama (Teks Besar)</label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('title') border-red-500 @enderror" 
                            placeholder="Contoh: ANALISIS TANAH & FONDASI PRESISI">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CASCADING DROPDOWN 3 LEVEL (FORM TAMBAH) --}}
                    <div class="md:col-span-2 space-y-4 p-4 bg-gray-50 border border-gray-200 rounded-xl">
                        <label class="block text-sm font-semibold text-[#0e1d82]">
                            Pemilihan Link Tujuan (Database)
                        </label>
                        
                        <!-- Hidden Final URL Input -->
                        <input type="hidden" name="link_url" id="create_final_link_url" value="{{ old('link_url') }}">

                        <!-- Level 1 (Form Tambah) -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">1. Pilih Kategori Utama</label>
                            <select id="create_d1" name="category" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition bg-white text-sm">
                                <option value="">-- Pilih Kategori Utama --</option>
                                <option value="sektor" {{ old('category') == 'sektor' ? 'selected' : '' }}>Sektor</option>
                                <option value="products" {{ old('category') == 'products' ? 'selected' : '' }}>Products</option>
                                <option value="proyek" {{ old('category') == 'proyek' ? 'selected' : '' }}>Proyek</option>
                                <option value="training" {{ old('category') == 'training' ? 'selected' : '' }}>Training</option>
                                <option value="resources" {{ old('category') == 'resources' ? 'selected' : '' }}>Resources</option>
                            </select>
                        </div>

                        <!-- Level 2 (Form Tambah) -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">2. Pilih Sub-Item / Sektor / Jenis Resource</label>
                            <select id="create_d2" disabled class="w-full px-4 py-2.5 rounded-lg border border-gray-200 bg-gray-100 text-gray-400 text-sm disabled:cursor-not-allowed">
                                <option value="">-- Pilih Kategori Utama Dahulu --</option>
                            </select>
                        </div>

                        <!-- Level 3 (Form Tambah) -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">3. Pilih Proyek / Card Spesifik</label>
                            <select id="create_d3" disabled class="w-full px-4 py-2.5 rounded-lg border border-gray-200 bg-gray-100 text-gray-400 text-sm disabled:cursor-not-allowed">
                                <option value="">-- Pilih Sub-Item Dahulu --</option>
                            </select>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500">URL Terbentuk: 
                                <span id="create_preview_url" class="font-mono text-[#0e1d82] font-semibold">{{ old('link_url', '-') }}</span>
                            </p>
                        </div>
                    </div>
                    @error('link_url') 
                        <div class="md:col-span-2 -mt-4"><p class="text-red-500 text-xs font-medium">{{ $message }}</p></div> 
                    @enderror
                    
                    {{-- File Gambar & Preview --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">File Gambar <span class="text-red-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-[#0e1d82] transition dynamic-file-zone">
                            <div class="space-y-1 text-center w-full">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20L32 8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M28 8v12h12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="sliderImageInput" class="relative cursor-pointer bg-white rounded-md font-medium text-[#0e1d82] hover:text-[#0e1d82]/80 focus-within:outline-none">
                                        <span>Unggah file gambar</span>
                                        <input id="sliderImageInput" name="image" type="file" accept=".jpg,.jpeg,.png,.webp" class="sr-only" required>
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">Format: JPG, PNG, WEBP (Maks. 5MB)</p>
                                
                                {{-- Preview Upload Container --}}
                                <div id="sliderPreviewContainer" class="mt-4 p-3 bg-gray-50 border border-dashed border-gray-300 rounded-xl hidden flex flex-col items-center">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Preview Gambar Terpilih:</p>
                                    <img id="sliderImagePreview" src="#" class="h-32 w-auto object-cover rounded-xl shadow-sm border border-gray-200">
                                </div>
                            </div>
                        </div>
                        @error('image') 
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                {{-- Bagian Tombol Aksi Bawah Form --}}
                <div class="flex justify-end pt-4 border-t border-gray-100 space-x-3">
                    {{-- Mengarah langsung ke halaman index saat diklik --}}
                    <a href="{{ route('admin.branches.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    
                    {{-- Mengirimkan form ke Controller, yang nantinya akan meredirect ke index --}}
                    <button type="submit" class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Upload & Terapkan Banner
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT INTERAKTIF CREATE (Preview Gambar & Cascading Dropdown) --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- Helper Preview Gambar ---
        function setupImagePreview(inputId, containerId, previewId) {
            const input = document.getElementById(inputId);
            const container = document.getElementById(containerId);
            const preview = document.getElementById(previewId);

            if (input) {
                input.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            preview.src = e.target.result;
                            container.classList.remove('hidden');
                        }
                        reader.readAsDataURL(file);
                    } else {
                        container.classList.add('hidden');
                    }
                });
            }
        }

        setupImagePreview('sliderImageInput', 'sliderPreviewContainer', 'sliderImagePreview');

        // --- Function Pengatur State Dropdown ---
        function setDropdownState(element, enabled, placeholderText) {
            if (!element) return;
            element.disabled = !enabled;
            if (enabled) {
                element.classList.remove('bg-gray-100', 'text-gray-400', 'disabled:cursor-not-allowed');
                element.classList.add('bg-white', 'text-gray-800');
            } else {
                element.classList.add('bg-gray-100', 'text-gray-400', 'disabled:cursor-not-allowed');
                element.classList.remove('bg-white', 'text-gray-800');
            }
            element.innerHTML = `<option value="">${placeholderText}</option>`;
        }

        // --- Helper Pembuat URL Otomatis ---
        function buildUrl(cat, elD2, elD3) {
            if (!cat) return '';

            const optD2 = elD2 ? elD2.options[elD2.selectedIndex] : null;
            const optD3 = elD3 ? elD3.options[elD3.selectedIndex] : null;

            const slugD2 = (optD2 && elD2.value) ? (optD2.getAttribute('data-slug') || elD2.value) : '';
            const slugD3 = (optD3 && elD3.value) ? (optD3.getAttribute('data-slug') || elD3.value) : '';

            if (slugD3) {
                if (cat === 'sektor' || cat === 'proyek') {
                    return `/proyek/${slugD3}`;
                }
                if (cat === 'resources' && slugD2) {
                    return `/${slugD2}/${slugD3}`;
                }
                return `/${cat}/${slugD2}/${slugD3}`;
            }

            if (slugD2) {
                return `/${cat}/${slugD2}`;
            }

            return `/${cat}`;
        }

        // ==========================================
        // LOGIC CASCADING DROPDOWN FORM TAMBAH
        // ==========================================
        const c_d1 = document.getElementById('create_d1');
        const c_d2 = document.getElementById('create_d2');
        const c_d3 = document.getElementById('create_d3');
        const c_final = document.getElementById('create_final_link_url');
        const c_preview = document.getElementById('create_preview_url');

        function updateCreateUrl(url) {
            if (c_final) c_final.value = url;
            if (c_preview) c_preview.textContent = url || '-';
        }

        if (c_d1) {
            c_d1.addEventListener('change', function () {
                const cat = this.value;
                
                setDropdownState(c_d2, false, '-- Pilih Kategori Utama Dahulu --');
                setDropdownState(c_d3, false, '-- Pilih Sub-Item Dahulu --');

                if (!cat) { updateCreateUrl(''); return; }
                
                updateCreateUrl(buildUrl(cat, c_d2, c_d3));

                fetch(`/admin/api/dropdown/sub-items/${cat}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            setDropdownState(c_d2, true, '-- Pilih Sub Item / Jenis --');
                            data.forEach(item => {
                                const itemSlug = item.slug || item.id || '';
                                c_d2.innerHTML += `<option value="${item.id}" data-slug="${itemSlug}">${item.title}</option>`;
                            });
                        } else {
                            setDropdownState(c_d2, false, '-- Tidak ada sub-item --');
                        }
                    })
                    .catch(err => {
                        console.error("Error fetching sub-items:", err);
                        setDropdownState(c_d2, false, '-- Gagal memuat data --');
                    });
            });

            c_d2.addEventListener('change', function () {
                const cat = c_d1.value;
                const id = this.value;

                setDropdownState(c_d3, false, '-- Pilih Sub-Item Dahulu --');
                updateCreateUrl(buildUrl(cat, c_d2, c_d3));

                if (!id) return;

                fetch(`/admin/api/dropdown/detail-items/${cat}/${id}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            setDropdownState(c_d3, true, '-- Pilih Spesifik Card --');
                            data.forEach(item => {
                                const itemSlug = item.slug || item.id || '';
                                c_d3.innerHTML += `<option value="${item.id}" data-slug="${itemSlug}">${item.title}</option>`;
                            });
                        } else {
                            setDropdownState(c_d3, false, '-- Tidak ada detail spesifik --');
                        }
                    })
                    .catch(err => {
                        console.error("Error fetching detail-items:", err);
                        setDropdownState(c_d3, false, '-- Gagal memuat data --');
                    });
            });

            c_d3.addEventListener('change', function () {
                updateCreateUrl(buildUrl(c_d1.value, c_d2, c_d3));
            });
        }
    });
    </script>
</x-app-layout>