<x-app-layout>
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Kelola Silabus & Materi</h2>
        <a href="{{ route('admin.syllabus.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition">
            + Tambah Silabus Baru
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs uppercase font-bold">
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Kategori Software</th>
                    <th class="px-6 py-4">Level</th>
                    <th class="px-6 py-4">Jumlah Modul</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                @forelse($syllabi as $item)
                    <tr>
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $item->title }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-slate-100 text-slate-800 text-xs px-2.5 py-1 rounded-full uppercase font-medium">
                                {{ $item->software_category }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-50 text-blue-700 text-xs px-2.5 py-1 rounded-full uppercase font-medium">
                                {{ $item->level }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $item->modules_count }} Modul</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.syllabus.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-700 font-medium text-xs">Edit</a>
                            
                            <form action="{{ route('admin.syllabus.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus silabus ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-400">Belum ada data silabus.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $syllabi->links() }}
    </div>
</div>
</x-app-layout>