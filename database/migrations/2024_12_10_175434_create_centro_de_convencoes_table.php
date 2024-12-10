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
        Schema::create('centro_de_convencoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo_estabelecimento');
            $table->string('natureza_juridica');
            $table->string('uf');
            $table->string('municipio');
            $table->string('tipo');
            $table->string('cnpj');
            $table->string('nome_fantasia');
            $table->string('endereco_completo_receita_federal');
            $table->date('data_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');
            $table->string('numero_do_certificado');
            $table->string('validade_do_certificado');
            $table->json('idiomas');
            $table->integer('area_total_construida');
            $table->integer('area_locavel');
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
