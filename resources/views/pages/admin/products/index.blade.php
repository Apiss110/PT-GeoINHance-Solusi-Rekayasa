<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Produk Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100 dark:border-gray-700">
                
                {{-- Bagian Atas: Judul & Tombol Tambah --}}
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Daftar Semua Produk</h3>
                    <a href="{{ route('admin.products.create') }}" class="bg-[#0e1d82] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#0c196e] transition">
                        + Tambah Produk Baru
                    </a>
                </div>

                {{-- Notifikasi Sukses --}}
                @if(session('success'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-900/30 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- 🟢 SEKARANG TABEL PRODUK DIBUNGKUS DI SINI --}}
                <x-admin.bulk-delete :route="route('admin.products.destroy.bulk')" :items="$products">
    
                    {{-- Judul Komponen (Akan muncul di sebelah kiri tombol hapus massal) --}}
                    <x-slot:header>
                        <h2 class="text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Data Produk Aktif
                        </h2>
                    </x-slot:header>

                    {{-- Bagian Head Tabel (Kolom Checkbox Master otomatis dibuat oleh komponen) --}}
                    <x-slot:thead>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </x-slot:thead>

                    {{-- Bagian Body Tabel --}}
                    <x-slot:tbody>
                        @forelse($products as $key => $product)
                            @php
                                // Decode JSON description
                                $details = json_decode($product->description, true);
                                
                                // Ambil hero_description jika formatnya JSON, jika teks biasa langsung gunakan description
                                $displayDesc = isset($details['hero_description']) ? $details['hero_description'] : $product->description;
                                
                                // Bersihkan dari tag HTML/Spasi
                                $cleanedDesc = strip_tags($displayDesc);
                            @endphp
                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                
                                {{-- 1. PENTING: Checkbox data untuk Hapus Massal (Wajib pakai x-model="selectedIds") --}}
                                <td class="p-4 text-center align-middle">
                                    <input type="checkbox" name="ids[]" value="{{ $product->id }}" x-model="selectedIds" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer">
                                </td>

                                {{-- 2. Kolom Nomor --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 align-middle">
                                    {{ $products->firstItem() + $key }}
                                </td>

                                {{-- 3. Kolom Nama Produk --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white align-middle">
                                    {{ $product->name }}
                                </td>

                                {{-- 4. Kolom Deskripsi --}}
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 max-w-xs truncate align-middle" title="{{ $cleanedDesc }}">
                                    {{ $cleanedDesc }}
                                </td>

                                {{-- 5. Kolom Aksi Edit / Hapus Satuan --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium align-middle">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-3">Edit</a>
                                    
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                    Belum ada data produk.
                                </td>
                            </tr>
                        @endforelse
                    </x-slot:tbody>

                </x-admin.bulk-delete>

                {{-- Pagination (Tetap di paling bawah setelah komponen selesai) --}}
                <div class="mt-4">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>