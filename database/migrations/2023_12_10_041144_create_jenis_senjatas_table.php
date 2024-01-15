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
        Schema::create('jenis_senjatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis_senjata');
            $table->string('slug')->unique();
            // $table->foreignId('senjata_id')->constrained('senjatas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_senjatas');
    }
};
