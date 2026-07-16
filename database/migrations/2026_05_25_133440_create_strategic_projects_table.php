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
            
            // 1. Relasi Kategori Proyek (Mengarahkan murni ke tabel project_pages buatan admin)
            $table->foreignId('project_category_id')
                  ->constrained('project_pages')
                  ->onDelete('cascade');
            
            // 2. Relasi Sektor Layanan (Nullable & Set Null berjalan selaras)
            $table->foreignId('sector_id')
                  ->nullable()
                  ->constrained('sectors')
                  ->onDelete('set null');
            
            // 3. Kolom Atribut Proyek
            $table->string('title');
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('year')->nullable();
            $table->string('image_path')->nullable();
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