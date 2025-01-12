<div class="lg:mt-16">
  <p class="lg:partner-label text-sm underline font-medium">Informações</p>
  <p class="partner-info lg:block hidden ">Preço: $$</p>
  <div class="mt-1">
    <p class="lg:partner-info text-sm font-medium">Funcionamento:</p>
    @foreach(formatarHorario(json_decode($partner->funcionamento, true)) as $horario)
    <p class="lg:partner-info text-sm font-medium">{{ $horario['dias'] }} {{ $horario['horario'] }}</p>
  @endforeach
  </div>
  <!-- formas de pagamento -->
  <div class=" mt-1 pb-3 lg:border-b lg:border-primary">
    <p class="lg:partner-info text-sm font-medium">Formas de pagamento:</p>
    <p class="lg:partner-info text-sm font-medium">
      @foreach(json_decode($partner->formas_de_pagamento, true) as $forma => $ativa)
      @if($ativa)
      {{ ucfirst($forma) }}@if(!$loop->last), @endif
    @endif
    @endforeach
    </p>
  </div>
</div>