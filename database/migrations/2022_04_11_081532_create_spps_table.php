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
        Schema::create('spps', function (Blueprint $table) {
            $table->id();
            $table->string('id_akun');
            $table->string('id_sifat_pembayaran')->nullable();
            $table->string('id_rkakl')->nullable();
            $table->string('id_kp')->nullable();
            $table->string('id_sumber_dana')->nullable();
            $table->string('id_asal_penerimaan')->nullable();
            $table->string('id_jenis_pembayaran')->nullable();
            $table->string('id_dasar_pembayaran')->nullable();

            $table->string('jml_pembayaran')->nullable();
            $table->text('terbilang')->nullable();
            $table->integer('id_supplier')->nullable();
            $table->integer('id_jenis_belanja')->nullable();

            $table->string('keperluan')->nullable();
            $table->string('no_spk')->nullable();
            $table->string('tgl_spk')->nullable();
            $table->string('nilai_spk')->nullable();
            $table->string('tahun')->nullable();
            $table->string('pembuat_komitmen')->nullable();
            $table->string('penguji_penerbit')->nullable();
            $table->string('id_jenis_spm')->nullable();
            $table->string('id_cara_bayar')->nullable();

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
        Schema::dropIfExists('spps');
    }
};
