<x-app-layout>
    <div class="container mx-auto px-6 py-8"
        x-data="{ 
            selectedIds: [],
            allIds: [],
            toggleAll() {
                if (this.selectedIds.length === this.allIds.length) {
                    this.selectedIds = [];
                } else {
                    this.selectedIds = [...this.allIds];
                }
            }
        }" 
        x-init="allIds = [ @foreach($sectors as $s) '{{ $s->id }}', @endforeach ]">
        
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
                <h3 class="text-gray-800 text-3xl font-bold tracking-tight">Kelola Sektor Dinamis</h3>
                <p class="text-gray-500 text-sm mt-1">Kelola daftar sektor bisnis/layanan beserta banner gambar pendukung.</p>
            </div>
            
            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                {{-- Bulk Delete Button (Alpine.js State) --}}
                <button type="submit" form="bulkDeleteForm" id="btn-bulk-delete" 
                    :disabled="selectedIds.length === 0"
                    :class="selectedIds.length > 0 ? 'opacity-100 cursor-pointer' : 'opacity-50 cursor-not-allowed'"
                    class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium text-sm flex items-center shadow-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
                    </svg>
                    Hapus Terpilih (<span x-text="selectedIds.length">0</span>)
                </button>

                {{-- Add New Sector Button --}}
                <a href="{{ route('admin.sector.create') }}" 
                    class="px-4 py-2 bg-[#0e1d82] text-white rounded-lg hover:bg-[#0e1d82]/90 font-medium text-sm flex items-center shadow-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Sektor Baru
                </a>
            </div>
        </div>

        {{-- 3. Bulk Delete Form Wrapper & Data Table Card --}}
        <form id="bulkDeleteForm" action="{{ route('admin.sector.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua sektor terpilih? Proyek terkait mungkin akan kehilangan relasinya.');">
            @csrf
            @method('DELETE')

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                {{-- Header Card --}}
                <div class="px-6 py-4 bg-gray-50/70 border-b border-gray-200 flex items-center justify-between">
                    <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Data Sektor Bisnis & Layanan</span>
                </div>
                
                {{-- Table Responsive Container --}}
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                        <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 tracking-wider">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-center w-12 align-middle">
                                    <input type="checkbox" @click="toggleAll()" :checked="selectedIds.length === allIds.length && allIds.length > 0" 
                                        class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-center w-14 align-middle">NO</th>
                                <th scope="col" class="px-6 py-3.5 w-4/12 align-middle">NAMA SEKTOR</th>
                                <th scope="col" class="px-6 py-3.5 w-3/12 align-middle">SLUG (URL)</th>
                                <th scope="col" class="px-6 py-3.5 w-3/12 align-middle">BANNER GAMBAR</th>
                                <th scope="col" class="px-6 py-3.5 text-right w-24 align-middle">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($sectors as $key => $sector)
                                <tr class="hover:bg-gray-50/60 transition">
                                    {{-- Checkbox Multi-select --}}
                                    <td class="px-4 py-4 text-center align-middle">
                                        <input type="checkbox" name="ids[]" value="{{ $sector->id }}" x-model="selectedIds" 
                                            class="item-checkbox rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] cursor-pointer w-4 h-4">
                                    </td>
                                    
                                    {{-- Nomor Paginasi --}}
                                    <td class="px-4 py-4 text-center align-middle font-medium text-gray-700">
                                        {{ method_exists($sectors, 'firstItem') ? $sectors->firstItem() + $key : $key + 1 }}
                                    </td>
                                    
                                    {{-- Nama Sektor --}}
                                    <td class="px-6 py-4 align-middle">
                                        <span class="font-bold text-gray-800 text-sm uppercase leading-snug">
                                            {{ $sector->name }}
                                        </span>
                                    </td>

                                    {{-- Slug URL --}}
                                    <td class="px-6 py-4 align-middle">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-mono bg-gray-100 text-gray-600 border border-gray-200">
                                            /{{ $sector->slug }}
                                        </span>
                                    </td>

                                    {{-- Banner Gambar --}}
                                    <td class="px-6 py-4 align-middle">
                                        @if($sector->banner_image)
                                            <div class="relative group inline-block">
                                                <img src="{{ asset('storage/' . $sector->banner_image) }}" alt="Banner {{ $sector->name }}" 
                                                    class="w-24 h-12 object-cover rounded-md border border-gray-200 shadow-sm bg-gray-50 group-hover:opacity-90 transition">
                                            </div>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-400 italic">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Tanpa Banner
                                            </span>
                                        @endif
                                    </td>
                                    
                                    {{-- Tombol Aksi --}}
                                    <td class="px-6 py-4 align-middle text-right whitespace-nowrap">
                                        <div class="inline-flex items-center space-x-1.5">
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.sector.edit', $sector->id) }}" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition" title="Edit Sektor">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            
                                            {{-- Hapus Satuan --}}
                                            <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus sektor ini? Semua proyek terkait mungkin kehilangan relasinya.')) { document.getElementById('single-delete-{{ $sector->id }}').submit(); }" class="p-2 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg transition" title="Hapus Sektor">
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
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <span>Belum ada data sektor dinamis. Klik tombol "+ Tambah Sektor Baru" untuk menambahkan.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        {{-- Form Bayangan khusus Eksekusi Hapus Satuan --}}
        @foreach($sectors as $sector)
            <form id="single-delete-{{ $sector->id }}" action="{{ route('admin.sector.destroy', $sector->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach

        {{-- Paginasi Tabel jika ada --}}
        @if(method_exists($sectors, 'links'))
            <div class="mt-6">
                {{ $sectors->links() }}
            </div>
        @endif
    </div>
</x-app-layout>