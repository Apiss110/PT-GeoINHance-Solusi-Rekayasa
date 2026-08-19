<x-app-layout>
<div class="p-6 max-w-2xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow border border-slate-200">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Tambah Akun Klien Baru</h2>

        <form action="{{ route('admin.clients.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Klien / Perusahaan</label>
                <input type="text" name="name" class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email Klien</label>
                <input type="email" name="email" class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="klien@gmail.com" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                <input type="text" name="password" class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                <p class="text-xs text-slate-400 mt-1">Password bawaan ini dapat dibagikan ke klien untuk login pertama kali.</p>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.clients.index') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">Simpan Akun</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>