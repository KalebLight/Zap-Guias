<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
        'endereco_completo',
        'data_de_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado'
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
