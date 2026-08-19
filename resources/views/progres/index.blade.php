@include('partials.navbar')
<div class="bg-slate-50 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Halaman --}}
        <div class="mb-8">
            <div class="flex items-center gap-2 text-xs text-blue-600 font-bold uppercase tracking-wider mb-1"></div>
            <h1 class="text-3xl font-extrabold text-gray-900">Progres Pekerjaan Saya</h1>
            <p class="text-sm text-gray-500 mt-1">Pantau perkembangan pengerjaan proyek Anda secara real-time dan transparan.</p>
        </div>

        {{-- Loop Daftar Proyek --}}
        @forelse($progresses as $project)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                
                {{-- Header Proyek --}}
                <div class="p-6 border-b border-gray-100 bg-white">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <h2 class="text-xl font-bold text-gray-800">{{ $project->title }}</h2>
                                @if($project->status == 'completed')
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs px-3 py-1 rounded-full font-bold">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Selesai
                                    </span>
                                @elseif($project->status == 'in_progress')
                                    <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 border border-blue-200 text-xs px-3 py-1 rounded-full font-bold">
                                        <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span> Dalam Pengerjaan
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-600 border border-slate-200 text-xs px-3 py-1 rounded-full font-bold">
                                        <span class="w-2 h-2 rounded-full bg-slate-400"></span> Belum Dimulai
                                    </span>
                                @endif
                            </div>
                            
                            @if($project->description)
                                <p class="text-xs text-gray-500 mt-2 max-w-3xl leading-relaxed">
                                    {{ $project->description }}
                                </p>
                            @endif
                        </div>

                        {{-- Tanggal Pelaksanaan --}}
                        <div class="flex items-center gap-4 text-xs text-gray-500 bg-slate-50 p-3 rounded-xl border border-slate-100">
                            <div>
                                <span class="block text-[10px] text-gray-400 font-semibold uppercase">Mulai</span>
                                <span class="font-bold text-gray-700">{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d M Y') : '-' }}</span>
                            </div>
                            <div class="h-6 w-px bg-gray-200"></div>
                            <div>
                                <span class="block text-[10px] text-gray-400 font-semibold uppercase">Target</span>
                                <span class="font-bold text-gray-700">{{ $project->target_date ? \Carbon\Carbon::parse($project->target_date)->format('d M Y') : '-' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Overall Progress Bar --}}
                    <div class="mt-6">
                        <div class="flex justify-between items-center text-xs font-bold mb-1.5">
                            <span class="text-gray-600">Total Progres Pengerjaan</span>
                            <span class="text-blue-600 text-sm font-black">{{ $project->percentage }}%</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden border border-gray-100">
                            <div class="h-3 rounded-full transition-all duration-700 {{ $project->percentage == 100 ? 'bg-emerald-500' : 'bg-blue-600' }}" 
                                 style="width: {{ $project->percentage }}%"></div>
                        </div>
                    </div>
                </div>

                {{-- Detail Tahapan dan Checklist Item --}}
                <div class="p-6 bg-slate-50/50">
                    <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Rincian Tahapan & Poin Kegiatan
                    </h3>

                    <div class="space-y-6">
                        @forelse($project->stages as $sIdx => $stage)
                            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-4 pb-3 border-b border-gray-100">
                                    <span class="w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">
                                        {{ $sIdx + 1 }}
                                    </span>
                                    <h4 class="text-sm font-bold text-gray-800">{{ $stage->title }}</h4>
                                </div>

                                {{-- Poin Kegiatan --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pl-2 sm:pl-9">
                                    @forelse($stage->items as $item)
                                        <div class="p-3 rounded-lg border {{ $item->is_completed ? 'bg-emerald-50/50 border-emerald-200' : 'bg-gray-50/50 border-gray-200' }} flex items-start gap-3">
                                            <div class="mt-0.5">
                                                @if($item->is_completed)
                                                    <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold">
                                                        ✓
                                                    </span>
                                                @else
                                                    <span class="w-5 h-5 rounded-full border-2 border-gray-300 block"></span>
                                                @endif
                                            </div>
                                            <div>
                                                <span class="text-xs font-bold block {{ $item->is_completed ? 'text-emerald-900 line-through opacity-80' : 'text-gray-800' }}">
                                                    {{ $item->title }}
                                                </span>
                                                @if($item->description)
                                                    <span class="text-[11px] text-gray-500 block mt-0.5">
                                                        {{ $item->description }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-xs text-gray-400 italic">Belum ada rincian kegiatan pada tahap ini.</p>
                                    @endforelse
                                </div>
                            </div>
                        @empty
                            <p class="text-xs text-gray-400 italic text-center py-4">Belum ada data tahapan pengerjaan.</p>
                        @endforelse
                    </div>

                    {{-- Galeri Documentation (Foto Utama & Foto Lampiran) --}}
                    @if($project->image || (!empty($project->attachments) && count($project->attachments) > 0))
                        <div class="mt-6 pt-6 border-t border-gray-200/80">
                            <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wider mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Galeri & Dokumentasi Lapangan
                            </h4>

                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                                {{-- Foto Utama / Cover --}}
                                @if($project->image)
                                    <div class="space-y-1">
                                        <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wider block">Foto Utama</span>
                                        <a href="{{ asset('storage/' . $project->image) }}" class="inline-block w-full group relative rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition">
                                            <img src="{{ asset('storage/' . $project->image) }}" alt="Dokumentasi Utama" class="w-full h-32 object-cover group-hover:scale-105 transition duration-300">
                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                                Perbesar
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                {{-- Array Foto Lampiran Dokumentasi --}}
                                @if(!empty($project->attachments) && is_array($project->attachments))
                                    @foreach($project->attachments as $aIdx => $attachment)
                                        <div class="space-y-1">
                                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Lampiran {{ $aIdx + 1 }}</span>
                                            <a href="{{ asset('storage/' . $attachment) }}" class="inline-block w-full group relative rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition">
                                                <img src="{{ asset('storage/' . $attachment) }}" alt="Lampiran Dokumentasi {{ $aIdx + 1 }}" class="w-full h-32 object-cover group-hover:scale-105 transition duration-300">
                                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                                    Lihat Foto
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        @empty
            <div class="bg-white rounded-2xl p-12 text-center border border-gray-200 shadow-sm">
                <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 01-2-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Belum Ada Progres Proyek</h3>
                <p class="text-xs text-gray-500 mt-1 max-w-sm mx-auto">Anda belum memiliki proyek aktif atau admin belum menambahkan progres pekerjaan untuk akun Anda.</p>
            </div>
        @endforelse

    </div>
</div>
@include('partials.footer')