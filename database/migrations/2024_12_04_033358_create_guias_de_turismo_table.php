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
            $table->timestamps();

            $table->string('nome')->required();
            $table->string('slug')->unique()->nullable();
            $table->json('idiomas')->nullable();

            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telefone')->nullable();
            $table->string('website')->nullable();
            $table->string('email_comercial')->required();

            $table->json('formas_de_pagamento')->nullable();
            $table->json('funcionamento')->nullable();
            $table->string('bio', 200)->nullable();
            $table->json('endereco')->nullable();
            $table->string('foto_perfil')->nullable();

            $table->string('especialidade')->nullable();
            $table->string('uf')->required();
            $table->string('municipio')->required();

            $table->string('numero_do_certificado')->required();
            $table->string('validade_certificado')->nullable();
            $table->string('categoria')->nullable();
            $table->string('segmento')->nullable();
            $table->string('municipio_de_atuacao')->nullable();
            $table->string('guia_motorista')->nullable();
            $table->text('descricao')->nullable();

            $table->json('dados_especificos')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guias_de_turismo');
    }
}
'';
