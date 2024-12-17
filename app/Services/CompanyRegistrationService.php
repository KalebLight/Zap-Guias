<?php

namespace App\Services;

use App\Models\Restaurante;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Livewire\Volt\Component;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Exception;

class CompanyRegistrationService
{

  public function registerCompany(array $userData, array $companyData)
  {
    $userValidated = Validator::make($userData, [
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'max:255', 'unique:' . User::class],
      'phone' => ['required', 'string'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],

    ])->validate();

    $activityType = $companyData['tipoDeAtividade'];

    try {
      event(new Registered(($user = User::create($userValidated))));

      // dd($companyData);

      if ($activityType == 'Restaurante, Cafeteria, Bar e etc.') {
        $restauranteValidated = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'especialidade' => ['required'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = Restaurante::create($restauranteValidated))));
      }


      return $user;
    } catch (Exception $e) {
      throw new Exception('Erro ao registrar a empresa: ' . $e->getMessage());
    }
  }
}