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
        Schema::create('organizadora_de_eventos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo_estabelecimento');
            $table->string('natureza_juridica');
            $table->string('uf');
            $table->string('municipio');
            $table->string('categoria_evento');
            $table->string('tipo_de_eventos');
            $table->string('cnpj')->required();
            $table->string('nome_fantasia');
            $table->string('endereco');
            $table->string('data_de_abertura');
            $table->string('telefone');
            $table->string('email');
            $table->string('website');
            $table->string('numero_do_certificado');
            $table->string('validade_certificado');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizadora_de_eventos');
    }
};
