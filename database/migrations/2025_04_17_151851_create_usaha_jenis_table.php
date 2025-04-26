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
        Schema::create('usaha_jenis', function (Blueprint $table) {
            $table->foreignId('usaha_id')->constrained('usaha')->onDelete('cascade');
            $table->foreignId('jenis_usaha_id')->constrained('jenis_usaha')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['usaha_id', 'jenis_usaha_id'], 'usaha_jenis_id'); // Optional: give a name to the composite key

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha_jenis');
    }
};
