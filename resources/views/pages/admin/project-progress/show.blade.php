<x-app-layout>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header & Tombol Kembali --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Progres Proyek</h1>
            <p class="text-sm text-gray-500 mt-1">Lihat ringkasan dan perbarui centang poin kegiatan proyek ini.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.project-progress.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold px-4 py-2.5 rounded-lg transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali
            </a>
            <a href="{{ route('admin.project-progress.edit', $projectProgress->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-4 py-2.5 rounded-lg transition flex items-center gap-2 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit Struktur Tahapan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Kartu Ringkasan Informasi Utama --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Kolom Kiri: Detail Informasi --}}
            <div class="lg:col-span-2 space-y-4">
                <div>
                    <span class="text-xs font-semibold uppercase text-blue-600 tracking-wider">Informasi Proyek</span>
                    <h2 class="text-xl font-bold text-gray-800 mt-1">{{ $projectProgress->title ?? 'Tanpa Judul' }}</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="text-xs text-gray-500 block">Klien / Pemilik Proyek</span>
                        <span class="text-sm font-semibold text-gray-800">{{ $projectProgress->client->name ?? $projectProgress->client_name ?? '-' }}</span>
                    </div>

                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="text-xs text-gray-500 block">Status Progres</span>
                        <div class="mt-1">
                            @if($projectProgress->status == 'Selesai (Completed)' || $projectProgress->status == 'Selesai')
                                <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-full">Selesai</span>
                            @elseif($projectProgress->status == 'Dalam Proses (In Progress)' || $projectProgress->status == 'Dalam Proses')
                                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-full">Dalam Proses</span>
                            @else
                                <span class="bg-amber-100 text-amber-700 text-xs font-bold px-2.5 py-1 rounded-full">Pending</span>
                            @endif
                        </div>
                    </div>

                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="text-xs text-gray-500 block">Tanggal Mulai</span>
                        <span class="text-sm font-medium text-gray-700">{{ $projectProgress->start_date ? \Carbon\Carbon::parse($projectProgress->start_date)->format('d M Y') : '-' }}</span>
                    </div>

                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="text-xs text-gray-500 block">Target Selesai</span>
                        <span class="text-sm font-medium text-gray-700">{{ $projectProgress->target_date ? \Carbon\Carbon::parse($projectProgress->target_date)->format('d M Y') : '-' }}</span>
                    </div>
                </div>

                @if($projectProgress->description)
                    <div class="pt-2">
                        <span class="text-xs font-semibold text-gray-500 block mb-1">Deskripsi Pengerjaan:</span>
                        <p class="text-xs text-gray-600 leading-relaxed bg-slate-50 p-3 rounded-xl border border-slate-100">
                            {{ $projectProgress->description }}
                        </p>
                    </div>
                @endif
            </div>

            {{-- Kolom Kanan: Persentase Progress & Lampiran --}}
            <div class="flex flex-col justify-between border-t lg:border-t-0 lg:border-l border-gray-100 pt-6 lg:pt-0 lg:pl-6 space-y-4">
                
                {{-- Progress Bar Card --}}
                <div class="bg-blue-50/60 p-4 rounded-xl border border-blue-100">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-blue-900">Total Progres</span>
                        <span class="text-lg font-black text-blue-700" id="percentageText">{{ $projectProgress->percentage ?? 0 }}%</span>
                    </div>
                    <div class="w-full bg-blue-200 rounded-full h-3 overflow-hidden">
                        <div id="progressBar" class="bg-blue-600 h-3 rounded-full transition-all duration-500" style="width: {{ $projectProgress->percentage ?? 0 }}%"></div>
                    </div>
                    <p class="text-[11px] text-blue-600 mt-2 text-right">Otomatis dihitung dari poin tercentang</p>
                </div>

                {{-- Lampiran Foto jika ada --}}
                @if($projectProgress->attachment || $projectProgress->image)
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="text-xs font-semibold text-gray-500 block mb-2">Lampiran Lapangan:</span>
                        <a href="{{ asset('storage/' . ($projectProgress->attachment ?? $projectProgress->image)) }}" target="_blank" class="block group relative rounded-lg overflow-hidden border border-gray-200">
                            <img src="{{ asset('storage/' . ($projectProgress->attachment ?? $projectProgress->image)) }}" alt="Lampiran Proyek" class="w-full h-28 object-cover group-hover:scale-105 transition">
                            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-medium">
                                Klik untuk melihat full
                            </div>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- Form Checklist Tahapan & Poin --}}
    <form action="{{ route('admin.project-progress.update-checklist', $projectProgress->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-emerald-100 text-emerald-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-800">Checklist Tahapan & Poin Pekerjaan</h3>
                        <p class="text-xs text-gray-500">Centang poin kegiatan yang sudah diselesaikan lalu klik simpan.</p>
                    </div>
                </div>

                @php
                    $totalItems = 0;
                    $completedItems = 0;
                    foreach($projectProgress->stages as $stg) {
                        foreach($stg->items as $itm) {
                            $totalItems++;
                            if($itm->is_completed) $completedItems++;
                        }
                    }
                @endphp

                <span id="completedBadge" class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold px-3 py-1.5 rounded-full">
                    {{ $completedItems }} / {{ $totalItems }} Poin Selesai
                </span>
            </div>

            {{-- Daftar Tahapan --}}
            <div class="space-y-6">
                @forelse($projectProgress->stages as $sIndex => $stage)
                    <div class="border border-slate-200 rounded-xl p-5 bg-slate-50/50">
                        {{-- Judul Tahap --}}
                        <div class="flex items-center gap-3 mb-4 pb-3 border-b border-slate-200">
                            <span class="w-7 h-7 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">
                                {{ $sIndex + 1 }}
                            </span>
                            <h4 class="text-sm font-bold text-gray-800">{{ $stage->title }}</h4>
                        </div>

                        {{-- Daftar Poin --}}
                        <div class="space-y-2.5 pl-2 sm:pl-10">
                            @forelse($stage->items as $item)
                                <label class="flex items-start gap-3 p-3 rounded-lg bg-white border border-slate-200 hover:border-blue-300 transition cursor-pointer group shadow-sm">
                                    <input type="checkbox" 
                                           name="items[{{ $item->id }}]" 
                                           value="1" 
                                           class="point-checkbox w-4 h-4 mt-0.5 text-emerald-600 rounded border-gray-300 focus:ring-emerald-500 cursor-pointer" 
                                           {{ $item->is_completed ? 'checked' : '' }}
                                           onchange="recalculateProgress()">
                                    
                                    <div class="flex-grow">
                                        <span class="text-xs font-semibold text-gray-800 group-hover:text-blue-600 transition block">
                                            {{ $item->title }}
                                        </span>
                                        @if($item->description)
                                            <span class="text-[11px] text-gray-500 block mt-0.5">
                                                {{ $item->description }}
                                            </span>
                                        @endif
                                    </div>
                                </label>
                            @empty
                                <p class="text-xs text-gray-400 italic">Belum ada poin kegiatan pada tahap ini.</p>
                            @endforelse
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400 text-xs">
                        Belum ada tahapan yang ditambahkan untuk proyek ini.
                    </div>
                @endforelse
            </div>

            {{-- Tombol Simpan Perubahan --}}
            <div class="mt-8 pt-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-6 py-3 rounded-xl transition shadow-md hover:shadow-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Perubahan Checklist
                </button>
            </div>
        </div>
    </form>

</div>

<script>
    function recalculateProgress() {
        const checkboxes = document.querySelectorAll('.point-checkbox');
        const total = checkboxes.length;
        
        if (total === 0) return;

        let checkedCount = 0;
        checkboxes.forEach(cb => {
            if (cb.checked) checkedCount++;
        });

        const percentage = Math.round((checkedCount / total) * 100);

        // Update UI secara langsung
        document.getElementById('percentageText').innerText = percentage + '%';
        document.getElementById('progressBar').style.width = percentage + '%';
        document.getElementById('completedBadge').innerText = checkedCount + ' / ' + total + ' Poin Selesai';
    }
</script>
</x-app-layout>