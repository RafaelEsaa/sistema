<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('monto');
            $table->string('status')->comment('1 true, 0 false');
            $table->string('numero_vauche');
            $table->integer('mensualidad_id')->unsigned();

            $table->foreign('mensualidad_id')->references('id')->on('mensualidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturaciones');
    }
}
