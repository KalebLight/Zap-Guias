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
        Schema::create('acampamento_turistico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('situacao_tramite')->nullable();
            $table->string('tipo_de_estabelecimento')->nullable();
            $table->string('estrutura_basica')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('uf')->required();
            $table->string('municipio')->required();
            $table->string('nome_fantasia')->required();
            $table->string('cnpj')->required();
            $table->string('endereco_completo')->nullable();
            $table->string('data_de_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email_comercial')->required();
            $table->string('website')->nullable();
            $table->string('numero_do_certificado')->required();
            $table->string('validade_certificado')->nullable();
            $table->integer('area_montagem')->nullable();
            $table->string('capacidade')->nullable();
            $table->json('idiomas')->nullable();





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acampamento_turistico');
    }
};
