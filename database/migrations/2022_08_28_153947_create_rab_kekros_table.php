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
        Schema::create('rab_kekros', function (Blueprint $table) {
            $table->id();
            $table->string('id_revisi')->nullable();
            $table->string('id_rkakl')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('id_kegiatan')->nullable();
            $table->string('nama_kro')->nullable();
            $table->string('id_kro')->nullable();
            $table->string('volume')->nullable();
            $table->string('satuan')->nullable();
            $table->string('biaya')->nullable();
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
        Schema::dropIfExists('rab_kekros');
    }
};
