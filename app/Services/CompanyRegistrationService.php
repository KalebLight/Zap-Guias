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

    $activityType = $companyData['tipoDeAtividade'];

    try {

      // dd($companyData);
      event(new Registered(($user = User::create($userData))));

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

      } else if ($activityType == 'Transportadora Turística') {
        $transportadoraValidated = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = Transportadora::create($transportadoraValidated))));
      } else if ($activityType == 'Meio de Hospedagem') {
        $meioDeHospedagemValidated = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = MeioDeHospedagem::create($meioDeHospedagemValidated))));
      } else if ($activityType == 'Centro de Convenções') {
        $centroDeConvencaoValidated = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = CentroDeConvencoes::create($centroDeConvencaoValidated))));
      } else if ($activityType == 'Agência de Turismo') {
        $agenciaDeTurismoValidated = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = AgenciasDeTurismo::create($agenciaDeTurismoValidated))));
      } else if ($activityType == 'Guia de Turismo') {
        $companyData['nome'] = $userData['name'];
        $companyData['municipio_de_atuacao'] = $companyData['uf'];

        $guiadeTurismoValidated = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
          'nome' => ['required'],
        ])->validate();
        event(new Registered(($user = GuiaDeTurismo::create($guiadeTurismoValidated))));
      } else if ($activityType == 'Parque Aquático e Empreendimento de Lazer') {
        $parqueAquaticoEEmpreendimentoDeLazer = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = ParqueAquaticoEEmpreendimentoDeLazer::create($parqueAquaticoEEmpreendimentoDeLazer))));
      } else if ($activityType == 'Parque Temático') {
        $parqueTematico = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = ParqueTematico::create($parqueTematico))));
      } else if ($activityType == 'Locadora de Veículos para Turistas') {
        $locadoraVeiculos = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = LocadoraDeVeiculosParaTuristas::create($locadoraVeiculos))));
      } else if ($activityType == 'Acampamento Turístico') {
        $acampamentoTuristico = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = AcampamentoTuristico::create($acampamentoTuristico))));
      } else if ($activityType == 'Casa de Espetáculos') {
        $casaDeEspetaculos = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = CasaDeEspetaculos::create($casaDeEspetaculos))));
      } else if ($activityType == 'Organizadora de Eventos') {
        // dd($companyData);
        $organizadoraDeEventos = Validator::make($companyData, [
          'cnpj' => ['required', 'string'],
          'nome_fantasia' => ['required', 'string', 'max:50'],
          'especialidade' => ['required'],
          'municipio' => ['required', 'string', 'max:255'],
          'uf' => ['required', 'string', 'size:2'],
          'email_comercial' => ['required', 'string'],
          'numero_do_certificado' => ['required'],
        ])->validate();
        event(new Registered(($user = OrganizadoraDeEventos::create($organizadoraDeEventos))));
      }








      return $user;
    } catch (Exception $e) {
      dd($e);
      throw new Exception('Erro ao registrar a empresa: ' . $e->getMessage());
    }
  }
}