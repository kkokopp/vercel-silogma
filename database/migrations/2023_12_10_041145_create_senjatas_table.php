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
        Schema::create('senjatas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_senjata')->unique();
            $table->string('nama_senjata');
            $table->string('seri_senjata');
            $table->string('lokasi');
            $table->integer('jumlah');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('status_senjata_id');
            $table->unsignedBigInteger('jenis_senjata_id');
            $table->text('keterangan');
            // $table->unsignedBigInteger('riwayat_id');
            $table->timestamps();
            $table->foreign('jenis_senjata_id')->references('id')->on('jenis_senjatas');
            $table->foreign('status_senjata_id')->references('id')->on('status_senjatas');
            // $table->foreign('riwayat_id')->references('id')->on('riwayats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senjatas');
    }
};
