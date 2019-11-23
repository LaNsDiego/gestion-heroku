<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 
        Schema::create('informe_cambio', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('SolicitudCambioId')->unsigned();
            $table->string('Descripcion', 400);
            $table->string('Tiempo', 2000);
            $table->decimal('CostoEconomico', 10, 2);
            $table->string('ImpactoProblema', 1000);
            
            $table->foreign('SolicitudCambioId')->references('Id')->on('solicitud_cambio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe_cambio');
    }
}
