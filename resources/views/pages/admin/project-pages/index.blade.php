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
                <h3 class="text-gray-800 text-3xl font-bold tracking-tight">Kelola Halaman Utama Portofolio</h3>
                <p class="text-gray-500 text-sm mt-1">Daftar seluruh halaman portofolio aktif GeoINHance.</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex flex-wrap items-center space-x-3">
                {{-- Tombol Hapus Terpilih (Bulk Delete) --}}
                <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" 
                    class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium text-sm flex items-center shadow-sm transition opacity-50 cursor-not-allowed border-0" disabled>
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                    </svg>
                    Hapus Terpilih (<span id="selected-count">0</span>)
                </button>

                {{-- Add New Page Button --}}
                <a href="{{ route('admin.project-pages.create') }}" 
                    class="px-4 py-2 bg-[#0e1d82] text-white rounded-lg hover:bg-[#0e1d82]/90 font-medium text-sm flex items-center shadow-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Halaman Baru
                </a>

                {{-- Navigasi ke Kelola Card Proyek (Dipindah ke Paling Kanan) --}}
                @if(Route::has('admin.project.index'))
                    <a href="{{ route('admin.project.index') }}" 
                        class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200 border border-gray-200 rounded-lg font-medium text-sm flex items-center shadow-sm transition">
                        <span>Kelola Card Proyek</span>
                        <svg class="w-4 h-4 ml-2 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>

        {{-- 3. Bulk Delete Form Wrapper & Data Table --}}
        <form id="bulk-delete-form" action="{{ route('admin.project-pages.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus halaman portofolio yang dipilih?')">
            @csrf
            @method('DELETE')

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50/70 border-b border-gray-200 flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Daftar Halaman Portofolio Aktif</span>
                    <span class="text-xs bg-blue-100 text-[#0e1d82] font-semibold px-3 py-1 rounded-full">
                        {{ method_exists($projectPages, 'total') ? $projectPages->total() : $projectPages->count() }} Total Halaman
                    </span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                        <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 tracking-wider">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-center w-10">
                                    <input type="checkbox" id="checkbox-all" class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-center w-14">NO</th>
                                <th scope="col" class="px-6 py-3.5 w-3/12">BANNER</th>
                                <th scope="col" class="px-6 py-3.5 w-7/12">DETAIL HALAMAN</th>
                                <th scope="col" class="px-6 py-3.5 text-right w-24">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($projectPages as $key => $page)
                                <tr class="hover:bg-gray-50/60 transition">
                                    
                                    {{-- Checkbox Multi-select --}}
                                    <td class="px-4 py-4 text-center align-middle">
                                        <input type="checkbox" name="ids[]" value="{{ $page->id }}" 
                                            class="item-checkbox rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                    </td>

                                    {{-- Nomor Paginasi --}}
                                    <td class="px-4 py-4 text-center align-middle font-medium text-gray-700">
                                        {{ method_exists($projectPages, 'firstItem') ? $projectPages->firstItem() + $key : $key + 1 }}
                                    </td>

                                    {{-- Banner Image --}}
                                    <td class="px-6 py-4 align-middle">
                                        @if($page->banner_image)
                                            <div class="w-24 h-14 bg-gray-50 rounded-md overflow-hidden border border-gray-200 shadow-sm shrink-0">
                                                <img src="{{ Str::contains($page->banner_image, 'storage/') ? asset($page->banner_image) : (Str::contains($page->banner_image, 'project-banners/') ? asset('storage/' . $page->banner_image) : asset('storage/project-banners/' . $page->banner_image)) }}" 
                                                     class="w-full h-full object-cover" 
                                                     alt="Banner {{ $page->name }}"
                                                     onerror="this.onerror=null; this.src='https://placehold.co/600x400?text=Check+Symlink';">
                                            </div>
                                        @else
                                            <div class="w-24 h-14 bg-gray-100 rounded-md border border-gray-200 border-dashed flex items-center justify-center text-gray-400 text-[10px] font-bold uppercase tracking-wider">
                                                No Banner
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Detail Halaman --}}
                                    <td class="px-6 py-4 align-middle">
                                        <span class="font-bold text-gray-800 text-sm uppercase leading-snug block">
                                            {{ $page->name }}
                                        </span>
                                        
                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="text-xs text-gray-500">Slug:</span>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-mono bg-gray-100 text-[#0e1d82] border border-gray-200">
                                                {{ $page->slug }}
                                            </span>
                                        </div>

                                        <div class="flex items-center space-x-2 mt-1">
                                            <span class="text-[11px] text-gray-400">Database Path:</span>
                                            <code class="text-emerald-600 font-mono text-[10px] bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100">
                                                {{ $page->banner_image ?? '-' }}
                                            </code>
                                        </div>

                                        @if($page->description)
                                            <p class="text-xs text-gray-500 mt-1.5 line-clamp-2 leading-relaxed">
                                                {{ $page->description }}
                                            </p>
                                        @endif
                                    </td>

                                    {{-- Tombol Aksi Edit & Hapus Satuan --}}
                                    <td class="px-6 py-4 align-middle text-right whitespace-nowrap">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="{{ route('admin.project-pages.edit', $page->id) }}" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition" title="Edit Halaman">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            {{-- Hapus Satuan --}}
                                            <form action="{{ route('admin.project-pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus halaman kategori ini?')" class="inline">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg transition" title="Hapus Halaman">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                            <span>Belum ada data halaman utama portofolio. Klik tombol "+ Tambah Halaman Baru" untuk menambahkan.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        {{-- Paginasi Tabel jika ada --}}
        @if(method_exists($projectPages, 'links'))
            <div class="mt-6">
                {{ $projectPages->links() }}
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