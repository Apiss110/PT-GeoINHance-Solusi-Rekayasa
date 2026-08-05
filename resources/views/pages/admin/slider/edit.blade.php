<x-app-layout>
    <div class="container mx-auto px-6 py-8">

        {{-- Header & Tombol Kembali --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">
                    Edit Data Banner Utama
                </h3>
                <p class="text-gray-500 text-sm mt-1">
                    Perbarui konten, link tujuan, atau ganti file foto banner
                </p>
            </div>
            <a href="{{ route('admin.slider.index') }}" 
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

        {{-- Card Form Edit --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-xl font-semibold text-gray-700">Formulir Edit Banner Utama</h3>
                <p class="text-gray-500 text-sm mt-1">Perbarui informasi banner slider portofolio.</p>
            </div>
            
            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                {{-- Sub-Judul --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Sub-Judul (Teks Kecil Atas)</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}" 
                           placeholder="Masukkan sub-judul..."
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                </div>

                {{-- Judul Utama --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Utama (Teks Besar)</label>
                    <input type="text" name="title" value="{{ old('title', $slider->title) }}" 
                           placeholder="Masukkan judul utama..."
                           class="w-full px-4 py-2.5 rounded-lg border border-gray-200 text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                </div>

                {{-- CASCADING DROPDOWN 3 LEVEL (EDIT) --}}
                <div class="space-y-4 p-5 bg-gray-50 border border-gray-200 rounded-xl">
                    <label class="block text-sm font-semibold text-[#0e1d82]">
                        Pemilihan Link Tujuan (Database)
                    </label>
                    
                    <!-- Hidden Final URL Input -->
                    <input type="hidden" name="link_url" id="edit_final_link_url" value="{{ old('link_url', $slider->link_url) }}">

                    <!-- Level 1 -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">1. Pilih Kategori Utama</label>
                        <select id="edit_d1" name="category" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition">
                            <option value="">-- Pilih Kategori Utama --</option>
                            <option value="sektor" {{ (old('category', $slider->category ?? '') == 'sektor') ? 'selected' : '' }}>Sektor</option>
                            <option value="products" {{ (old('category', $slider->category ?? '') == 'products') ? 'selected' : '' }}>Products</option>
                            <option value="proyek" {{ (old('category', $slider->category ?? '') == 'proyek') ? 'selected' : '' }}>Proyek</option>
                            <option value="training" {{ (old('category', $slider->category ?? '') == 'training') ? 'selected' : '' }}>Training</option>
                            <option value="resources" {{ (old('category', $slider->category ?? '') == 'resources') ? 'selected' : '' }}>Resources</option> 
                        </select>
                    </div>

                    <!-- Level 2 -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">2. Pilih Sub-Item / Sektor / Jenis Resource</label>
                        <select id="edit_d2" disabled class="w-full px-4 py-2.5 rounded-lg border border-gray-200 bg-gray-100 text-gray-400 text-sm disabled:cursor-not-allowed">
                            <option value="">-- Pilih Kategori Utama Dahulu --</option>
                        </select>
                    </div>

                    <!-- Level 3 -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">3. Pilih Proyek / Card Spesifik</label>
                        <select id="edit_d3" disabled class="w-full px-4 py-2.5 rounded-lg border border-gray-200 bg-gray-100 text-gray-400 text-sm disabled:cursor-not-allowed">
                            <option value="">-- Pilih Sub-Item Dahulu --</option>
                        </select>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">URL Terbentuk: 
                            <span id="url_preview_display" class="font-mono text-[#0e1d82] font-semibold">
                                {{ old('link_url', $slider->link_url ?? '-') }}
                            </span>
                        </p>
                    </div>
                </div>

                {{-- Ganti Gambar --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Ganti Gambar <span class="text-gray-400 font-normal text-xs">(Opsional)</span>
                    </label>

                    {{-- Gambar Saat Ini --}}
                    @if ($slider->image_path)
                        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-xl">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Gambar Saat Ini:</p>
                            <img src="{{ asset('storage/' . $slider->image_path) }}" alt="Banner Current" class="h-32 w-auto object-cover rounded-lg border border-gray-200 shadow-sm">
                        </div>
                    @endif

                    <input type="file" id="modalSliderImageInput" name="image" accept=".jpg,.jpeg,.png,.webp" 
                           class="w-full text-sm border border-gray-200 bg-white rounded-lg p-2 cursor-pointer text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-[#0e1d82] file:text-white hover:file:bg-[#0e1d82]/90">
                    
                    {{-- Preview Gambar Baru --}}
                    <div id="modalSliderPreviewContainer" class="mt-4 p-4 bg-gray-50 border border-dashed border-gray-200 rounded-xl hidden flex justify-center items-center">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Preview Gambar Baru:</p>
                            <img id="modalSliderImagePreview" src="#" alt="New Preview" class="w-full max-h-[350px] object-contain rounded-lg shadow-sm">
                        </div>
                    </div>
                </div>

                {{-- Footer Button --}}
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.slider.index') }}" 
                       class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition cursor-pointer">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT INTERAKTIF (Preview Gambar & Cascading Dropdown) --}}
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
            setupImagePreview('modalSliderImageInput', 'modalSliderPreviewContainer', 'modalSliderImagePreview');

            // --- Function Pengatur State Dropdown ---
            function setDropdownState(element, enabled, placeholderText) {
                if (!element) return;
                element.disabled = !enabled;
                if (enabled) {
                    element.classList.remove('bg-gray-100', 'text-gray-400', 'disabled:cursor-not-allowed');
                    element.classList.add('bg-white', 'text-gray-700');
                } else {
                    element.classList.add('bg-gray-100', 'text-gray-400', 'disabled:cursor-not-allowed');
                    element.classList.remove('bg-white', 'text-gray-700');
                }
                element.innerHTML = `<option value="">${placeholderText}</option>`;
            }

            // --- Helper Pembuat URL Otomatis (Dinamis untuk Resources & Lainnya) ---
            function buildUrl(cat, elD2, elD3) {
                if (!cat) return '';

                const optD2 = elD2 ? elD2.options[elD2.selectedIndex] : null;
                const optD3 = elD3 ? elD3.options[elD3.selectedIndex] : null;

                const slugD2 = (optD2 && elD2.value) ? (optD2.getAttribute('data-slug') || elD2.value) : '';
                const slugD3 = (optD3 && elD3.value) ? (optD3.getAttribute('data-slug') || elD3.value) : '';

                // Jika Level 3 Dipilih
                if (slugD3) {
                    if (cat === 'sektor' || cat === 'proyek') {
                        return `/proyek/${slugD3}`;
                    }
                    if (cat === 'resources' && slugD2) {
                        return `/${slugD2}/${slugD3}`;
                    }
                    return `/${cat}/${slugD2}/${slugD3}`;
                }

                // Jika Level 2 Dipilih
                if (slugD2) {
                    return `/${cat}/${slugD2}`;
                }

                // Hanya Level 1
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

            // ==========================================
            // LOGIC CASCADING DROPDOWN FORM EDIT
            // ==========================================
            const e_d1 = document.getElementById('edit_d1');
            const e_d2 = document.getElementById('edit_d2');
            const e_d3 = document.getElementById('edit_d3');
            const e_final = document.getElementById('edit_final_link_url');

            function updateEditUrl(url) {
                if (e_final) {
                    e_final.value = url;
                    e_final.dispatchEvent(new Event('input')); // trigger Alpine x-model
                }
            }

            if (e_d1) {
                e_d1.addEventListener('change', function () {
                    const cat = this.value;
                    
                    setDropdownState(e_d2, false, '-- Pilih Kategori Utama Dahulu --');
                    setDropdownState(e_d3, false, '-- Pilih Sub-Item Dahulu --');

                    if (!cat) { updateEditUrl(''); return; }
                    
                    updateEditUrl(buildUrl(cat, e_d2, e_d3));

                    fetch(`/admin/api/dropdown/sub-items/${cat}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data && data.length > 0) {
                                setDropdownState(e_d2, true, '-- Pilih Sub Item / Jenis --');
                                data.forEach(item => {
                                    const itemSlug = item.slug || item.id || '';
                                    e_d2.innerHTML += `<option value="${item.id}" data-slug="${itemSlug}">${item.title}</option>`;
                                });
                            } else {
                                setDropdownState(e_d2, false, '-- Tidak ada sub-item --');
                            }
                        })
                        .catch(err => {
                            console.error("Error fetching edit sub-items:", err);
                            setDropdownState(e_d2, false, '-- Gagal memuat data --');
                        });
                });

                e_d2.addEventListener('change', function () {
                    const cat = e_d1.value;
                    const id = this.value;

                    setDropdownState(e_d3, false, '-- Pilih Sub-Item Dahulu --');
                    updateEditUrl(buildUrl(cat, e_d2, e_d3));

                    if (!id) return;

                    fetch(`/admin/api/dropdown/detail-items/${cat}/${id}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data && data.length > 0) {
                                setDropdownState(e_d3, true, '-- Pilih Spesifik Card --');
                                data.forEach(item => {
                                    const itemSlug = item.slug || item.id || '';
                                    e_d3.innerHTML += `<option value="${item.id}" data-slug="${itemSlug}">${item.title}</option>`;
                                });
                            } else {
                                setDropdownState(e_d3, false, '-- Tidak ada detail spesifik --');
                            }
                        })
                        .catch(err => {
                            console.error("Error fetching edit detail-items:", err);
                            setDropdownState(e_d3, false, '-- Gagal memuat data --');
                        });
                });

                e_d3.addEventListener('change', function () {
                    updateEditUrl(buildUrl(e_d1.value, e_d2, e_d3));
                });
            }
        });
    </script>
</x-app-layout>