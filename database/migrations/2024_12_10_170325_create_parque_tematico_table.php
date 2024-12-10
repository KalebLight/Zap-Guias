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
        Schema::create('parque_tematico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo_de_estabelecimento');
            $table->string('natureza_do_estabelecimento');
            $table->string('uf');
            $table->string('municipio');
            $table->string('cnpj')->required();
            $table->string('nome_pessoa_juridica');
            $table->string('nome_fantasia')->required();
            $table->string('data_de_abertura');
            $table->string('endereco_completo');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');
            $table->string('numero_do_certificado');
            $table->string('validade_certificado');
            
            $table->integer('area_total_do_empreendimento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parque_tematico');
    }
};
