@include('partials.navbar')

@php
    $isEn = app()->getLocale() === 'en';

    // Resolusi bahasa dinamis untuk video utama
    $videoCategory = $isEn && !empty($video->category_en) ? $video->category_en : $video->category;
    $videoTitle = $isEn && !empty($video->title_en) ? $video->title_en : $video->title;
    $videoDesc = $isEn && !empty($video->description_en) ? $video->description_en : ($video->description ?? __('video.no_description'));
@endphp

    <section class="relative bg-[#0b1329] text-white py-20 lg:py-24 w-full text-center">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-sky-400 bg-sky-950/50 px-3 py-1.5 rounded-md border border-sky-900/50 inline-block mb-4">
                {{ $videoCategory }}
            </span>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight tracking-tight drop-shadow-md max-w-4xl mx-auto">
                {{ $videoTitle }}
            </h1>
        </div>
    </section>

    <main class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-6 sm:px-8">
            
            <div class="text-gray-500 font-medium text-sm mb-8 flex flex-wrap items-center gap-4 border-b border-gray-100 pb-4">
                <span class="flex items-center gap-1.5">📅 {{ __('video.production_year') }}: <strong>{{ $video->production_year }}</strong></span>
                @if($video->duration)
                    <span class="text-gray-300">|</span>
                @endif
            </div>

            @php
                $videoId = '';
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {
                    $videoId = $match[1];
                }
            @endphp

            <div class="bg-black rounded-xl overflow-hidden shadow-md aspect-video w-full mb-8 border border-gray-100">
                @if($videoId)
                    <iframe class="w-full h-full" 
                            src="https://www.youtube.com/embed/{{ $videoId }}?rel=0" 
                            title="{{ $videoTitle }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                    </iframe>
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 gap-2 p-6 text-center bg-gray-50">
                        <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium text-sm">{{ __('video.unsupported_format') }}</span>
                        <a href="{{ $video->video_url }}" target="_blank" class="text-sky-600 hover:underline text-xs mt-1 font-semibold inline-flex items-center gap-1">
                            {{ __('video.open_source_link') }} <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </div>
                @endif
            </div>

            <div class="geo-article-container mt-6">
                <p class="text-gray-600 text-base leading-relaxed whitespace-pre-line">{{ $videoDesc }}</p>
            </div>

            @if($otherVideos->count() > 0)
                <div class="mt-16 pt-10 border-t border-gray-100">
                    <h3 class="text-md font-bold uppercase tracking-wider text-gray-900 mb-6 flex items-center gap-2">
                        🎥 {{ __('video.other_latest_videos') }}
                    </h3>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
                        @foreach($otherVideos as $item)
                            @php
                                $itemVideoId = '';
                                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item->video_url, $itemMatch)) {
                                    $itemVideoId = $itemMatch[1];
                                }

                                $itemCategory = $isEn && !empty($item->category_en) ? $item->category_en : $item->category;
                                $itemTitle = $isEn && !empty($item->title_en) ? $item->title_en : $item->title;
                            @endphp
                            <div class="bg-white rounded-lg overflow-hidden border border-gray-200/70 hover:shadow-sm transition duration-200 flex flex-col h-full">
                                <div class="relative aspect-video bg-gray-900 overflow-hidden">
                                    @if($item->thumbnail_path)
                                        <img src="{{ asset('storage/' . $item->thumbnail_path) }}" alt="{{ $itemTitle }}" class="w-full h-full object-cover">
                                    @elseif($itemVideoId)
                                        <img src="https://img.youtube.com/vi/{{ $itemVideoId }}/mqdefault.jpg" alt="{{ $itemTitle }}" class="w-full h-full object-cover">
                                    @endif
                                    <a href="{{ route('resources.video.show', $item->id) }}" class="absolute inset-0 flex items-center justify-center bg-black/10 hover:bg-black/30 transition">
                                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow text-gray-900 pl-0.5">
                                            <svg class="w-3 h-3 text-gray-800 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3.5 flex flex-col flex-grow">
                                    <span class="text-[10px] uppercase font-bold text-sky-600 tracking-wider mb-1 block">{{ $itemCategory }}</span>
                                    <h4 class="text-xs font-bold text-gray-900 line-clamp-2 hover:text-sky-600 transition mb-2">
                                        <a href="{{ route('resources.video.show', $item->id) }}">{{ $itemTitle }}</a>
                                    </h4>
                                    <span class="text-[10px] text-gray-400 mt-auto">{{ __('video.year') }}: <strong class="text-gray-500">{{ $item->production_year }}</strong></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-16 pt-8 border-t border-gray-100 text-center space-y-6">
                <a href="{{ route('kontak') }}" class="inline-block bg-[#0284c7] hover:bg-[#0369a1] text-white font-bold uppercase tracking-wider py-3 px-8 rounded text-sm transition shadow-sm">
                    {{ __('video.contact_us') }}
                </a>
            </div>

        </div>
    </main>

@include('partials.footer')