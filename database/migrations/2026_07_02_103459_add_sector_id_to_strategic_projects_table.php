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
        Schema::table('strategic_projects', function (Blueprint $col) {
            // Menambahkan kolom sector_id setelah project_category_id
            // Digunakan foreignId agar otomatis terelasi dan nullable dulu demi keamanan data lama
            $col->foreignId('sector_id')->nullable()->after('project_category_id')->constrained('sectors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('strategic_projects', function (Blueprint $col) {
            // Hapus foreign key dan kolomnya jika rollback
            $col->dropForeign(['sector_id']);
            $col->dropColumn('sector_id');
        });
    }
};