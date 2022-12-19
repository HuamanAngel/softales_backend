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
            $table->string('use_name');
            $table->string('use_apellido');
            $table->string('use_dni');
            $table->string('email');
            $table->string('use_tel');
            $table->timestamp('use_email_verified_at')->nullable();
            $table->string('password');
            $table->enum('use_sexo',['Femenino','Masculino','No Especificado'])->default('No Especificado');
            $table->rememberToken();
            $table->timestamps();
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
