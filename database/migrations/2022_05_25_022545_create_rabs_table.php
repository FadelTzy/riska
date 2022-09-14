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
        Schema::create('rabs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rkakl');
            $table->string('id_kegiatan')->nullable();
            $table->string('id_kro')->nullable();
            $table->string('ro')->nullable();
            $table->string('komponen')->nullable();
            $table->string('sub_komponen')->nullable();
            $table->string('id_akun')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('status')->nullable();
            $table->string('anggaran')->nullable();
            $table->string('sisa')->nullable();
            $table->string('realisasi')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('rabs');
    }
};
