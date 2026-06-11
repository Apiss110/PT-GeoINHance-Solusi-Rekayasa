@include('partials.navbar')

<section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border border-blue-500/30">Company Portfolio</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none">
                Portofolio Proyek Rekayasa & Konstruksi
            </h1>
            <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                Menampilkan rekam jejak dedikasi kami dalam menyelesaikan tantangan infrastruktur rumit secara presisi menggunakan teknologi analisis mutakhir.
            </p>
        </div>
    </section>

    <section class="py-8 bg-white border-b border-gray-200 sticky top-16 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="flex flex-wrap gap-2 w-full md:w-auto">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-sm">Semua</button>
                <button class="bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition">Struktural</button>
                <button class="bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition">Geoteknik & Aliran</button>
                <button class="bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg text-xs font-semibold transition">Pertambangan</button>
            </div>
            <div class="relative w-full md:w-72">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </span>
                <input type="text" placeholder="Cari proyek berdasarkan nama..." class="w-full bg-gray-50 border border-gray-300 rounded-lg pl-9 pr-4 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

    @foreach($projects as $project)

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group">

        <div>

            {{-- IMAGE / THUMBNAIL --}}
            <div class="bg-slate-800 h-48 flex items-center justify-center relative overflow-hidden">

                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80 z-10"></div>

                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                    <i class="fa-solid fa-building text-5xl text-blue-500/30 group-hover:scale-110 transition duration-300"></i>
                @endif

                <span class="absolute bottom-4 left-4 z-20 bg-blue-600 text-white text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded">
                    {{ $project->category ?? 'Project' }}
                </span>

            </div>

            <div class="p-6 space-y-3">

                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition">
                    {{ $project->title }}
                </h3>

                <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                    {{ Str::limit($project->description, 180) }}
                </p>

            </div>

        </div>

        <div class="p-6 pt-0 space-y-4">

            <div class="flex flex-wrap gap-1.5 border-t border-gray-100 pt-4">

                <span class="bg-slate-100 text-slate-700 text-[10px] font-mono px-2 py-0.5 rounded border border-slate-200">
                    <i class="fa-solid fa-layer-group text-blue-500 mr-1"></i>
                    {{ $project->software ?? 'Engineering Software' }}
                </span>

            </div>

            <a href="{{ route('proyek.detailed-engineering-design', ['from' => 'all']) }}" class="block text-center bg-gray-50 text-gray-700 border border-gray-200 py-2 rounded-lg text-xs font-semibold hover:bg-blue-600 hover:text-white hover:border-blue-600 transition">

                Lihat Detail Proyek

            </a>

        </div>

    </div>

    @endforeach

</div>

            {{-- PAGINATION --}}
            <div class="mt-16 flex justify-center">

                {{ $projects->links() }}

            </div>
    </section>

    <section id="contact" class="bg-slate-900 text-white py-16 border-t border-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight">Punya rencana proyek rekayasa yang membutuhkan presisi tinggi?</h2>
            <p class="text-slate-400 max-w-xl mx-auto text-xs leading-relaxed">
                Tim ahli kami siap membantu Anda menyusun pemodelan, melakukan uji FEA, hingga memberikan asistensi lisensi software komputasi Bentley & Seequent terbaik.
            </p>
            <div class="pt-4">
                <a href="#" class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-md text-xs hover:bg-blue-700 transition shadow-md shadow-blue-500/10 inline-block">
                    Hubungi Spesialis Kami
                </a>
            </div>
        </div>
    </section>

@include('partials.footer')

    <a href="https://wa.me/6285720062009" class="fixed bottom-8 right-8 z-[99] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path></svg>
    </a>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        window.onscroll = function() {
            const nav = document.querySelector('nav');
            if (window.pageYOffset > 50) {
                nav.classList.add('shadow-md');
            } else {
                nav.classList.remove('shadow-md');
            }
        };
    </script>
    @livewireScripts

@include('partials.footer')

</body>
</html>