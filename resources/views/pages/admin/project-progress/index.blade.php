<x-app-layout>
<div class="container mx-auto p-6 max-w-7xl">
    
    {{-- Header & Tombol Tambah --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Progres Proyek</h1>
            <p class="text-xs text-gray-500 mt-1">Kelola dan pantau tahapan pengerjaan proyek klien secara real-time.</p>
        </div>
        <a href="{{ route('admin.project-progress.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl font-semibold text-xs transition shadow-sm hover:shadow flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            + Tambah Progres
        </a>
    </div>

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs font-semibold flex items-center gap-2 shadow-sm">
            <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-5 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl text-xs font-semibold flex items-center gap-2 shadow-sm">
            <svg class="w-4 h-4 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
    @endif

    {{-- Tabel Utama --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider">
                        <th class="p-4 font-bold text-center w-12">No</th>
                        <th class="p-4 font-bold">Klien</th>
                        <th class="p-4 font-bold">Judul Pekerjaan</th>
                        <th class="p-4 font-bold">Persentase Progres</th>
                        <th class="p-4 font-bold">Status</th>
                        <th class="p-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs">
                    @forelse($progresses as $index => $item)
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="p-4 text-center font-medium text-gray-500">{{ $index + 1 }}</td>
                            
                            <td class="p-4">
                                <div class="font-bold text-gray-800">{{ $item->user->name ?? 'Klien Tidak Ditemukan' }}</div>
                                <div class="text-[11px] text-gray-400 mt-0.5">{{ $item->user->email ?? '-' }}</div>
                            </td>
                            
                            <td class="p-4 font-semibold text-gray-700">
                                {{ $item->title }}
                            </td>
                            
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-28 bg-gray-100 rounded-full h-2 overflow-hidden border border-gray-100">
                                        <div class="h-2 rounded-full transition-all duration-300 {{ $item->percentage == 100 ? 'bg-emerald-500' : ($item->percentage > 0 ? 'bg-blue-600' : 'bg-gray-300') }}" 
                                             style="width: {{ $item->percentage }}%"></div>
                                    </div>
                                    <span class="font-bold text-gray-700">{{ $item->percentage }}%</span>
                                </div>
                            </td>
                            
                            <td class="p-4">
                                @if($item->status == 'completed')
                                    <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] px-2.5 py-1 rounded-full font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                                    </span>
                                @elseif($item->status == 'in_progress')
                                    <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 border border-blue-200 text-[11px] px-2.5 py-1 rounded-full font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span> Dalam Proses
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 bg-slate-100 text-slate-600 border border-slate-200 text-[11px] px-2.5 py-1 rounded-full font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Pending
                                    </span>
                                @endif
                            </td>
                            
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Tombol Detail (Checklist) --}}
                                    <a href="{{ route('admin.project-progress.show', $item->id) }}" 
                                       class="bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold px-2.5 py-1.5 rounded-lg border border-emerald-200 transition flex items-center gap-1"
                                       title="Lihat Detail & Checklist">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Detail
                                    </a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.project-progress.edit', $item->id) }}" 
                                       class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold px-2.5 py-1.5 rounded-lg border border-blue-200 transition flex items-center gap-1"
                                       title="Edit Progres & Structure">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.project-progress.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data progres ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-50 hover:bg-red-100 text-red-700 font-bold px-2.5 py-1.5 rounded-lg border border-red-200 transition flex items-center gap-1"
                                                title="Hapus Data">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    <span class="text-xs font-semibold">Belum ada data progres proyek yang ditambahkan.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>