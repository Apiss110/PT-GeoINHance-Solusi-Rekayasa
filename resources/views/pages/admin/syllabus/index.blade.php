<x-app-layout>
<div class="container mx-auto px-6 py-8">
    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Kelola Silabus & Materi</h2>
        
        <div class="flex items-center space-x-2 w-full sm:w-auto justify-end">
            <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition opacity-50 cursor-not-allowed flex items-center" disabled>
                Hapus Terpilih (<span id="selected-count">0</span>)
            </button>

            <a href="{{ route('admin.syllabus.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition white-space-nowrap">
                + Tambah Silabus Baru
            </a>
        </div>
    </div>

    <form id="bulk-delete-form" action="{{ route('admin.syllabus.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua silabus yang dipilih?')">
        @csrf
        @method('DELETE')

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-xs uppercase font-bold">
                        <th class="px-6 py-4 w-10">
                            <input type="checkbox" id="checkbox-all" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer w-4 h-4">
                        </th>
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4">Kategori Software</th>
                        <th class="px-6 py-4">Level</th>
                        <th class="px-6 py-4">Jumlah Modul</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700 divide-y divide-slate-100">
                    @forelse($syllabi as $item)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" name="ids[]" value="{{ $item->id }}" class="syllabus-checkbox rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer w-4 h-4">
                            </td>
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
                                
                                <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus silabus ini?')) { document.getElementById('delete-single-{{ $item->id }}').submit(); }" class="text-red-600 hover:text-red-700 font-medium text-xs">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-400">Belum ada data silabus.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </form>
    
    @foreach($syllabi as $item)
        <form id="delete-single-{{ $item->id }}" action="{{ route('admin.syllabus.destroy', $item->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <div class="mt-4">
        {{ $syllabi->links() }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxAll = document.getElementById('checkbox-all');
        const checkboxes = document.querySelectorAll('.syllabus-checkbox');
        const btnBulkDelete = document.getElementById('btn-bulk-delete');
        const selectedCount = document.getElementById('selected-count');

        function updateBulkDeleteButton() {
            const checkedCount = document.querySelectorAll('.syllabus-checkbox:checked').length;
            selectedCount.textContent = checkedCount;

            if (checkedCount > 0) {
                btnBulkDelete.removeAttribute('disabled');
                btnBulkDelete.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                btnBulkDelete.setAttribute('disabled', 'disabled');
                btnBulkDelete.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }

        // Event handler untuk checkbox master (pilih semua)
        checkboxAll.addEventListener('change', function () {
            checkboxes.forEach(cb => {
                cb.checked = checkboxAll.checked;
            });
            updateBulkDeleteButton();
        });

        // Event handler untuk tiap checkbox baris
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function () {
                if (!this.checked) {
                    checkboxAll.checked = false;
                } else {
                    const allChecked = document.querySelectorAll('.syllabus-checkbox:checked').length === checkboxes.length;
                    checkboxAll.checked = allChecked;
                }
                updateBulkDeleteButton();
            });
        });
    });
</script>
</x-app-layout>