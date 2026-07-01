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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('daerah'); // Contoh: Bandung, Jakarta, dll.
            $table->string('title');  // Nama Kantor/Cabang
            $table->text('desc');     // Deskripsi Layanan
            $table->string('img');    // URL Gambar atau Path File
            $table->decimal('lat', 10, 7); // Titik Koordinat Latitude
            $table->decimal('lng', 10, 7); // Titik Koordinat Longitude
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
