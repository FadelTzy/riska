<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_revisis', function (Blueprint $table) {
            $table->id();
            $table->string('id_rkakl')->nullable();
            $table->string('tahun')->nullable();
            $table->string('nama')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('status_draft')->nullable()->comment('1 draft 2 sudah fix');
            $table->string('status_aktivasi')->nullable()->comment('1 aktif 2 non');
            $table->string('anggaran')->nullable()->comment('1 aktif 2 non');
            $table->string('realisasi')->nullable()->comment('1 aktif 2 non');
            $table->string('sisa')->nullable()->comment('1 aktif 2 non');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_revisis');
    }
};
