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
            $table->string('tiempo_inicial', 100)->nullable(); // 1 dia/mes
            $table->string('tiempo_final', 100)->nullable();
            $table->double('precio_inicial', 8, 2)->nullable();
            $table->double('precio_final', 8, 2)->nullable();
            $table->integer('confiabilidad')->nullable();
            $table->integer('cortesía')->nullable();
            $table->integer('orden')->nullable();
            $table->integer('Mano_de_obra')->nullable();
            $table->integer('Precision_cotizacion')->nullable();
            $table->unsignedBigInteger('idUser_Cli')->nullable();
            $table->unsignedBigInteger('idUser_Tecnico')->nullable();

            $table->foreign('idUser_Cli')->references('id')->on('users');
            $table->foreign('idUser_Tecnico')->references('id')->on('users');
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
