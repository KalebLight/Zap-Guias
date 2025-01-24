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


<div class="2xl:px-[188px] px-[80px]">

  <!-- first row of elements -->
  <div class="flex row">
    <!-- left part -->
    <div class="2xl:w-3/12 w-1/4 mr-3  flex flex-col justify-between pb-3">
      <a class="leading-[4px] text-sm underline font-medium" href="/">
        Voltar para a PESQUISA
      </a>

      <div class="w-full px-6">

        <div>
          @if ($this->isOwner)
        <!-- Botão para abrir o modal -->
        <x-custom-secondary-button width="w-full" class="underline" wire:click="$dispatch('openModal')">
        Adicionar Informações
        </x-custom-secondary-button>
      @endif

          <!-- Modal Component -->
          @livewire('modal-info-edit', ['partner' => $partner])
        </div>


      </div>
    </div>

    <!-- middle -->
    <div class="2xl:w-7/12 w-2/4 mr-3 border-t border-primary">

      <div class="flex flex-row w-full justify-between">
        @if ($this->isOwner)
      <div class="cursor-pointer rounded-md hover:bg-gray-200 p-1 h-fit flex items-center justify-center mt-2">
        <img src="{{ asset('images/edit-icon.png') }}" alt="Editar" class="object-contain min-w-[25px] min-h-[25px]" wire:click="$dispatch('openModalNameSlugEdit')">
      </div>

    @endif

        @include('components.partner-profile.name', ['nome_fantasia' => $partner->nome_fantasia])
      </div>

      <div>
        <!-- Modal Component -->
        @livewire('modal-name-slug-edit', ['partner' => $partner])
      </div>
    </div>

    <!-- right -->
    <div class="2xl:w-3/12 w-1/4 border-t border-primary">
      @include('components.partner-profile.small-info', ['municipio' => $partner->municipio, 'uf' => $partner->uf, 'class' => class_basename($partner)])
    </div>

  </div>

  <!-- main info -->
  <div class="flex flex-row overflow-hidden pt-2">

    <!-- left part -->
    <div class="2xl:w-3/12 w-1/4 mr-3">

      <!-- avaliação -->
      @include('components.partner-profile.reviews', ['isOwner' => $this->isOwner])

      <!-- specific fields -->
      @livewire('show-specific-fields', ['partner' => $partner])

      @if ($this->isOwner)
      <x-primary-button width="w-full" class="underline mt-1" wire:click="$dispatch('openModalSpecificData')">
      {{ $partner->dados_especificos ? 'Editar Dados Empresariais' : 'Adicionar Dados Empresariais' }}
      </x-primary-button>
    @endif
      @livewire('edit-specific-fields', ['partner' => $partner])

    </div>

    <!-- middle -->
    <div class=" 2xl:w-7/12 w-2/4 mr-3">
      <div class="lg:h-[320px] h-[250px] bg-cover bg-no-repeat bg-center" style="background-image: url('{{ $partner->foto_perfil ? asset('storage/' . $partner->foto_perfil) : asset('images/hand-holding-plate.jpg') }}')">
      </div>


      @include('components.partner-profile.subtitle', ['especialidade' => $partner->especialidade, 'bio' => $partner->bio, 'class' => class_basename($partner)])

      @if ($this->isOwner)
      <x-primary-button width="w-full" class="underline" wire:click="$dispatch('openModalBioEdit')">
      {{ !empty($partner->bio) ? 'Editar Bio' : 'Adicionar Bio' }}
      </x-primary-button>
    @endif

      @livewire('modal-bio-edit', ['partner' => $partner])

      @include('components.partner-profile.services', ['services' => $services, 'class' => class_basename($partner), 'isOwner' => $this->isOwner])

    </div>

    <!-- right part -->
    <div class="2xl:w-3/12 w-1/4">
      @include('components.partner-profile.languages-contact', ['partner' => $partner])
      @include('components.partner-profile.info-payment', ['partner' => $partner, 'formasDePagamento' => $formasDePagamento])

      @include('components.partner-profile.address', ['endereco' => json_decode($partner->endereco)])

      <!-- address -->
      @if ($this->isOwner)
      <x-primary-button width="w-3/4" class="underline mt-2" wire:click="$dispatch('openAddressModal')">
      {{ !empty($partner->endereco) ? 'Editar Endereço' : 'Adicionar Endereço' }}
      </x-primary-button>
    @livewire('modal-address-edit', ['partner' => $partner])  @endif





    </div>

  </div>

</div>