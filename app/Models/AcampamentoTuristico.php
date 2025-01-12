<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcampamentoTuristico extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'acampamento_turistico';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'situacao_tramite',
        'tipo_de_estabelecimento',
        'estrutura_basica',
        'natureza_juridica',
        'uf',
        'municipio',
        'nome_fantasia',
        'cnpj',
        'endereco_completo',
        'data_de_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado',
        'area_montagem',
        'capacidade',
        'idiomas',
        'slug',
        'instagram',
        'facebook',
        'twitter',
        'formas_de_pagamento',
        'funcionamento',
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
