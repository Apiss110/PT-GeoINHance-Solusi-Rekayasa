<?php

namespace App\Livewire;

use Livewire\Component;

class HomeSlider extends Component
{
    // Data Slide (Kamu bisa ganti gambar dan teks di sini)
    // Gunakan URL gambar teknik yang relevan
    public $slides = [
        [
            'image' => 'https://images.unsplash.com/photo-1517089152318-42ec560349c0?q=80&w=1920&auto=format&fit=crop',
            'top_text' => 'Inovasi Geoteknik Terpadu',
            'main_title' => 'ANALISIS TANAH & FONDASI PRESISI',
            'active' => true,
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1581094128527-1504b818c650?q=80&w=1920&auto=format&fit=crop',
            'top_text' => 'Standar Keamanan Tinggi',
            'main_title' => 'REKAYASA STRUKTUR BANGUNAN SIPIL',
            'active' => false,
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1920&auto=format&fit=crop',
            'top_text' => 'Data Akurat di Lapangan',
            'main_title' => 'SURVEI & PEMETAAN LAHAN DIGITAL',
            'active' => false,
        ],
    ];

    public $currentIndex = 0;

    public function mount()
    {
        $this->slides[0]['active'] = true;
    }

    // Fungsi untuk berpindah slide (dipanggil oleh tombol)
    public function setSlide($index)
    {
        // Nonaktifkan slide lama
        $this->slides[$this->currentIndex]['active'] = false;
        
        // Tetapkan indeks baru
        $this->currentIndex = $index;
        
        // Aktifkan slide baru
        $this->slides[$this->currentIndex]['active'] = true;
    }

    // Fungsi untuk tombol 'Next'
    public function nextSlide()
    {
        $newIndex = ($this->currentIndex + 1) % count($this->slides);
        $this->setSlide($newIndex);
    }

    // Fungsi untuk tombol 'Prev'
    public function prevSlide()
    {
        $newIndex = ($this->currentIndex - 1 + count($this->slides)) % count($this->slides);
        $this->setSlide($newIndex);
    }

    public function render()
    {
        return <<<'HTML'
        <div class="relative w-full h-[600px] md:h-[700px] overflow-hidden group bg-gray-900">
            <div class="flex transition-transform duration-700 ease-in-out h-full" style="transform: translateX(-{{ $currentIndex * 100 }}%);">
                @foreach($slides as $index => $slide)
                    <div class="w-full h-full flex-shrink-0 relative">
                        <img src="{{ $slide['image'] }}" alt="Engineering Slide" class="w-full h-full object-cover">
                        
                        <div class="absolute inset-0 bg-black opacity-40"></div>

                        <div class="absolute inset-0 flex flex-col justify-center items-center px-6 z-10 text-center">
                            <div class="bg-black/40 backdrop-blur-sm p-10 md:p-16 rounded-2xl border border-white/10 max-w-5xl">
                                <p class="text-blue-300 uppercase tracking-widest text-sm md:text-base font-semibold mb-3">
                                    {{ $slide['top_text'] }}
                                </p>
                                <h1 class="text-white text-4xl md:text-6xl font-extrabold leading-tight mb-8">
                                    {{ $slide['main_title'] }}
                                </h1>
                                <a href="#services" class="inline-block bg-yellow-400 hover:bg-yellow-300 text-blue-950 font-bold uppercase py-4 px-10 rounded-full transition duration-300 tracking-wider">
                                    Pelajari Layanan
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button wire:click="prevSlide" class="absolute left-5 top-1/2 -translate-y-1/2 z-20 bg-white/10 hover:bg-white/30 text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            
            <button wire:click="nextSlide" class="absolute right-5 top-1/2 -translate-y-1/2 z-20 bg-white/10 hover:bg-white/30 text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>

            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-3">
                @foreach($slides as $index => $slide)
                    <button wire:click="setSlide({{ $index }})" class="w-3.5 h-3.5 rounded-full transition duration-300 {{ $currentIndex === $index ? 'bg-yellow-400' : 'bg-white/40 hover:bg-white/70' }}"></button>
                @endforeach
            </div>
        </div>
        HTML;
    }
}