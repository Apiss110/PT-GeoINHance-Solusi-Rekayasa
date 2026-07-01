<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('videos', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('category'); 
        $table->date('published_at'); // Untuk menampilkan tanggal seperti "10 Mar, 2023"
        $table->string('duration')->nullable();
        $table->string('video_url'); // Link video YouTube yang akan diputar di halaman detail
        $table->string('thumbnail_path'); // Gambar cover depan video
        $table->text('description')->nullable(); // Deskripsi lengkap di bawah video utama
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};