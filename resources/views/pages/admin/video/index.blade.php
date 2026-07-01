<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($videos as $video)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col justify-between">
            <div>
                <img src="{{ asset('storage/' . $video->thumbnail_path) }}" class="w-full h-48 object-cover" alt="Cover Video">
                
                <div class="p-4">
                    <span class="text-xs text-gray-400 dark:text-gray-500">
                        {{ \Carbon\Carbon::parse($video->published_at)->translatedFormat('d M, Y') }}
                    </span>
                    
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mt-1 line-clamp-2">
                        {{ $video->title }}
                    </h3>
                    
                    <p class="text-xs text-gray-500 mt-2 line-clamp-3">
                        {{ strip_tags($video->description) }}
                    </p>
                </div>
            </div>
            
            <div class="p-4 pt-0">
                <a href="{{ route('resources.video.show', $video->id) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium px-4 py-2 rounded transition">
                    Learn More
                </a>
            </div>
        </div>
    @endforeach
</div>