<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Str;


class Restaurante extends Model
{
    use HasFactory;

    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'restaurantes';

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
        'idiomas',
        'tipo',
        'especialidade',
        'cnpj',
        'nome_fantasia',
        'slug',
        'endereco_completo',
        'data_de_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado',
        'instagram',
        'facebook',
        'whatsapp',
        'formas_de_pagamento',
        'funcionamento',
        'bio',
        'endereco',
        'foto_perfil',
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
