@include('partials.navbar')

<section class="bg-slate-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-blue-900/20 via-transparent to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="flex mb-4 text-sm text-slate-400 font-medium">
            <a href="{{ route('proyek.semua') }}" class="hover:text-white transition">{{ __('breadcrumbs.projects') }}</a>
            <span class="mx-2">/</span>
            <span class="text-blue-400">{{ __('structural.title') }}</span>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight">{{ __('structural.title') }}</h1>
        <p class="mt-3 text-base text-slate-300 max-w-3xl leading-relaxed">
            {{ __('structural.description') }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200/80 mb-10">
            <form id="filterFormStructural" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.search_label') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" id="inputNamaStructural" placeholder="{{ __('filter.search_placeholder_structural') }}" 
                               class="w-full bg-slate-50 border border-gray-200 rounded-lg pl-9 pr-4 py-2 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.year_label') }}</label>
                    <select id="selectTahunStructural" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.year_all') }}</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.category_label') }}</label>
                    <select id="selectKategoriStructural" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.category_all') }}</option>
                        <option value="seismik-pushover">{{ __('filter.category.seismik_pushover') }}</option>
                        <option value="fea-optimasi">{{ __('filter.category.fea_optimasi') }}</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.location_label') }}</label>
                    <select id="selectLokasiStructural" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.location_all') }}</option>
                        <option value="jawa-timur">{{ __('filter.location.jawa_timur') }}</option>
                        <option value="jawa-barat">{{ __('filter.location.jawa_barat') }}</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-slate-900 hover:bg-red-800 text-white font-bold text-xs tracking-widest py-2.5 rounded-lg transition duration-200 shadow-sm uppercase text-center flex items-center justify-center gap-2">
                        <i class="fa-solid fa-filter text-[10px]"></i> {{ __('filter.apply') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="mb-8 flex justify-between items-center border-b border-gray-200 pb-4">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('portfolio.list_title') }} <strong class="text-slate-900">{{ __('structural.title') }}</strong>
            </span>
            
            @if(request('from') == 'all')
                <a href="{{ route('proyek.semua') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition flex items-center gap-1">
                    <i class="fa-solid fa-arrow-left"></i> {{ __('portfolio.back_to_all') }}
                </a>
            @endif
        </div>

        <div id="projectGridStructural" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="project-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="{{ Str::lower(__('project.structural.1.title')) }}"
                 data-tahun="2024"
                 data-kategori="seismik-pushover"
                 data-lokasi="jawa-timur">
                <div>
                    <div class="bg-slate-900 h-44 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80 z-10"></div>
                        <i class="fa-solid fa-chart-line text-5xl text-blue-500/20 group-hover:scale-110 transition duration-300"></i>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-blue-600 transition min-h-[3rem] line-clamp-2">
                            {{ __('project.structural.1.title') }}
                        </h3>
                        
                        <div class="space-y-2 text-xs border-t border-b border-gray-100 py-3 my-2 text-slate-600">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.category') }}</span>
                                <span class="font-semibold text-slate-900 bg-slate-100 px-2 py-0.5 rounded text-[11px]">{{ __('filter.category.seismik_pushover') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.location') }}</span>
                                <span class="font-semibold text-slate-900">{{ __('project.structural.1.location') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.year') }}</span>
                                <span class="font-semibold text-slate-900">2024</span>
                            </div>
                        </div>

                        <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                            {{ __('project.structural.1.desc') }}
                        </p>
                    </div>
                </div>
                
                <div class="p-6 pt-0 space-y-3">
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-slate-50 text-slate-600 text-[10px] font-mono px-2 py-0.5 rounded border border-slate-200">SAP2000</span>
                    </div>
                    <a href="#" class="block text-center bg-slate-900 text-white py-2 rounded-lg text-xs font-semibold hover:bg-red-800 transition">
                        {{ __('portfolio.read_more') }}
                    </a>
                </div>
            </div>

            <div class="project-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="{{ Str::lower(__('project.structural.2.title')) }}"
                 data-tahun="2023"
                 data-kategori="fea-optimasi"
                 data-lokasi="jawa-barat">
                <div>
                    <div class="bg-slate-900 h-44 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80 z-10"></div>
                        <i class="fa-solid fa-network-wired text-5xl text-blue-500/20 group-hover:scale-110 transition duration-300"></i>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-blue-600 transition min-h-[3rem] line-clamp-2">
                            {{ __('project.structural.2.title') }}
                        </h3>
                        
                        <div class="space-y-2 text-xs border-t border-b border-gray-100 py-3 my-2 text-slate-600">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.category') }}</span>
                                <span class="font-semibold text-slate-900 bg-slate-100 px-2 py-0.5 rounded text-[11px]">{{ __('filter.category.fea_optimasi') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.location') }}</span>
                                <span class="font-semibold text-slate-900">{{ __('project.structural.2.location') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.year') }}</span>
                                <span class="font-semibold text-slate-900">2023</span>
                            </div>
                        </div>

                        <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                            {{ __('project.structural.2.desc') }}
                        </p>
                    </div>
                </div>
                
                <div class="p-6 pt-0 space-y-3">
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-slate-50 text-slate-600 text-[10px] font-mono px-2 py-0.5 rounded border border-slate-200">ANSYS / Abaqus</span>
                    </div>
                    <a href="#" class="block text-center bg-slate-900 text-white py-2 rounded-lg text-xs font-semibold hover:bg-red-800 transition">
                        {{ __('portfolio.read_more') }}
                    </a>
                </div>
            </div>

            <div id="noProjectMessageStructural" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('portfolio.empty_structural') }}
            </div>

        </div>

        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-gray-200 pt-6">
            <div class="text-sm text-slate-500 font-medium">
                {{ __('portfolio.showing') }} <span id="countDisplayedStructural" class="text-slate-700 font-bold">2</span> {{ __('portfolio.of') }} <span id="countTotalStructural" class="text-slate-700 font-bold">2</span> {{ __('portfolio.results') }}
            </div>
            
            <div class="inline-flex rounded-lg bg-[#1E293B] p-0.5 text-white shadow-sm overflow-hidden">
                <span class="px-3 py-2 text-slate-500 flex items-center text-xs cursor-not-allowed">
                    <i class="fa-solid fa-chevron-left"></i>
                </span>
                <a href="#" class="px-4 py-2 bg-slate-700/60 text-white text-xs font-bold transition">
                    1
                </a>
                <span class="px-3 py-2 text-slate-500 flex items-center text-xs cursor-not-allowed">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('filterFormStructural').addEventListener('submit', function(e) {
    e.preventDefault(); // Mengunci reload halaman penuh

    // Menangkap pilihan filter milik user
    const filterNama = document.getElementById('inputNamaStructural').value.toLowerCase().trim();
    const filterTahun = document.getElementById('selectTahunStructural').value;
    const filterKategori = document.getElementById('selectKategoriStructural').value;
    const filterLokasi = document.getElementById('selectLokasiStructural').value;

    const cards = document.querySelectorAll('.project-card');
    let displayedCount = 0;

    cards.forEach(card => {
        // Ekstraksi data-atribut dari card
        const cardNama = card.getAttribute('data-nama');
        const cardTahun = card.getAttribute('data-tahun');
        const cardKategori = card.getAttribute('data-kategori');
        const cardLokasi = card.getAttribute('data-lokasi');

        // Evaluasi logika kecocokan masukan filter
        const matchNama = filterNama === "" || cardNama.includes(filterNama);
        const matchTahun = filterTahun === "" || cardTahun === filterTahun;
        const matchKategori = filterKategori === "" || cardKategori === filterKategori;
        const matchLokasi = filterLokasi === "" || cardLokasi === filterLokasi;

        if (matchNama && matchTahun && matchKategori && matchLokasi) {
            card.style.display = 'flex';
            displayedCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Melakukan sinkronisasi otomatis ke teks pencatatan data bawah
    document.getElementById('countDisplayedStructural').innerText = displayedCount;
    
    // Tampilkan pesan jika kosong pencarian
    const noMessage = document.getElementById('noProjectMessageStructural');
    if (displayedCount === 0) {
        noMessage.classList.remove('hidden');
    } else {
        noMessage.classList.add('hidden');
    }
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