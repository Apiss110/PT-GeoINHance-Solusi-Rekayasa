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
            $table->text('content');    // Isi artikel lengkap
            $table->string('image')->nullable(); // Nama file/path foto banner blog
            $table->date('published_at')->useCurrent(); // Otomatis tanggal hari ini jika kosong
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};