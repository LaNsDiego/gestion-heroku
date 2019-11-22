<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Codigo');
            $table->string('Nombre');
            $table->date('FechaInicio');
            $table->date('FechaTermino');
            $table->integer('UsuarioJefeId');
            $table->integer('MetodologiaId');
            $table->string('Descripcion');
            $table->string('Estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}
