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
        Schema::create('jenis_akun_rkakls', function (Blueprint $table) {
            $table->id();
            $table->string('id_rab')->nullable();
            $table->string('id_akun')->nullable();
            $table->string('anggaran')->nullable();
            $table->string('realisasi')->nullable();
            $table->string('sisa')->nullable();

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
        Schema::dropIfExists('jenis_akun_rkakls');
    }
};
