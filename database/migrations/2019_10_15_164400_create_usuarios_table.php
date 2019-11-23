<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('usuario', function (Blueprint $table) {
            
            $table->increments('Id');
            $table->string('Usuario');
            $table->string('Clave');
            $table->string('Correo')->unique();
            $table->integer('RolId')->unsigned();
            $table->rememberToken();
            $table->foreign('RolId')->references('Id')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
