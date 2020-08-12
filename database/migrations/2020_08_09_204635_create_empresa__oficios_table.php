<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaOficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa__oficios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // foreing keys
            $table->unsignedBigInteger('idEmpresa');
            $table->unsignedBigInteger('idOficio');

            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->foreign('idOficio')->references('id')->on('oficios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa__oficios');
    }
}
