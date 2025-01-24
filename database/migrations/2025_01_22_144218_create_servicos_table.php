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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->morphs('empresa');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2);
            $table->string('local')->nullable();
            $table->text('inclui')->nullable();
            $table->string('foto_servico')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
