<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensualidadMontoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualidad_monto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('monto');
            $table->integer('ano_escolar_id')->unsigned();

            $table->foreign('ano_escolar_id')->references('id')->on('ano_escolares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mensualidad_monto');
    }
}