<?php

use Livewire\Volt\Component;

new class extends Component {
  public $partner;


  public function mount()
  {

  }
}; ?>

<div class="2xl:w-[266px] w-[208px] p-2 cursor-pointer hover:bg-gray-200 rounded relative shadow-md">
  @if (!Auth::user()->cnpj)
    <div class="absolute top-4 right-4">
    <livewire:favoritar-partner :partner-id="$partner->id" :partner-type="get_class($partner)" />
    </div>
  @endif


  <div class="2xl:w-[248px] 2xl:h-[164px] w-full h-[114px] overflow-hidden flex items-center justify-center">
    @if(isset($partner['foto_perfil']))
    <img src="{{ asset('storage/' . $partner['foto_perfil']) }}" alt="{{ $partner['nome_fantasia'] }}" class="w-full h-full object-cover">
  @endif
  </div>
  <h3 class="partner-label mt-2">{{ $partner['nome_fantasia'] }}</h3>

</div>