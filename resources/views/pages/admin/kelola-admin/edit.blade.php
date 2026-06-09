<x-app-layout>
    <!-- Slot Header Atas -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Akun Admin') }}
        </h2>
    </x-slot>

    <!-- Container Lebar Form -->
    <div class="max-w-2xl">
        
        <!-- Header Ringkas & Tombol Kembali -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider">Formulir Perbaruan Otoritas</h3>
            <a href="{{ route('admin.kelola-admin.index') }}" class="inline-flex items-center justify-center bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-medium text-sm py-2 px-4 rounded-lg transition shadow-sm">
                Kembali
            </a>
        </div>

        <!-- Balikan Validasi Error Jika Input Salah -->
        @if ($errors->any())
            <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                <div class="font-semibold mb-1">Mohon koreksi beberapa kesalahan berikut:</div>
                <ul class="list-disc list-inside space-y-0.5 text-xs text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card Form dengan Aksen Garis Kiri Tebal Biru Utama (#0e1d82) -->
        <div class="bg-white rounded-xl border-l-4 border-[#0e1d82] border-y border-r border-slate-200 shadow-sm">
            <div class="p-6">
                <form action="{{ route('admin.kelola-admin.update', $admin->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT') <!-- Wajib di Laravel untuk proses Update/Edit -->

                    <!-- Kolom Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $admin->name) }}" 
                               required>
                    </div>

                    <!-- Kolom Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Alamat Email</label>
                        <input type="email" 
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $admin->email) }}" 
                               required>
                    </div>

                    <!-- Kolom Password (Plain Text / Sesuai Aturan Tugas Kampus) -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password Baru</label>
                        <input type="password" 
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm bg-white text-sm text-slate-900 transition mb-1" 
                               id="password" 
                               name="password" 
                               placeholder="••••••••">
                        <p class="text-[11px] text-slate-400 italic">Note: Kosongkan jika tidak ingin mengubah password. Password akan disimpan langsung demi kemudahan tugas kampus.</p>
                    </div>

                    <!-- Tombol Submit Perubahan Warna Biru Utama Korporat -->
                    <div class="pt-2">
                        <button type="submit" class="w-full bg-[#0e1d82] hover:bg-[#0c196e] text-white font-semibold text-sm py-2.5 px-4 rounded-lg transition shadow-sm cursor-pointer text-center">
                            Perbarui Data Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>