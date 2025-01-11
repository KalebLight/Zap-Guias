<?php

namespace App\Livewire;

use Livewire\Component;

class ModalInfoEdit extends Component
{
  public string $id;
  public ?string $footer = null;

  public bool $credito = false;
  public bool $pix = false;
  public bool $boleto = false;
  public bool $debito = false;
  protected $listeners = ['openModal', 'closeModal'];
  public bool $isOpen = false;
  // Método para abrir o modal
  public function openModal()
  {
    $this->isOpen = true;
  }

  // Método para fechar o modal
  public function closeModal()
  {
    $this->isOpen = false;
  }

  // Propriedade para armazenar os horários
  public $schedule = [
    'Segunda-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Terça-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Quarta-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Quinta-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Sexta-feira' => ['active' => false, 'from' => '', 'to' => ''],
    'Sábado' => ['active' => false, 'from' => '', 'to' => ''],
    'Domingo' => ['active' => false, 'from' => '', 'to' => ''],
  ];


  public function saveSchedule()
  {
    dd($this->schedule);
  }

  public function render()
  {
    return view('components.modal-info-edit');
  }
}
