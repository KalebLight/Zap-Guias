<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantesTable extends Migration
{
    public function up()
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('slug')->unique()->nullable();
            $table->json('idiomas')->nullable();

            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telefone')->nullable();
            $table->string('website')->nullable();
            $table->string('email_comercial')->nullable();

            $table->json('formas_de_pagamento')->nullable();
            $table->json('funcionamento')->nullable();
            $table->string('bio', 200)->nullable();
            $table->json('endereco')->nullable();
            $table->string('foto_perfil')->nullable();

            $table->string('especialidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('municipio')->nullable();

            $table->string('tipo_de_estabelecimento')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('tipo')->nullable();
            $table->string('endereco_completo')->nullable();
            $table->string('data_de_abertura')->nullable();
            $table->string('numero_do_certificado');
            $table->string('validade_certificado')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
;
