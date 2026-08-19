<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        {{-- Top Header Bar --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-3xl font-medium text-gray-700">Edit Data Titik Cabang / Proyek</h3>
                <p class="mt-1 text-sm text-gray-500">Perbarui informasi lokasi, koordinat, deskripsi, atau tautan proyek.</p>
            </div>
            <div>
                <a href="{{ route('admin.branches.index') }}" class="inline-flex items-center rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-200">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        {{-- Main Form Card --}}
        <div class="mt-6 overflow-hidden rounded-xl border border-gray-100 bg-white shadow-sm">
            <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
                @csrf
                @method('PUT')

                {{-- Row 1: Nama Cabang & Daerah --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    {{-- Nama Cabang / Judul --}}
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Nama Cabang / Judul <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $branch->title) }}" 
                            class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-gray-800 transition focus:border-[#0e1d82] focus:outline-none focus:ring-1 focus:ring-[#0e1d82] @error('title') border-red-500 @enderror" 
                            required>
                        @error('title') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Daerah / Wilayah --}}
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Daerah / Wilayah <span class="text-red-500">*</span></label>
                        <input type="text" name="daerah" value="{{ old('daerah', $branch->daerah) }}" 
                            class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-gray-800 transition focus:border-[#0e1d82] focus:outline-none focus:ring-1 focus:ring-[#0e1d82] @error('daerah') border-red-500 @enderror" 
                            required>
                        @error('daerah') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Row 2: Latitude & Longitude --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    {{-- Latitude --}}
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Latitude (Lat) <span class="text-red-500">*</span></label>
                        <input type="text" name="lat" value="{{ old('lat', $branch->lat) }}" 
                            class="w-full rounded-lg border border-gray-200 px-4 py-2.5 font-mono text-sm text-gray-800 transition focus:border-[#0e1d82] focus:outline-none focus:ring-1 focus:ring-[#0e1d82] @error('lat') border-red-500 @enderror" 
                            required>
                        @error('lat') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Longitude --}}
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Longitude (Lng) <span class="text-red-500">*</span></label>
                        <input type="text" name="lng" value="{{ old('lng', $branch->lng) }}" 
                            class="w-full rounded-lg border border-gray-200 px-4 py-2.5 font-mono text-sm text-gray-800 transition focus:border-[#0e1d82] focus:outline-none focus:ring-1 focus:ring-[#0e1d82] @error('lng') border-red-500 @enderror" 
                            required>
                        @error('lng') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Row 3: Gambar / Foto Cabang --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-700">Gambar / Foto Lokasi</label>
                    <input type="file" name="img" accept="image/*" 
                        class="w-full cursor-pointer rounded-lg border border-gray-200 px-4 py-2 text-sm text-gray-600 file:mr-4 file:rounded-md file:border-0 file:bg-[#0e1d82] file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-[#0e1d82]/90 focus:outline-none">
                    
                    @if($branch->img)
                        <div class="mt-3 flex items-center gap-3 rounded-lg border border-gray-100 bg-gray-50 p-3">
                            <span class="text-xs font-semibold text-gray-600">Gambar Saat Ini:</span>
                            @php
                                $imgSrc = str_starts_with($branch->img, 'http') 
                                    ? $branch->img 
                                    : asset('storage/' . preg_replace('#^(public/|storage/)#i', '', $branch->img));
                            @endphp
                            <img src="{{ $imgSrc }}" alt="Preview" class="h-12 w-16 rounded border border-gray-200 object-cover shadow-sm">
                        </div>
                    @endif
                    @error('img') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Row 4: Deskripsi Singkat --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-gray-700">Deskripsi Singkat</label>
                    <textarea name="desc" rows="3" 
                        class="w-full rounded-lg border border-gray-200 p-4 text-gray-800 transition focus:border-[#0e1d82] focus:outline-none focus:ring-1 focus:ring-[#0e1d82] @error('desc') border-red-500 @enderror">{{ old('desc', $branch->desc) }}</textarea>
                    @error('desc') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end space-x-3 border-t border-gray-100 pt-4">
                    <a href="{{ route('admin.branches.index') }}" class="rounded-lg border border-gray-200 px-5 py-2.5 text-center text-sm font-medium text-gray-700 transition hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" class="rounded-lg bg-[#0e1d82] px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-[#0e1d82]/90">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>