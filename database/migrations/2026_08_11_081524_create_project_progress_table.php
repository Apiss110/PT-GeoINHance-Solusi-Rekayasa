<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_progresses', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke user / klien yang memiliki proyek ini
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Informasi Pekerjaan / Tahapan
            $table->string('title');                  // contoh: "Survei Lapangan GeoInhance"
            $table->text('description')->nullable();  // detail pengerjaan
            $table->integer('percentage')->default(0); // misal: 25, 50, 100 (%)
            
            // Status Pekerjaan
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            
            // Lampiran Foto / Bukti Lapangan
            $table->string('image')->nullable();      // path foto progress
            
            // Tanggal Target & Selesai
            $table->date('start_date')->nullable();
            $table->date('target_date')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_progresses');
    }
};