<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiaDeTurismo extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'guias_de_turismo';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'numero_do_certificado',
        'uf',
        'municipio',
        'telefone',
        'email_comercial',
        'website',
        'validade_certificado',
        'especialidade',
        'seguimento',
        'municipio_de_atuacao',
        'guia_motorista',
        'nome',
        'idiomas',
        'descricao',
        'slug',
        'instagram',
        'facebook',
        'twitter',
        'formas_de_pagamento',
        'funcionamento',
        'bio',
    ];

    public function owner()
    {
        return $this->morphOne(User::class, 'company');
    }

    /**
     * Atributos ocultos
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Atributos com tipo de dado específico
     *
     * @var array
     */
    protected $casts = [
        'idiomas' => 'array'
    ];
}
