<x-app-layout>
<div class="container mx-auto px-6 py-4">
    <div class="mb-6">
        <a href="{{ route('admin.syllabus.index') }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1 mb-2">
            ← Kembali
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Tambah Silabus Baru</h1>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r">
            <p class="font-medium text-red-800">Ups! Ada beberapa kesalahan input:</p>
            <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.syllabus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">1. Informasi Utama & Metadata</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Judul Silabus</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: PLAXIS 2D Basic" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Kategori Software</label>
                        <select name="software_category" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                            <option value="PLAXIS" {{ old('software_category') == 'PLAXIS' ? 'selected' : '' }}>PLAXIS</option>
                            <option value="GeoStudio" {{ old('software_category') == 'GeoStudio' ? 'selected' : '' }}>GeoStudio (SLOPE/W)</option>
                            <option value="FLAC3D" {{ old('software_category') == 'FLAC3D' ? 'selected' : '' }}>FLAC3D</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Tingkatan (Level)</label>
                        <select name="level" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                            <option value="Basic" {{ old('level') == 'Basic' ? 'selected' : '' }}>Basic</option>
                            <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Modul</label>
                        <input type="number" name="modules_count" value="{{ old('modules_count') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: 12" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Nama Icon (FontAwesome)</label>
                        <input type="text" name="icon" value="{{ old('icon') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: fa-solid fa-layer-group">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Durasi Kursus</label>
                        <input type="text" name="durasi" value="{{ old('durasi') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: 40 Jam">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Jadwal Terdekat</label>
                        <input type="text" name="jadwal_terdekat" value="{{ old('jadwal_terdekat') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Setiap Sabtu, Jam 09.00">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Format Kelas</label>
                        <select name="format_kelas" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                            <option value="Live Zoom" {{ old('format_kelas') == 'Live Zoom' ? 'selected' : '' }}>Live Zoom</option>
                            <option value="Self-paced" {{ old('format_kelas') == 'Self-paced' ? 'selected' : '' }}>Self-paced Learning</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Poin CPD/PDH</label>
                        <input type="number" name="poin_cpd" value="{{ old('poin_cpd') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: 25">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Deskripsi Singkat (Halaman Utama)</label>
                    <textarea name="description" rows="3" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Tuliskan deskripsi singkat silabus..." required>{{ old('description') }}</textarea>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Overview & Manfaat Kursus (Detail Halaman)</label>
                    <textarea name="manfaat_kursus" rows="3" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Mengapa kursus ini penting dan apa benefit yang didapatkan peserta?">{{ old('manfaat_kursus') }}</textarea>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">2. Kebutuhan Prasyarat & Perangkat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Spesifikasi RAM Komputer Minimal</label>
                        <input type="text" name="minimal_ram" value="{{ old('minimal_ram') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Minimal RAM 8GB/16GB">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Penyediaan Lisensi Software</label>
                        <input type="text" name="lisensi_software" value="{{ old('lisensi_software') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Disediakan Lisensi Trial Edukasi">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Prasyarat Kemampuan Peserta</label>
                        <textarea name="prasyarat_peserta" rows="2" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Pemahaman dasar tentang Mekanika Tanah.">{{ old('prasyarat_peserta') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Target Peserta</label>
                        <textarea name="target_peserta" rows="2" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Sipil/Geotechnical Engineer, Mahasiswa Tingkat Akhir.">{{ old('target_peserta') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">3. Profil Instruktur / Pengajar</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Nama & Gelar Instruktur</label>
                        <input type="text" name="nama_instruktur" value="{{ old('nama_instruktur') }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Jhon Doe, G.E.">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Upload Foto / Avatar Instruktur</label>
                        <input type="file" name="foto_instruktur" class="w-full p-1.5 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">Pengalaman / Riwayat Proyek Instruktur</label>
                    <textarea name="proyek_instruktur" rows="3" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Tuliskan pengalaman atau proyek geoteknik besar yang pernah ditangani..."></textarea>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">4. Pilihan Paket Investasi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Harga Mahasiswa / Fresh Graduate (Rp)</label>
                        <input type="number" name="harga_mahasiswa" value="{{ old('harga_mahasiswa', 0) }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: 500000" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Harga Umum / Profesional (Rp)</label>
                        <input type="number" name="harga_profesional" value="{{ old('harga_profesional', 0) }}" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: 1500000" required>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-4 border-b pb-2">
                    <h3 class="text-lg font-semibold text-gray-700">5. Detail Modul Silabus (Dinamis)</h3>
                    <button type="button" id="add-module" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition">+ Tambah Modul</button>
                </div>
                <div id="module-container" class="space-y-3">
                    <div class="flex gap-2 items-center">
                        <input type="text" name="modul_materi[]" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Modul 1: Penyelidikan Tanah & Uji Lapangan (SPT, CPTu)">
                        <button type="button" class="remove-btn text-red-600 font-bold px-2 hover:text-red-800">X</button>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-4 border-b pb-2">
                    <h3 class="text-lg font-semibold text-gray-700">6. FAQ (Tanya Jawab Umum)</h3>
                    <button type="button" id="add-faq" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition">+ Tambah FAQ</button>
                </div>
                <div id="faq-container" class="space-y-4">
                    <div class="p-4 border rounded bg-gray-50 space-y-2 relative">
                        <button type="button" class="remove-btn absolute top-2 right-3 text-red-600 font-bold hover:text-red-800">X</button>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Pertanyaan</label>
                            <input type="text" name="faq_list[0][pertanyaan]" class="w-full p-2 border rounded bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Apakah kelas ini menyediakan rekaman?">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Jawaban</label>
                            <textarea name="faq_list[0][jawaban]" rows="2" class="w-full p-2 border rounded bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: Ya, rekaman resolusi tinggi disediakan dan bisa diakses selamanya."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()" class="px-5 py-2 border rounded-md text-gray-600 hover:bg-gray-100 transition">Batal</button>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition shadow-sm">Simpan Data Silabus</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Dinamis Tambah Form Baris Modul
    document.getElementById('add-module').addEventListener('click', function() {
        let container = document.getElementById('module-container');
        let div = document.createElement('div');
        div.className = 'flex gap-2 items-center';
        div.innerHTML = `
            <input type="text" name="modul_materi[]" class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan detail modul berikutnya...">
            <button type="button" class="remove-btn text-red-600 font-bold px-2 hover:text-red-800">X</button>
        `;
        container.appendChild(div);
    });

    // Dinamis Tambah Form Blok FAQ
    let faqIndex = 1;
    document.getElementById('add-faq').addEventListener('click', function() {
        let container = document.getElementById('faq-container');
        let div = document.createElement('div');
        div.className = 'p-4 border rounded bg-gray-50 space-y-2 relative';
        div.innerHTML = `
            <button type="button" class="remove-btn absolute top-2 right-3 text-red-600 font-bold hover:text-red-800">X</button>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1">Pertanyaan</label>
                <input type="text" name="faq_list[\${faqIndex}][pertanyaan]" class="w-full p-2 border rounded bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Pertanyaan">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1">Jawaban</label>
                <textarea name="faq_list[\${faqIndex}][jawaban]" rows="2" class="w-full p-2 border rounded bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Jawaban"></textarea>
            </div>
        `;
        container.appendChild(div);
        faqIndex++;
    });

    // Global Event Listener untuk menghapus baris dinamis (Modul / FAQ)
    document.addEventListener('click', function(e) {
        if(e.target && e.target.classList.contains('remove-btn')) {
            e.target.parentElement.remove();
        }
    });
</script>
</x-app-layout>