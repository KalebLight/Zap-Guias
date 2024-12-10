<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospedagensTable extends Migration
{
    public function up()
    {
        Schema::create('hospedagens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo'); // Exemplo: Hotel, Pousada, etc.
            $table->text('descricao')->nullable();
            $table->string('numero_do_certificado')->nullable();
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('idiomas')->nullable();
            $table->string('tipo_de_hospedagem')->nullable();
            $table->string('unidade_habitacionais')->nullable();
            $table->string('leitos')->nullable();
            $table->string('leitos_acessíveis')->nullable();
            

            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospedagens');
    }
}