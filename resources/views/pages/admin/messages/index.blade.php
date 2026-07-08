<x-app-layout>
<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium mb-6">Pesan Masuk (Contact Inquiries)</h3>

    <div class="bg-white rounded-lg shadow overflow-hidden my-6">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200 text-gray-600 text-xs font-bold uppercase">
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
                        <td class="py-4 px-6 text-center space-x-2">
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-blue-600 hover:underline">Buka</a>
                            <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-400">Belum ada pesan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $messages->links() }}
        </div>
    </div>
</div>
</x-app-layout>