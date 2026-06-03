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
    Schema::create('strategic_projects', function (Blueprint $table) {
        $table->id();
        $table->string('category');    // Contoh: Geoteknik, Infrastruktur
        $table->string('title');
        $table->text('description');
        $table->string('location');    // Contoh: Jawa Tengah
        $table->string('year');        // Contoh: 2024
        $table->string('image_path');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strategic_projects');
    }
};
