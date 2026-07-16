@include('partials.navbar')

{{-- 1. Hero Banner Section --}}
<div class="relative w-full h-[300px] md:h-[450px] bg-cover bg-center flex items-center justify-center text-center" 
     style="background-image: linear-gradient(rgba(14, 29, 50, 0.75), rgba(14, 29, 50, 0.75)), url('{{ $sector->banner_image ? asset('storage/' . $sector->banner_image) : asset('images/default-banner.jpg') }}');">
    <div class="container mx-auto px-6 max-w-7xl">
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-wide leading-tight max-w-4xl mx-auto">
            {{ auto_translate($sector->name) }}
        </h1>
    </div>
</div>

{{-- 2. Main Content & Description Section --}}
<div class="py-16 bg-slate-50">
    <div class="container mx-auto px-6 max-w-7xl">
        
        {{-- Box Deskripsi Utama Sektor --}}
        <div class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-slate-100 max-w-5xl mx-auto mb-20">
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed font-normal text-sm md:text-base">
                {!! auto_translate(strip_tags($sector->description)) !!}
            </div>
        </div>

        <hr class="border-slate-200 max-w-5xl mx-auto mb-16">

        {{-- 3. Related Projects Section --}}
        <div class="max-w-7xl mx-auto">
            
            <div class="mb-10 text-left">
                <span class="text-xs font-bold tracking-widest text-[#c80000] uppercase block mb-2">
                    {{ auto_translate('Track Record') }}
                </span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#0e1d32] tracking-tight uppercase">
                    {{ auto_translate('Proyek Terkait') }} <span class="text-slate-500">{{ auto_translate('di Sektor Ini') }}</span>
                </h2>
                <div class="w-12 h-1 bg-[#c80000] mt-3"></div>
            </div>

            @if($sector->projects && $sector->projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($sector->projects as $project)
                        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md hover:-translate-y-1 transition duration-300">
                            
                            {{-- Foto Cover Proyek --}}
                            <div class="relative h-56 overflow-hidden bg-slate-900">
                                @if($project->image_path)
                                    <img src="{{ asset('storage/' . $project->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ auto_translate($project->title) }}">
                                @else
                                    <img src="{{ asset('images/default-banner.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-40" alt="{{ auto_translate($project->title) }}">
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
                                            <svg class="w-3.5 h-3.5 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ auto_translate($project->location) }}
                                        </span>
                                    @endif
                                    <h3 class="text-base font-bold text-slate-900 group-hover:text-[#c80000] transition duration-200 line-clamp-2 mb-2">
                                        {{ auto_translate($project->title) }}
                                    </h3>
                                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                                        {{ auto_translate(Str::limit(strip_tags($project->description), 110)) }}
                                    </p>
                                </div>

                                <a href="/proyek/{{ $project->id }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:text-slate-900 uppercase tracking-wider transition mt-auto">
                                    {{ auto_translate('Pelajari Detail Proyek') }}
                                    <svg class="w-3.5 h-3.5 ml-1.5 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Fallback jika belum ada proyek di sektor terkait --}}
                <div class="text-center py-16 bg-white rounded-3xl border border-dashed border-slate-200 p-8 max-w-5xl mx-auto">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-slate-800 mb-1">
                        {{ auto_translate('Belum Ada Proyek') }}
                    </h4>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto">
                        {{ auto_translate('Saat ini belum ada data proyek strategis yang didaftarkan untuk sektor ini.') }}
                    </p>
                </div>
            @endif
        </div>

    </div>
</div>

@isset($otherSectors)
<section class="py-20 bg-white" id="other-sectors-section">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="mb-12">
            <span class="text-xs font-bold tracking-widest text-[#c80000] uppercase block mb-2">
                {{ auto_translate('Our Engineering Expertise') }}
            </span>
            <div class="flex flex-wrap justify-between items-end gap-4">
                <div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-[#0e1d32] tracking-tight uppercase">
                        {{ auto_translate('Sektor') }} <span class="text-slate-950">{{ auto_translate('Lainnya') }}</span>
                    </h2>
                    <div class="w-12 h-1 bg-[#c80000] mt-3"></div>
                </div>
                
                {{-- Tombol Navigasi Slide --}}
                <div class="flex space-x-2">
                    <button id="slide-left" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition active:scale-95 shadow-sm">
                        &#10094;
                    </button>
                    <button id="slide-right" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition active:scale-95 shadow-sm">
                        &#10095;
                    </button>
                </div>
            </div>
        </div>

        {{-- Container Slider Sektor --}}
        <div id="slider-container" class="flex flex-row flex-nowrap overflow-x-auto gap-6 pb-6 scroll-smooth snap-x snap-mandatory" style="scrollbar-width: none; -ms-overflow-style: none;">
            
            <style>
                #slider-container::-webkit-scrollbar { display: none; }
            </style>
            
            @foreach($otherSectors as $otherSector)
                <div class="w-full sm:w-1/2 md:w-[31.5%] flex-shrink-0 snap-start bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-md transition duration-300">
                    
                    {{-- Foto Banner Sektor --}}
                    <div class="relative h-64 overflow-hidden bg-slate-900">
                        @if($otherSector->banner_image)
                            <img src="{{ asset('storage/' . $otherSector->banner_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90" alt="{{ auto_translate($otherSector->name) }}">
                        @else
                            <img src="{{ asset('images/default-banner.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-40" alt="{{ auto_translate($otherSector->name) }}">
                        @endif
                        
                        <span class="absolute top-4 left-4 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow-sm bg-[#c80000]">
                            {{ auto_translate('SOLUSI TEKNIK') }}
                        </span>
                    </div>
                    
                    {{-- Detail Deskripsi Singkat Sektor --}}
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div class="mb-5">
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-[#c80000] transition duration-200 line-clamp-2 mb-3">
                                {{ auto_translate($otherSector->name) }}
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                                {{ Str::limit(auto_translate(strip_tags($otherSector->description)), 120) }}
                            </p>
                        </div>
                        
                        <a href="{{ route('front.sector.show', $otherSector->slug) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:text-slate-900 uppercase tracking-wider transition mt-auto">
                            {{ auto_translate('Pelajari Sektor Ini') }}
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById('slider-container');
        const btnLeft = document.getElementById('slide-left');
        const btnRight = document.getElementById('slide-right');

        if (container && btnLeft && btnRight) {
            const getScrollAmount = () => {
                const card = container.querySelector('.flex-shrink-0');
                return card ? card.offsetWidth + 24 : 400; 
            };

            btnLeft.addEventListener('click', () => {
                container.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
            });

            btnRight.addEventListener('click', () => {
                container.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            });
        }
    });
</script>
@endisset

@include('partials.footer')