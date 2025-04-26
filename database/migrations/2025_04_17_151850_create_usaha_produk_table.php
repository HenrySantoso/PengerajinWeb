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
            $table->foreignId('usaha_id')->constrained('usaha')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->timestamps(); // optional, tapi biasanya berguna

            $table->primary(['usaha_id', 'produk_id'], 'usaha_produk_id'); // Optional: give a name to the composite key
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
