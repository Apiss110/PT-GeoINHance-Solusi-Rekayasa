<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Contoh: Geotechnical Analysis (Untuk Dropdown)
            $table->string('slug')->unique(); // Untuk URL (Contoh: geotechnical-analysis)
            $table->text('description');     // Deskripsi utama di dalam halaman proyek
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_pages');
    }
};