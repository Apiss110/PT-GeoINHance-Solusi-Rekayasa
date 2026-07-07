<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('syllabi', function (Blueprint $table) {
            // Hero & Metadata
            $table->string('durasi')->nullable();
            $table->string('jadwal_terdekat')->nullable();
            $table->string('format_kelas')->default('Live Zoom');
            $table->integer('poin_cpd')->nullable();

            // Overview
            $table->text('manfaat_kursus')->nullable();

            // Prasyarat & Hardware
            $table->string('minimal_ram')->nullable();
            $table->text('lisensi_software')->nullable();
            $table->text('prasyarat_peserta')->nullable();
            $table->text('target_peserta')->nullable();

            // Instruktur
            $table->string('nama_instruktur')->nullable();
            $table->string('foto_instruktur')->nullable();
            $table->text('proyek_instruktur')->nullable();

            // Investasi / Harga
            $table->bigInteger('harga_mahasiswa')->default(0);
            $table->bigInteger('harga_profesional')->default(0);

            // Data Dinamis (Modul & FAQ) disimpan sebagai JSON
            $table->json('modul_materi')->nullable();
            $table->json('faq_list')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('syllabi', function (Blueprint $table) {
            $table->dropColumn([
                'durasi', 'jadwal_terdekat', 'format_kelas', 'poin_cpd',
                'manfaat_kursus', 'minimal_ram', 'lisensi_software',
                'prasyarat_peserta', 'target_peserta', 'nama_instruktur',
                'foto_instruktur', 'proyek_instruktur', 'harga_mahasiswa',
                'harga_profesional', 'modul_materi', 'faq_list'
            ]);
        });
    }
};