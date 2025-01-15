<?php

use Livewire\Volt\Component;

new class extends Component {
  public $partner = [];
  public function getIsOwnerProperty(): bool
  {
    return Auth::check() && $this->partner['cnpj'] === Auth::user()->cnpj;
  }
  public $servicos = [
    [
      "nome" => "Baklava",
      "descricao" => "Recheado de nozes",
      "valor" => 20,
      "foto" => "baklava.jpg"
    ],
    [
      "nome" => "Tajine",
      "descricao" => "Cordeiro servido com salada de grão de bico",
      "valor" => 25,
      "foto" => "tajine.jpg"
    ],
    [
      "nome" => "Hummus",
      "descricao" => "Purê de grão-de-bico com azeite",
      "valor" => 15,
      "foto" => "hummus.png"
    ],
    [
      "nome" => "Kebab",
      "descricao" => "Carne grelhada com especiarias",
      "valor" => 30,
      "foto" => "kebab.jpg"
    ],
    [
      "nome" => "Falafel",
      "descricao" => "Bolinhos de grão-de-bico fritos",
      "valor" => 18,
      "foto" => "falafel.jpg"
    ],
    [
      "nome" => "Gyro",
      "descricao" => "Carne grelhada com queijo e legumes",
      "valor" => 28,
      "foto" => "gyro.jpg"
    ]
  ];

  public function mount($partner)
  {
    // Inicialização do componente
  }
}; 
?>

<div class="px-[30px] ">
  @include('components.partner-profile.name', ['nome_fantasia' => $partner->nome_fantasia])
  @include('components.partner-profile.small-info', ['municipio' => $partner->municipio, 'uf' => $partner->uf])

  <div class="lg:h-[320px] h-[250px] bg-cover bg-no-repeat bg-center" style="background-image: url('{{ asset('images/hand-holding-plate.jpg') }}')"></div>
  @include('components.partner-profile.subtitle', ['especialidade' => $partner->especialidade, 'bio' => $partner->bio])

  @include('components.partner-profile.reviews', ['especialidade' => $partner->especialidade])

  @include('components.partner-profile.languages-contact', ['partner' => $partner])

  <!-- Modal adicionado aqui -->


  <div class="w-1/2">
    @include('components.partner-profile.info-payment', ['partner' => $partner])
    <!-- componente de mapa -->
  </div>
  <div>
    @if ($this->isOwner)
    <x-custom-secondary-button width="w-full" class="underline mt-1 mb-3" wire:click="$dispatch('openModal')">
      Adicionar Informações
    </x-custom-secondary-button>
  @endif

    <!-- Modal Component -->
    @livewire('modal-info-edit', ['id' => 'modal-1'], key('modal-info-edit'))
  </div>
  @include('components.partner-profile.services', ['servicos' => $servicos])
</div>