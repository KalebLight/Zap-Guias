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
        Schema::create('turismo_nautico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('tipo_de_estabelecimento')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('uf')->required();
            $table->string('municipio');
            $table->string('tipo_da_estrutura_nautica')->nullable();
            $table->string('especialidade')->required();
            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('endereco_completo_receita_federal')->nullable();
            $table->string('data_de_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email_comercial');
            $table->string('website')->nullable();
            $table->string('numero_do_certificado')->required();
            $table->string('validade_certificado')->nullable();
            $table->json('idiomas')->nullable();
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
