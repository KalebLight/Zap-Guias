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
        Schema::create('turismo_nautico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('tipo_de_estabelecimento');
            
            $table->string('natureza_juridica');    
            $table->string('uf');
            $table->string('municipio');
            $table->string('tipo_da_estrutura_nautica');
            
            
            $table->string('caracterizacao_da_marina');
            $table->string('cnpj');
            $table->string('nome_fantasia');
            
            $table->string('endereco_completo_receita_federal');
            $table->string('data_de_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');

            $table->string('numero_do_certificado');
            $table->string('validade_certificado');
            $table->json('idiomas');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turismo_nautico');
    }
};
