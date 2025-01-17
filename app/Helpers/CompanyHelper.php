<?php

namespace App\Helpers;

class CompanyHelper
{
  public static function findCompanyByCNPJ($cnpj)
  {
    $models = [
      \App\Models\Restaurante::class,
      \App\Models\Transportadora::class,
      \App\Models\MeioDeHospedagem::class,
      \App\Models\CentroDeConvencoes::class,
      \App\Models\AgenciasDeTurismo::class,
      \App\Models\ParqueAquaticoEEmpreendimentoDeLazer::class,
      \App\Models\ParqueTematico::class,
      \App\Models\LocadoraDeVeiculosParaTuristas::class,
      \App\Models\AcampamentoTuristico::class,
      \App\Models\CasaDeEspetaculos::class,
      \App\Models\OrganizadoraDeEventos::class,
      \App\Models\TurismoNautico::class,
    ];

    foreach ($models as $model) {
      $empresa = $model::where('cnpj', $cnpj)->first();
      if ($empresa) {
        return $empresa;
      }
    }

    return null;
  }
}
