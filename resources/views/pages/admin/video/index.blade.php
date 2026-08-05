<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        
        {{-- 1. Session Notifications --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm flex items-center justify-between shadow-sm">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-sm flex items-center justify-between shadow-sm">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- 2. Page Header & Top Action Buttons --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h3 class="text-gray-800 text-3xl font-bold tracking-tight">Manajemen Video Dokumentasi</h3>
                <p class="text-gray-500 text-sm mt-1">Daftar seluruh dokumentasi video aktif GeoINHance.</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                {{-- Bulk Delete Button --}}
                <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" 
                    class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium text-sm flex items-center shadow-sm transition opacity-50 cursor-not-allowed border-0" disabled>
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                    </svg>
                    Hapus Terpilih (<span id="selected-count">0</span>)
                </button>

                {{-- Add New Video Button --}}
                <a href="{{ route('admin.video.create') }}" 
                    class="px-4 py-2 bg-[#0e1d82] text-white rounded-xl hover:bg-[#0c196e] font-bold text-sm flex items-center shadow-sm transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Video Baru
                </a>
            </div>
        </div>

        {{-- 3. Bulk Delete Form Wrapper & Data Table --}}
        <form id="bulk-delete-form" action="{{ route('admin.video.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumentasi video yang dipilih?')">
            @csrf
            @method('DELETE')

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mt-6">
                <div class="p-6 bg-slate-50/50 border-b border-slate-100 flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        List Koleksi Video Aktif
                    </span>
                    <span class="text-xs bg-blue-100 text-[#0e1d82] font-semibold px-3 py-1 rounded-full">
                        {{ $videos->count() }} Total Video
                    </span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-gray-600">
                        <thead class="bg-slate-50 text-xs uppercase font-medium text-slate-500 tracking-wider">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 w-10 text-center">
                                    <input type="checkbox" id="checkbox-all" class="rounded border-slate-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                </th>
                                <th scope="col" class="px-6 py-3.5 w-12">No</th>
                                <th scope="col" class="px-6 py-3.5 w-36">Thumbnail</th>
                                <th scope="col" class="px-6 py-3.5">Informasi Video</th>
                                <th scope="col" class="px-6 py-3.5 text-center w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse($videos as $key => $video)
                                <tr class="hover:bg-slate-50/50 transition">
                                    {{-- Checkbox Multi-select --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <input type="checkbox" name="ids[]" value="{{ $video->id }}" class="item-checkbox rounded border-slate-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                    </td>
                                    
                                    {{-- Nomor Urut --}}
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        {{ $key + 1 }}
                                    </td>
                                    
                                    {{-- Thumbnail Video --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-28 aspect-video rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm">
                                            <img src="{{ asset('storage/' . $video->thumbnail_path) }}" class="w-full h-full object-cover" alt="{{ $video->title }}">
                                        </div>
                                    </td>
                                    
                                    {{-- Informasi Video --}}
                                    <td class="px-6 py-4">
                                        <div class="mb-1 flex items-center gap-2">
                                            <span class="inline-block bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wide">
                                                {{ $video->category }}
                                            </span>
                                            @if($video->production_year)
                                                <span class="text-xs font-semibold text-slate-500">• {{ $video->production_year }}</span>
                                            @endif
                                            @if($video->duration)
                                                <span class="text-xs font-mono text-gray-400">⏱️ {{ $video->duration }}</span>
                                            @endif
                                        </div>
                                        <h4 class="font-bold text-gray-900 leading-snug mb-1 text-base">{{ $video->title }}</h4>
                                        <p class="text-xs text-gray-400 font-medium mb-1 flex items-center">
                                            📅 {{ \Carbon\Carbon::parse($video->published_at ?? $video->created_at)->translatedFormat('d F Y') }}
                                        </p>
                                        <a href="{{ $video->video_url }}" target="_blank" class="text-xs text-blue-600 hover:underline inline-flex items-center font-medium">
                                            🔗 Buka Link Source 
                                        </a>
                                    </td>
                                    
                                    {{-- Tombol Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="inline-flex space-x-1 justify-center">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.video.edit', $video->id) }}" class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition" title="Edit Konten">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </a>
                                            
                                            {{-- Hapus Satuan --}}
                                            <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus dokumentasi video ini?')) { document.getElementById('delete-video-{{ $video->id }}').submit(); }" class="text-red-500 hover:bg-red-50 p-2 rounded-lg transition border-0 cursor-pointer" title="Hapus Video">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                                        <svg class="w-10 h-10 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"></path>
                                        </svg>
                                        <p class="font-semibold text-sm">Belum ada rekaman data video.</p>
                                        <p class="text-xs text-slate-400 mt-1">Klik tombol <strong>"+ Tambah Video Baru"</strong> di atas untuk membuat data baru.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        {{-- Hidden Form Single Delete untuk setiap video --}}
        @foreach($videos as $video)
            <form id="delete-video-{{ $video->id }}" action="{{ route('admin.video.destroy', $video->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach

        {{-- Paginasi Tabel (jika menggunakan paginate() di controller) --}}
        @if(method_exists($videos, 'links'))
            <div class="mt-6">
                {{ $videos->links() }}
            </div>
        @endif
    </div>

    {{-- Script JavaScript untuk Checkbox All & Counter Bulk Delete --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxAll = document.getElementById('checkbox-all');
            const checkboxes = document.querySelectorAll('.item-checkbox');
            const btnBulkDelete = document.getElementById('btn-bulk-delete');
            const selectedCount = document.getElementById('selected-count');

            function updateBulkDeleteStatus() {
                const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
                selectedCount.textContent = checkedCount;

                if (checkedCount > 0) {
                    btnBulkDelete.removeAttribute('disabled');
                    btnBulkDelete.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    btnBulkDelete.setAttribute('disabled', 'disabled');
                    btnBulkDelete.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            if(checkboxAll) {
                checkboxAll.addEventListener('change', function () {
                    checkboxes.forEach(cb => { cb.checked = checkboxAll.checked; });
                    updateBulkDeleteStatus();
                });
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', function () {
                    if (!this.checked) {
                        checkboxAll.checked = false;
                    } else {
                        const allChecked = document.querySelectorAll('.item-checkbox:checked').length === checkboxes.length;
                        checkboxAll.checked = allChecked;
                    }
                    updateBulkDeleteStatus();
                });
            });
        });
    </script>
</x-app-layout>