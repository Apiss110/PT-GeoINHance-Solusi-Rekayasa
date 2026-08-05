<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h3 class="text-gray-700 text-3xl font-medium">Tambah Halaman Proyek Baru</h3>
                <p class="text-gray-500 text-sm mt-1">Nama halaman yang Anda buat di sini akan langsung terdaftar di dropdown menu PROYEK</p>
            </div>
            <div>
                <a href="{{ route('admin.project-pages.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium text-sm inline-flex items-center transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-6">
            <form action="{{ route('admin.project-pages.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Halaman Proyek <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('name') border-red-500 @enderror" 
                            placeholder="Contoh: Geotechnical Analysis" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Pengantar Halaman <span class="text-red-500">*</span></label>
                        <textarea name="description" id="description" rows="4" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:border-[#0e1d82] focus:ring-1 focus:ring-[#0e1d82] transition @error('description') border-red-500 @enderror" 
                            placeholder="Tulis deskripsi atau ringkasan penjelasan untuk halaman ini..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 flex items-center pt-2">
                        <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', true) ? 'checked' : '' }} 
                            class="rounded border-gray-300 text-[#0e1d82] focus:ring-[#0e1d82] h-4 w-4">
                        <label for="is_active" class="ml-2.5 text-sm font-medium text-gray-700 cursor-pointer">Aktifkan halaman langsung di dropdown menu</label>
                        @error('is_active')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t border-gray-100 space-x-3">
                    <a href="{{ route('admin.project-pages.index') }}" class="px-5 py-2.5 border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2.5 bg-[#0e1d82] text-white rounded-lg text-sm font-medium hover:bg-[#0e1d82]/90 shadow-sm transition">
                        Simpan & Buat Halaman
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>