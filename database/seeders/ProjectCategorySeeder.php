<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;
use Illuminate\Support\Str;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar semua kategori proyek sesuai navbar depan kamu
        $categories = [
            'Geotechnical Analysis',
            'Detailed Engineering Design (DED)',
            'Review Design Analysis',
            'Structural Analysis',
            '3D FEM Analysis',
            'Numerical Analysis Plaxis 3D',
            'Numerical Modeling Analysis',
            'Slope Stability Analysis'
        ];

        foreach ($categories as $category) {
            ProjectCategory::create([
                'name' => $category,
                'slug' => Str::slug($category), // Otomatis jadi geotechnical-analysis, dll.
            ]);
        }
    }
}