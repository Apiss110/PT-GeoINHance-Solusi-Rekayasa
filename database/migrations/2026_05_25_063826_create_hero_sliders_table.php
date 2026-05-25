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
        Schema::create('hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable(); // Menampung teks kecil (cth: INOVASI GEOTEKNIK TERPADU)
            $table->string('title')->nullable();    // Menampung teks besar (cth: ANALISIS TANAH & FONDASI PRESISI)
            $table->string('image_path');           // Menampung path/lokasi file foto di storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sliders');
    }
};