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
        Schema::create('grado_seccion', function (Blueprint $table){
            $table->increments('id');
            $table->string('status');
            $table->integer('seccion_id')->unsigned();

            $table->foreign('seccion_id')->references('id')->on('secciones');

            $table->integer('grado_id')->unsigned();

            $table->foreign('grado_id')->references('id')->on('grados');
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
