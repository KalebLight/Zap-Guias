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
        Schema::create('casa_de_espetaculos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            
            $table->string('cnpj');
            $table->date('nome_fantasia');
            $table->string('endereco');
            $table->string('tipo_de_estabelecimento');
            $table->date('natureza_juridica');
            $table->string('uf');
            $table->string('municipio');
            $table->string('data_de_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');
            $table->string('numero_do_certificado');
            $table->string('validade_certificado');
            $table->json('idiomas');
            $table->string(' tipo');
            $table->text('capacidade_de_lugares');

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casa_de_espetaculos');
    }
};
