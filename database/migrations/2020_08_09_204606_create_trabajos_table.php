<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('descripcion', 255);
            $table->string('estado', 100);
            $table->string('tiempo_inicial', 100); // 1 dia/mes
            $table->string('tiempo_final', 100);
            $table->double('precio_inicial', 8, 2);
            $table->double('precio_final', 8, 2);
            $table->integer('confiabilidad');
            $table->integer('cortesía');            
            $table->integer('orden');
            $table->integer('Mano_de_obra');
            $table->integer('Precision_cotizacion');
            $table->unsignedBigInteger('idUser_Cli');
            $table->unsignedBigInteger('idUser_Tecnico');

            $table->foreign('idUser_Cli')->references('id')->on('usuarios');
            $table->foreign('idUser_Tecnico')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
}
