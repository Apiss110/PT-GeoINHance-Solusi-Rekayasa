<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StrategicProject;

class ProjectSlider extends Component
{
    // 1. Deklarasikan properti publik agar otomatis terbaca oleh template HTML
    public $projects = [];

    /**
     * Mengambil data saat komponen pertama kali dimuat di halaman
     */
    public function mount()
    {
        // Ambil data proyek dari database (Logika input admin tetap utuh)
        $dbProjects = StrategicProject::with('category')->latest()->get();

        // Proses translasi otomatis pada baris koleksi data sebelum dimasukkan ke array publik
        $this->projects = $dbProjects->map(function ($project) {
            // Deteksi data kategori bawaan
            $categoryName = $project->category->name ?? ($project->category->NAME ?? 'Project');

            return [
                'id' => $project->id,
                'image_path' => $project->image_path,
                'category_name' => ($categoryName),
                'title' => ($project->title),
                'description' => (strip_tags($project->description)),
                'location' => ($project->location),
                'year' => $project->year,
            ];
        })->toArray();
    }

    /**
     * Merender template secara inline dengan konsistensi tampilan blog card
     */
    public function render()
    {
        return <<<'HTML'
        <div x-data="{ 
            currentIndex: 0, 
            maxIndex: {{ max(0, count($projects) - 3) }} 
        }" class="w-full relative">
            
            {{-- Tombol Navigasi Slider Kanan Atas (Dibuat lebih modern & konsisten) --}}
            <div class="flex justify-end space-x-2 mb-6">
                <button @click="if(currentIndex > 0) currentIndex--" 
                        :class="currentIndex === 0 ? 'opacity-40 cursor-not-allowed' : ''"
                        class="p-2.5 bg-white border border-slate-200 rounded-full hover:bg-slate-50 shadow-sm transition duration-200 text-slate-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button @click="if(currentIndex < maxIndex) currentIndex++" 
                        :class="currentIndex === maxIndex ? 'opacity-40 cursor-not-allowed' : ''"
                        class="p-2.5 bg-white border border-slate-200 rounded-full hover:bg-slate-50 shadow-sm transition duration-200 text-slate-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" transform="rotate(360 12 12)"></path>
                    </svg>
                </button>
            </div>

            <div class="overflow-hidden w-full">
                <div class="flex transition-transform duration-500 ease-in-out" 
                     :style="'transform: translateX(-' + (currentIndex * 33.3333) + '%);'">
                    
                    @forelse($projects as $project)
                        @php
                            $dbCategory = strtoupper(trim($project['category_name'] ?? ''));
                        @endphp

                        <div class="w-full md:w-1/3 flex-shrink-0 px-3 flex flex-col">
                            
                            {{-- TAMPILAN CARD YANG KONSISTEN DENGAN BLOG & CASE STUDY --}}
                            <article class="blog-card bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col justify-between min-h-[480px] h-full">
                                
                                <div>
                                    {{-- Image Area --}}
                                    <div class="relative overflow-hidden h-56 bg-slate-100">
                                        @if($project['image_path'])
                                            <img src="{{ asset('storage/' . $project['image_path']) }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs font-medium">
                                                No Image
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Info Konten --}}
                                    <div class="p-6">
                                        {{-- Lokasi & Tahun (Meta Info) --}}
                                        <p class="text-slate-400 text-[11px] font-bold tracking-widest mb-2 uppercase">
                                            {{ $project['location'] }} • {{ $project['year'] }}
                                        </p>
                                        
                                        {{-- Judul Proyek --}}
                                        <h3 class="text-lg font-black text-slate-900 leading-tight mb-3 group-hover:text-red-800 transition line-clamp-2">
                                            <a href="{{ route('proyek.detail', $project['id']) }}" class="text-inherit no-underline">
                                                {{ $project['title'] }}
                                            </a>
                                        </h3>
                                        
                                        {{-- Deskripsi Proyek --}}
                                        <div class="text-slate-600 text-xs leading-relaxed line-clamp-3">
                                            {{ $project['description'] }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Action Call-to-Action Footer --}}
                                <div class="p-6 pt-0">
                                    <a href="{{ route('proyek.detail', $project['id']) }}" class="inline-flex items-center text-xs font-bold text-[#c80000] hover:translate-x-1 transition-transform uppercase tracking-wider">
                                        {{ ('Pelajari Selengkapnya') }} 
                                        <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                                
                            </article>
                        </div>
                    @empty
                        <div class="w-full px-3 text-center text-slate-500 py-12">
                            {{ ('Belum ada proyek strategis yang ditambahkan.') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        HTML;
    }
}