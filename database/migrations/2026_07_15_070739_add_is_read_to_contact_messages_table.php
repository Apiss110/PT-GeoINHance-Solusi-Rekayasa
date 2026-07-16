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
    Schema::table('contact_messages', function (Blueprint $table) {
        // Tambahkan pengecekan if agar tidak error jika kolom sudah ada
        if (!Schema::hasColumn('contact_messages', 'is_read')) {
            $table->boolean('is_read')->default(false)->after('additional_message');
        }
    });
}

public function down(): void
{
    Schema::table('contact_messages', function (Blueprint $table) {
        $table->dropColumn('is_read');
    });
}
};
