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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_operasi')->unique();
            $table->string('nama');
            $table->string('lokasi');
            $table->timestamp('tanggal_mulai');
            $table->timestamp('tanggal_selesai');
            $table->string('catatan');
            $table->unsignedBigInteger('senjata_id');
            $table->timestamps();
            $table->foreign('senjata_id')->references('id')->on('senjatas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
