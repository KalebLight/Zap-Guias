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
        Schema::create('transportadora_turistica', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('especialidade')->required();
            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('slug')->unique()->nullable();
            $table->string('tipo_de_estabelecimento')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('uf')->required();
            $table->string('municipio')->required();
            $table->string('endereco_completo_receita_federal')->nullable();
            $table->string('data_de_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email_comercial')->nullable();
            $table->string('website')->nullable();
            $table->string('numero_do_certificado')->required();
            $table->string('validade_certificado')->nullable();
            $table->string('quantidade_de_veiculos')->nullable();
            $table->string('quantidade_de_embarcacoes')->nullable();
            $table->integer('quantidade_de_cruzeiro_maritmo')->nullable();
            $table->integer('quantidade_de_cruzeiro_fluvial')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->json('formas_de_pagamento')->nullable();
            $table->json('funcionamento')->nullable();
            $table->string('bio', 200)->nullable();
            $table->string('foto_perfil')->nullable();
            $table->json('endereco')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportadora_turistica');
    }
};
