<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg font-medium">Selamat Datang kembali, {{ Auth::user()->name }}!</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Gunakan panel ini untuk mengelola konten dan data pada website PT GeoINHance Solusi Rekayasa.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100 dark:border-gray-700 flex flex-col justify-between">
                    <div>
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg w-fit mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Manajemen Banner Utama</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Ganti, tambah, atau hapus foto-foto beresolusi besar yang tampil di slider halaman depan (Landing Page) user.
                        </p>
                    </div>
                    <a href="{{ route('admin.slider.index') }}" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm py-2 px-4 rounded-lg transition">
                        Kelola Foto Banner
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100 dark:border-gray-700 opacity-60 flex flex-col justify-between">
                    <div>
                        <div class="p-3 bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-lg w-fit mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 .414-.336.75-.75.75H4.5a.75.75 0 01-.75-.75V14.15M20.25 14.15a15.042 15.042 0 01-16.5 0M20.25 14.15V9.75M3.75 14.15V9.75M20.25 9.75c0-.414-.336-.75-.75-.75H4.5a.75.75 0 01-.75.75M20.25 9.75V5.25c0-.414-.336-.75-.75-.75H4.5a.75.75 0 01-.75.75v4.5m16.5 0a15.041 15.041 0 00-16.5 0" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Manajemen Layanan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Kelola data sektor dan produk teknik seperti analisis tanah, pondasi, dan geoteknik.
                        </p>
                    </div>
                    <button disabled class="inline-flex items-center justify-center bg-gray-300 dark:bg-gray-700 text-gray-500 dark:text-gray-400 font-medium text-sm py-2 px-4 rounded-lg cursor-not-allowed">
                        Segera Hadir
                    </button>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100 dark:border-gray-700 opacity-60 flex flex-col justify-between">
                    <div>
                        <div class="p-3 bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-lg w-fit mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.109A11.386 11.386 0 0110.089 18H6.284a11.386 11.386 0 01-5.003-1.233v-.109c0-2.33 1.307-4.35 3.217-5.414M15.5 5.25a3 3 0 11-6 0 3 3 0 016 0zm-7 0a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Manajemen Karir / Lowongan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Tambah lowongan pekerjaan atau magang baru dan lihat data pelamar yang masuk ke PT GeoINHance.
                        </p>
                    </div>
                    <button disabled class="inline-flex items-center justify-center bg-gray-300 dark:bg-gray-700 text-gray-500 dark:text-gray-400 font-medium text-sm py-2 px-4 rounded-lg cursor-not-allowed">
                        Segera Hadir
                    </button>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>