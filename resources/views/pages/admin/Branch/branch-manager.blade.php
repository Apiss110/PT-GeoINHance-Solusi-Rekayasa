<div class="p-6 max-w-7xl mx-auto space-y-6">
    {{-- Notifikasi Sukses --}}
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-emerald-800 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center gap-2">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Sisi Kiri: Form Input (Tambah / Edit) --}}
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4 h-fit">
            <h2 class="text-lg font-black text-slate-900 uppercase tracking-tight">
                {{ $isEdit ? 'Edit Titik Peta' : 'Tambah Titik Peta Baru' }}
            </h2>
            <div class="w-10 h-1 bg-red-800 rounded-full"></div>

            <form wire:submit.prevent="saveBranch" class="space-y-4 pt-2">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Daerah / Kota</label>
                    <input type="text" wire:model="daerah" placeholder="Contoh: bandung" class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 outline-none transition">
                    @error('daerah') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Title / Nama Proyek</label>
                    <input type="text" wire:model="title" placeholder="Contoh: MAIN OFFICE - BANDUNG" class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 outline-none transition">
                    @error('title') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Deskripsi Proyek</label>
                    <textarea wire:model="desc" rows="3" placeholder="Tuliskan deskripsi operasional cabang..." class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 outline-none transition resize-none"></textarea>
                    @error('desc') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Foto Proyek</label>
                    <input type="file" id="img" wire:model="img" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm block text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:uppercase file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 border border-slate-200 rounded-xl p-1 outline-none transition">
                    <p class="mt-1 text-[11px] text-slate-400 font-medium">Format: JPG, JPEG, PNG, WEBP (Maks 5MB).</p>
                    
                    <div wire:loading wire:target="img" class="text-xs text-blue-600 mt-1 font-semibold">Mengunggah gambar...</div>
                    @error('img') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror

                    @if ($img && !is_string($img))
                        <div class="mt-3 p-2 bg-slate-50 border border-dashed border-slate-200 rounded-xl">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Preview Gambar Baru:</p>
                            <img src="{{ $img->temporaryUrl() }}" class="h-24 w-auto object-cover rounded-lg shadow-sm mt-1">
                        </div>
                    @elseif($isEdit && $oldImg)
                        <div class="mt-3 p-2 bg-slate-50 border border-dashed border-slate-200 rounded-xl">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Gambar Saat Ini:</p>
                            @php
                                $cleanedOldImg = preg_replace('#^(public/|storage/|branches/)#i', '', $oldImg);
                                $previewUrl = (str_starts_with($oldImg, 'http://') || str_starts_with($oldImg, 'https://')) ? $oldImg : asset('storage/branches/' . $cleanedOldImg);
                            @endphp
                            <img src="{{ $previewUrl }}" class="h-24 w-auto object-cover rounded-lg shadow-sm mt-1">
                        </div>
                    @endif
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Link Tujuan Halaman Proyek (URL)</label>
                    <input type="text" wire:model="link" placeholder="Contoh: /proyek/nama-proyek atau https://domain.com/proyek/a" class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 outline-none transition">
                    <p class="mt-1 text-[11px] text-slate-400 font-medium">
                        Gunakan <strong>/proyek/nama-proyek</strong> untuk halaman proyek internal, atau URL lengkap.
                    </p>
                    @error('link') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Latitude</label>
                        <input type="text" wire:model="lat" placeholder="-6.9175" class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 outline-none transition">
                        @error('lat') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Longitude</label>
                        <input type="text" wire:model="lng" placeholder="107.6191" class="w-full text-sm px-4 py-2.5 rounded-xl border border-slate-200 focus:border-red-800 focus:ring-1 focus:ring-red-800 outline-none transition">
                        @error('lng') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex gap-2 pt-2">
                    <button type="submit" class="flex-1 bg-red-800 hover:bg-red-900 text-white font-bold text-xs uppercase tracking-wider py-3 rounded-xl shadow-md transition duration-200">
                        {{ $isEdit ? 'Simpan Perubahan' : 'Publish ke Peta' }}
                    </button>
                    @if($isEdit)
                        <button type="button" wire:click="resetForm" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider px-4 rounded-xl transition duration-200">
                            Batal
                        </button>
                    @endif
                </div>
            </form>
        </div>

        {{-- Sisi Kanan: Tabel Informasi Cabang Aktif --}}
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <h2 class="text-lg font-black text-slate-900 uppercase tracking-tight">Daftar Cabang Aktif di Website</h2>
            <div class="w-10 h-1 bg-slate-200 rounded-full mb-4 mt-1"></div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 text-[10px] font-black uppercase text-slate-400 tracking-wider">
                            <th class="py-3 px-2">Info Cabang & Tautan</th>
                            <th class="py-3 px-2">Daerah</th>
                            <th class="py-3 px-2">Koordinat (Lat, Lng)</th>
                            <th class="py-3 px-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        @forelse($branches as $b)
                            @php
                                $defaultPlaceholder = 'https://placehold.co/600x400/e2e8f0/0f172a?text=GeoINHance';
                                $tableImgUrl = $defaultPlaceholder;

                                if ($b->img) {
                                    $rawPath = trim($b->img);
                                    if (str_starts_with($rawPath, 'http://') || str_starts_with($rawPath, 'https://')) {
                                        $tableImgUrl = $rawPath;
                                    } else {
                                        $cleanedPath = preg_replace('#^(public/|storage/|branches/)#i', '', $rawPath);
                                        $tableImgUrl = asset('storage/branches/' . $cleanedPath);
                                    }
                                }
                            @endphp

                            <tr class="hover:bg-slate-50/50 transition duration-150">
                                <td class="py-4 px-2 flex gap-3 items-start">
                                    <img src="{{ $tableImgUrl }}" 
                                         onerror="this.onerror=null; this.src='{{ $defaultPlaceholder }}';" 
                                         class="w-12 h-10 object-cover rounded-lg shadow-sm mt-0.5">
                                    <div>
                                        <div class="font-bold text-slate-900 text-xs">{{ $b->title }}</div>
                                        <div class="text-[10px] text-slate-400 line-clamp-1 max-w-xs mb-1">{{ $b->desc }}</div>
                                        
                                        @if($b->link)
                                            <a href="{{ $b->link }}" target="_blank" class="text-[10px] text-blue-600 hover:underline inline-flex items-center gap-0.5 font-bold tracking-tight">
                                                🔗 {{ Str::limit($b->link, 40) }}
                                            </a>
                                        @else
                                            <span class="text-[10px] text-slate-400 italic">Belum disetting tautan proyek</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-2 text-xs font-semibold text-slate-600 uppercase">{{ $b->daerah }}</td>
                                <td class="py-4 px-2 text-xs font-mono text-slate-500">{{ $b->lat }}, {{ $b->lng }}</td>
                                <td class="py-4 px-2 text-center">
                                    <div class="inline-flex gap-2">
                                        {{-- Perbaikan: Gaya Tombol Edit --}}
                                        <button wire:click="editBranch({{ $b->id }})" class="px-2.5 py-1 text-xs font-bold tracking-wide uppercase text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition" title="Edit">
                                            Edit
                                        </button>
                                        {{-- Perbaikan: Gaya Tombol Delete --}}
                                        <button onclick="confirm('Yakin ingin menghapus titik peta ini?') || event.stopImmediatePropagation()" wire:click="deleteBranch({{ $b->id }})" class="px-2.5 py-1 text-xs font-bold tracking-wide uppercase text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition" title="Hapus">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-8 text-xs text-slate-400 uppercase tracking-wider font-medium">Belum ada titik kantor cabang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>