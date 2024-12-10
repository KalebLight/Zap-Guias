<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locadora_de_veiculos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('natureza_juridica');
            $table->string('uf');
            $table->string('municipio');
            $table->string('cnpj')->required(); 
            $table->string('nome_fantasia');
            $table->string('endereco_completo_receita_federal');
            $table->string('data_de_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');

            $table->string('numero_do_certificado');
            $table->string('validade_certificado');

            $table->json('idiomas');
            $table->json('tipo_de_veiculos_aquaticos');
            $table->json('tipo_de_veiculos_terrestre');

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
