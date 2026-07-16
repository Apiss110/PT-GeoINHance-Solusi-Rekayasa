<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('sectors', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama Sektor (Contoh: Pertambangan)
        $table->string('slug')->unique(); // URL ramah SEO (Contoh: pertambangan)
        $table->string('banner_image')->nullable(); // Foto banner atas halaman detail
        $table->longText('description')->nullable(); // Deskripsi detail isi sektor (Rich Text)
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};
