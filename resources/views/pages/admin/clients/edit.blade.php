<x-app-layout>
<div class="p-6 max-w-2xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow border border-slate-200">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Edit Akun Klien</h2>

        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Klien / Perusahaan</label>
                <input type="text" name="name" value="{{ old('name', $client->name) }}" class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email Klien</label>
                <input type="email" name="email" value="{{ old('email', $client->email) }}" class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Password Baru (Opsional)</label>
                <input type="password" name="password" class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Kosongkan jika tidak ingin mengubah password">
                <p class="text-xs text-slate-400 mt-1">Isi hanya jika klien meminta *reset* password.</p>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.clients.index') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>