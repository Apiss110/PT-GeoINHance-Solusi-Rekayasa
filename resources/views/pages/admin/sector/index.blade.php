<x-app-layout>
    {{-- Inisialisasi Alpine.js untuk mengelola array ID yang dicentang massal --}}
    <div class="container px-6 mx-auto grid" 
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
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center my-6 gap-4">
            <div>
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Kelola Sektor Dinamis
                </h2>
            </div>
            
            <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                {{-- Tombol Hapus Massal Otomatis Muncul jika ada yang dicentang --}}
                <div x-show="selectedIds.length > 0" x-cloak x-transition>
                    <button type="submit" form="bulkDeleteForm" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none cursor-pointer">
                        Hapus Terpilih (<span x-text="selectedIds.length"></span>)
                    </button>
                </div>

                <a href="{{ route('admin.sector.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#0e1d82] border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple whitespace-nowrap">
                    + Tambah Sektor Baru
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
            {{ session('success') }}
        </div>
        @endif

        {{-- Form Utama Pembungkus Tabel untuk Aksi Hapus Massal --}}
        <form id="bulkDeleteForm" action="{{ route('admin.sector.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua sektor terpilih? Proyek terkait mungkin akan kehilangan relasinya.');">
            @csrf
            @method('DELETE')

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                {{-- Kolom Master Checkbox --}}
                                <th class="p-4 w-10 text-center">
                                    <input type="checkbox" @click="toggleAll()" :checked="selectedIds.length === allIds.length && allIds.length > 0" class="w-4 h-4 rounded cursor-pointer">
                                </th>
                                <th class="px-4 py-3">Nama Sektor</th>
                                <th class="px-4 py-3">Slug (URL)</th>
                                <th class="px-4 py-3">Banner Gambar</th>
                                <th class="px-4 py-3 text-center w-36">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                            @forelse($sectors as $sector)
                            <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                {{-- Checkbox Satuan per Baris Data --}}
                                <td class="p-4 text-center align-middle">
                                    <input type="checkbox" name="ids[]" value="{{ $sector->id }}" x-model="selectedIds" class="w-4 h-4 rounded cursor-pointer">
                                </td>
                                <td class="px-4 py-3 font-medium align-middle">{{ $sector->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 align-middle">{{ $sector->slug }}</td>
                                <td class="px-4 py-3 text-sm align-middle">
                                    @if($sector->banner_image)
                                        <img src="{{ asset('storage/' . $sector->banner_image) }}" alt="Banner" class="w-20 h-10 object-cover rounded border dark:border-gray-600">
                                    @else
                                        <span class="text-gray-400 text-xs italic">Tidak ada banner</span>
                                    @endif
                                </td>
                                {{-- Kolom Aksi Sejajar & Rapi --}}
                                <td class="px-4 py-3 text-sm align-middle">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('admin.sector.edit', $sector->id) }}" class="px-3 py-1 text-xs font-medium text-white bg-amber-500 rounded hover:bg-amber-600 transition">
                                            Edit
                                        </a>
                                        {{-- Gunakan form terpisah untuk hapus satuan agar tidak bentrok dengan form bulk delete --}}
                                        <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus sektor ini? Semua proyek terkait mungkin kehilangan relasinya.')) { document.getElementById('single-delete-{{ $sector->id }}').submit(); }" class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition cursor-pointer">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">Belum ada data sektor dinamis.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        {{-- Form Bayangan khusus untuk Eksekusi Hapus Satuan per Baris --}}
        @foreach($sectors as $sector)
            <form id="single-delete-{{ $sector->id }}" action="{{ route('admin.sector.destroy', $sector->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach

    </div>
</x-app-layout>