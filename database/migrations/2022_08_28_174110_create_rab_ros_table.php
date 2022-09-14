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
        Schema::create('rab_ros', function (Blueprint $table) {
            $table->id();
            $table->string('id_rkakl')->nullable();
            $table->string('id_revisi')->nullable();

            $table->string('id_rab_kekro')->nullable();
            $table->string('nama_ro')->nullable();
            $table->string('id_ro')->nullable();
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
        Schema::dropIfExists('rab_ros');
    }
};
