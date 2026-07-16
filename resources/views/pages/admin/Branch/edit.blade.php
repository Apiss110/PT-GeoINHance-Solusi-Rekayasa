<x-app-layout>
    <div class="max-w-5xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-black text-white tracking-tight">Edit Data Cabang</h1>
            <p class="text-sm text-slate-400">Perbarui informasi nama, kontak resmi, atau lokasi alamat cabang perusahaan.</p>
        </div>

        <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Nama Cabang / Wilayah *</label>
                        <input type="text" name="name" value="{{ old('name', $branch->name) }}" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
                        {{-- Teks Data Sebelumnya --}}
                        <p class="text-xs text-amber-400 mt-1.5 font-medium">Sebelumnya: {{ $branch->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Nomor Telepon / Kontak</label>
                        <input type="text" name="phone" value="{{ old('phone', $branch->phone) }}" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-blue-500">
                        {{-- Teks Data Sebelumnya --}}
                        <p class="text-xs text-amber-400 mt-1.5 font-medium">Sebelumnya: {{ $branch->phone ?? 'Belum diisi' }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">Alamat Lengkap Kantor *</label>
                    <textarea name="address" rows="4" class="w-full bg-slate-800 border border-slate-700 rounded-lg p-4 text-white focus:outline-none focus:border-blue-500" required>{{ old('address', $branch->address) }}</textarea>
                    {{-- Teks Data Sebelumnya --}}
                    <p class="text-xs text-amber-400 mt-1.5 font-medium">Sebelumnya: {{ $branch->address }}</p>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.branches.index') }}" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-5 py-2.5 rounded-lg text-sm font-medium transition">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">Perbarui Data</button>
            </div>
        </form>
    </div>
</x-app-layout>