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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('bank')->nullable();
            $table->string('nama_rek')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bank_pusat')->nullable();
            $table->string('kode_bank_pusat')->nullable();
            $table->string('swift')->nullable();
            $table->string('tipe_sup')->nullable();
            $table->string('telp')->nullable();
            $table->string('kode_negara')->nullable();
            $table->string('negara')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
};
