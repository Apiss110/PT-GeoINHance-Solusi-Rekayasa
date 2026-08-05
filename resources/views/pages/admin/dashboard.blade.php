@php
    // Fungsi pembantu untuk mendeteksi route yang aktif/terdaftar secara otomatis
    $getRoute = function($possibleNames) {
        foreach ((array)$possibleNames as $name) {
            if (Route::has($name)) {
                return route($name);
            }
        }
        return '#'; // Fallback jika route belum dibuat atau tidak ditemukan
    };

    // Deteksi otomatis seluruh 13 route sidebar Anda
    $sliderRoute     = $getRoute(['admin.slider.index', 'admin.slider.index', 'admin.slider.index']);
    $productRoute    = $getRoute(['admin.products.index', 'admin.product.index']);
    $projectRoute    = $getRoute(['admin.project-pages.index', 'admin.projects.index', 'admin.project.index']);
    $sectorRoute     = $getRoute(['admin.sector.index', 'admin.sectors.index']);
    $blogRoute       = $getRoute(['admin.blog.index', 'admin.blogs.index', 'admin.posts.index']);
    $articleRoute    = $getRoute(['admin.articles.index', 'admin.article.index']);
    $branchRoute     = $getRoute(['admin.branches.index', 'admin.branch.index', 'admin.peta-proyek.index']);
    $videoRoute      = $getRoute(['admin.videos.index', 'admin.video.index']);
    $caseStudyRoute  = $getRoute(['admin.studi-kasus.index', 'admin.studi-kasus.index']);
    $syllabusRoute   = $getRoute(['admin.syllabi.index', 'admin.syllabus.index', 'admin.syllabuses.index']);
    $trainingRoute   = $getRoute(['admin.training.index', 'admin.trainings.index', 'admin.training-registrations.index']);
    $messageRoute    = $getRoute(['admin.messages.index', 'admin.message.index', 'admin.contact-messages.index']);
    // Khusus Kelola Admin: Hanya aktif jika role user persis 'admin' (bukan 'superadmin')
    $isAdmin        = auth()->check() && auth()->user()->role === 'admin';
    $userRoute      = $isAdmin ? $getRoute(['admin.kelola-admin.index']) : null;
    
@endphp

<x-app-layout>
    {{-- Bagian Header Slot --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Utama') }}
            </h2>
            <span class="text-xs bg-[#cfdde9] text-[#0e1d82] px-3 py-1.5 rounded-full font-bold tracking-wide uppercase">
                Mode Kontrol: {{ auth()->user()->role }}
            </span>
        </div>
    </x-slot>

    <div class="space-y-8">
        {{-- Banner Selamat Datang --}}
        <div class="relative overflow-hidden bg-gradient-to-r from-[#0e1d82] to-[#0a155c] text-white p-8 rounded-2xl shadow-md border border-[#0c196e]">
            <div class="relative z-10 max-w-xl">
                <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight">Selamat Datang Kembali, {{ auth()->user()->name }}!</h1>
                <p class="text-sm text-[#cfdde9] mt-2 leading-relaxed">
                    Panel ini terhubung langsung dengan sistem utama PT GeoINHance Solusi Rekayasa. Gunakan navigasi kiri untuk memantau data operasional secara real-time.
                </p>
            </div>
            <div class="absolute right-0 bottom-0 top-0 w-1/3 bg-gradient-to-l from-white/5 to-transparent pointer-events-none transform skew-x-12"></div>
        </div>

        {{-- Grid Utama 13 Kartu Metrik Sesuai Urutan Sidebar --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            {{-- Card 1: Banner Slider Front --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Banner Slider Front</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalSliders }}</h3>
                    <a href="{{ $sliderRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Slider &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
            </div>

            {{-- Card 2: Kelola Produk Admin --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kelola Produk Admin</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalProducts }}</h3>
                    <a href="{{ $productRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Produk &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </div>
            </div>

            {{-- Card 3: Portofolio Proyek --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Portofolio Proyek</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalProjects }}</h3>
                    <a href="{{ $projectRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Proyek &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
            </div>

            {{-- Card 4: Kelola Sektor --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kelola Sektor</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalSectors }}</h3>
                    <a href="{{ $sectorRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Sektor &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
            </div>

            {{-- Card 5: News & Event --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">News & Event</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalBlogs }}</h3>
                    <a href="{{ $blogRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Tulis Berita &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 20H4.5A1.5 1.5 0 013 18.5v-13A1.5 1.5 0 014.5 4h15A1.5 1.5 0 0121 5.5v13a1.5 1.5 0 01-1.5 1.5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h10M7 16h6" />
                    </svg>
                </div>
            </div>

            {{-- Card 6: Artikel & Insight --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Artikel & Insight</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalArticles }}</h3>
                    <a href="{{ $articleRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Artikel &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
            </div>

            {{-- Card 7: Peta Proyek --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Peta Proyek</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalPetaProyek }}</h3>
                    <a href="{{ $branchRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Peta Proyek &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-12v12m-9-3.75h.008v.008H6V11.25zm.008 3h-.008V15h.008v-.75zm3.75-3H9.75v.008H10V11.25zm.008 3h-.008V15h.008v-.75zm3.75-3h-.008v.008h.008V11.25zm.008 3h-.008V15h.008v-.75z" />
                    </svg>
                </div>
            </div>

            {{-- Card 8: Manajemen Video --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Manajemen Video</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalVideos }}</h3>
                    <a href="{{ $videoRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Video &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </div>
            </div>

            {{-- Card 9: Manajemen Case Study --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Manajemen Case Study</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalCaseStudies }}</h3>
                    <a href="{{ $caseStudyRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Kasus &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
            </div>

            {{-- Card 10: Kelola Silabus & Materi --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Silabus & Materi</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalSyllabi }}</h3>
                    <a href="{{ $syllabusRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Materi &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.62 48.62 0 0112 20.9c2.785 0 5.5-.413 8.084-1.19.217-1.24.407-2.5.568-3.775a60.219 60.219 0 00-.49-6.347m-15.824 0c1.58.324 3.206.515 4.875.567m-4.875-.567A8.967 8.967 0 0112 4.5c2.305 0 4.408.867 6 2.292m0-2.292a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
            </div>

            {{-- Card 11: Manajemen Training (Pendaftar) --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Manajemen Training</p>
                    <div class="flex items-baseline gap-2">
                        <h3 class="text-2xl font-black text-slate-800">{{ $totalTrainings }}</h3>
                        @if($pendingTrainingsCount > 0)
                            <span class="text-[10px] font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded-full animate-pulse">
                                {{ $pendingTrainingsCount }} Baru
                            </span>
                        @endif
                    </div>
                    <a href="{{ $trainingRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Pendaftar &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>

            {{-- Card 12: Pesan Masuk (Contact Messages) --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Pesan Masuk</p>
                    <div class="flex items-baseline gap-2">
                        <h3 class="text-2xl font-black text-slate-800">{{ $totalMessages }}</h3>
                        @if($unreadMessagesCount > 0)
                            <span class="text-[10px] font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded-full animate-pulse">
                                {{ $unreadMessagesCount }} Baru
                            </span>
                        @endif
                    </div>
                    <a href="{{ $messageRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Buka Inbox &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            {{-- Card 13: Kelola Akun Admin (User Management) --}}
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between hover:shadow-md transition-shadow">
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kelola Akun Admin</p>
                    <h3 class="text-2xl font-black text-slate-800">{{ $totalAdmins }}</h3>
                    <a href="{{ $userRoute }}" class="text-xs text-[#0e1d82] font-bold hover:underline flex items-center gap-1 pt-1">
                        Kelola Akun &rarr;
                    </a>
                </div>
                <div class="p-3 bg-[#cfdde9]/40 text-[#0e1d82] rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>
            </div>

        </div>

        {{-- Container Utama (Gunakan grid-cols-1 untuk mobile, md:grid-cols-2 untuk desktop agar full width) --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
    
    {{-- Daftar Pesan Terbaru --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Pesan Masuk Terbaru</h3>
            <a href="{{ $messageRoute }}" class="text-xs text-[#0e1d82] hover:underline font-bold">Semua Pesan &rarr;</a>
        </div>
        <div class="divide-y divide-slate-100">
            @forelse($recentMessages as $msg)
                <div class="py-3 flex items-start justify-between gap-4">
                    <div class="space-y-0.5">
                        <p class="text-sm font-semibold text-slate-800">{{ $msg->name }}</p>
                        <p class="text-xs text-slate-500 line-clamp-1">{{ $msg->message ?? $msg->pesan ?? 'Tanpa isi pesan.' }}</p>
                    </div>
                    <span class="text-[10px] text-slate-400 whitespace-nowrap bg-slate-50 px-2 py-1 rounded">
                        {{ $msg->created_at->diffForHumans() }}
                    </span>
                </div>
            @empty
                <div class="py-6 text-center">
                    <p class="text-xs text-slate-400">Belum ada pesan masuk saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Daftar Pendaftar Training Terbaru --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Pendaftaran Training Terbaru</h3>
            <a href="{{ $trainingRoute }}" class="text-xs text-[#0e1d82] hover:underline font-bold">Semua Pendaftar &rarr;</a>
        </div>
        <div class="divide-y divide-slate-100">
            @forelse($recentTrainings as $reg)
                <div class="py-3 flex items-start justify-between gap-4">
                    <div class="space-y-0.5">
                        <p class="text-sm font-semibold text-slate-800">{{ $reg->name }}</p>
                        <p class="text-xs text-[#0e1d82] font-semibold">{{ $reg->training_title }}</p>
                    </div>
                    <span class="text-[10px] text-slate-400 whitespace-nowrap bg-slate-50 px-2 py-1 rounded">
                        {{ $reg->created_at->diffForHumans() }}
                    </span>
                </div>
            @empty
                <div class="py-6 text-center">
                    <p class="text-xs text-slate-400">Belum ada pendaftar pelatihan baru.</p>
                </div>
            @endforelse
        </div>
    </div>

</div>

    </div>
</x-app-layout>