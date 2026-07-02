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
    Schema::create('case_studies', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('sector'); // Contoh: All Sectors, Geotechnical, Structural, dll.
        $table->year('publication_year');
        $table->string('file_path'); // Menyimpan path file PDF yang diunggah
        $table->string('file_size')->nullable(); // Contoh: "7.2 MB" atau "5.5 MB"
        $table->text('description')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
