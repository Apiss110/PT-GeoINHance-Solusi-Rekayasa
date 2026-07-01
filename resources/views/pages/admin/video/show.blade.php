<x-app-layout>

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <nav class="text-sm text-gray-500 mb-6">
            <a href="/resources/video" class="hover:underline">Resources</a> &gt; 
            <a href="/resources/video" class="hover:underline">Video</a> &gt; 
            <span class="text-gray-800 dark:text-gray-200 font-medium">{{ $video->title }}</span>
        </nav>

        <div class="text-sm text-red-600 font-semibold mb-2">
            🗓️ {{ \Carbon\Carbon::parse($video->published_at)->translatedFormat('d M, Y') }}
        </div>

        <h1 class="text-2xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">
            {{ $video->title }}
        </h1>

        <div class="w-full aspect-video bg-black rounded-xl overflow-hidden shadow-lg mb-8">
            @php
                // Helper otomatis untuk mengubah link YouTube biasa menjadi format Embed iFrame
                $embedUrl = $video->video_url;
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $video->video_url, $matches)) {
                    $embedUrl = "https://www.youtube.com/embed/" . $matches[1];
                }
            @endphp
            <iframe class="w-full h-full" src="{{ $embedUrl }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 mb-12">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4 border-b pb-2">Deskripsi Video Teknis</h3>
            <div class="text-gray-600 dark:text-gray-300 leading-relaxed prose dark:prose-invert max-w-none">
                {!! $video->description !!}
            </div>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Video Terbaru Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($otherVideos as $other)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col justify-between">
                        <div>
                            <img src="{{ asset('storage/' . $other->thumbnail_path) }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <span class="text-xs text-red-600 font-medium">{{ \Carbon\Carbon::parse($other->published_at)->translatedFormat('d M, Y') }}</span>
                                <h4 class="font-bold text-gray-900 dark:text-white mt-1 line-clamp-2 text-sm">{{ $other->title }}</h4>
                            </div>
                        </div>
                        <div class="p-4 pt-0">
                            <a href="{{ route('resources.video.show', $other->id) }}" class="inline-block text-xs font-bold text-blue-600 hover:underline">Learn More &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
</x-app-layout>