<?php

use Livewire\Volt\Component;

new class extends Component {
  public $partner = [];
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
    // dd($this->partner);
  }


}; ?>


<div class="2xl:px-[188px] px-[80px]">

  <!-- first row of elements -->
  <div class="flex row">
    <!-- left part -->
    <div class="2xl:w-3/12 w-1/4 mr-3">
      <a class="leading-[4px] text-sm underline font-medium" href="/">
        Voltar para a PESQUISA
      </a>
    </div>

    <!-- middle -->
    <div class="2xl:w-7/12 w-2/4 mr-3">
      @include('components.partner-profile.name', ['nome_fantasia' => $partner->nome_fantasia])

      <!-- <h3 class="text-primary font-black text-7xl border-t border-primary text-right mb-5">{{$partner->nome_fantasia }}</h3> -->
    </div>

    <!-- right -->
    <div class="2xl:w-3/12 w-1/4 border-t border-primary">
      @include('components.partner-profile.small-info', ['municipio' => $partner->municipio, 'uf' => $partner->uf])
    </div>

  </div>

  <!-- main info -->
  <div class="flex flex-row overflow-hidden pt-2">

    <!-- left part -->
    <div class="2xl:w-3/12 w-1/4 mr-3">

      <!-- avaliação -->
      @include('components.partner-profile.reviews', ['especialidade' => $partner->especialidade])
    </div>

    <!-- middle -->
    <div class=" 2xl:w-7/12 w-2/4 mr-3">
      <div class=" lg:h-[320px] h-[250px] bg-cover bg-no-repeat bg-center" style="background-image: url('{{ asset('images/hand-holding-plate.jpg') }}')"></div>
      @include('components.partner-profile.subtitle', ['especialidade' => $partner->especialidade])
      @include('components.partner-profile.services', ['servicos' => $servicos])
    </div>

    <!-- right part -->
    <div class="2xl:w-3/12 w-1/4">
      @include('components.partner-profile.languages-contact', ['partner' => $partner])
      @include('components.partner-profile.info-payment', ['partner' => $partner])
    </div>

  </div>

</div>