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
        Schema::create('rab_akuns', function (Blueprint $table) {
            $table->id();
            $table->string('id_rkakl')->nullable();
            $table->string('id_revisi')->nullable();

            $table->string('id_rab_sub')->nullable();
            $table->string('nama_akun')->nullable();
            $table->string('kode_akun')->nullable();
            $table->string('id_akun')->nullable();
            $table->string('volume')->nullable();
            $table->string('satuan')->nullable();
            $table->string('biaya')->nullable();
            $table->string('status_cabang')->nullable();
            $table->string('jenis_detail')->nullable();
            $table->string('kppn')->nullable();

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
        Schema::dropIfExists('rab_akuns');
    }
};
