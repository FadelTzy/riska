<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkomponenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkomponen', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20);
            $table->biginteger('id_komponen')->unsigned();
            $table->foreign('id_komponen')->references('id')->on('komponen')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('subkomponen');
    }
}
