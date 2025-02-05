<?php

use Livewire\Volt\Component;

new class extends Component {
  public $service;

}; ?>

<div class="border-t border-primary pt-1">

  <div class="2xl:w-[266px] lg:w-[208px] w-[180px] p-2 cursor-pointer hover:bg-gray-200 rounded relative shadow-md">

    @if (!Auth::user()->cnpj)
    <div class="absolute top-4 right-4">
      @livewire('favoritar-servico', ['service' => $service])
    </div>
  @endif

    <div class="2xl:w-[248px] 2xl:h-[164px] w-full h-[114px] overflow-hidden flex items-center justify-center">
      @if(isset($service['foto_servico']))
      <img src="{{ asset('storage/' . $service['foto_servico']) }}" alt="{{ $service['titulo'] }}" class="w-full h-full object-cover">
    @endif
    </div>
    <h3 class="partner-label mt-2">{{ $service['titulo'] }}</h3>
    @if(isset($service['preco']) && $service['preco'] != 0)
    <p class="font-bold text-primary text-base">R$ {{ number_format($service['preco'], 2, ',', '.') }}</p>
  @endif

  </div>
</div>