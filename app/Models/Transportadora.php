<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transportadora extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'transportadora_turistica';

    /**
     * Atributos preenchíveis via massa
     *
     * @var array
     */
    protected $fillable = [
        'especialidade',
        'cnpj',
        'nome_fantasia',
        'tipo_de_estabelecimento',
        'natureza_juridica',
        'uf',
        'municipio',
        'endereco_completo_receita_federal',
        'data_de_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado',
        'quantidade_de_veiculos',
        'quantidade_de_embarcacoes',
        'quantidade_de_cruzeiro_maritmo',
        'quantidade_de_cruzeiro_fluvial'
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
}
