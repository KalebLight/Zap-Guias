<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Validator;

class ModalInfoEdit extends Component
{
  public bool $isOpen = false;
  public string $id;
  public bool $credito = false;
  public bool $pix = false;
  public bool $boleto = false;
  public bool $debito = false;
  public string $instagram = '';
  public string $facebook = '';

  public $schedule = [
    'Segunda-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Terça-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Quarta-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Quinta-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Sexta-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Sábado' => ['active' => false, 'from' => '', 'to' => ''],
    'Domingo' => ['active' => false, 'from' => '', 'to' => ''],
  ];

  protected $listeners = ['openModal', 'closeModal'];

  public function mount()
  {
    $user = Auth::user();

    if (!$user || !$user->cnpj) {
      session()->flash('error', 'Não foi possível encontrar o CNPJ vinculado ao usuário.');
      return;
    }

    $models = [
      \App\Models\Restaurante::class,
      \App\Models\Transportadora::class,
      \App\Models\MeioDeHospedagem::class,
      \App\Models\CentroDeConvencoes::class,
      \App\Models\AgenciasDeTurismo::class,
      \App\Models\GuiaDeTurismo::class,
      \App\Models\ParqueAquaticoEEmpreendimentoDeLazer::class,
      \App\Models\ParqueTematico::class,
      \App\Models\LocadoraDeVeiculosParaTuristas::class,
      \App\Models\AcampamentoTuristico::class,
      \App\Models\CasaDeEspetaculos::class,
      \App\Models\OrganizadoraDeEventos::class,
      \App\Models\TurismoNautico::class,
    ];

    foreach ($models as $model) {
      $empresa = $model::where('cnpj', $user->cnpj)->first();
      if ($empresa) {
        $formasDePagamento = $empresa->formas_de_pagamento ? json_decode($empresa->formas_de_pagamento, true) : [];


        $this->facebook = $empresa->facebook ?? '';
        $this->instagram = $empresa->instagram ?? '';

        $this->credito = $formasDePagamento['credito'] ?? false;
        $this->pix = $formasDePagamento['pix'] ?? false;
        $this->boleto = $formasDePagamento['boleto'] ?? false;
        $this->debito = $formasDePagamento['debito'] ?? false;

        $this->schedule = $empresa->funcionamento ? json_decode($empresa->funcionamento, true) : $this->schedule;
        break;
      }
    }
  }

  public function openModal()
  {
    $this->isOpen = true;
  }

  public function closeModal()
  {
    $this->isOpen = false;
  }

  public function saveData()
  {
    $user = Auth::user();

    if (!$user || !$user->cnpj) {
      session()->flash('error', 'Não foi possível encontrar o CNPJ vinculado ao usuário.');
      return;
    }
    foreach ($this->schedule as $dia => $horario) {
      if (!$horario['active']) {
        continue;
      }

      if (empty($horario['from']) || empty($horario['to'])) {
        $this->addError('funcionamento', 'O horário de início e término são obrigatórios.');
        return;
      }

      if (strtotime($horario['to']) <= strtotime($horario['from'])) {
        $this->addError('funcionamento', 'O horário de término de todas as datas deve ser posterior ao horário de início.');
        return;
      }
    }






    $models = [
      \App\Models\Restaurante::class,
      \App\Models\Transportadora::class,
      \App\Models\MeioDeHospedagem::class,
      \App\Models\CentroDeConvencoes::class,
      \App\Models\AgenciasDeTurismo::class,
      \App\Models\GuiaDeTurismo::class,
      \App\Models\ParqueAquaticoEEmpreendimentoDeLazer::class,
      \App\Models\ParqueTematico::class,
      \App\Models\LocadoraDeVeiculosParaTuristas::class,
      \App\Models\AcampamentoTuristico::class,
      \App\Models\CasaDeEspetaculos::class,
      \App\Models\OrganizadoraDeEventos::class,
      \App\Models\TurismoNautico::class,
    ];



    foreach ($models as $model) {
      $empresa = $model::where('cnpj', $user->cnpj)->first();
      if ($empresa) {
        break;
      }
    }

    if (!$empresa) {
      session()->flash('error', 'Nenhuma empresa foi encontrada para o CNPJ vinculado ao usuário.');
      return;
    }

    $empresa->update([
      'facebook' => $this->facebook,
      'instagram' => $this->instagram,
      'formas_de_pagamento' => json_encode([
        'credito' => $this->credito,
        'pix' => $this->pix,
        'boleto' => $this->boleto,
        'debito' => $this->debito,
      ]),
      'funcionamento' => json_encode($this->schedule),
    ]);

    $this->closeModal();
    session()->flash('success', 'Informações atualizadas com sucesso.');
  }

  public function render()
  {
    return view('components.modal-info-edit');
  }
}
