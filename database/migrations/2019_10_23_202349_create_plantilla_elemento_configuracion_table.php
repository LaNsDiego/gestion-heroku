<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantillaElementoConfiguracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronograma_elemento_configuracion', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Nombre');
            $table->string('Codigo');
            $table->integer('CronogramaFaseId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cronograma_elemento_configuracion');
    }
}
