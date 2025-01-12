<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agencias_de_turismo', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('slug')->unique()->nullable();
            $table->string('tipo_de_estabelecimento')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('endereco_completo')->nullable();
            $table->string('uf')->required();
            $table->string('municipio')->required();
            $table->string('data_de_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email_comercial')->required();
            $table->string('website')->nullable();
            $table->string('numero_do_certificado')->required();
            $table->string('validade_certificado')->nullable();
            $table->string('categoria_de_atuação')->nullable();
            $table->string('atividades_obrigatorias')->nullable();
            $table->string('atividades_opcionais')->nullable();
            $table->string('especialidade')->nullable();
            $table->integer('quantidade_de_veiculos')->nullable();
            $table->integer('quantidade_de_embarcacoes')->nullable();
            $table->integer('quantidade_de_cruzeiro_maritmo')->nullable();
            $table->integer('quantidade_de_cruzeiro_fluvial')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->json('formas_de_pagamento')->nullable();
            $table->json('funcionamento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencias_de_turismo');
    }
};
