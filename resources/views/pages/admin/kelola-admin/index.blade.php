<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Akun Admin') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-sm font-bold text-gray-500 uppercase tracking-wider">Daftar Otoritas Manajemen</h2>
            <a href="{{ route('admin.kelola-admin.create') }}" class="inline-flex items-center justify-center bg-[#0e1d82] hover:bg-[#0c196e] text-white font-medium text-sm py-2 px-4 rounded-lg transition shadow-sm">
                Tambah Admin Baru
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-[#0e1d82] border-y border-r border-slate-200">
            <div class="p-6 text-gray-900 overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-3">Alamat Email</th>
                            <th scope="col" class="px-6 py-3">Role Status</th>
                            <th scope="col" class="px-6 py-3 text-center">Aksi Manajemen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($admins as $index => $admin)
                            <tr class="bg-white hover:bg-slate-50/80 transition">
                                <td class="px-6 py-4 font-semibold text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $admin->name }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $admin->email }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-[#cfdde9] text-[#0e1d82] text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">
                                        {{ $admin->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 space-x-4 text-center">
                                    <a href="{{ route('admin.kelola-admin.edit', $admin->id) }}" class="font-semibold text-amber-600 hover:text-amber-700 hover:underline">Edit</a>
                                    
                                    <form action="{{ route('admin.kelola-admin.destroy', $admin->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus administrator ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-semibold text-[#c00000] hover:text-red-800 hover:underline bg-transparent border-0 p-0 cursor-pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada akun staff eksternal yang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>