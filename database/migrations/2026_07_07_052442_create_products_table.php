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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Untuk URL ramah SEO (misal: /produk/staad-pro)
            $table->text('description')->nullable();
            $table->string('image_path')->nullable(); // Untuk menyimpan foto produk
            $table->boolean('is_active')->default(true); // Untuk kontrol muncul/tidaknya produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};