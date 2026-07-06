<x-app-layout>
<div class="p-6 max-w-7xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm mt-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-black uppercase text-slate-900">Daftar Peserta Training</h2>
    </div>

    {{-- Notifikasi Sukses Saat Hapus Data --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-slate-200">
        <table class="w-full text-left border-collapse bg-white text-sm text-slate-600">
            <thead class="bg-slate-50 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">No. WhatsApp</th>
                    <th class="px-6 py-4">Instansi / Perusahaan</th>
                    <th class="px-6 py-4">Program</th>
                    <th class="px-6 py-4">Pesan</th>
                    <th class="px-6 py-4">Tanggal Daftar</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($registrations as $key => $reg)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-medium text-slate-900">{{ $key + 1 }}</td>
                    <td class="px-6 py-4 font-semibold text-slate-900">{{ $reg->name }}</td>
                    <td class="px-6 py-4">{{ $reg->email }}</td>
                    <td class="px-6 py-4">{{ $reg->whatsapp_number }}</td>
                    <td class="px-6 py-4">{{ $reg->company_or_institution ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-800 border border-red-100">
                            {{ $reg->training_program }}
                        </span>
                    </td>
                    <td class="px-6 py-4 max-w-xs truncate">{{ $reg->additional_message ?? '-' }}</td>
                    <td class="px-6 py-4 text-slate-400">{{ $reg->created_at->format('d M Y H:i') }}</td>
                    <td class="px-6 py-4 text-center">
                        {{-- Tombol Hapus Data --}}
                        <form action="{{ route('admin.training.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold uppercase text-xs tracking-wider">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-6 py-10 text-center text-slate-400 font-medium">
                        Belum ada pendaftar yang masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>