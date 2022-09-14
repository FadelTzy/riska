<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kro', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20);
            $table->biginteger('id_kegiatan')->unsigned();
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan')->onUpdate('cascade')->onDelete('cascade');
            $table->text('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kro');
    }
}
