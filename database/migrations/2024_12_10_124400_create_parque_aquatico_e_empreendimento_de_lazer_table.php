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
        Schema::create('parque_aquatico_e_empreendimento_de_lazer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('natureza_juridica')->nullable();
            $table->string('uf')->required();
            $table->string('municipio')->required();
            $table->string('especialidade')->required();
            $table->string('tipo_de_estabelecimento')->nullable();
            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('nome_pessoa_juridica')->nullable();
            $table->string('endereco_completo')->nullable();
            $table->string('data_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email_comercial')->required();
            $table->string('website')->nullable();
            $table->string('numero_do_certificado')->required();
            $table->string('validade_certificado')->nullable();
            $table->json('idiomas')->nullable();
            ;
            $table->integer('area_total_construida')->nullable();
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
