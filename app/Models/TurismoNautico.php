<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurismoNautico extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'turismo_nautico';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'tipo_de_estabelecimento',
        'natureza_juridica',
        'uf',
        'municipio',
        'tipo_da_estrutura_nautica',
        'especialidade',
        'cnpj',
        'nome_fantasia',
        'endereco_completo_receita_federal',
        'data_de_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado',
        'idiomas',
        'slug',
        'instagram',
        'facebook',
        'twitter',
        'formas_de_pagamento',
        'funcionamento',
        'bio',
        'endereco',
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
