<x-app-layout>
<div class="p-6 max-w-7xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm mt-6">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h2 class="text-2xl font-black uppercase text-slate-900">Daftar Peserta Training</h2>
        
        <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" class="bg-red-600 hover:bg-red-700 text-white font-bold uppercase text-xs tracking-wider px-4 py-2.5 rounded-xl transition opacity-50 cursor-not-allowed flex items-center shadow-sm" disabled>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
            </svg>
            Hapus Terpilih (<span id="selected-count">0</span>)
        </button>
    </div>

    {{-- Notifikasi Sukses / Gagal --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl text-sm font-semibold">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl text-sm font-semibold">
            {{ session('error') }}
        </div>
    @endif

    <form id="bulk-delete-form" action="{{ route('admin.training.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data pendaftar yang dipilih?')">
        @csrf
        @method('DELETE')

        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="w-full text-left border-collapse bg-white text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 w-10">
                            <input type="checkbox" id="checkbox-all" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer w-4 h-4">
                        </th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Program</th>
                        <th class="px-6 py-4">Tanggal Daftar</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($registrations as $reg)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <input type="checkbox" name="ids[]" value="{{ $reg->id }}" class="registration-checkbox rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer w-4 h-4">
                        </td>
                        <td class="px-6 py-4">
                            @if($reg->is_read)
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600 border border-slate-200">
                                    Dibaca
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700 border border-blue-100 animate-pulse">
                                    Belum Dibaca
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $reg->name }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $reg->email }}</td>
                        
                        <td class="px-6 py-4 text-slate-700 font-medium">
                            {{ $reg->syllabus->title ?? $reg->training_program }}
                        </td>

                        <td class="px-6 py-4 text-slate-400">{{ $reg->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-4">
                                <a href="{{ route('admin.training.show', $reg->id) }}" class="text-blue-600 hover:text-blue-900 font-bold uppercase text-xs tracking-wider">
                                    Buka
                                </a>

                                <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus data pendaftar ini?')) { document.getElementById('delete-single-{{ $reg->id }}').submit(); }" class="text-red-600 hover:text-red-900 font-bold uppercase text-xs tracking-wider">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-slate-400 font-medium">
                            Belum ada peserta training yang mendaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </form>

    @foreach($registrations as $reg)
        <form id="delete-single-{{ $reg->id }}" action="{{ route('admin.training.destroy', $reg->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxAll = document.getElementById('checkbox-all');
        const checkboxes = document.querySelectorAll('.registration-checkbox');
        const btnBulkDelete = document.getElementById('btn-bulk-delete');
        const selectedCount = document.getElementById('selected-count');

        function updateBulkDeleteButton() {
            const checkedCount = document.querySelectorAll('.registration-checkbox:checked').length;
            selectedCount.textContent = checkedCount;

            if (checkedCount > 0) {
                btnBulkDelete.removeAttribute('disabled');
                btnBulkDelete.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                btnBulkDelete.setAttribute('disabled', 'disabled');
                btnBulkDelete.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }

        // Aksi Checkbox Master (Centang Semua)
        checkboxAll.addEventListener('change', function () {
            checkboxes.forEach(cb => {
                cb.checked = checkboxAll.checked;
            });
            updateBulkDeleteButton();
        });

        // Aksi Checkbox Baris Tunggal
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function () {
                if (!this.checked) {
                    checkboxAll.checked = false;
                } else {
                    const allChecked = document.querySelectorAll('.registration-checkbox:checked').length === checkboxes.length;
                    checkboxAll.checked = allChecked;
                }
                updateBulkDeleteButton();
            });
        });
    });
</script>
</x-app-layout>