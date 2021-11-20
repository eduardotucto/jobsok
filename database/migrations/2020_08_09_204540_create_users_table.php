<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido', 100);
            $table->string('ciudad', 100);
            $table->string('telefono', 100);
            $table->date('f_nacimiento');
            $table->string('sexo', 15);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('idType_User')->default(1);
            $table->text('informacion')->nullable();//->default('null');
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
        Schema::dropIfExists('users');
    }
}
