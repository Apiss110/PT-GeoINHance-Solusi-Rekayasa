<x-guest-layout>
    <section class="relative bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white py-16 lg:py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-4">
            <span class="inline-block {{ strtoupper($blog->category) === 'PROYEK' ? 'bg-red-500/20 text-red-400 border-red-500/30' : 'bg-blue-500/20 text-blue-300 border-blue-500/30' }} px-4 py-1 rounded-full text-xs font-semibold tracking-wider uppercase border">
                {{ $blog->category ?? 'News' }}
            </span>
            
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight leading-tight">
                {{ $blog->title }}
            </h1>
            
            <p class="text-xs sm:text-sm text-slate-400 font-medium uppercase tracking-widest">
                Dipublikasikan pada: {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y') : $blog->created_at->format('d M Y') }}
            </p>
        </div>
    </section>

    <article class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden shadow-lg mb-8 aspect-video bg-slate-100 border border-slate-200">
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                    <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider">No Image Available</span>
                </div>
            @endif
        </div>

        <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-6 text-sm sm:text-base">
            {!! $blog->content !!}
        </div>

        <div class="mt-12 pt-6 border-t border-slate-200">
            <a href="{{ route('resources.news-events') }}" class="inline-flex items-center text-xs font-bold text-slate-600 hover:text-red-800 transition uppercase tracking-wider">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke News & Events
            </a>
        </div>
    </article>
</x-guest-layout>