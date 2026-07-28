{{-- NATIVE PAGINATION INTERFACE KELIPATAN 6 --}}
    <section class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:px-8 border-t border-slate-200 pt-6">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            {{-- Teks Info Kiri --}}
            <div id="paginationInfo" class="text-xs text-slate-500 font-medium">
                {{ __('pagination.showing') }} <span id="infoStart" class="font-bold text-slate-800">0</span> {{ __('pagination.to') }} <span id="infoEnd" class="font-bold text-slate-800">0</span> {{ __('pagination.of') }} <span id="infoTotal" class="font-bold text-slate-800">0</span> {{ __('pagination.records') }}
            </div>
            
            {{-- Tombol Halaman Kanan --}}
            <nav id="paginationWrapper" class="inline-flex items-center -space-x-px rounded-lg bg-white border border-slate-200 shadow-sm overflow-hidden">
                <button id="btnPrev" class="px-3 py-2 text-slate-500 hover:bg-slate-50 transition border-r border-slate-200 disabled:opacity-40 disabled:hover:bg-transparent">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>
                
                <div id="pageNumbers" class="flex items-center -space-x-px"></div>
                
                <button id="btnNext" class="px-3 py-2 text-slate-500 hover:bg-slate-50 transition border-l border-slate-200 disabled:opacity-40 disabled:hover:bg-transparent">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </nav>
        </div>
    </section>