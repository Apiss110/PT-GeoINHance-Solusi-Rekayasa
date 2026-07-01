<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan array asosiatif agar kita bisa mengontrol slug-nya secara manual
        // Hal ini memastikan slug di database PASTI SAMA dengan rute URL di web.php
        $categories = [
            [
                'name' => 'Geotechnical Analysis',
                'slug' => 'geotechnical-analysis',
            ],
            [
                'name' => 'Detailed Engineering Design (DED)',
                'slug' => 'detailed-engineering-design', // Sinkron dengan /proyek/detailed-engineering-design
            ],
            [
                'name' => 'Review Design Analysis',
                'slug' => 'review-design', // Sinkron dengan /proyek/review-design
            ],
            [
                'name' => 'Structural Analysis',
                'slug' => 'structural-analysis', // Sinkron dengan /proyek/structural-analysis
            ],
            [
                'name' => '3D FEM Analysis',
                'slug' => '3d-fem', // Sinkron dengan /proyek/3d-fem
            ],
            [
                'name' => 'Numerical Analysis Plaxis 3D',
                'slug' => 'numerical-analysis', // Sinkron dengan /proyek/numerical-analysis
            ],
            [
                'name' => 'Numerical Modeling Analysis',
                'slug' => 'numerical-modeling', // Sinkron dengan /proyek/numerical-modeling
            ],
            [
                'name' => 'Slope Stability Analysis',
                'slug' => 'slope-stability', // Sinkron dengan /proyek/slope-stability
            ],
        ];

        foreach ($categories as $category) {
            // updateOrCreate akan memeriksa berdasarkan 'slug'. 
            // Jika slug belum ada -> buat baru. Jika sudah ada -> update namanya saja (Aman dari eror duplikat!)
            ProjectCategory::updateOrCreate(
                ['slug' => $category['slug']], 
                ['name' => $category['name']]
            );
        }
    }
}