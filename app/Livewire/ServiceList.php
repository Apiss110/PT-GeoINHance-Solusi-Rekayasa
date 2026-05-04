<?php

namespace App\Livewire;

use Livewire\Component; // Jika menggunakan Volt
// atau standar Livewire Component

class ServiceList extends Component
{
    public $services = [
        ['title' => 'Geotechnical Engineering', 'desc' => 'Analisis stabilitas tanah dan fondasi.'],
        ['title' => 'Structural Analysis', 'desc' => 'Perhitungan kekuatan struktur bangunan.'],
        ['title' => 'Land Surveying', 'desc' => 'Pemetaan lahan menggunakan teknologi GPS terbaru.'],
    ];

    // Tampilan HTML langsung di bawahnya (Single-file)
    public function render()
    {
        return <<<'HTML'
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            @foreach($services as $service)
                <div class="bg-white shadow-lg rounded-lg p-6 border-t-4 border-blue-600">
                    <h3 class="text-xl font-bold text-gray-800">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mt-2">{{ $service['desc'] }}</p>
                </div>
            @endforeach
        </div>
        HTML;
    }
}