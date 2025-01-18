<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParqueAquaticoEEmpreendimentoDeLazer extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'parque_aquatico_e_empreendimento_de_lazer';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'natureza_juridica',
        'uf',
        'municipio',
        'especialidade',
        'tipo_de_estabelecimento',
        'cnpj',
        'nome_fantasia',
        'nome_pessoa_juridica',
        'endereco_completo',
        'data_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado',
        'idiomas',
        'area_total_construida',
        'slug',
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
}
