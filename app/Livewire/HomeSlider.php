<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HeroSlider; // Hubungkan ke model database

class HomeSlider extends Component
{
    // Cukup sediakan data slides, kontrol index biarkan diatur oleh Alpine.js di browser
    public $slides = [];

    /**
     * Memproses data database saat komponen pertama kali dimuat
     */
    public function mount()
    {
        $dbSlides = HeroSlider::all();

        if ($dbSlides->isEmpty()) {
            $this->slides = [   
                [
                    'image' => 'https://images.unsplash.com/photo-1517089152318-42ec560349c0?q=80&w=1920&auto=format&fit=crop',
                    'top_text' => 'PT GeoINHance Solusi Rekayasa',
                    'main_title' => 'ANALISIS TANAH & FONDASI PRESISI',
                    'link' => '#services',
                ],
            ];
        } else {
            $this->slides = $dbSlides->map(function ($item) {
                return [
                    'image' => asset('storage/' . $item->image_path),
                    'top_text' => $item->subtitle ?? 'PT GeoINHance Solusi Rekayasa',
                    'main_title' => $item->title ?? 'Engineering Solutions',
                    'link' => $item->link_url ?? '#services',
                ];
            })->toArray();
        }
    }

    /**
     * Me-render template menggunakan Alpine.js untuk transisi super mulus
     */
    public function render()
    {
        return <<<'HTML'
        <div x-data="{ 
                currentIndex: 0, 
                totalSlides: {{ count($slides) }},
                next() { this.currentIndex = (this.currentIndex + 1) % this.totalSlides },
                prev() { this.currentIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides }
             }" 
             class="relative w-full h-[600px] md:h-[700px] overflow-hidden group bg-gray-900">
            
            <div class="flex transition-transform duration-700 ease-in-out h-full" 
                 :style="'transform: translateX(-' + (currentIndex * 100) + '%);'">
                
                @foreach($slides as $index => $slide)
                    <div class="w-full h-full flex-shrink-0 relative">
                        <img src="{{ $slide['image'] }}" alt="Engineering Slide" class="w-full h-full object-cover" loading="eager">
                        
                        <div class="absolute inset-0 bg-black opacity-40"></div>

                        <div class="absolute inset-0 flex flex-col justify-center items-center px-6 z-10 text-center">
                            <div class="bg-black/40 backdrop-blur-sm p-10 md:p-16 rounded-2xl border border-white/10 max-w-5xl">
                                <p class="text-blue-300 uppercase tracking-widest text-sm md:text-base font-semibold mb-3">
                                    {{ $slide['top_text'] }}
                                </p>
                                <h1 class="text-white text-4xl md:text-6xl font-extrabold leading-tight mb-8">
                                    {{ $slide['main_title'] }}
                                </h1>
                                <div>
                                    <a href="{{ $slide['link'] }}" class="inline-block bg-yellow-400 hover:bg-yellow-300 text-blue-950 font-bold uppercase py-4 px-10 rounded-full transition duration-300 tracking-wider">
                                        {{ __('home-slider.btn') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(count($slides) > 1)
                <button @click="prev()" class="absolute left-5 top-1/2 -translate-y-1/2 z-20 bg-white/10 hover:bg-white/30 text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                
                <button @click="next()" class="absolute right-5 top-1/2 -translate-y-1/2 z-20 bg-white/10 hover:bg-white/30 text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-3">
                    @foreach($slides as $index => $slide)
                        <button @click="currentIndex = {{ $index }}" 
                                class="w-3.5 h-3.5 rounded-full transition duration-300"
                                :class="currentIndex === {{ $index }} ? 'bg-yellow-400' : 'bg-white/40 hover:bg-white/70'"></button>
                    @endforeach
                </div>
            @endif
        </div>
        HTML;
    }
}