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
        Schema::table('training_registrations', function (Blueprint $table) {
            // Pengecekan agar tidak error jika kolom sudah ada
            if (!Schema::hasColumn('training_registrations', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('additional_message');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_registrations', function (Blueprint $table) {
            // Pengecekan agar tidak error jika kolom sudah dihapus atau tidak ada
            if (Schema::hasColumn('training_registrations', 'is_read')) {
                $table->dropColumn('is_read');
            }
        });
    }
};