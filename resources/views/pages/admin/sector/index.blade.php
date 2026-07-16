<x-app-layout>
<div class="container px-6 mx-auto grid">
    <div class="flex justify-between items-center my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Kelola Sektor Dinamis
        </h2>
        <a href="{{ route('admin.sector.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#0e1d82] border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
            + Tambah Sektor Baru
        </a>
    </div>

    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
        {{ session('success') }}
    </div>
    @endif

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nama Sektor</th>
                        <th class="px-4 py-3">Slug (URL)</th>
                        <th class="px-4 py-3">Banner Gambar</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                    @forelse($sectors as $sector)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 font-medium">{{ $sector->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $sector->slug }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if($sector->banner_image)
                                <img src="{{ asset('storage/' . $sector->banner_image) }}" alt="Banner" class="w-20 h-10 object-cover rounded">
                            @else
                                <span class="text-gray-400 text-xs">Tidak ada banner</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm flex items-center space-x-2">
                            <a href="{{ route('admin.sector.edit', $sector->id) }}" class="px-3 py-1 text-xs font-medium text-white bg-amber-500 rounded hover:bg-amber-600">
                                Edit
                            </a>
                            <form action="{{ route('admin.sector.destroy', $sector->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sektor ini? Semua proyek terkait mungkin kehilangan relasinya.');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">Belum ada data sektor dinamis.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>