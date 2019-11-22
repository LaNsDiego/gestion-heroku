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
            $table->integer('Proyectoid');
            $table->integer('MiembroSolicitanteId');
            $table->date('Fecha');
            $table->string('Objetivo');
            $table->string('Descripcion');
            $table->integer('Estado');
            $table->integer('MiembroJefeId');
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
