<div class="lg:mt-16">
  <p class="lg:partner-label text-sm underline font-medium">Informações</p>
  <p class="partner-info lg:block hidden ">Preço: $$</p>
  @isset($partner->funcionamento)
    <div class="mt-1">
    <p class="lg:partner-info text-sm font-medium">Funcionamento:</p>
    @foreach(formatarHorario(json_decode($partner->funcionamento, true)) as $horario)
    <p class="lg:partner-info text-sm font-medium">{{ $horario['dias'] }} {{ $horario['horario'] }}</p>
  @endforeach
    </div>
  @endisset
  <!-- formas de pagamento -->
  <div class=" mt-1 pb-3 lg:border-b lg:border-primary">
    @php
    $formasPagamento = json_decode($partner->formas_de_pagamento, true);
  @endphp

    @if(array_filter($formasPagamento))
    <div>
      <p class="lg:partner-info text-sm font-medium">Formas de pagamento:</p>
      <p class="lg:partner-info text-sm font-medium">
      @foreach($formasPagamento as $forma => $ativa)
      @if($ativa)
      {{ ucfirst($forma) }}@if(!$loop->last), @endif
    @endif
    @endforeach
      </p>
    </div>
  @endif

  </div>
</div>