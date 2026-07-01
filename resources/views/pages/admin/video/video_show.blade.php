<x-app-layout>
@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <nav class="text-sm text-gray-500 dark:text-gray-400 mb-6 flex items-center space-x-2 font-medium">
            <a href="/" class="hover:text-blue-600">Home</a>
            <span>&rarr;</span>
            <a href="{{ route('resources.video') }}" class="hover:text-blue-600">Videos</a>
            <span>&rarr;</span>
            <span class="text-gray-800 dark:text-gray-200 line-clamp-1">{{ $video->title }}</span>
        </nav>

        <div class="flex items-center space-x-3 text-sm mb-2">
            <span class="text-red-600 dark:text-red-400 font-bold uppercase tracking-wider text-xs">
                {{ $video->category }}
            </span>
            <span class="text-gray-300">|</span>
            <span class="text-gray-500 dark:text-gray-400">
                🗓️ {{ \Carbon\Carbon::parse($video->published_at)->translatedFormat('d M, Y') }}
            </span>
        </div>

        <h1 class="text-2xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-6 leading-tight">
            {{ $video->title }}
        </h1>

        <div class="w-full aspect-video bg-black rounded-2xl overflow-hidden shadow-lg border border-gray-200 dark:border-gray-700 mb-8">
            @php
                // Mengonversi URL YouTube standar/share menjadi format Embed iFrame secara otomatis
                $embedUrl = $video->video_url;
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $video->video_url, $matches)) {
                    $embedUrl = "https://www.youtube.com/embed/" . $matches[1];
                }
            @endphp
            <iframe class="w-full h-full" src="{{ $embedUrl }}" title="{{ $video->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 md:p-8 shadow-sm border border-gray-100 dark:border-gray-700 mb-12">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 border-b border-gray-100 dark:border-gray-700 pb-3">
                Deskripsi Konten Teknis
            </h3>
            <div class="text-gray-600 dark:text-gray-300 leading-relaxed prose max-w-none dark:prose-invert">
                {!! $video->description !!}
            </div>
        </div>

        @if($otherVideos->isNotEmpty())
            <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Video Terbaru Lainnya</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($otherVideos as $other)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col justify-between">
                            <div>
                                <img src="{{ asset('storage/' . $other->thumbnail_path) }}" class="w-full h-40 object-cover" alt="{{ $other->title }}">
                                <div class="p-4">
                                    <span class="text-[11px] text-gray-400 font-medium block mb-1">
                                        {{ \Carbon\Carbon::parse($other->published_at)->translatedFormat('d M, Y') }}
                                    </span>
                                    <h4 class="font-bold text-gray-900 dark:text-white line-clamp-2 text-sm hover:text-blue-600 transition-colors">
                                        <a href="{{ route('resources.video.show', $other->id) }}">{{ $other->title }}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="p-4 pt-0">
                                <a href="{{ route('resources.video.show', $other->id) }}" class="inline-flex items-center text-xs font-bold text-blue-600 hover:text-blue-700">
                                    Learn More 
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
</x-app-layout>