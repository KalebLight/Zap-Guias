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
        Schema::create('transportadora_turistica', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('modalidades')->required();
            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('tipo_de_estabelecimento')->required();
            $table->string('natureza_juridica');
            $table->string('uf')->required();
            $table->string('municipio')->required();
            $table->string('endereco_completo_receita_federal')->required();
            $table->string('data_de_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('numero_do_certificado'); 
            $table->string('validade_certificado');
            $table->string('quantidade_de_veiculos')->nullable();
            $table->string('quantidade_de_embarcacoes')->nullable();
            $table->integer('quantidade_de_cruzeiro_maritmo')->nullable();
            $table->integer('quantidade_de_cruzeiro_fluvial')->nullable();
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
