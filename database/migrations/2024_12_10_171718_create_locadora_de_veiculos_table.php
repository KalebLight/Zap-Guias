<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('locadora_de_veiculos', function (Blueprint $table) {
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
            $table->string('email_comercial')->required();
            $table->json('formas_de_pagamento')->nullable();
            $table->json('funcionamento')->nullable();
            $table->string('bio', 200)->nullable();
            $table->json('endereco')->nullable();
            $table->string('foto_perfil')->nullable();

            $table->string('uf')->required();
            $table->string('municipio')->required();
            $table->string('natureza_juridica')->nullable();
            $table->string('endereco_completo_receita_federal')->nullable();
            $table->string('data_de_abertura')->nullable();
            $table->string('numero_do_certificado')->required();
            $table->string('validade_certificado')->nullable();

            $table->json('tipo_de_veiculos_aquaticos')->nullable();
            $table->json('tipo_de_veiculos_terrestre')->nullable();

            $table->json('dados_especificos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locadora_de_veiculos');
    }
};
