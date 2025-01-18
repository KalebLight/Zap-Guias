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
        Schema::create('centro_de_convencoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo_estabelecimento')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('uf')->required();
            $table->string('municipio')->required();
            $table->string('especialidade')->required();
            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('slug')->unique()->required();
            $table->string('endereco_completo_receita_federal')->nullable();
            $table->date('data_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email_comercial')->required();
            $table->string('website')->nullable();
            $table->string('numero_do_certificado')->required();
            $table->string('validade_do_certificado')->nullable();
            $table->json('idiomas')->nullable();
            $table->integer('area_total_construida')->nullable();
            $table->integer('area_locavel')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->json('formas_de_pagamento')->nullable();
            $table->json('funcionamento')->nullable();
            $table->string('bio', 200)->nullable();
            $table->json('endereco')->nullable();
            $table->string('foto_perfil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_de_convencoes');
    }
};
