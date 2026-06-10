<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('tag')->nullable();  // Contoh: SIPIL, INOVASI
            $table->text('content');    // Isi artikel lengkap / deskripsi pendek
            $table->string('image')->nullable(); // Foto background kartu
            $table->date('published_at'); // Tanggal rilis artikel
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};