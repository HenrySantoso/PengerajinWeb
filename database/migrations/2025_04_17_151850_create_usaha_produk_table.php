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
        Schema::create('usaha_produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usaha_id');
            $table->unsignedBigInteger('produk_id');
            $table->timestamps(); // optional, tapi biasanya berguna

            //$table->unique(['usaha_id', 'produk_id']);

            $table->foreign('usaha_id')->references('usaha_id')->on('usaha')->onDelete('cascade');
            $table->foreign('produk_id')->references('produk_id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha_produk');
    }
};
