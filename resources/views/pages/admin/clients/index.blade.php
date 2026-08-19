<x-app-layout>
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Kelola Akun Klien</h1>
        <a href="{{ route('admin.clients.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
            + Tambah Klien Baru
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow border border-slate-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm">
                    <th class="p-4">No</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $index => $client)
                    <tr class="border-b border-slate-100 text-sm hover:bg-slate-50">
                        <td class="p-4">{{ $index + 1 }}</td>
                        <td class="p-4 font-semibold text-slate-800">{{ $client->name }}</td>
                        <td class="p-4 text-slate-600">{{ $client->email }}</td>
                        <td class="p-4"><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs uppercase font-bold">{{ $client->role }}</span></td>
                        <td class="p-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.clients.edit', $client->id) }}" class="px-3 py-1 bg-amber-500 text-white rounded text-xs hover:bg-amber-600 transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600 transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-slate-500">Belum ada akun klien.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>