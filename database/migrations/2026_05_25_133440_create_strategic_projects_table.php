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
        // Pastikan hanya baris hubungan kategori ini yang dipakai
        $table->foreignId('project_category_id')->constrained('project_categories')->onDelete('cascade');
        $table->string('title');
        $table->text('description');
        $table->string('location');
        $table->string('year');
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
