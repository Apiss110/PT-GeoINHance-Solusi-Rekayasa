<x-app-layout>
    <div class="container mx-auto px-6 py-8">
    
    {{-- 1. Session Notifications --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm flex items-center justify-between shadow-sm">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-sm flex items-center justify-between shadow-sm">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    {{-- 2. Page Header & Top Action Buttons --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <div>
            <h3 class="text-gray-800 text-3xl font-bold tracking-tight">Kelola Peta Proyek</h3>
            <p class="text-gray-500 text-sm mt-1">Daftar lokasi kantor cabang dan titik proyek aktif GeoINHance.</p>
        </div>
        
        <div class="mt-4 md:mt-0 flex items-center space-x-3">
            {{-- Bulk Delete Button --}}
            <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" 
                class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium text-sm flex items-center shadow-sm transition opacity-50 cursor-not-allowed" disabled>
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                </svg>
                Hapus Terpilih (<span id="selected-count">0</span>)
            </button>

            {{-- Add New Map/Branch Button --}}
            <a href="{{ route('admin.branches.create') }}" 
                class="px-4 py-2 bg-[#0e1d82] text-white rounded-lg hover:bg-[#0e1d82]/90 font-medium text-sm flex items-center shadow-sm transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Titik Peta Baru
            </a>
        </div>
    </div>

    {{-- 3. Data Table Card & Bulk Delete Form --}}
    <form id="bulk-delete-form" action="{{ route('admin.branches.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus massal semua titik cabang yang dipilih?')">
        @csrf
        @method('DELETE')
    </form>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        {{-- Header Card --}}
        <div class="px-6 py-4 bg-gray-50/70 border-b border-gray-200 flex items-center justify-between">
            <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Data Titik Cabang & Proyek</span>
        </div>
        
        {{-- Table Responsive Container --}}
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 tracking-wider">
                    <tr>
                        <th scope="col" class="px-4 py-3.5 text-center w-12 align-middle">
                            <input type="checkbox" id="checkbox-all" class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                        </th>
                        <th scope="col" class="px-4 py-3.5 text-center w-14 align-middle">NO</th>
                        <th scope="col" class="px-6 py-3.5 w-5/12 align-middle">INFO CABANG & TAUTAN</th>
                        <th scope="col" class="px-6 py-3.5 w-3/12 align-middle">DAERAH</th>
                        <th scope="col" class="px-6 py-3.5 w-3/12 align-middle">KOORDINAT (LAT, LNG)</th>
                        <th scope="col" class="px-6 py-3.5 text-right w-24 align-middle">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($branches as $key => $b)
                        @php
                            $defaultPlaceholder = 'https://placehold.co/600x400/e2e8f0/0f172a?text=GeoINHance';
                            $tableImgUrl = $defaultPlaceholder;

                            if ($b->img) {
                                $rawPath = trim($b->img);
                                if (str_starts_with($rawPath, 'http://') || str_starts_with($rawPath, 'https://')) {
                                    $tableImgUrl = $rawPath;
                                } else {
                                    $cleanedPath = preg_replace('#^(public/|storage/)#i', '', $rawPath);
                                    $tableImgUrl = asset('storage/' . $cleanedPath);
                                }
                            }
                        @endphp
                        <tr class="hover:bg-gray-50/60 transition">
                            {{-- Checkbox Multi-select dihubungkan ke bulk-delete-form menggunakan atribut form --}}
                            <td class="px-4 py-4 text-center align-middle">
                                <input type="checkbox" name="ids[]" value="{{ $b->id }}" form="bulk-delete-form" class="item-checkbox rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                            </td>
                            
                            {{-- Nomor Paginasi --}}
                            <td class="px-4 py-4 text-center align-middle font-medium text-gray-700">
                                {{ method_exists($branches, 'firstItem') ? $branches->firstItem() + $key : $key + 1 }}
                            </td>
                            
                            {{-- Info Cabang & Gambar Preview --}}
                            <td class="px-6 py-4 align-middle">
                                <div class="flex items-center space-x-3.5">
                                    <img src="{{ $tableImgUrl }}" 
                                         alt="{{ $b->title }}" 
                                         onerror="this.onerror=null; this.src='{{ $defaultPlaceholder }}';" 
                                         class="w-16 h-12 object-cover rounded-md border border-gray-200 shadow-sm shrink-0 bg-gray-50">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-bold text-gray-800 text-sm uppercase leading-snug line-clamp-2">
                                            {{ $b->title }}
                                        </h4>
                                        @if($b->desc)
                                            <p class="text-gray-500 text-xs line-clamp-1 mt-0.5">
                                                {{ $b->desc }}
                                            </p>
                                        @endif
                                        
                                        <div class="mt-1">
                                            @if($b->project_id)
                                                <a href="/proyek/{{ $b->project_id }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 hover:underline inline-flex items-center font-medium">
                                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 105.656 0l4-4a4 4 0 10-5.656-5.656l-1.1 1.1" />
                                                    </svg>
                                                    Halaman Proyek
                                                </a>
                                            @else
                                                <span class="text-[11px] text-gray-400 italic">Belum disetting tautan proyek</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Daerah --}}
                            <td class="px-6 py-4 align-middle text-xs font-semibold text-gray-700 uppercase leading-relaxed">
                                {{ $b->daerah }}
                            </td>

                            {{-- Koordinat --}}
                            <td class="px-6 py-4 align-middle">
                                <div class="inline-flex items-center px-2.5 py-1.5 rounded-lg bg-gray-100 border border-gray-200 text-gray-700 font-mono text-xs">
                                    <svg class="w-3.5 h-3.5 text-gray-400 mr-1.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="truncate">{{ $b->lat }}, {{ $b->lng }}</span>
                                </div>
                            </td>
                            
                            {{-- Tombol Aksi --}}
                            <td class="px-6 py-4 align-middle text-right whitespace-nowrap">
                                <div class="inline-flex items-center space-x-1.5">
                                    {{-- Edit --}}
                                    <a href="{{ route('admin.branches.edit', $b->id) }}" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition" title="Edit Titik Peta">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    
                                    {{-- Hapus Satuan --}}
                                    <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus titik peta ini?')) { document.getElementById('single-delete-{{ $b->id }}').submit(); }" class="p-2 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg transition" title="Hapus Titik Peta">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                    <span>Belum ada titik kantor cabang terdaftar.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Form Bayangan khusus Eksekusi Hapus Satuan --}}
    @foreach($branches as $b)
        <form id="single-delete-{{ $b->id }}" action="{{ route('admin.branches.destroy', $b->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    {{-- Paginasi Tabel jika ada --}}
    @if(method_exists($branches, 'links'))
        <div class="mt-6">
            {{ $branches->links() }}
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