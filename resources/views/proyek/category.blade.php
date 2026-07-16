@include('partials.navbar')

<div class="relative w-full h-[300px] md:h-[450px] bg-cover bg-center flex items-center justify-center text-center" 
     style="background-image: linear-gradient(rgba(14, 29, 50, 0.75), rgba(14, 29, 50, 0.75)), url('{{ $category->banner_image ? asset('storage/' . $category->banner_image) : asset('images/default-banner.jpg') }}');">
    <div class="container mx-auto px-6 max-w-7xl">

        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-wide leading-tight max-w-4xl mx-auto">
            {{ auto_translate($category->name ?? 'Detail Kategori') }}
        </h1>
    </div>
</div>

{{-- 2. Main Content & Description Section --}}
<div class="py-16 bg-slate-50 min-h-[50vh]">
    <div class="container mx-auto px-6 max-w-7xl">
        
        {{-- Box Deskripsi Utama Kategori --}}
        <div class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-slate-100 max-w-5xl mx-auto mb-16">
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed font-normal text-sm md:text-base">
                {!! auto_translate(strip_tags($category->description ?? $category->content)) !!}
            </div>
        </div>

        <hr class="border-slate-200 max-w-5xl mx-auto mb-16">

        {{-- 3. Filter Form Section --}}
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mb-10 max-w-7xl mx-auto">
            <form id="filterFormDynamicProject" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">{{ __('filter.search_label') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </span>
                        <input type="text" id="inputNamaProject" placeholder="{{ __('filter.search_placeholder_geotech') }}" 
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-4 py-2 text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">{{ __('filter.year_label') }}</label>
                    <select id="selectTahunProject" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.year_all') }}</option>
                        @foreach($projects->pluck('year')->unique()->sortDesc() as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">{{ __('filter.category_label') }}</label>
                    <select id="selectKategoriProject" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition cursor-pointer">
                        <option value="{{ $category->slug }}" selected>{{ auto_translate($category->name) }}</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">{{ __('filter.location_label') }}</label>
                    <select id="selectLokasiProject" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:bg-white transition cursor-pointer">
                        <option value="">{{ __('filter.location_all') }}</option>
                        @foreach($projects->pluck('location')->unique()->sort() as $location)
                            <option value="{{ strtolower(trim($location)) }}">{{ auto_translate($location) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-slate-900 hover:bg-[#c80000] text-white font-bold text-xs tracking-widest py-2.5 rounded-xl transition duration-200 shadow-sm uppercase text-center flex items-center justify-center gap-2">
                        <i class="fa-solid fa-filter text-[10px]"></i> {{ __('filter.apply') }}
                    </button>
                </div>
            </form>
        </div>

        {{-- Info List Title --}}
        <div class="mb-8 flex flex-wrap justify-between items-center border-b border-slate-200 pb-4 max-w-7xl mx-auto gap-2">
            <span class="text-sm text-slate-600 font-medium">
                {{ __('portfolio.list_title') }} <strong class="text-slate-900">{{ auto_translate($category->name) }}</strong>
            </span>
            
            @if(request('from') == 'all')
                <a href="{{ route('proyek.semua') }}" class="text-xs font-bold text-[#c80000] hover:text-slate-900 transition flex items-center gap-1 uppercase tracking-wider">
                    <i class="fa-solid fa-arrow-left"></i> {{ __('portfolio.back_to_all') }}
                </a>
            @endif
        </div>

        {{-- 4. Projects Grid --}}
        <div class="max-w-7xl mx-auto">
            <div id="projectGridDynamic" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @foreach($projects as $project)
                    <div class="project-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md hover:-translate-y-1 transition duration-300"
                         data-nama="{{ strtolower(trim(auto_translate($project->title))) }}"
                         data-tahun="{{ $project->year }}"
                         data-kategori="{{ $category->slug }}"
                         data-lokasi="{{ strtolower(trim($project->location)) }}">
                        
                        {{-- Foto Cover Proyek --}}
                        <div class="relative h-56 overflow-hidden bg-slate-900">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ auto_translate($project->title) }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-800">
                                    <i class="fa-solid fa-helmet-safety text-5xl text-red-500/20 group-hover:scale-110 transition duration-300"></i>
                                </div>
                            @endif
                            
                            @if($project->year)
                                <span class="absolute top-4 right-4 bg-slate-900/80 backdrop-blur-sm text-white text-[11px] font-bold px-2.5 py-1 rounded-md shadow-sm">
                                    {{ $project->year }}
                                </span>
                            @endif
                        </div>

                        {{-- Konten Informasi Proyek --}}
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="mb-5">
                                @if($project->location)
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-2 flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1 text-[#c80000]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ auto_translate($project->location) }}
                                    </span>
                                @endif
                                <h3 class="text-base font-bold text-slate-900 group-hover:text-[#c80000] transition duration-200 line-clamp-2 mb-2">
                                    {{ auto_translate($project->title) }}
                                </h3>

                                <div class="text-[11px] font-mono text-slate-400 mb-3">
                                    <span class="bg-slate-50 text-slate-600 px-2 py-0.5 rounded border border-slate-200 inline-block">
                                        {{ auto_translate($project->software_used ?? 'Plaxis / GeoStudio') }}
                                    </span>
                                </div>

                                <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                                    {{ auto_translate(strip_tags($project->description)) }}
                                </p>
                            </div>

                            <a href="{{ route('proyek.detail', $project->id) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:text-slate-900 uppercase tracking-wider transition mt-auto">
                                {{ __('portfolio.read_more') }}
                                <svg class="w-3.5 h-3.5 ml-1.5 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

                <div id="noProjectMessageDynamic" class="hidden col-span-full text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200 p-8 max-w-5xl mx-auto">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-magnifying-glass text-2xl text-slate-300"></i>
                    </div>
                    <h4 class="text-sm font-bold text-slate-800 mb-1">Tidak Ada Kecocokan</h4>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto">
                        Belum ada proyek yang cocok dengan kombinasi filter pilihan Anda.
                    </p>
                </div>

            </div>

            @if($projects->isEmpty())
                <div class="text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200 p-8 max-w-5xl mx-auto mt-4">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-slate-800 mb-1">Belum Ada Proyek</h4>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto">
                        Saat ini belum ada data proyek strategis yang didaftarkan untuk kategori ini.
                    </p>
                </div>
            @endif

            {{-- Pagination Footer Wrapper --}}
            <div id="paginationWrapper" class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-0 sm:justify-between border-t border-slate-200 pt-6">
                <div class="text-sm text-slate-500 font-medium">
                    {{ __('portfolio.showing') }} <span id="countDisplayedProject" class="text-slate-700 font-bold">{{ $projects->count() }}</span> {{ __('portfolio.of') }} <span id="countTotalProject" class="text-slate-700 font-bold">{{ $projects->total() }}</span> {{ __('portfolio.results') }}
                </div>
                
                <div class="laravel-pagination-container">
                    {{ $projects->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('filterFormDynamicProject').addEventListener('submit', function(e) {
    e.preventDefault(); 

    const filterNama = document.getElementById('inputNamaProject').value.toLowerCase().trim();
    const filterTahun = document.getElementById('selectTahunProject').value;
    const filterKategori = document.getElementById('selectKategoriProject').value;
    const filterLokasi = document.getElementById('selectLokasiProject').value;

    const cards = document.querySelectorAll('.project-card');
    let displayedCount = 0;

    cards.forEach(card => {
        const cardNama = card.getAttribute('data-nama') || "";
        const cardTahun = card.getAttribute('data-tahun') || "";
        const cardKategori = card.getAttribute('data-kategori') || "";
        const cardLokasi = card.getAttribute('data-lokasi') || "";

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

    document.getElementById('countDisplayedProject').innerText = displayedCount;
    
    const noMessage = document.getElementById('noProjectMessageDynamic');
    const paginationBox = document.getElementById('paginationWrapper');

    if (displayedCount === 0) {
        noMessage.classList.remove('hidden');
    } else {
        noMessage.classList.add('hidden');
    }

    if(filterNama !== "" || filterTahun !== "" || filterLokasi !== "") {
        paginationBox.style.opacity = "0.5";
    } else {
        paginationBox.style.opacity = "1";
    }
});
</script>

@include('partials.footer')