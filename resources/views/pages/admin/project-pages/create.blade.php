<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Halaman Proyek Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-100">
                
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Buat Kontainer Halaman Utama</h3>
                    <p class="text-sm text-gray-500">Nama halaman yang Anda buat di sini akan langsung terdaftar di dropdown menu PROYEK.</p>
                </div>

                <form action="{{ route('admin.project-pages.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Halaman Proyek</label>
                        <input type="text" name="name" required placeholder="Contoh: Geotechnical Analysis" value="{{ old('name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Pengantar Halaman</label>
                        <textarea name="description" rows="4" required placeholder="Tulis deskripsi atau ringkasan penjelasan untuk halaman ini..."
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description') }}</textarea>
                        @error('description') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" id="is_active" checked class="rounded border-gray-300 text-blue-600 h-4 w-4">
                        <label for="is_active" class="ml-2 text-sm text-gray-900">Aktifkan halaman langsung di dropdown menu</label>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                            Simpan & Buat Halaman
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>