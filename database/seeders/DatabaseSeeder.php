<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat atau memperbarui akun admin otomatis saat seeder dijalankan
        // Perbaikan: Menggunakan updateOrCreate agar tidak eror "UNIQUE constraint failed" saat seeder dijalankan ulang
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Kolom acuan unik untuk mengecek apakah data sudah ada atau belum
            [
                'name' => 'Superadmin Geo',
                'password' => '1234', // Polos tanpa hash sesuai kebutuhan tugas kampus
                'role' => 'superadmin',
            ]
        );

        // 2. Memanggil seeder kategori proyek yang sudah diurutkan
        $this->call([
            ProjectCategorySeeder::class,
        ]);
    }
}