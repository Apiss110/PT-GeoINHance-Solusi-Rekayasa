<x-app-layout>
<div class="p-6 max-w-2xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow border border-slate-200">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Tambah Akun Klien Baru</h2>

        {{-- Alert Notifikasi Error Validasi --}}
        @if ($errors->any())
            <div class="mb-5 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                <div class="flex items-center mb-1">
                    <span class="font-bold text-red-800 text-sm">Gagal Menyimpan Data:</span>
                </div>
                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.clients.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Input Nama --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Klien / Perusahaan</label>
                <input type="text" 
                       name="name" 
                       value="{{ old('name') }}"
                       class="w-full p-2.5 border @error('name') border-red-500 @else border-slate-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" 
                       placeholder="Masukkan nama lengkap / PT" 
                       required>
                @error('name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Email --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email Klien</label>
                <input type="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       class="w-full p-2.5 border @error('email') border-red-500 @else border-slate-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" 
                       placeholder="klien@gmail.com" 
                       required>
                @error('email')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Password --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                <input type="text" 
                       name="password" 
                       class="w-full p-2.5 border @error('password') border-red-500 @else border-slate-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" 
                       placeholder="Minimal 6 karakter"
                       required>
                @error('password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @else
                    <p class="text-xs text-slate-400 mt-1">Password bawaan ini dapat dibagikan ke klien untuk login pertama kali (minimal 6 karakter).</p>
                @enderror
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.clients.index') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">Simpan Akun</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>