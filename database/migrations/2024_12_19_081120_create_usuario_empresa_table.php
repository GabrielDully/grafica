<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEmpresaTable extends Migration
{
    public function up()
    {
        Schema::create('usuario_empresa', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj')->unique();
            $table->string('email')->unique();
            $table->string('password'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_empresa');
    }
};
