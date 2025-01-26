<?php

use Livewire\Volt\Component;

new class extends Component {
  public $service;

  public function getEmpresaSlug()
  {
    // Acessando o relacionamento polimórfico para buscar a empresa
    return $this->service->empresa->slug ?? null;
  }
};
?>

<div class="2xl:w-[246px] w-[190px] p-2 rounded">
  <a href="{{ $this->getEmpresaSlug() ? route('partner.profile', ['slug' => $this->getEmpresaSlug()]) : '#' }}" class="block">
    <div class="aspect-square w-full overflow-hidden flex items-center justify-center bg-gray-100">
      @if(isset($service['foto_servico']))
      <img src="{{ asset('storage/' . $service['foto_servico']) }}" alt="{{ $service['titulo'] }}" class="w-full h-full object-cover">
    @endif
    </div>
    <div class="flex flex-row">
      <div class="w-3/4">
        <h3 class="text-base font-normal">{{ $service['titulo'] }}</h3>
      </div>

      @if(isset($service['preco']) && $service['preco'] != 0)
      <p class="font-bold text-secondary text-base text-nowrap">R$ {{ number_format($service['preco'], 2, ',', '.') }}</p>
    @endif
    </div>
  </a>
</div>