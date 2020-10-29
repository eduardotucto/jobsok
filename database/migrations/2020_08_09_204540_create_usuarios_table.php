<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('ciudad', 100);
            $table->string('telefono', 100);
            $table->string('correo', 100);
            $table->string('password');
            $table->unsignedBigInteger('idType_User');
            $table->unsignedBigInteger('idEmpresa')->nullable();
            $table->bigInteger('nro_trabajos')->nullable();
            $table->string('experiencia', 100)->nullable();

            $table->foreign('idType_User')->references('id')->on('type__users');
            $table->foreign('idEmpresa')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
