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
        // Ambil data proyek dari database dan simpan ke properti publik
        $this->projects = StrategicProject::latest()->get();
    }

    /**
     * Merender template secara inline
     */
    public function render()
    {
        return <<<'HTML'
        <div x-data="{ 
            currentIndex: 0, 
            maxIndex: {{ max(0, count($projects) - 3) }} 
        }" class="w-full relative">
            
            <div class="flex justify-end space-x-2 mb-4">
                <button @click="if(currentIndex > 0) currentIndex--" class="p-2 bg-slate-200 rounded-full hover:bg-slate-300 transition">&larr;</button>
                <button @click="if(currentIndex < maxIndex) currentIndex++" class="p-2 bg-slate-200 rounded-full hover:bg-slate-300 transition">&rarr;</button>
            </div>

            <div class="overflow-hidden w-full">
                <div class="flex transition-transform duration-500 ease-in-out" 
                     :style="'transform: translateX(-' + (currentIndex * 33.3333) + '%);'">
                    
                    @forelse($projects as $project)
                        <div class="w-full md:w-1/3 flex-shrink-0 px-3">
                            
                            <a href="{{ route('proyek.detail', $project->id) }}" class="block bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md hover:border-slate-300 transition duration-200 group">
                                
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $project->image_path) }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" alt="{{ $project->title }}">
                                </div>

                                <div class="p-6">
                                    <span class="text-xs font-bold text-red-800 uppercase block mb-1">{{ $project->category }}</span>
                                    
                                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition mb-2">{{ $project->title }}</h3>
                                    
                                    <p class="text-sm text-slate-600 mb-4 line-clamp-2">{{ strip_tags($project->description) }}</p>
                                    
                                    <div class="flex justify-between text-xs text-slate-400 font-medium pt-2 border-t border-slate-100">
                                        <span>📍 {{ $project->location }}</span>
                                        <span>📅 Th. {{ $project->year }}</span>
                                    </div>
                                </div>

                            </a>

                        </div>
                    @empty
                        <div class="w-full px-3 text-center text-slate-500 py-12">
                            Belum ada proyek strategis yang ditambahkan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        HTML;
    }
}