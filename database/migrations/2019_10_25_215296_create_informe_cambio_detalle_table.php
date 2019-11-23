<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeCambioDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // +Id
        // +UsuarioResponsableId
        // +CronogramaElementoConfiguracionId
        // +Tiempo
        // +Costo
        Schema::create('detalle_informe', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('UsuarioResponsableId')->unsigned();
            $table->integer('CronogramaElementoConfiguracionId')->unsigned();
            $table->integer('DetalleInformeId')->unsigned();

            $table->string('Tiempo', 200);
            $table->decimal('Costo', 10, 2);
     
            $table->foreign('DetalleInformeId')->references('Id')->on('informe_cambio');
            $table->foreign('UsuarioResponsableId')->references('Id')->on('usuario');
            $table->foreign('CronogramaElementoConfiguracionId')->references('Id')->on('cronograma_elemento_configuracion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_informe');
    }
}
