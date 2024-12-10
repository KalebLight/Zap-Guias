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
        Schema::create('meio_de_hospedagem', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('cnpj')->required(); 
            $table->string('nome_fantasia')->required();
            $table->string('tipo_de_estabelecimento');
            $table->string('natureza_juridica');
            $table->string('endereco_completo');
            $table->string('uf');
            $table->string('municipio');
            $table->string('data_de_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');
            $table->string('numero_do_certificado');
            $table->string('validade_certificado');
            $table->json('idiomas');
            $table->string('tipo_de_hospedagem');
            $table->integer('unidades_habitacionais');
            $table->integer('leitos');                            $table->integer('uhs_acessiveis');
            $table->integer('leitos_acessiveis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meio_de_hospedagem');
    }
};
