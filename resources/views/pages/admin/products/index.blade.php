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
                <h3 class="text-gray-700 text-3xl font-medium">Kelola Produk</h3>
                <p class="text-gray-500 text-sm mt-1">Daftar seluruh produk dan layanan aktif GeoINHance.</p>
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

                {{-- Add New Product Button --}}
                <a href="{{ route('admin.products.create') }}" 
                    class="px-4 py-2 bg-[#0e1d82] text-white rounded-lg hover:bg-[#0e1d82]/90 font-medium text-sm flex items-center shadow-sm transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Produk Baru
                </a>
            </div>
        </div>

        {{-- 3. Bulk Delete Form Wrapper & Data Table --}}
        <form id="bulk-delete-form" action="{{ route('admin.products.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk yang dipilih?')">
            @csrf
            @method('DELETE')

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
                <div class="p-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700">Data Produk Aktif</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                        <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 tracking-wider">
                            <tr>
                                <th scope="col" class="px-6 py-3.5 w-10">
                                    <input type="checkbox" id="checkbox-all" class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                </th>
                                <th scope="col" class="px-6 py-3.5 w-12">No</th>
                                <th scope="col" class="px-6 py-3.5">Nama Produk</th>
                                <th scope="col" class="px-6 py-3.5">Deskripsi</th>
                                <th scope="col" class="px-6 py-3.5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($products as $key => $product)
                                @php
                                    // Decode JSON description
                                    $details = json_decode($product->description, true);
                                    
                                    // Ambil hero_description jika formatnya JSON, jika teks biasa langsung gunakan description
                                    $displayDesc = isset($details['hero_description']) ? $details['hero_description'] : $product->description;
                                    
                                    // Bersihkan dari tag HTML/Spasi
                                    $cleanedDesc = strip_tags($displayDesc);
                                @endphp
                                <tr class="hover:bg-gray-50/50 transition">
                                    {{-- Checkbox Multi-select --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" name="ids[]" value="{{ $product->id }}" class="item-checkbox rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                    </td>
                                    
                                    {{-- Nomor Paginasi --}}
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        {{ $products->firstItem() + $key }}
                                    </td>
                                    
                                    {{-- Nama Produk --}}
                                    <td class="px-6 py-4 font-semibold text-gray-800 whitespace-nowrap">
                                        {{ $product->name }}
                                    </td>
                                    
                                    {{-- Deskripsi Produk --}}
                                    <td class="px-6 py-4 text-gray-500 max-w-xs truncate" title="{{ $cleanedDesc }}">
                                        {{ $cleanedDesc }}
                                    </td>
                                    
                                    {{-- Tombol Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="inline-flex space-x-2">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 p-2 rounded-lg transition" title="Edit Produk">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            
                                            {{-- Hapus Satuan --}}
                                            <button type="button" onclick="if(confirm('Yakin ingin menghapus produk ini?')) { document.getElementById('delete-product-{{ $product->id }}').submit(); }" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-lg transition" title="Hapus Produk">
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
                                        Belum ada data produk yang tersedia. Klik tombol "+ Tambah Produk Baru" untuk menambahkan data.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        {{-- Hidden Form Single Delete untuk setiap produk --}}
        @foreach($products as $product)
            <form id="delete-product-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach

        {{-- Paginasi Tabel --}}
        <div class="mt-6">
            {{ $products->links() }}
        </div>
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