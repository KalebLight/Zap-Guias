<?php

use Livewire\Volt\Component;

new class extends Component {
  public $partner = [];
  public $services;
  public $formasDePagamento;

  public function getIsOwnerProperty(): bool
  {
    return Auth::check() && $this->partner['cnpj'] === Auth::user()->cnpj;
  }

}; ?>

<div class="px-[30px]">

  <div class="w-full flex justify-between">

    <!-- edit name slug modal -->
    @if ($this->isOwner)
    <div class="cursor-pointer rounded-md hover:bg-gray-200 p-1 h-fit flex items-center justify-center mt-2">
      <img src="{{ asset('images/edit-icon.png') }}" alt="Editar" class="object-contain min-w-[25px] min-h-[25px]" wire:click="$dispatch('openModalNameSlugEdit')">
    </div>
  @endif

    @if (!Auth::user()->cnpj)
    <div class="p-1 hover:bg-slate-300 h-fit rounded mt-1">
      <livewire:favoritar-partner :partner-id="$partner->id" :partner-type="get_class($partner)" />
    </div>
  @endif
    <div>
      @livewire('modal-name-slug-edit', ['partner' => $partner])
    </div>


    <div class="w-[90%]">
      @include('components.partner-profile.name', ['nome_fantasia' => $partner->nome_fantasia])
    </div>
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
  @if ($this->isOwner)
    <x-primary-button width="w-full" class="underline mt-1" wire:click="$dispatch('openModalSpecificData')">
    {{ $partner->dados_especificos ? 'Editar Dados Empresariais' : 'Adicionar Dados Empresariais' }}
    </x-primary-button>
  @endif
  @livewire('edit-specific-fields', ['partner' => $partner])

  <!-- services -->
  @include('components.partner-profile.services', ['services' => $services, 'class' => class_basename($partner), 'isOwner' => $this->isOwner])
</div>