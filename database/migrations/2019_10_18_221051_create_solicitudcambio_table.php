<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudcambioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_cambio', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('ProyectoId')->unsigned();
            $table->integer('MiembroJefeId')->unsigned();
            $table->integer('MiembroSolicitanteId')->unsigned();
            $table->date('Fecha');
            $table->string('Objetivo');
            $table->string('Descripcion');
            $table->integer('Estado');           
            
            $table->foreign('ProyectoId')->references('Id')->on('proyecto');
            $table->foreign('MiembroJefeId')->references('Id')->on('miembro_proyecto');
            $table->foreign('MiembroSolicitanteId')->references('Id')->on('miembro_proyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_cambio');
    }
}
