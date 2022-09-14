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
        Schema::create('riwayat_spps', function (Blueprint $table) {
            $table->id();
            $table->string('nomorspp')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('id_rkakl')->nullable();
            $table->string('id_revisi')->nullable();
            $table->string('id_realisasi_1')->nullable();
            $table->string('id_realisasi_2')->nullable();
            $table->string('total_pagu_1')->nullable();
            $table->string('total_pagu_2')->nullable();
            $table->string('total_spplalu_1')->nullable();
            $table->string('total_spplalu_2')->nullable();
            $table->string('total_sppini_1')->nullable();
            $table->string('total_sppini_2')->nullable();
            $table->string('jumlah_sppini_1')->nullable();
            $table->string('jumlah_sppini_2')->nullable();
            $table->string('sisa_1')->nullable();
            $table->string('sisa_2')->nullable();
            $table->string('proses')->nullable();
            $table->string('status')->nullable()->comment('1 menyusun 2 setuju 3 tolak');
            $table->string('uraian')->nullable();

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
        Schema::dropIfExists('riwayat_spps');
    }
};
