@include('partials.navbar')

<section class="bg-slate-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-blue-900/20 via-transparent to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="flex mb-4 text-sm text-slate-400 font-medium">
            <a href="{{ route('proyek.semua') }}" class="hover:text-white transition">{{ __('breadcrumbs.projects') }}</a>
            <span class="mx-2">/</span>
            <span class="text-blue-400">{{ __('ded.title') }}</span>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight">{{ __('ded.title') }}</h1>
        <p class="mt-3 text-base text-slate-300 max-w-3xl leading-relaxed">
            {{ __('ded.description') }}
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200/80 mb-10">
            <form id="filterForm" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.search_label') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" id="inputNama" placeholder="{{ __('filter.search_placeholder_ded') }}" 
                               class="w-full bg-slate-50 border border-gray-200 rounded-lg pl-9 pr-4 py-2 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.year_label') }}</label>
                    <select id="selectTahun" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.year_all') }}</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.category_label') }}</label>
                    <select id="selectKategori" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.category_all') }}</option>
                        <option value="ded">{{ __('filter.category.ded_structure') }}</option>
                        <option value="geotechnical">{{ __('filter.category.geotechnical') }}</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('filter.location_label') }}</label>
                    <select id="selectLokasi" class="w-full bg-slate-50 border border-gray-200 rounded-lg px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.location_all') }}</option>
                        <option value="yogyakarta">{{ __('filter.location.yogyakarta') }}</option>
                        <option value="sulawesi">{{ __('filter.location.sulawesi') }}</option>
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
                {{ __('portfolio.list_title') }} <strong class="text-slate-900">{{ __('ded.title') }}</strong>
            </span>
            
            @if(request('from') == 'all')
                <a href="{{ route('proyek.semua') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition flex items-center gap-1">
                    <i class="fa-solid fa-arrow-left"></i> {{ __('portfolio.back_to_all') }}
                </a>
            @endif
        </div>

        <div id="projectGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="project-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="{{ Str::lower(__('project.ded.1.title')) }}"
                 data-tahun="2023"
                 data-kategori="ded"
                 data-lokasi="yogyakarta">
                <div>
                    <div class="bg-slate-900 h-44 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80 z-10"></div>
                        <i class="fa-solid fa-graduation-cap text-5xl text-blue-500/20 group-hover:scale-110 transition duration-300"></i>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-blue-600 transition min-h-[3rem] line-clamp-2">
                            {{ __('project.ded.1.title') }}
                        </h3>
                        
                        <div class="space-y-2 text-xs border-t border-b border-gray-100 py-3 my-2 text-slate-600">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.category') }}</span>
                                <span class="font-semibold text-slate-900 bg-slate-100 px-2 py-0.5 rounded text-[11px]">{{ __('filter.category.ded_structure') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.location') }}</span>
                                <span class="font-semibold text-slate-900">{{ __('project.ded.1.location') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.year') }}</span>
                                <span class="font-semibold text-slate-900">2023</span>
                            </div>
                        </div>

                        <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                            {{ __('project.ded.1.desc') }}
                        </p>
                    </div>
                </div>
                
                <div class="p-6 pt-0 space-y-3">
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-slate-50 text-slate-600 text-[10px] font-mono px-2 py-0.5 rounded border border-slate-200">STAAD.Pro</span>
                    </div>
                    <a href="#" class="block text-center bg-slate-900 text-white py-2 rounded-lg text-xs font-semibold hover:bg-red-800 transition">
                        {{ __('portfolio.read_more') }}
                    </a>
                </div>
            </div>

            <div class="project-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group"
                 data-nama="{{ Str::lower(__('project.ded.2.title')) }}"
                 data-tahun="2022"
                 data-kategori="ded"
                 data-lokasi="sulawesi">
                <div>
                    <div class="bg-slate-900 h-44 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80 z-10"></div>
                        <i class="fa-solid fa-hospital text-5xl text-blue-500/20 group-hover:scale-110 transition duration-300"></i>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <h3 class="text-base font-bold text-gray-900 group-hover:text-blue-600 transition min-h-[3rem] line-clamp-2">
                            {{ __('project.ded.2.title') }}
                        </h3>
                        
                        <div class="space-y-2 text-xs border-t border-b border-gray-100 py-3 my-2 text-slate-600">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.category') }}</span>
                                <span class="font-semibold text-slate-900 bg-slate-100 px-2 py-0.5 rounded text-[11px]">{{ __('filter.category.ded_structure') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.location') }}</span>
                                <span class="font-semibold text-slate-900">{{ __('project.ded.2.location') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-medium">{{ __('project.label.year') }}</span>
                                <span class="font-semibold text-slate-900">2022</span>
                            </div>
                        </div>

                        <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                            {{ __('project.ded.2.desc') }}
                        </p>
                    </div>
                </div>
                
                <div class="p-6 pt-0 space-y-3">
                    <div class="flex flex-wrap gap-1">
                        <span class="bg-slate-50 text-slate-600 text-[10px] font-mono px-2 py-0.5 rounded border border-slate-200">Structural WorkSuite</span>
                    </div>
                    <a href="#" class="block text-center bg-slate-900 text-white py-2 rounded-lg text-xs font-semibold hover:bg-red-800 transition">
                        {{ __('portfolio.read_more') }}
                    </a>
                </div>
            </div>

            <div id="noProjectMessage" class="hidden col-span-full text-center py-12 text-slate-500 font-medium bg-white rounded-xl border border-gray-200">
                <i class="fa-solid fa-folder-open text-3xl text-slate-300 mb-2 block"></i>
                {{ __('portfolio.empty_ded') }}
            </div>

        </div>

        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-gray-200 pt-6">
            <div class="text-sm text-slate-500 font-medium">
                {{ __('portfolio.showing') }} <span id="countDisplayed" class="text-slate-700 font-bold">2</span> {{ __('portfolio.of') }} <span id="countTotal" class="text-slate-700 font-bold">2</span> {{ __('portfolio.results') }}
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
document.getElementById('filterForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah reload halaman penuh

    // Ambil nilai filter yang dipilih user
    const filterNama = document.getElementById('inputNama').value.toLowerCase().trim();
    const filterTahun = document.getElementById('selectTahun').value;
    const filterKategori = document.getElementById('selectKategori').value;
    const filterLokasi = document.getElementById('selectLokasi').value;

    const cards = document.querySelectorAll('.project-card');
    let displayedCount = 0;

    cards.forEach(card => {
        // Ambil metadata dari atribut kartu proyek
        const cardNama = card.getAttribute('data-nama');
        const cardTahun = card.getAttribute('data-tahun');
        const cardKategori = card.getAttribute('data-kategori');
        const cardLokasi = card.getAttribute('data-lokasi');

        // Logika evaluasi kecocokan filter
        const matchNama = filterNama === "" || cardNama.includes(filterNama);
        const matchTahun = filterTahun === "" || cardTahun === filterTahun;
        const matchKategori = filterKategori === "" || cardKategori === filterKategori;
        const matchLokasi = filterLokasi === "" || cardLokasi === filterLokasi;

        if (matchNama && matchTahun && matchKategori && matchLokasi) {
            card.style.display = 'flex'; // Tampilkan jika cocok
            displayedCount++;
        } else {
            card.style.display = 'none'; // Sembunyikan jika tidak cocok
        }
    });

    // Update teks jumlah data di bagian bawah halaman
    document.getElementById('countDisplayed').innerText = displayedCount;
    
    // Tampilkan pesan kosong jika semua kartu tersembunyi
    const noMessage = document.getElementById('noProjectMessage');
    if (displayedCount === 0) {
        noMessage.classList.remove('hidden');
    } else {
        noMessage.classList.add('hidden');
    }
});
</script>

@include('partials.footer')