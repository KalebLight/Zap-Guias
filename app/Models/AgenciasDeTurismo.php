<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenciasDeTurismo extends Model
{
    use HasFactory;
    /**
     * Tabela correspondente
     *
     * @var string
     */
    protected $table = 'agencias_de_turismo';

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
        'endereco_completo',
        'uf',
        'municipio',
        'data_de_abertura',
        'telefone',
        'email_comercial',
        'website',
        'numero_do_certificado',
        'validade_certificado',
        'categoria_de_atuação',
        'atividades_obrigatorias',
        'atividades_opcionais',
        'especialidade',
        'quantidade_de_veiculos',
        'quantidade_de_embarcacoes',
        'quantidade_de_cruzeiro_maritmo',
        'quantidade_de_cruzeiro_fluvial',
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
