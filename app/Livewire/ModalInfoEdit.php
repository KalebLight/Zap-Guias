<?php

namespace App\Livewire;

use App\Helpers\CompanyHelper;
use Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Validator;

class ModalInfoEdit extends Component
{
  public $partner;
  public bool $isOpen = false;
  public string $id;
  public bool $credito = false;
  public bool $pix = false;
  public bool $boleto = false;
  public bool $debito = false;
  public string $instagram = '';
  public string $facebook = '';
  public string $whatsapp = '';
  public string $website = '';
  public bool $idiomasOpen = false;
  public array $selectedIdiomas = []; // Idiomas selecionados
  public array $idiomasList = [
    'Português',
    'Inglês',
    'Espanhol',
    'Francês',
    'Alemão',
    'Italiano',
    'Japonês',
    'Grego',
    'Arábe',
    'Mandarim',
    'Russo',
    'Hebraico',
    'Dinamarquês',
    'Norueguês',
    'Turco',
    'Ucraniano',
    'Polonês',
    'Sueco',
    'Coreano',
    'Húngaro',
    'Holandês',
    'Guarani',
    'Libras',
    'Armênio',
    'Búlgaro',
    'Esperanto',
    'Finlandês',
    'Suiço',
    'Catalão',
    'Persa',
  ];
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
  public function toggleIdiomas()
  {
    $this->idiomasOpen = !$this->idiomasOpen;
  }

  public function mount()
  {

    if ($this->partner != null) {
      $formasDePagamento = $this->partner->formas_de_pagamento ? json_decode($this->partner->formas_de_pagamento, true) : [];
      $this->selectedIdiomas = $this->partner->idiomas ? json_decode($this->partner->idiomas, true) : [];
      $this->facebook = $this->partner->facebook ?? '';
      $this->instagram = $this->partner->instagram ?? '';
      $this->whatsapp = $this->partner->whatsapp ?? '';
      $this->website = $this->partner->website ?? '';

      $this->credito = $formasDePagamento['credito'] ?? false;
      $this->pix = $formasDePagamento['pix'] ?? false;
      $this->boleto = $formasDePagamento['boleto'] ?? false;
      $this->debito = $formasDePagamento['debito'] ?? false;

      $this->schedule = $this->partner->funcionamento ? json_decode($this->partner->funcionamento, true) : $this->schedule;
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
    if ($this->partner === null) {
      Toaster::error('Erro!');
      return;
    }

    //validação de funcionamento
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

    // validação do WhatsApp
    if ($this->whatsapp) {
      $whatsapp = str_replace(['(', ')', '-', ' '], '', $this->whatsapp);
      if (strpos($whatsapp, '+55') === 0) {
        $whatsapp = substr($whatsapp, 3);
      }
      if (!preg_match('/^\d{11}$/', $whatsapp)) {
        $this->addError('redes_sociais', 'Número do WhatsApp inválido. Utilize o formato +55(DD)XXXXX-XXXX.');
        return;
      }
      $this->whatsapp = '+55' . substr($whatsapp, 0, 2) . substr($whatsapp, 2);
    }
    $partner = CompanyHelper::findCompanyByCNPJ($user->cnpj);

    if (!$partner) {
      session()->flash('error', 'Nenhuma partner foi encontrada para o CNPJ vinculado ao usuário.');
      return;
    }

    $partner->update([
      'facebook' => $this->facebook,
      'instagram' => $this->instagram,
      'whatsapp' => $this->whatsapp,
      'website' => $this->website,
      'idiomas' => json_encode($this->selectedIdiomas),
      'formas_de_pagamento' => json_encode([
        'credito' => $this->credito,
        'pix' => $this->pix,
        'boleto' => $this->boleto,
        'debito' => $this->debito,
      ]),
      'funcionamento' => json_encode($this->schedule),
    ]);

    Toaster::success('Dados salvos com sucesso');

    return redirect(request()->header('Referer'))->with('success', 'Informações atualizadas com sucesso.');
  }

  public function render()
  {
    return view('components.modal-info-edit');
  }
}
