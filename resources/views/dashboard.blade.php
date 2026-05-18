<x-layouts::app :title="__('Dashboard')">
    <div class="flex flex-col gap-6">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-neutral-200 dark:border-neutral-700 pb-5">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Starter Page</h1>
                <p class="text-sm text-slate-500">Dashboard / Ringkasan Utama</p>
            </div>
            <div class="text-sm font-medium px-4 py-2 bg-white dark:bg-neutral-800 rounded-lg border border-neutral-200 dark:border-neutral-700 shadow-sm">
                <span class="text-slate-400">Hari ini:</span> {{ now()->format('d M Y') }}
            </div>
        </div>

        <div class="bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-sm overflow-hidden">
            <div class="h-1 w-full bg-blue-600"></div>
            
            <div class="p-8">
                <h2 class="text-3xl font-semibold text-slate-800 dark:text-neutral-200 mb-2">Selamat Datang</h2>
                <p class="text-slate-500 dark:text-neutral-400 leading-relaxed max-w-2xl">
                    Anda sedang berada di panel administrasi **PT GeoINHance Solusi Rekayasa**. 
                    Gunakan menu di samping kiri untuk mengelola data master seperti Slider, Layanan, Fitur, dan Portofolio.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-10">
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-neutral-900 border border-neutral-100 dark:border-neutral-800">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Slider</p>
                        <p class="text-2xl font-bold text-blue-600">5</p>
                    </div>
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-neutral-900 border border-neutral-100 dark:border-neutral-800">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Layanan</p>
                        <p class="text-2xl font-bold text-green-600">8</p>
                    </div>
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-neutral-900 border border-neutral-100 dark:border-neutral-800">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Portofolio</p>
                        <p class="text-2xl font-bold text-red-600">12</p>
                    </div>
                    <div class="p-4 rounded-lg bg-slate-50 dark:bg-neutral-900 border border-neutral-100 dark:border-neutral-800">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Pesan Baru</p>
                        <p class="text-2xl font-bold text-orange-600">3</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 dark:bg-neutral-900/50 px-8 py-4 border-t border-neutral-200 dark:border-neutral-700">
                <span class="text-xs text-slate-400 italic font-medium tracking-wide">Sistem Admin v2.0 &bull; GeoINHance Engine</span>
            </div>
        </div>

    </div>
</x-layouts::app>