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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->foreignId('dosen_id');
            $table->date('tanggal');
            $table->longText('keterangan');
            $table->date('waktu_awal');
            $table->date('waktu_akhir');
            $table->foreignId('bukti_id')->nullable();
            $table->foreignId('jenis_id')->nullable();
            $table->foreignId('tingkat_id');
            $table->string('akreditasi')->nullable();
            $table->foreignId('peran_id');
            $table->foreignId('publikasi_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
