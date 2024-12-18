<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroDeConvencoes extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'centro_de_convencoes';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'tipo_estabelecimento',
        'natureza_juridica',
        'uf',
        'municipio',
        'especialidade',
        'cnpj',
        'nome_fantasia',
        'endereco_completo_receita_federal',
        'data_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_do_certificado',
        'idiomas',
        'area_total_construida',
        'area_locavel',
    ];

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
}
