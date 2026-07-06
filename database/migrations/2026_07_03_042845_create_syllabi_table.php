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
    Schema::create('syllabi', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Contoh: PLAXIS 2D Basic
        $table->string('slug')->unique(); // Untuk URL detail jika diperlukan
        $table->text('description'); // Deskripsi singkat silabus
        $table->string('software_category'); // PLAXIS, GeoStudio, Structural, Foundation
        $table->string('level'); // Beginner, Intermediate, Advanced, Professional
        $table->integer('modules_count')->default(0); // Jumlah modul, contoh: 12
        $table->string('icon')->nullable(); // Nama class fontawesome atau icon lucide jika ingin dinamis
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syllabi');
    }
};
