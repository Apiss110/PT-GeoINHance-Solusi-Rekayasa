<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Manajemen Case Study</h3>
                <p class="text-gray-500 text-sm mt-1">Kelola berkas dokumen studi kasus teknik perusahaan</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('admin.studi-kasus.create') }}" class="px-4 py-2 bg-[#0e1d82] text-white rounded-lg hover:bg-[#0e1d82]/90 font-medium text-sm flex items-center shadow-sm transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Case Study
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <div class="p-6 bg-gray-50/50 border-b border-gray-100 flex items-center justify-between">
                <span class="text-sm font-semibold text-gray-700">Daftar Dokumen Aktif</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 tracking-wider">
                        <tr>
                            <th scope="col" class="px-6 py-3.5">No</th>
                            <th scope="col" class="px-6 py-3.5">Judul Case Study</th>
                            <th scope="col" class="px-6 py-3.5">Sektor / Bidang</th>
                            <th scope="col" class="px-6 py-3.5">Tahun</th>
                            <th scope="col" class="px-6 py-3.5">Ukuran File</th>
                            <th scope="col" class="px-6 py-3.5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        {{-- Menggunakan @forelse untuk handle jika data kosong --}}
                        @forelse($caseStudies as $index => $case)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    {{ $case->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                                        {{ $case->sector }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                    {{ $case->year }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $case->file_size ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="inline-flex space-x-2">
                                        <a href="{{ route('admin.studi-kasus.edit', $case->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 p-2 rounded-lg transition" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        
                                        <form action="{{ route('admin.studi-kasus.destroy', $case->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data studi kasus ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-lg transition" title="Hapus">
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
                                <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">
                                    Belum ada data Case Study yang tersedia. Klik tombol di atas untuk menambahkan data baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>