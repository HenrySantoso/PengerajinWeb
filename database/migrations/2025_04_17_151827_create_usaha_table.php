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
        Schema::create('usaha', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengerajin_id')->constrained('pengerajin')->onDelete('cascade');
            $table->foreignId('jenis_usaha_id')->constrained('jenis_usaha')->onDelete('cascade');
            $table->string('kode_usaha')->unique();
            $table->string('nama_usaha')->nullable();
            $table->string('deskripsi_usaha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha');
    }
};
