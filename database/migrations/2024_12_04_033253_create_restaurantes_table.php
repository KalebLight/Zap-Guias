<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantesTable extends Migration
{
    public function up()
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            $table->string('tipo_de_estabelecimento')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('uf')->nullable();
            $table->string('municipio')->nullable();
            $table->json('idiomas')->nullable();
            $table->string('tipo')->nullable();
            $table->string('especialidade')->nullable();
            $table->string('cnpj')->required();
            $table->string('nome_fantasia')->required();
            $table->string('endereco_completo')->nullable();
            $table->string('data_de_abertura')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('numero_do_certificado');
            $table->string('validade_certificado')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
;
