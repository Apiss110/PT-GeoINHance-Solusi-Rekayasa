<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAXIS 3D - PT GeoINHance Solusi Rekayasa</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    
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
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }
        /* Custom Shadow for clean look */
        .card-shadow {
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
        }
        /* Anti-flicker utility for Alpine */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900" x-data="{ mobileMenuOpen: false, mobileDropdownOpen: false, mobileProductDropdownOpen: false }">

    <!-- TOPBAR & NAVBAR -->
    <nav class="fixed w-full z-[100] transition-all duration-300">
        <div class="bg-[#002d62] text-white/90 py-2 px-6 md:px-16 text-[11px] flex justify-between items-center tracking-wider">
            <div class="flex items-center space-x-8">
                <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path></svg> Bandung, West Java</span>
                <span class="hidden sm:flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg> +62 21 2788 1958</span>
            </div>
            <div class="flex items-center space-x-4 font-bold">
                <a href="#" class="hover:text-yellow-500 transition">ID</a>
                <span class="opacity-20">|</span>
                <a href="#" class="hover:text-yellow-500 transition">EN</a>
            </div>
        </div>

        <div class="nav-glass border-b border-slate-200 py-4 px-6 md:px-16 flex justify-between items-center shadow-sm">
            <div class="flex items-center">
                <div class="bg-red-800 p-1.5 rounded-md mr-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div class="leading-none" style="cursor: pointer;" onclick="window.location.href='/'">
                    <span class="font-black text-xl tracking-tighter text-slate-900 block uppercase">Geo<span class="text-red-800">INHance</span></span>
                    <span class="text-[9px] font-bold text-slate-500 tracking-[0.2em] uppercase">Engineering Solutions</span>
                </div>
            </div>

            <!-- Desktop Links -->
            <div class="hidden lg:flex items-center space-x-10 text-[12px] font-bold uppercase tracking-widest text-slate-600">
                <a href="/profil" class="nav-link hover:text-red-800 transition">Profil Perusahaan</a>
                
                <!-- Sektor Dropdown -->
                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link hover:text-red-800 flex items-center space-x-1 focus:outline-none">
                        <span>SEKTOR</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="absolute left-0 mt-4 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal" x-cloak>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Pertambangan</a>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Oil & Gas</a>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Energi</a>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Infrastruktur & Transportasi</a>
                    </div>
                </div>

                <!-- Produk Dropdown (PLAXIS 3D Active) -->
                <div class="relative py-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="nav-link text-red-800 active flex items-center space-x-1 focus:outline-none">
                        <span>PRODUK</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="absolute left-0 mt-4 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2.5 z-50 normal-case font-medium text-slate-600 tracking-normal" x-cloak>
                        <div class="px-4 py-1 text-[10px] font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100 mb-1">Geotechnical Software</div>
                        <a href="{{ route('product.plaxis2d') }}" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">PLAXIS 2D</a>
                        <a href="{{ route('product.plaxis3d') }}" class="block px-4 py-2 bg-slate-50 text-red-800 font-bold transition">PLAXIS 3D</a>
                        <div class="px-4 py-1 mt-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100 mb-1">Geosynthetics</div>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geogrid InterAx</a>
                        <a href="#" class="block px-4 py-2 hover:bg-slate-50 hover:text-red-800 font-semibold transition">Geocell</a>
                    </div>
                </div>

                <a href="#" class="nav-link hover:text-red-800 transition">Proyek</a>
                <a href="#" class="nav-link hover:text-red-800 transition">Karir</a>
                <a href="#" class="nav-link hover:text-red-800 transition">Kontak</a>

                @auth
                    <!-- Kode autentikasi user Anda -->
                @else
                    <a href="{{ route('login') }}" class="bg-slate-900 text-white px-6 py-2.5 rounded shadow-lg hover:bg-red-800 transition-all duration-300 transform hover:-translate-y-0.5">
                        Client Area
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Burger Button -->
            <div class="lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div x-show="mobileMenuOpen" class="lg:hidden bg-white border-b border-slate-200 py-4 px-6 space-y-3 shadow-xl font-bold uppercase text-xs tracking-wider" x-cloak>
            <a href="/profil" class="block text-slate-600 hover:text-red-800 py-1">Profil Perusahaan</a>
            
            <!-- Mobile Produk Dropdown -->
            <div class="space-y-1">
                <button @click="mobileProductDropdownOpen = !mobileProductDropdownOpen" class="w-full flex justify-between items-center text-red-800 font-black py-1 text-left focus:outline-none">
                    <span>Produk</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="mobileProductDropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="mobileProductDropdownOpen" class="pl-4 border-l border-slate-200 space-y-2.5 py-1.5 normal-case font-semibold text-slate-500 text-[11px]" x-cloak>
                    <a href="{{ route('product.plaxis2d') }}" class="block hover:text-red-800">PLAXIS 2D</a>
                    <a href="{{ route('product.plaxis3d') }}" class="block text-red-800 font-bold">PLAXIS 3D</a>
                    <a href="#" class="block hover:text-red-800">Geogrid Systems</a>
                </div>
            </div>

            <a href="#" class="block text-slate-600 hover:text-red-800 py-1">Proyek</a>
            <a href="#" class="block text-slate-600 hover:text-red-800 py-1">Kontak</a>
        </div>
    </nav>

    <!-- CONTENT WRAPPER -->
    <div class="pt-[95px]">
        
        <!-- HEADER SECTION (TEMA GELAP BIRU BERADU MERAH) -->
        <section class="bg-[#002d62] text-white py-24 px-6 tracking-tight text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
            <div class="relative z-10" data-aos="zoom-in">
                <span class="text-red-500 font-bold uppercase text-xs tracking-[0.3em] block mb-3 animate-pulse">Ultimate 3D Geotechnical Analysis</span>
                <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight">PLAXIS 3D</h1>
                <p class="text-slate-300 text-sm md:text-base mt-3 max-w-xl mx-auto leading-relaxed">
                    Sistem Komputasi Elemen Hingga Tiga Dimensi Komprehensif untuk Pemodelan Geometri Tanah dan Struktur Volume Penuh.
                </p>
                <div class="w-16 h-1 bg-red-800 mx-auto mt-5 rounded-full"></div>
            </div>
        </section>

        <!-- PENGERTIAN & GAMBAR PRODUK -->
        <section class="max-w-7xl mx-auto py-20 px-6 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">3D Spatial Technology</span>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6 uppercase tracking-tight">
                    Presisi Tanpa Batas <br><span class="text-red-800">Dalam Ruang Tiga Dimensi</span>
                </h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    PLAXIS 3D membawa analisis rekayasa tanah ke tingkat akurasi tertinggi dengan menyertakan efek spasial tiga dimensi penuh. Ketika penyederhanaan potongan melintang 2D tidak lagi memadai, PLAXIS 3D hadir menangani kompleksitas geometri melengkung, interaksi beban sudut, serta anisotropi formasi batuan/tanah.
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    Melalui kemitraan dengan **PT GeoINHance Solusi Rekayasa**, tim Anda akan dipandu untuk memaksimalkan seluruh potensi fitur CAD-in, manajemen parameter tanah berlapis, hingga interpretasi grafik luaran visualisasi deformasi volumetrik yang rumit menjadi wawasan desain yang matang.
                </p>

                <div class="grid grid-cols-2 gap-6 border-t border-slate-200 pt-6">
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300">Full Volumetric</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Analisis Tegangan 3 Sumbu</span>
                    </div>
                    <div class="group cursor-pointer">
                        <span class="block text-2xl font-black text-[#002d62] group-hover:text-red-800 transition duration-300">CAD Interoperability</span>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Import Geometri Eksternal</span>
                    </div>
                </div>
            </div>
            
            <div class="relative group" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative z-10 border border-slate-200 bg-slate-900">
                    <!-- Placeholder Ilustrasi Workspace PLAXIS 3D -->
                    <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=800" alt="Plaxis 3D Modeling Work" class="w-full h-[450px] object-cover group-hover:scale-110 group-hover:opacity-40 transition duration-700">
                    
                    <div class="absolute inset-0 flex flex-col justify-end p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent">
                        <span class="text-red-500 font-bold uppercase text-[10px] tracking-widest mb-1">3D Mesh Generation</span>
                        <h4 class="text-white font-black text-xl uppercase tracking-wide">Elemen Tetrahedron Otomatis</h4>
                        <p class="text-slate-300 text-xs mt-2 leading-relaxed">Pembuatan jaring elemen volume segitiga bernoda jamak (10-node) demi menghasilkan hitungan konvergensi yang tangguh.</p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-red-800/10 rounded-full blur-2xl -z-10"></div>
            </div>
        </section>

        <!-- INTERAKTIF TAB: KEUNGGULAN / MODUL TEKNIS -->
        <section class="bg-slate-100 py-24 px-6 border-t border-b border-slate-200" x-data="{ activeTab: 'capabilities3d' }">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Advanced 3D Capabilities</span>
                    <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Kelebihan Komputasi 3D</h2>
                </div>

                <!-- Tab Buttons -->
                <div class="flex justify-center space-x-4 mb-8">
                    <button @click="activeTab = 'capabilities3d'" 
                            :class="activeTab === 'capabilities3d' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                            class="px-6 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                        Workflow & Geometri
                    </button>
                    <button @click="activeTab = 'extensions3d'" 
                            :class="activeTab === 'extensions3d' ? 'bg-red-800 text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-200'"
                            class="px-6 py-3 rounded-xl font-bold uppercase text-xs tracking-widest transition-all duration-300 border border-slate-200">
                        Analisis Lanjutan
                    </button>
                </div>

                <!-- Tab Content Box -->
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-200 min-h-[220px] flex items-center relative overflow-hidden">
                    
                    <!-- Content 1 -->
                    <div x-show="activeTab === 'capabilities3d'" x-transition:enter="transition ease-out duration-500" class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-black text-[#002d62] uppercase mb-2">BIM Integration & CAD</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Impor file topografi lapangan langsung dari ekstensi DXF, STEP, atau skrip IFC, meminimalkan rekonstruksi ulang geometri struktur tanah manual.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-[#002d62] uppercase mb-2">Tunnel Designer</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Modul khusus perancangan terowongan lengkung lengkap dengan sekat pendorong (shield), perkuatan payung batuan (*rockbolts*), dan lapisan dinding beton sekunder.</p>
                        </div>
                    </div>

                    <!-- Content 2 -->
                    <div x-show="activeTab === 'extensions3d'" x-transition:enter="transition ease-out duration-500" class="w-full grid grid-cols-1 md:grid-cols-2 gap-6" x-cloak>
                        <div>
                            <h3 class="text-lg font-black text-red-800 uppercase mb-2">Dynamic & Consolidation</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Mampu mensimulasikan getaran gempa berulang, perambatan gelombang mekanis beban kereta cepat, serta penurunan konsolidasi tanah dalam fungsi waktu.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-red-800 uppercase mb-2">Coupled Flow Analysis</h3>
                            <p class="text-slate-600 text-sm leading-relaxed">Menghubungkan deformasi mekanis tanah secara simultan dengan fluktuasi tekanan hidrolik air tanah tidak konstan (*unsaturated fluid flow*).</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- LAYOUT SPESIFIKASI DAN APLIKASI -->
        <section class="max-w-7xl mx-auto py-24 px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <!-- Kolom Kiri - Sektor Aplikasi -->
                <div class="lg:col-span-2 space-y-8" data-aos="fade-right">
                    <div>
                        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">Implementation</span>
                        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Bidang Aplikasi Proyek 3D</h2>
                        <div class="w-12 h-1 bg-red-800 mt-3 rounded-full"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="material-symbols-outlined text-red-800 text-3xl mb-3">domain</span>
                            <h4 class="font-bold text-slate-900 uppercase text-sm mb-1">Grup Tiang Fondasi & Raft (Piled-Raft)</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Evaluasi distribusi beban aksial-lateral antar baris tiang pancang gedung pencakar langit.</p>
                        </div>
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                            <span class="material-symbols-outlined text-red-800 text-3xl mb-3">architecture</span>
                            <h4 class="font-bold text-slate-900 uppercase text-sm mb-1">Interaksi Terowongan Silang</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Perhitungan efek simpangan tegangan tanah akibat jalur *underpass* baru yang memotong jalur pipa bawah tanah eksisting.</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan - Spesifikasi Teknis Sistem -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm h-fit" data-aos="fade-left">
                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-4 border-b border-slate-100 pb-3">Informasi Sistem & Lisensi</h3>
                    <table class="w-full text-left text-xs border-collapse">
                        <tbody>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">Developer</td><td class="py-3 text-[#002d62] font-bold">Bentley Systems</td></tr>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">OS</td><td class="py-3 text-slate-700 font-medium">Windows 10, 11 (64-bit)</td></tr>
                            <tr class="border-b border-slate-100"><td class="py-3 font-bold text-slate-400 uppercase">Komputasi</td><td class="py-3 text-slate-700 font-medium">Multicore CPU & GPU Accelerated</td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        <!-- CALL TO ACTION (CTA) -->
        <section class="bg-[#002d62] text-white py-16 px-6 text-center relative overflow-hidden">
            <div class="absolute -right-24 -bottom-24 w-72 h-72 bg-red-800 rounded-full blur-3xl opacity-20"></div>
            <div class="relative z-10 max-w-2xl mx-auto" data-aos="fade-up">
                <h3 class="text-2xl md:text-3xl font-black uppercase mb-4 tracking-tight">Implementasikan Pemodelan PLAXIS 3D Sekarang</h3>
                <p class="text-slate-300 text-xs md:text-sm mb-8 leading-relaxed">
                    Tingkatkan keandalan analisis spasial infrastruktur Anda. Sediakan lisensi resmi korporasi, program edukasi bersertifikat, atau kolaborasi pengerjaan pemodelan 3D bersama tim teknis senior kami.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://wa.me/622127881958" target="_blank" class="bg-red-800 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-widest px-6 py-3.5 rounded transition shadow-lg">
                        <i class="fab fa-whatsapp mr-2"></i> Hubungi Tim Teknis
                    </a>
                </div>
            </div>
        </section>

    </div>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-12 px-6 md:px-16 border-t border-slate-800">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-white/10 pb-16">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-6">
                        <div class="bg-red-800 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <span class="font-black text-2xl tracking-tighter uppercase">Geo<span class="text-red-800">INHance</span></span>
                    </div>
                    <p class="text-slate-400 leading-relaxed mb-8 max-w-sm">
                        Menyediakan layanan konsultasi rekayasa teknik dan geoteknik kelas dunia dengan integritas dan akurasi tinggi di seluruh Indonesia.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-red-800 transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-3">Produk Utama</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('product.plaxis2d') }}" class="hover:text-red-500 transition">PLAXIS 2D</a></li>
                    <li><a href="#" class="hover:text-red-500 transition">PLAXIS 3D</a></li>
                    <li><a href="#" class="hover:text-red-500 transition">Geogrid Systems</a></li>
                </ul>
            </div>
            <div>
                    <h4 class="font-bold text-red-500 uppercase text-xs tracking-widest mb-8">Kantor Pusat</h4>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        Menara Sentraya Lt. 11 Unit A4, <br>
                        Jl. Iskandarsyah Raya, Jakarta Selatan.
                    </p>
                    <p class="text-slate-400 text-sm mb-2">P: +62 21 2788 1958</p>
                    <p class="text-slate-400 text-sm text-red-500 font-bold">E: info@geoinhance.com</p>
                </div>
            </div>
            
            <div class="max-w-7xl mx-auto pt-8 flex flex-col md:flex-row justify-between items-center text-[10px] text-slate-500 uppercase tracking-[0.2em]">
                <p>© 1945 PT GeoINHance Solusi Rekayasa. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="{{ url('/privacy-policy') }}" class="hover:text-red-800 transition-colors">Privacy Policy</a>
                    <a href="{{ url('/terms-of-service') }}" class="hover:text-red-800 transition-colors">Terms of Service</a>
                </div>
            </div>
    </footer>

    <!-- SCRIPT AKTIVASI -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
    @livewireScripts
</body>
</html>