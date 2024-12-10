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
        Schema::create('acampamento_turistico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('situacao_tramite');
            $table->string('tipo_de_estabelecimento');
            $table->string('estrutura_basica');
            $table->string('natureza_juridica');
            $table->string('uf');
            $table->string('municipio');
            $table->string('nome_fantasia');
            $table->string('cnpj');
            $table->string('endereco_completo');
            $table->string('data_de_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');

            $table->string('numero_do_certificado');
            $table->string('validade_certificado');
            $table->integer('area_montagem');
            $table->string('capacidade');
            $table->json('idiomas');





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
