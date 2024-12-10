<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasDeTurismoTable extends Migration
{
    public function up()
    {
        Schema::create('guias_de_turismo', function (Blueprint $table) {
            $table->id();
            $table->string('numero_do_certificado')->required(); 
            $table->string('UF');
            $table->string('municipio');
            $table->string('telefone');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('validade_certificado');
            $table->string('categoria')->nullable();
            $table->string('segumento')->nullable();
            $table->string('municipio_de_atuacao')->nullable();
            $table->string('guia_motorista')->nullable();
            $table->string('nome');
            $table->json('idiomas')->nullable();
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guias_de_turismo');
    }
}'';
