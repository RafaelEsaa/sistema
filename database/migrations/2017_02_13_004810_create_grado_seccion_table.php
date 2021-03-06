<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradoSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado_seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seccion_id')->unsigned();

            $table->foreign('seccion_id')->references('id')->on('secciones');

            $table->integer('grado_id')->unsigned();

            $table->foreign('grado_id')->references('id')->on('grados');

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
        Schema::drop('grado_seccion');
    }
}
