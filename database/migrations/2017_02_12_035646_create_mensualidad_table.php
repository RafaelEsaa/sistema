<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensualidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes');
            $table->integer('ano_escolar_id')->unsigned();

            $table->foreign('ano_escolar_id')->references('id')->on('ano_escolares');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mensualidad');
    }
}
