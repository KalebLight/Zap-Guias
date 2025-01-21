<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocadoraDeVeiculosParaTuristas extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'locadora_de_veiculos';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'natureza_juridica',
        'uf',
        'municipio',
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
        'tipo_de_veiculos_aquaticos',
        'tipo_de_veiculos_terrestre',
        'slug',
        'instagram',
        'facebook',
        'whatsapp',
        'formas_de_pagamento',
        'funcionamento',
        'bio',
        'endereco',
        'foto_perfil',
        'dados_especificos',
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
