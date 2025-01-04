<?php

namespace App\Services;

use App\Models\AcampamentoTuristico;
use App\Models\AgenciasDeTurismo;
use App\Models\CasaDeEspetaculos;
use App\Models\CentroDeConvencoes;
use App\Models\GuiaDeTurismo;
use App\Models\LocadoraDeVeiculosParaTuristas;
use App\Models\MeioDeHospedagem;
use App\Models\OrganizadoraDeEventos;
use App\Models\ParqueAquaticoEEmpreendimentoDeLazer;
use App\Models\ParqueTematico;
use App\Models\Restaurante;
use App\Models\Transportadora;
use App\Models\TurismoNautico;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use Exception;
use Str;

class CompanyRegistrationService
{
  public function registerCompany(array $userData, array $companyData)
  {
    $activityType = $companyData['tipoDeAtividade'];

    try {
      DB::beginTransaction();
      $user = User::create($userData);
      $company = $this->createCompany($activityType, $companyData);
      $user->company()->associate($company);
      $user->save();
      DB::commit();
      return $user;

    } catch (\Exception $e) {
      DB::rollBack();
      throw new Exception('Erro ao registrar a empresa: ' . $e->getMessage());
    }
  }

  private function createCompany(string $activityType, array $companyData)
  {
    $validators = [
      'Restaurante, Cafeteria, Bar e etc.' => [
        'model' => Restaurante::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'especialidade' => ['required'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Transportadora Turística' => [
        'model' => Transportadora::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Meio de Hospedagem Turística' => [
        'model' => MeioDeHospedagem::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Centro de Convenções' => [
        'model' => CentroDeConvencoes::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Agência de Turismo' => [
        'model' => AgenciasDeTurismo::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Guia de Turismo' => [
        'model' => GuiaDeTurismo::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
          'nome' => ['required'],
        ],
      ],
      'Parque Aquático e Empreendimento de Lazer' => [
        'model' => ParqueAquaticoEEmpreendimentoDeLazer::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Parque Temático' => [
        'model' => ParqueTematico::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Locadora de Veículos para Turistas' => [
        'model' => LocadoraDeVeiculosParaTuristas::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Acampamento Turístico' => [
        'model' => AcampamentoTuristico::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Casa de Espectáculos' => [
        'model' => CasaDeEspetaculos::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Organizadora de Eventos' => [
        'model' => OrganizadoraDeEventos::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
      'Turismo Náutico' => [
        'model' => TurismoNautico::class,
        'rules' => [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ],
      ],
    ];

    if (!isset($validators[$activityType])) {
      throw new Exception("Tipo de atividade desconhecido: {$activityType}");
    }

    $validator = Validator::make($companyData, $validators[$activityType]['rules']);
    $validatedData = $validator->validate();

    $modelClass = $validators[$activityType]['model'];
    $company = $modelClass::create($validatedData);

    $slugBase = Str::slug($company->nome_fantasia);
    $slug = "{$slugBase}-{$company->id}";

    $company->slug = $slug;
    $company->save();

    return $company;
  }
}