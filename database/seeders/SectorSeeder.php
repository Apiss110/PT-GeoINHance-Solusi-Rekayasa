<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;
use Illuminate\Support\Str;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectors = [
            'Mitigasi Geobencana',
            'Rekayasa Bawah Tanah',
            'Pembangkit Energi',
            'Infrastruktur & Transportasi',
            'Infrastruktur Jalan',
            'Infrastruktur Air',
            'Minyak Bumi Gas',
            'Jalur Kereta Api',
            'Kawasan Bandar Udara',
            'Kawasan Pelabuhan',
            'Kawasan Industri',
            'Fasilitas Pendidikan',
        ];

        foreach ($sectors as $sector) {
            Sector::create([
                'name' => $sector,
                'slug' => Str::slug($sector), // Otomatis jadi 'mitigasi-geobencana', dll.
            ]);
        }
    }
}