<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ro', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20);
            $table->biginteger('id_kro')->unsigned();
            $table->foreign('id_kro')->references('id')->on('kro')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ro');
    }
}
