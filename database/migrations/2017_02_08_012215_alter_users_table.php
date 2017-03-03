<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn(['name']);
            $table->integer('cedula')->after('id');
            $table->string('primer_nombre')->after('cedula');
            $table->string('segundo_nombre')->after('primer_nombre');
            $table->string('primer_apellido')->after('segundo_nombre');
            $table->string('segundo_apellido')->after('primer_apellido');
            $table->date('fecha_nacimiento')->after('segundo_apellido');
            $table->string('telefono')->after('fecha_nacimiento');
            $table->string('direccion')->after('telefono');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn(['primer_nombre', 'segundo_nombre', 'primer_apellido',
                                'segundo_apellido', 'fecha_nacimiento', 'telefono', 'direccion']);
            $table->string('name');
        });
    }
}
