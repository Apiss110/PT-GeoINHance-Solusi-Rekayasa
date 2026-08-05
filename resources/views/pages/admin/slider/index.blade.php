<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        
        {{-- 1. Session Notifications --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm flex items-center justify-between">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-sm flex items-center justify-between">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- 2. Page Header & Top Action Buttons --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Manajemen Banner Front Page</h3>
                <p class="text-gray-500 text-sm mt-1">Kelola gambar slider utama dan teks promosi pada halaman depan.</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                {{-- Bulk Delete Button --}}
                <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" 
                    class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium text-sm flex items-center shadow-sm transition opacity-50 cursor-not-allowed" disabled>
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                    </svg>
                    Hapus Terpilih (<span id="selected-count">0</span>)
                </button>

                {{-- Add New Slider Button --}}
                <a href="{{ route('admin.slider.create') }}" 
                    class="px-4 py-2 bg-[#0e1d82] text-white rounded-lg hover:bg-[#0e1d82]/90 font-medium text-sm flex items-center shadow-sm transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Banner Baru
                </a>
            </div>
        </div>

        {{-- 3. Bulk Delete Form Wrapper & Data Table --}}
        <form id="bulk-delete-form" action="{{ route('admin.slider.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus banner yang dipilih?')">
            @csrf
            @method('DELETE')

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
                <div class="p-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700">Daftar Banner Utama Aktif</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                        <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 tracking-wider">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 w-10">
                                    <input type="checkbox" id="checkbox-all" class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                </th>
                                <th scope="col" class="px-6 py-3.5 w-12">No</th>
                                <th scope="col" class="px-6 py-3.5">Preview Gambar</th>
                                <th scope="col" class="px-6 py-3.5">Informasi Teks & Link</th>
                                <th scope="col" class="px-6 py-3.5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($sliders as $key => $slider)
                                <tr class="hover:bg-gray-50/50 transition">
                                    {{-- Checkbox Multi-select --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" name="ids[]" value="{{ $slider->id }}" class="item-checkbox rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                    </td>
                                    
                                    {{-- Nomor Paginasi --}}
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        {{ method_exists($sliders, 'firstItem') && $sliders->firstItem() ? $sliders->firstItem() + $key : $key + 1 }}
                                    </td>
                                    
                                    {{-- Preview Banner --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ asset('storage/' . $slider->image_path) }}" class="w-28 h-16 object-cover rounded-lg border border-gray-200 shadow-sm" alt="Preview Banner">
                                    </td>
                                    
                                    {{-- Informasi Teks & Link --}}
                                    <td class="px-6 py-4">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">{{ $slider->subtitle ?? 'Tanpa Sub-judul' }}</span>
                                        <div class="text-sm font-bold text-gray-800 mt-0.5 line-clamp-1">{{ $slider->title ?? 'Tanpa Judul' }}</div>
                                        
                                        <div class="mt-1.5 flex items-center gap-1.5 text-xs text-[#0e1d82] bg-blue-50/60 px-2.5 py-1 rounded-md w-fit border border-blue-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 text-[#0e1d82]">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                            </svg>
                                            <span>Link: <code class="font-mono font-bold">{{ $slider->link_url ?? '-' }}</code></span>
                                        </div>
                                    </td>
                                    
                                    {{-- Tombol Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="inline-flex space-x-2">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 p-2 rounded-lg transition" title="Edit Banner">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            
                                            {{-- Hapus Satuan --}}
                                            <button type="button" onclick="if(confirm('Yakin ingin menghapus banner ini?')) { document.getElementById('delete-slider-{{ $slider->id }}').submit(); }" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-lg transition" title="Hapus Banner">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">
                                        Belum ada foto banner yang diunggah. Klik tombol "+ Tambah Banner Baru" untuk menambahkan data. Tampilan di pengguna akan menggunakan slide default.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        {{-- Hidden Form Single Delete untuk setiap banner --}}
        @foreach($sliders as $slider)
            <form id="delete-slider-{{ $slider->id }}" action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach

        {{-- Paginasi Tabel --}}
        @if(method_exists($sliders, 'links'))
            <div class="mt-6">
                {{ $sliders->links() }}
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