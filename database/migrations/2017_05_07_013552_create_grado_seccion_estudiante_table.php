<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradoSeccionEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado_seccion_estudiante', function (Blueprint $table){
            $table->increments('id');
            $table->integer('ano_escolar_id')->unsigned();

            $table->foreign('ano_escolar_id')->references('id')->on('ano_escolares');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('grado_seccion_id')->unsigned();

            $table->foreign('grado_seccion_id')->references('id')->on('grado_seccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grado_seccion_estudiante');
    }
}
