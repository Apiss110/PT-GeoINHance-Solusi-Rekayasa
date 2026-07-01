@include('partials.navbar')
        
        <livewire:home-slider />

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<section id="home-about" class="w-full py-24 px-12 md:px-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
        
        <div data-aos="fade-right">
            
            <h2 class="text-3xl md:text-4xl font-black uppercase text-slate-900 tracking-tight mb-5 leading-tight">
                {{ __('home.about_title_1') }} <br class="hidden xl:block">
                <span class="text-red-800">{{ __('home.about_title_2') }}</span>
            </h2>
            
            <div class="w-12 h-[2px] bg-red-800 mb-8"></div>
            
            <p class="text-sm md:text-base leading-relaxed text-slate-500 mb-8 text-justify md:text-left">
                {!! __('home.about_desc') !!}
            </p>

            <a href="/profil" class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-wider text-red-800 hover:text-[#002d62] transition-colors group">
                {{ __('home.about_btn') }}
                <span class="transform group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>

        <div class="relative" data-aos="fade-left" data-aos-delay="200">
            <div class="absolute -top-4 -right-4 w-full h-full bg-slate-50 border border-slate-200 rounded-2xl -z-10"></div>
            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-red-50 rounded-full blur-2xl -z-10"></div>
            
            <div class="overflow-hidden rounded-2xl shadow-lg border border-slate-100 relative group">
                <img src="../images/inh 1.jpeg" alt="GeoINHance Project" class="w-full h-auto object-cover aspect-[4/3] group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/30 to-transparent pointer-events-none"></div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="w-full py-24 px-12 md:px-20 bg-white">
    <div class="text-center mb-24" data-aos="fade-up">
        <span class="inline-block px-4 py-1.5 rounded-full border border-red-100 bg-red-50 text-red-800 text-[11px] font-extrabold uppercase tracking-[0.3em] shadow-sm mb-4">
            {{ __('home.service_badge') }}
        </span>
        <h2 class="text-3xl md:text-4xl font-black uppercase text-slate-900 tracking-tight">
            {{ __('home.service_title_1') }}
        </h2>
        <div class="w-12 h-[2px] bg-red-800 mx-auto mt-5"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 lg:gap-24 w-full text-center">
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="100">
            <span class="material-symbols-outlined text-[85px] text-red-800">support_agent</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_1_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_1_desc') }}</p>
        </div>
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="200">
            <span class="material-symbols-outlined text-[85px] text-red-800">description</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_2_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_2_desc') }}</p>
        </div>
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="300">
            <span class="material-symbols-outlined text-[85px] text-red-800">payments</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_3_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_3_desc') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-24 w-full md:max-w-[66%] mx-auto text-center mt-20">
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="400">
            <span class="material-symbols-outlined text-[85px] text-red-800">handshake</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_4_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_4_desc') }}</p>
        </div>
        <div class="flex flex-col items-center space-y-5" data-aos="fade-up" data-aos-delay="500">
            <span class="material-symbols-outlined text-[85px] text-red-800">model_training</span>
            <h3 class="text-lg md:text-xl font-black text-slate-900 uppercase tracking-wide">{{ __('home.serv_5_title') }}</h3>
            <p class="text-xs md:text-sm leading-relaxed text-slate-500 max-w-md mx-auto">{{ __('home.serv_5_desc') }}</p>
        </div>
    </div>
</section>

<section class="w-full bg-white py-24 border-t border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6 text-center mb-16" data-aos="fade-up">
        <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">{{ __('home.net_badge') }}</span>
        <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">{{ __('home.net_title') }}</h2>
        <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
        <p class="text-slate-500 text-sm max-w-xl mx-auto mt-4">{{ __('home.net_desc') }}</p>
    </div>

    <div class="w-full z-0 overflow-hidden relative border-t border-b border-slate-100" data-aos="fade-up">
        {{-- Tinggi peta diatur h-[550px], w-full memastikan ujung ke ujung --}}
        <div id="map-operasional" class="w-full h-[550px] bg-slate-50"></div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. KUNCI PETA AGAR STATIS
        var map = L.map('map-operasional', {
            dragging: false,         
            zoomControl: false,      
            scrollWheelZoom: false,  
            doubleClickZoom: false,  
            boxZoom: false,          
            touchZoom: false,        
            keyboard: false,         
            zoomSnap: 0.1,           
            minZoom: 5.5,            
            maxZoom: 5.5             
        }).setView([-1.9, 117.5], 5.6); 

        // 2. LOAD DESAIN PETA
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap &copy; CARTO',
            subdomains: 'abcd'
        }).addTo(map);

        // 3. Ambil data otomatis dari Database
        var branches = @json($branchesData ?? []); 
        var placedCoordinates = [];

        // 4. Looping data Pin otomatis
        branches.forEach(function(branch) {
            if (branch.lat && branch.lng) {
                var lat = parseFloat(branch.lat);
                var lng = parseFloat(branch.lng);
                
                // Algoritma Anti-Tumpuk Koordinat
                placedCoordinates.forEach(function(coord) {
                    var distance = Math.sqrt(Math.pow(coord.lat - lat, 2) + Math.pow(coord.lng - lng, 2));
                    if (distance < 0.18) { 
                        lat += 0.12; 
                        lng += 0.12; 
                    }
                });
                placedCoordinates.push({lat: lat, lng: lng});

                // Custom Pin Shape
                var customIcon = L.divIcon({
                    className: 'corporate-micro-pin',
                    html: `
                        <div class="relative flex items-center justify-center w-5 h-7">
                            <span class="animate-ping absolute top-0.5 inline-flex h-4 w-4 rounded-full bg-blue-400 opacity-30"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 32" class="w-5 h-7 drop-shadow-[0_2px_4px_rgba(15,23,42,0.3)]">
                                <path d="M12 32 L2 18 L2 6 L12 1 L22 6 L22 18 Z" fill="#0f172a" stroke="#ffffff" stroke-width="1.5" stroke-linejoin="round"/>
                                <circle cx="12" cy="11" r="3" fill="#ffffff"/>
                            </svg>
                        </div>
                    `,
                    iconSize: [20, 28],       
                    iconAnchor: [10, 28],     
                    popupAnchor: [0, -28]     
                });
                
                var marker = L.marker([lat, lng], { icon: customIcon, riseOnHover: true }).addTo(map);

                // Algoritma Jalur URL Gambar
                var rawImg = branch.img ? branch.img.toString().trim() : '';
                var defaultPlaceholder = 'https://placehold.co/600x400/e2e8f0/0f172a?text=GeoINHance';
                var finalImgUrl = defaultPlaceholder;

                if (rawImg) {
                    if (rawImg.startsWith('http://') || rawImg.startsWith('https://')) {
                        finalImgUrl = rawImg;
                    } else {
                        rawImg = rawImg.replace(/\\/g, '/').replace(/^public\//i, '').replace(/^storage\//i, '').replace(/^branches\//i, '');
                        finalImgUrl = `/storage/branches/${rawImg}`;
                    }
                }

                // --- LOGIKA BARU: LINK DIREKSI PROYEK ---
                // Jika data link di database kosong, fallback otomatis akan mengarah ke '#'
                var projectLink = branch.link ? branch.link : '#';
                
                // Jendela Popup Card (Sekarang dibungkus Tag <a> agar bisa diklik)
                var popupContent = `
                    <a href="${projectLink}" class="block w-64 font-sans p-1 group no-underline text-inherit cursor-pointer">
                        <div class="h-28 w-full overflow-hidden rounded-xl bg-slate-100 relative mb-3 ring-1 ring-slate-200/50 group-hover:ring-blue-500 transition-all duration-300">
                            <img src="${finalImgUrl}" 
                                 onerror="this.onerror=null; this.src='${defaultPlaceholder}';" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500" 
                                 alt="${branch.title}">
                            <span class="absolute bottom-2 left-2 bg-red-800 text-white text-[8px] font-bold uppercase tracking-widest px-2 py-0.5 rounded shadow">
                                ${branch.daerah ? branch.daerah.toUpperCase() : 'LOKASI'}
                            </span>
                        </div>
                        
                        <h3 class="text-xs font-black text-slate-950 uppercase tracking-wide mb-1 leading-tight group-hover:text-blue-600 transition-colors duration-200 flex items-center justify-between">
                            <span>${branch.title}</span>
                        </h3>
                        
                        <p class="text-slate-500 text-[10px] leading-relaxed mb-2">${branch.desc}</p>
                        
                        <div class="flex items-center justify-between border-t border-slate-100 pt-2 mt-1">
                            <span class="flex items-center gap-1 text-[8px] font-bold text-emerald-600 uppercase tracking-wider">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span> {{ __('home.net_active') }}
                            </span>
                            
                            ${branch.link ? `
                            <span class="text-[9px] font-bold text-blue-600 flex items-center gap-0.5 opacity-70 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all duration-200">
                                Lihat Proyek <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-2.5 h-2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
                            </span>
                            ` : ''}
                        </div>
                    </a>
                `;
                
                marker.bindPopup(popupContent, { maxWidth: 300 });
            }
        });
    });
</script>

<style>
    #map-operasional .leaflet-tile {
        filter: brightness(1.06) contrast(1.01) saturate(90%);
    }
    .leaflet-popup-content-wrapper {
        border-radius: 1rem !important;
        box-shadow: 0 10px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1) !important;
        border: 1px solid rgb(241 245 249) !important;
        padding: 4px !important;
    }
    .leaflet-popup-tip {
        box-shadow: none !important;
    }
    /* Menghilangkan garis bawah default bawaan browser pada link popup */
    .leaflet-popup-content a {
        text-decoration: none !important;
    }
</style>


<section class="bg-slate-50 py-24 px-6 border-b border-slate-100 overflow-hidden" x-data="{
    categories: [
        { name: '{{ __('home.partners.cat_govt') }}', count: '{{ __('home.partners.count_govt') }}' },
        { name: '{{ __('home.partners.cat_contractor') }}', count: '{{ __('home.partners.count_contractor') }}' },
        { name: '{{ __('home.partners.cat_private') }}', count: '{{ __('home.partners.count_private') }}' }
    ]
}">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">{{ __('home.partners.badge') }}</span>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">{{ __('home.partners.title') }}</h2>
            <div class="w-16 h-1 bg-red-800 mx-auto mt-4 rounded-full"></div>
            <p class="text-slate-500 text-sm max-w-xl mx-auto mt-4">{{ __('home.partners.desc') }}</p>
        </div>

        <div class="w-full relative py-4 mb-16 select-none" data-aos="fade-up" data-aos-delay="100">
            {{-- PERBAIKAN: Lapisan gradasi putih di kiri & kanan yang menghalangi logo telah dihapus di sini --}}

            <div class="flex w-max animate-marquee whitespace-nowrap items-center hover:[animation-play-state:paused]">
                
                {{-- Track Pertama --}}
                <div class="flex gap-12 md:gap-16 items-center shrink-0 pr-12 md:pr-16">
                    <img src="{{ asset('images/PUPR.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Kementerian PUPR">
                    <img src="{{ asset('images/WASKITA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Waskita">
                    <img src="{{ asset('images/WIKA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="WIKA">
                    <img src="{{ asset('images/adhi-karya.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Adhi Karya">
                    <img src="{{ asset('images/hutama-karya.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Hutama Karya">
                    <img src="{{ asset('images/PTPP.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="PT PP">
                    <img src="{{ asset('images/Lapi-Ganesha-Utama.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="LAPI Ganesha Utama">
                    <img src="{{ asset('images/KCIC.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="KCIC">
                    <img src="{{ asset('images/MSM.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="MSM">
                    <img src="{{ asset('images/TTN.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="TTN">
                    <img src="{{ asset('images/ABIPRAYA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Abipraya">
                    <img src="{{ asset('images/agung-sedayu-grup.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Agung Sedayu Group">
                    <img src="{{ asset('images/KAI.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="KAI">
                    <img src="{{ asset('images/JASAMARGA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="JASAMARGA Jogja-Bawen">
                    <img src="{{ asset('images/JASAMARGA1.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="JASAMARGA">
                    <img src="{{ asset('images/MEDCOENERGI.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Medco Energi">
                    <img src="{{ asset('images/java-offshore.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Java Offshore">
                    <img src="{{ asset('images/PLN.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="PLN">
                    <img src="{{ asset('images/NINDYA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="NINDYA">
                    <img src="{{ asset('images/KELLER.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Keller">
                    <img src="{{ asset('images/STI.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Sungai Tabuk Industri">
                    <img src="{{ asset('images/CGA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Cipta Graha Abadi">
                    <img src="{{ asset('images/indec-internusa.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Indec Internusa">
                    <img src="{{ asset('images/mcm.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="MCM">
                    <img src="{{ asset('images/geoforce_indonesia_logo.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="GeoForce">
                    <img src="{{ asset('images/MBB.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Mátra Bumi Blambangan">
                </div>
                
                {{-- Track Kedua (Duplikat Sempurna untuk Marquee Mulus) --}}
                <div class="flex gap-12 md:gap-16 items-center shrink-0 pr-12 md:pr-16" aria-hidden="true">
                    <img src="{{ asset('images/PUPR.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Kementerian PUPR">
                    <img src="{{ asset('images/WASKITA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Waskita">
                    <img src="{{ asset('images/WIKA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="WIKA">
                    <img src="{{ asset('images/adhi-karya.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Adhi Karya">
                    <img src="{{ asset('images/hutama-karya.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Hutama Karya">
                    <img src="{{ asset('images/PTPP.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="PT PP">
                    <img src="{{ asset('images/Lapi-Ganesha-Utama.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="LAPI Ganesha Utama">
                    <img src="{{ asset('images/KCIC.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="KCIC">
                    <img src="{{ asset('images/MSM.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="MSM">
                    <img src="{{ asset('images/TTN.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="TTN">
                    <img src="{{ asset('images/ABIPRAYA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Abipraya">
                    <img src="{{ asset('images/agung-sedayu-grup.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Agung Sedayu Group">
                    <img src="{{ asset('images/KAI.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="KAI">
                    <img src="{{ asset('images/JASAMARGA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="JASAMARGA Jogja-Bawen">
                    <img src="{{ asset('images/JASAMARGA1.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="JASAMARGA">
                    <img src="{{ asset('images/MEDCOENERGI.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Medco Energi">
                    <img src="{{ asset('images/java-offshore.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Java Offshore">
                    <img src="{{ asset('images/PLN.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="PLN">
                    <img src="{{ asset('images/NINDYA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="NINDYA">
                    <img src="{{ asset('images/KELLER.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Keller">
                    <img src="{{ asset('images/STI.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Sungai Tabuk Industri">
                    <img src="{{ asset('images/CGA.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Cipta Graha Abadi">
                    <img src="{{ asset('images/indec-internusa.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Indec Internusa">
                    <img src="{{ asset('images/mcm.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="MCM">
                    <img src="{{ asset('images/geoforce_indonesia_logo.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="GeoForce">
                    <img src="{{ asset('images/MBB.png') }}" class="h-10 md:h-12 max-w-[110px] md:max-w-[140px] object-contain transition duration-300 hover:scale-105" alt="Mátra Bumi Blambangan">
                </div>

            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6" data-aos="fade-up" data-aos-delay="200">
            <template x-for="cat in categories">
                <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm flex items-center justify-between group hover:border-red-800/40 hover:shadow-md transition-all duration-300">
                    <div class="flex flex-col">
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-wider mb-1" x-text="cat.count"></span>
                        <h4 class="text-sm font-black text-slate-800 uppercase tracking-tight group-hover:text-red-800 transition-colors" x-text="cat.name"></h4>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-slate-50 group-hover:bg-red-50 text-slate-400 group-hover:text-red-800 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </template>
        </div>

        <style>
            @keyframes marquee {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            .animate-marquee {
                animation: marquee 90s linear infinite;
            }
        </style>
    </div>
</section>

<style>

</style>

<section id="portfolio" class="bg-slate-100 py-24 px-6 border-t border-slate-200">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16" data-aos="fade-up">
            <div class="mb-6 md:mb-0">
                <span class="text-red-800 font-bold uppercase text-xs tracking-[0.3em] block mb-2">{{ __('home.portfolio.badge') }}</span>
                <h2 class="text-5xl font-black text-slate-900 uppercase tracking-tighter">{{ __('home.portfolio.title') }}</h2>
            </div>
            <a href="#" class="text-red-800 font-bold text-sm border-b-2 border-red-800 pb-1 hover:text-slate-900 hover:border-slate-900 transition-all">
                {{ __('home.portfolio.link') }} &rarr;
            </a>
        </div>
        <div data-aos="fade-up" data-aos-delay="100">
            <livewire:project-slider />
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- SECTION: LATEST BLOG & NEWS               -->
<!-- ========================================== -->
@isset($blogs)
<section class="py-16 bg-white" id="blog-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10">
            <span class="text-xs font-bold tracking-widest text-[#c80000] uppercase block mb-2">Our Blog</span>
            <div class="flex flex-wrap justify-between items-end">
                <div>
                    <h2 class="text-3xl font-extrabold text-[#0e1d32] tracking-tight uppercase">
                        {{ __('home.blog.title1') }} <span class="text-slate-900">{{ __('home.blog.title2') }}</span>
                    </h2>
                    <div class="w-12 h-1 bg-[#c80000] mt-3"></div>
                </div>
                
                <div class="flex space-x-2">
                    <button class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition">
                        &#10094;
                    </button>
                    <button class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition">
                        &#10095;
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            @foreach($blogs as $blog)
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition duration-300">
                    <div class="relative h-64 overflow-hidden bg-slate-900">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90" alt="{{ $blog->title }}">
                        <span class="absolute top-4 left-4 bg-[#c80000] text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow-sm">
                            {{ $blog->category }}
                        </span>
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-2">
                                {{ $blog->created_at ? $blog->created_at->format('d M Y') : '' }}
                            </span>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#c80000] transition duration-200 line-clamp-2 mb-3">
                                {{ $blog->title }}
                            </h3>
                            <p class="text-sm text-slate-500 leading-relaxed line-clamp-3 mb-5">
                                {{ Str::limit(strip_tags($blog->content), 120) }}
                            </p>
                        </div>
                        
                        <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:text-slate-900 uppercase tracking-wider transition">
                            Pelajari Selengkapnya
                            <svg class="w-3.5 h-3.5 ml-1.5 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
@endisset

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