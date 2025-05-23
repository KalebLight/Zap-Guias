<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasaDeEspetaculos extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'casa_de_espetaculos';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'nome_fantasia',
        'tipo_de_estabelecimento',
        'natureza_juridica',
        'uf',
        'municipio',
        'data_de_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado',
        'idiomas',
        'tipo',
        'capacidade_de_lugares',
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
    public function servicos()
    {
        return $this->morphMany(\App\Models\Servico::class, 'empresa');
    }
}
