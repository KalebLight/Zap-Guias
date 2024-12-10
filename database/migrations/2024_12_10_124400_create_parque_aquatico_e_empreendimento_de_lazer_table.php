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
        Schema::create('parque_aquatico_e_empreendimento_de_lazer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('natureza_juridica');
            $table->string('uf');
            $table->string('municipio');
            $table->string('tipo');
            
            $table->string('cnpj');
            $table->string('nome_fantasia');
            $table->string('nome_pessoa_juridica');
            $table->string('endereco_completo');
            $table->string('data_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');
            
            $table->string('numero_do_certificado');
            $table->string('validade_certificado');

            $table->json('idiomas');
            $table->integer('area_total_construida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parque_aquatico_e_empreendimento_de_lazer');
    }
};
