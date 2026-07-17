<x-app-layout>
<div class="container mx-auto px-6 py-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h3 class="text-gray-700 text-3xl font-medium">Pesan Masuk (Contact Inquiries)</h3>
        
        <button type="submit" form="bulk-delete-form" id="btn-bulk-delete" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition opacity-50 cursor-not-allowed flex items-center shadow-sm" disabled>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-16v1a3 3 0 003 3h10M9 3h6m2 4h-10" />
            </svg>
            Hapus Terpilih (<span id="selected-count">0</span>)
        </button>
    </div>

    {{-- Notifikasi Sukses / Gagal --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg text-sm font-medium">
            {{ session('error') }}
        </div>
    @endif

    <form id="bulk-delete-form" action="{{ route('admin.messages.destroy.bulk') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua pesan masuk yang dipilih?')">
        @csrf
        @method('DELETE')

        <div class="bg-white rounded-lg shadow overflow-hidden my-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-600 text-xs font-bold uppercase">
                        <th class="py-4 px-6 w-10">
                            <input type="checkbox" id="checkbox-all" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer w-4 h-4">
                        </th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Pengirim</th>
                        <th class="py-4 px-6">Subjek</th>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @forelse($messages as $msg)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 {{ !$msg->is_read ? 'font-bold bg-blue-50/40' : '' }}">
                            <td class="py-4 px-6">
                                <input type="checkbox" name="ids[]" value="{{ $msg->id }}" class="message-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer w-4 h-4">
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full {{ $msg->is_read ? 'bg-gray-200 text-gray-700' : 'bg-blue-500 text-white' }}">
                                    {{ $msg->is_read ? 'Dibaca' : 'Baru' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div>{{ $msg->full_name }}</div>
                                <div class="text-xs text-gray-400 font-normal">{{ $msg->email }}</div>
                            </td>
                            <td class="py-4 px-6">{{ $msg->subject }}</td>
                            <td class="py-4 px-6 text-xs text-gray-500 font-normal">{{ $msg->created_at->format('d M Y H:i') }}</td>
                            <td class="py-4 px-6 text-center space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-blue-600 hover:underline">Buka</a>
                                
                                <button type="button" onclick="if(confirm('Hapus pesan ini?')) { document.getElementById('delete-single-{{ $msg->id }}').submit(); }" class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-400">Belum ada pesan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $messages->links() }}
            </div>
        </div>
    </form>

    @foreach($messages as $msg)
        <form id="delete-single-{{ $msg->id }}" action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxAll = document.getElementById('checkbox-all');
        const checkboxes = document.querySelectorAll('.message-checkbox');
        const btnBulkDelete = document.getElementById('btn-bulk-delete');
        const selectedCount = document.getElementById('selected-count');

        function updateBulkDeleteButton() {
            const checkedCount = document.querySelectorAll('.message-checkbox:checked').length;
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
                    const allChecked = document.querySelectorAll('.message-checkbox:checked').length === checkboxes.length;
                    checkboxAll.checked = allChecked;
                }
                updateBulkDeleteButton();
            });
        });
    });
</script>
</x-app-layout>