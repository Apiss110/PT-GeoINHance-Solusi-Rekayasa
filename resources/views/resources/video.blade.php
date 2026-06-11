<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Navbar Blur Effect */
        .nav-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }
        /* Underline animation */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #991b1b;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        /* Custom Shadow for clean look */
        .card-shadow {
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
        }
        [x-cloak] { display: none !important; }

            @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 25s linear infinite;
        }
        /* Pause jalan logo saat kursor user menempel di atasnya */
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900 ">

@include('partials.navbar')

<section class="bg-slate-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-blue-900/20 via-transparent to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="flex mb-4 text-sm text-slate-400 font-medium">
            <span class="text-slate-500">Resources</span>
            <span class="mx-2">/</span>
            <span class="text-blue-400">Video</span>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight">Galeri Video Teknis</h1>
        <p class="mt-3 text-base text-slate-300 max-w-3xl leading-relaxed">
            Kumpulan dokumentasi video proyek di lapangan, visualisasi animasi simulasi 3D, rekaman pengujian laboratorium, serta tutorial analisis numerik geoteknik dan struktural.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200/80 mb-10">
            <form id="filterFormVideo" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Cari Video</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" id="inputNamaVideo" placeholder="Ketik judul atau kata kunci video..." 
                               class="w-full bg-slate-50 border border-gray-200 rounded-lg pl-9 pr-4 py-2 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Kategori Video</label>
                    <select id="selectKategoriVideo" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">Semua Kategori</option>
                        <option value="simulasi-animasi">Simulasi & Animasi 3D</option>
                        <option value="dokumentasi-lapangan">Dokumentasi Proyek Lapangan</option>
                        <option value="tutorial-webinar">Tutorial & Webinar Teknis</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Tahun Produksi</label>
                    <select id="selectTahunVideo" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">Semua Tahun</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-slate-900 hover:bg-blue-700 text-white font-bold text-xs tracking-widest py-2.5 rounded-lg transition duration-200 shadow-sm uppercase text-center flex items-center justify-center gap-2">
                        <i class="fa-solid fa-sliders text-[10px]"></i> Saring Video
                    </button>
                </div>
            </form>
        </div>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                Daftar Putar <strong class="text-slate-900">Publikasi Video</strong>
            </span>
        </div>

        <div id="videoGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="video-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="simulasi animasi 3d keruntuhan lereng dan perkuatan soil nailing tol cipularang"
                 data-kategori="simulasi-animasi"
                 data-tahun="2024">
                <div>
                    <div class="bg-slate-900 h-48 flex items-center justify-center relative overflow-hidden cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-60 z-10"></div>
                        <i class="fa-solid fa-circle-play text-5xl text-white/80 group-hover:text-blue-500 group-hover:scale-110 transition duration-300 z-20"></i>
                        <span class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-mono px-1.5 py-0.5 rounded z-20">
                            05:24
                        </span>
                    </div>
                    
                    <div class="p-5 space-y-2">
                        <span class="inline-block text-[10px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">
                            Simulasi & Animasi 3D
                        </span>
                        <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2">
                            Visualisasi Animasi 3D Kelongsoran Massa Tanah & Mekanisme Kerja Soil Nailing
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2">
                            Video pemodelan dinamika deformasi tanah serta bagaimana barisan angkur aktif mentransfer beban ke lapisan batuan keras.
                        </p>
                    </div>
                </div>
                <div class="p-5 pt-0 border-t border-slate-100 mt-2 flex items-center justify-between text-[11px] text-slate-400">
                    <div>Tahun: <span class="font-semibold text-slate-700">2024</span></div>
                    <a href="#" class="inline-flex items-center gap-1 font-bold text-slate-900 hover:text-blue-600 transition">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="video-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="dokumentasi pengujian beban dinamis dynamic load test jembatan mahakam"
                 data-kategori="dokumentasi-lapangan"
                 data-tahun="2025">
                <div>
                    <div class="bg-slate-900 h-48 flex items-center justify-center relative overflow-hidden cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-60 z-10"></div>
                        <i class="fa-solid fa-circle-play text-5xl text-white/80 group-hover:text-blue-500 group-hover:scale-110 transition duration-300 z-20"></i>
                        <span class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-mono px-1.5 py-0.5 rounded z-20">
                            12:15
                        </span>
                    </div>
                    
                    <div class="p-5 space-y-2">
                        <span class="inline-block text-[10px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">
                            Dokumentasi Proyek
                        </span>
                        <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2">
                            Dokumentasi Lapangan: Dynamic Load Testing Skala Penuh Jembatan Rentang Lebar
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2">
                            Proses iring-iringan armada truk berat guna memicu getaran resonansi struktur jembatan penyeberangan sungai utama.
                        </p>
                    </div>
                </div>
                <div class="p-5 pt-0 border-t border-slate-100 mt-2 flex items-center justify-between text-[11px] text-slate-400">
                    <div>Tahun: <span class="font-semibold text-slate-700">2025</span></div>
                    <a href="#" class="inline-flex items-center gap-1 font-bold text-slate-900 hover:text-blue-600 transition">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="video-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="tutorial pemodelan pushover non linear analisis sap2000 menara gedung"
                 data-kategori="tutorial-webinar"
                 data-tahun="2024">
                <div>
                    <div class="bg-slate-900 h-48 flex items-center justify-center relative overflow-hidden cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-60 z-10"></div>
                        <i class="fa-solid fa-circle-play text-5xl text-white/80 group-hover:text-blue-500 group-hover:scale-110 transition duration-300 z-20"></i>
                        <span class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-mono px-1.5 py-0.5 rounded z-20">
                            45:10
                        </span>
                    </div>
                    
                    <div class="p-5 space-y-2">
                        <span class="inline-block text-[10px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">
                            Tutorial & Webinar Teknis
                        </span>
                        <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2">
                            Panduan Teknis Pemodelan Beban Gempa Non-Linear Pushover Tingkat Lanjut
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2">
                            Langkah demi langkah mendefinisikan sifat sendi plastis (*plastic hinges properties*) pada elemen balok dan kolom gedung bertingkat.
                        </p>
                    </div>
                </div>
                <div class="p-5 pt-0 border-t border-slate-100 mt-2 flex items-center justify-between text-[11px] text-slate-400">
                    <div>Tahun: <span class="font-semibold text-slate-700">2024</span></div>
                    <a href="#" class="inline-flex items-center gap-1 font-bold text-slate-900 hover:text-blue-600 transition">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="video-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="rekaman penyelidikan tanah pengeboran deep boring cpt cone penetration test bendungan toba"
                 data-kategori="dokumentasi-lapangan"
                 data-tahun="2023">
                <div>
                    <div class="bg-slate-900 h-48 flex items-center justify-center relative overflow-hidden cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-60 z-10"></div>
                        <i class="fa-solid fa-circle-play text-5xl text-white/80 group-hover:text-blue-500 group-hover:scale-110 transition duration-300 z-20"></i>
                        <span class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-mono px-1.5 py-0.5 rounded z-20">
                            08:40
                        </span>
                    </div>
                    
                    <div class="p-5 space-y-2">
                        <span class="inline-block text-[10px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">
                            Dokumentasi Proyek
                        </span>
                        <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2">
                            Penyelidikan Geoteknik Lapangan: Pengujian CPT Sondir Kedalaman Ekstrim
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2">
                            Rekaman teknis prosedur pengambilan sampel undisturbed tanah aluvial lunak di area rencana kaki tanggul bendungan utama.
                        </p>
                    </div>
                </div>
                <div class="p-5 pt-0 border-t border-slate-100 mt-2 flex items-center justify-between text-[11px] text-slate-400">
                    <div>Tahun: <span class="font-semibold text-slate-700">2023</span></div>
                    <a href="#" class="inline-flex items-center gap-1 font-bold text-slate-900 hover:text-blue-600 transition">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div class="video-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="visualisasi analisis elemen hingga fea stress concentration sambungan rangka baut atap stadion bandung"
                 data-kategori="simulasi-animasi"
                 data-tahun="2023">
                <div>
                    <div class="bg-slate-900 h-48 flex items-center justify-center relative overflow-hidden cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-60 z-10"></div>
                        <i class="fa-solid fa-circle-play text-5xl text-white/80 group-hover:text-blue-500 group-hover:scale-110 transition duration-300 z-20"></i>
                        <span class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-mono px-1.5 py-0.5 rounded z-20">
                            03:15
                        </span>
                    </div>
                    
                    <div class="p-5 space-y-2">
                        <span class="inline-block text-[10px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">
                            Simulasi & Animasi 3D
                        </span>
                        <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2">
                            Analisis Elemen Hingga (FEA): Spektrum Kontur Tegangan Pelat Simpul Rangka
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-2">
                            Pemetaan visual degradasi warna gradien regangan komponen sambungan kritis baja akibat kombinasi tarikan angin kencang ekstrem.
                        </p>
                    </div>
                </div>
                <div class="p-5 pt-0 border-t border-slate-100 mt-2 flex items-center justify-between text-[11px] text-slate-400">
                    <div>Tahun: <span class="font-semibold text-slate-700">2023</span></div>
                    <a href="#" class="inline-flex items-center gap-1 font-bold text-slate-900 hover:text-blue-600 transition">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <div id="noVideoMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                Tidak ada publikasi video yang cocok dengan kriteria filter Anda.
            </div>

        </div>

        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-gray-200 pt-6">
            <div class="text-sm text-slate-500 font-medium">
                Menampilkan <span id="countDisplayedVideo" class="text-slate-700 font-bold">0</span> dari <span id="countTotalVideo" class="text-slate-700 font-bold">0</span> rekaman video
            </div>
            
            <div id="paginationVideoControls" class="inline-flex rounded-lg bg-[#1E293B] p-0.5 text-white shadow-sm overflow-hidden">
                </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi Elemen DOM khusus Halaman Video
    const filterForm = document.getElementById('filterFormVideo');
    const inputNama = document.getElementById('inputNamaVideo');
    const selectKategori = document.getElementById('selectKategoriVideo');
    const selectTahun = document.getElementById('selectTahunVideo');
    const gridContainer = document.getElementById('videoGrid');
    const allCards = Array.from(gridContainer.querySelectorAll('.video-card'));
    const noMatchMessage = document.getElementById('noVideoMessage');
    
    const countDisplayed = document.getElementById('countDisplayedVideo');
    const countTotal = document.getElementById('countTotalVideo');
    const paginationControls = document.getElementById('paginationVideoControls');

    // 2. Konfigurasi Logika Pagination Internal
    const itemsPerPage = 3; // Jumlah kartu video per halaman yang diizinkan tampil
    let currentPage = 1;
    let filteredCards = [...allCards]; // Menyalin default penampung seluruh data kartu awal

    // 3. Fungsi Inti Sinkronisasi Tampilan UI (Filter + Pagination terintegrasi)
    function renderVideoUI() {
        // Sembunyikan semua kartu terlebih dahulu tanpa terkecuali
        allCards.forEach(card => card.classList.add('hidden'));

        const totalItems = filteredCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;

        // Validasi pengunci halaman aktif agar tidak melompat keluar setelah filter berubah
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        // Hitung batas indeks porsi data yang valid untuk ditampilkan di halaman aktif
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Ambil elemen kartu sesuai kalkulasi halaman lalu munculkan kembali
        const activePageCards = filteredCards.slice(startIndex, endIndex);
        activePageCards.forEach(card => card.classList.remove('hidden'));

        // Kendalikan visibilitas pesan notifikasi pencarian nihil
        if (totalItems === 0) {
            noMatchMessage.classList.remove('hidden');
        } else {
            noMatchMessage.classList.add('hidden');
        }

        // Perbarui komponen teks counter info data real-time
        countDisplayed.textContent = activePageCards.length;
        countTotal.textContent = totalItems;

        // Rakit susunan ulang blok navigasi tombol pagination dinamis
        buildPaginationButtons(totalPages);
    }

    // 4. Fungsi Pembuat Tombol Navigasi Halaman Secara Dinamis
    function buildPaginationButtons(totalPages) {
        paginationControls.innerHTML = '';

        // Tombol Kembali / Sebelumnya (Chevron Left)
        const prevButton = document.createElement('button');
        prevButton.type = 'button';
        prevButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === 1 ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        prevButton.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
        if (currentPage > 1) {
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderVideoUI();
            });
        }
        paginationControls.appendChild(prevButton);

        // Deretan Nomor Indeks Halaman Urut
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.type = 'button';
            pageButton.className = `px-4 py-2 text-xs font-bold transition ${currentPage === i ? 'bg-slate-700 text-white' : 'text-slate-400 hover:bg-slate-700/50'}`;
            pageButton.textContent = i;
            
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderVideoUI();
            });
            paginationControls.appendChild(pageButton);
        }

        // Tombol Lanjut / Selanjutnya (Chevron Right)
        const nextButton = document.createElement('button');
        nextButton.type = 'button';
        nextButton.className = `px-3 py-2 flex items-center text-xs transition ${currentPage === totalPages ? 'text-slate-500 cursor-not-allowed' : 'text-white hover:bg-slate-700'}`;
        nextButton.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
        if (currentPage < totalPages) {
            nextButton.addEventListener('click', () => {
                currentPage++;
                renderVideoUI();
            });
        }
        paginationControls.appendChild(nextButton);
    }

    // 5. Intersept Proses Submit Form Saringan data video
    filterForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Mengunci default submit form agar tidak memicu reload halaman

        const searchKeyword = inputNama.value.toLowerCase().trim();
        const selectedKategori = selectKategori.value;
        const selectedTahun = selectTahun.value;

        // Proses eliminasi data berbasis pencocokan kecocokan string atribut data-
        filteredCards = allCards.filter(card => {
            const cardName = card.getAttribute('data-nama');
            const cardKategori = card.getAttribute('data-kategori');
            const cardTahun = card.getAttribute('data-tahun');

            const matchSearch = !searchKeyword || cardName.includes(searchKeyword);
            const matchKategori = !selectedKategori || cardKategori === selectedKategori;
            const matchTahun = !selectedTahun || cardTahun === selectedTahun;

            return matchSearch && matchKategori && matchTahun;
        });

        // Setel penunjuk penanggalan indeks ke halaman 1 di awal setiap pemfilteran dilakukan
        currentPage = 1;
        renderVideoUI();
    });

    // 6. Eksekusi fungsi pertama kali saat file skrip siap dimuat
    renderVideoUI();
});
</script>

@include('partials.footer')

    <a href="https://wa.me/6285720062009" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        window.onscroll = function() {
            const nav = document.querySelector('nav');
            if (window.pageYOffset > 50) {
                nav.classList.add('shadow-md');
            } else {
                nav.classList.remove('shadow-md');
            }
        };
    </script>
    @livewireScripts
</body>
</html>