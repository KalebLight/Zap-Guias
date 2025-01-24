<?php

namespace App\Helpers;

class CompanyHelper
{
  protected static array $models = [
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

  public static function getModels()
  {
    return self::$models;
  }


  /**
   * Busca uma empresa pelo CNPJ.
   *
   * @param string $cnpj
   * @return mixed|null
   */
  public static function findCompanyByCNPJ(string $cnpj)
  {
    foreach (self::$models as $model) {
      $empresa = $model::where('cnpj', $cnpj)->first();
      if ($empresa) {
        return $empresa;
      }
    }

    return null;
  }

  /**
   * Verifica se um slug já é usado em alguma empresa.
   *
   * @param string $slug
   * @return bool
   */
  public static function isSlugUsed(string $slug): bool
  {
    foreach (self::$models as $model) {
      $empresa = $model::where('slug', $slug)->first();
      if ($empresa) {
        return true;
      }
    }

    return false;
  }
}
