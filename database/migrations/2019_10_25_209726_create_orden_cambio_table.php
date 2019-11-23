<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenCambioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('orden_cambio', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('SolicitudCambioId')->unsigned();
            $table->integer('JefeId')->unsigned();
            $table->string('NumeroVersion', 200);
            $table->string('NombreSolicitante', 200);
            $table->date('FechaAprobación');
            $table->date('FechaInicio');
            $table->date('FechaTermino');
            $table->string('Descripcion', 1000);
            $table->integer('PorcertanjeAvance');

            
            $table->foreign('SolicitudCambioId')->references('Id')->on('solicitud_cambio');
            $table->foreign('JefeId')->references('Id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_cambio');
    }
}
