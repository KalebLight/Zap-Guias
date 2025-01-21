<?php

use Livewire\Volt\Component;

new class extends Component {
  public $partner = [];
  public $formasDePagamento;

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

}; ?>

<div class="px-[30px]">

  <div class="w-full flex justify-between">

    <!-- edit name slug modal -->
    @if ($this->isOwner)
    <div class="cursor-pointer rounded-md hover:bg-gray-200 p-1 h-fit flex items-center justify-center mt-2">
      <img src="{{ asset('images/edit-icon.png') }}" alt="Editar" class="object-contain min-w-[25px] min-h-[25px]" wire:click="$dispatch('openModalNameSlugEdit')">
    </div>
  @endif
    <div>
      @livewire('modal-name-slug-edit', ['partner' => $partner])
    </div>

    <!-- name -->
    @include('components.partner-profile.name', ['nome_fantasia' => $partner->nome_fantasia])
  </div>
  <!-- small info -->
  @include('components.partner-profile.small-info', ['municipio' => $partner->municipio, 'uf' => $partner->uf, 'class' => class_basename($partner)])

  <!-- main photo -->
  <div class="lg:h-[320px] h-[250px] bg-cover bg-no-repeat bg-center" style="background-image: url('{{ $partner->foto_perfil ? asset('storage/' . $partner->foto_perfil) : asset('images/hand-holding-plate.jpg') }}')">
  </div>
  <!-- bio -->
  @include('components.partner-profile.subtitle', ['especialidade' => $partner->especialidade, 'bio' => $partner->bio, 'class' => class_basename($partner)])

  <!-- edit bio modal -->
  @if ($this->isOwner)
    <x-primary-button width="w-full" class="underline" wire:click="$dispatch('openModalBioEdit')">
    {{ !empty($partner->bio) ? 'Editar Bio' : 'Adicionar Bio' }}
    </x-primary-button>
  @endif
  @livewire('modal-bio-edit', ['partner' => $partner])

  <!-- reviews -->
  @include('components.partner-profile.reviews', ['isOwner' => $this->isOwner])

  <!-- languages -->
  @include('components.partner-profile.languages-contact', ['partner' => $partner])

  <!-- info and payment -->
  <div class="w-full flex flex-row justify-between mt-2">
    <div class="w-1/2">
      @include('components.partner-profile.info-payment', ['partner' => $partner, 'formasDePagamento' => $formasDePagamento]) 
    </div>

    <div class="w-1/2 flex flex-col items-end">
      @include('components.partner-profile.address', ['endereco' => json_decode($partner->endereco)])

      <!-- edit address modal -->
      @if ($this->isOwner)
      <x-primary-button width="w-3/4" class="underline mt-2" wire:click="$dispatch('openAddressModal')">
      {{ !empty($partner->endereco) ? 'Editar Endereço' : 'Adicionar Endereço' }}
      </x-primary-button>
      @livewire('modal-address-edit', ['partner' => $partner])  
  @endif
    </div>

  </div>

  <!-- modal info edit-->
  <div>
    @if ($this->isOwner)
    <x-custom-secondary-button width="w-full" class="underline mt-4 mb-3" wire:click="$dispatch('openModal')">
      Adicionar Informações
    </x-custom-secondary-button>
  @endif
    @livewire('modal-info-edit', ['partner' => $partner])    

  </div>


  @livewire('show-specific-fields', ['partner' => $partner])

  <!-- services -->
  @include('components.partner-profile.services', ['servicos' => $servicos])
</div>