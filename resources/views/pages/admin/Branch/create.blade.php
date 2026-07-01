<x-app-layout>
    <div class="max-w-5xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-black text-white tracking-tight">Tambah Cabang Baru</h1>
            <p class="text-sm text-slate-400">Tambahkan data operasional kantor cabang baru perusahaan.</p>
        </div>

        <form action="{{ route('admin.branches.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Nama Cabang / Wilayah *</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Kantor Cabang Bandung" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Nomor Telepon / Kontak</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Contoh: +62 851-xxxx-xxxx" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">Alamat Lengkap Kantor *</label>
                    <textarea name="address" rows="4" placeholder="Tuliskan alamat fisik lengkap kantor cabang..." class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4 text-white focus:outline-none focus:border-blue-500" required>{{ old('address') }}</textarea>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.branches.index') }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-lg text-sm font-medium transition">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">Simpan Cabang</button>
            </div>
        </form>
    </div>
</x-app-layout>