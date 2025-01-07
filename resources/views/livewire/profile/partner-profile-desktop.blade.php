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
      <h3 class="text-primary font-black text-7xl border-t border-primary text-right mb-5">{{$partner->nome_fantasia }}</h3>
    </div>

    <!-- right -->
    <div class="2xl:w-3/12 w-1/4 border-t border-primary">
      <div class=" mb-4">
        <p class='partner-label mb-1'>Restaurante</p>
        <p class="partner-info">{{$partner->municipio . '-' . $partner->uf}}</p>
      </div>
    </div>

  </div>

  <!-- main info -->
  <div class="flex flex-row overflow-hidden pt-2">

    <!-- left part -->
    <div class="2xl:w-3/12 w-1/4 mr-3">

      <!-- avaliação -->
      <div class=" border-y border-primary py-4">
        <div class="h-72 bg-cover bg-no-repeat bg-center" style="background-image: url('{{ asset('images/dev-photo-1.jpg') }}')"></div>
      </div>

      <p class="partner-info">“Adorei a comida! Super recomendo, fica perto do centro e tem um ambiente bem agradável.”</p>
      <p class="font-semibold text-base">- Márcia Andrade</p>


      <x-primary-button width="w-full" class='underline mt-8'>
        Avaliar
      </x-primary-button>
    </div>

    <!-- middle -->
    <div class=" 2xl:w-7/12 w-2/4 mr-3">
      <div class=" lg:h-[320px] h-[250px] bg-cover bg-no-repeat bg-center" style="background-image: url('{{ asset('images/hand-holding-plate.jpg') }}')"></div>
      <h2 class="text-primary font-black text-5xl mt-1 mb-5">Culinária {{$partner->especialidade}}</h2>
      <p class="partner-info pb-5 border-b border-primary">Apresentação. Lorem ipsum dolor sit amet. Non accusantium quia in minus autem sed repellat numquam nam amet quia id dicta adipisci qui tempora voluptatem sit molestias omnis. Vel dicta quod sit sint dolore sed Quis laudantium sit sequi neque est minima illo et aliquid labore et dolores quam. Et veniam consequatur 33 voluptatem tenetur ut internos aliquid est consequuntur debitis ut quasi laboriosam qui nobis perferendis.</p>

      <h2 class="text-primary font-black text-5xl mt-1 mb-5">Menu</h2>

      <!-- servicos -->
      <div class="flex flex-row flex-wrap w-full gap-1 justify-center">
        @foreach ($servicos as $servico)
      <div class="2xl:w-[266px] w-[208px]   p-2 cursor-pointer hover:bg-gray-200 rounded">
        <!-- Definimos o tamanho fixo da imagem com proporções relativas -->
        <div class="2xl:w-[248px] 2xl:h-[164px] w-[198px] h-[114px]  overflow-hidden flex items-center justify-center">
        <img src="{{ asset('images/' . $servico['foto']) }}" alt="{{ $servico['nome'] }}" class="w-full h-full object-cover">
        </div>
        <h3 class="partner-label mt-2">{{ $servico['nome'] }}</h3>
        <p class="text-sm text-primary">{{ $servico['descricao'] }}</p>
        <p class="font-bold text-primary text-base">R$ {{ $servico['valor'] }}</p>
      </div>
    @endforeach
      </div>


    </div>

    <!-- right part -->
    <div class="2xl:w-3/12 w-1/4">

      <!-- idiomas -->
      <div class="flex flex-col">
        @foreach($partner->idiomas as $idioma)
      <div class="rounded-full border border-primary px-6 py-2 w-fit mb-2">
        <p class="text-primary">{{ $idioma }}</p>
      </div>
    @endforeach
      </div>


      <!-- contato -->
      <div class="">
        <p class='partner-label'>Contato</p>
        <p class="partner-info">{{$partner->email_comercial}}</p>
        <p class="partner-info">{{$partner->website ?? 'teste.com.br'}}</p>
        <p class="partner-info">{{$partner->telefone ?? '(84) 99999-9999'}}</p>
      </div>

      <!-- Informações -->
      <div class="mt-16">
        <p class="partner-label">Informações</p>
        <p class="partner-info">Preço: $$</p>
        <div class="mt-1">
          <p class="partner-info">Funcionamento:</p>
          <p class="partner-info">Ter - Qui 17:00 - 22:00</p>
          <p class="partner-info">Sex - Dom 17:00 - 23:00</p>
        </div>

        <!-- formas de pagamento -->
        <div class="mt-1">
          <p class="partner-info">Formas de pagamento:</p>
          <p class="partner-info">Pix, Cartão de Crédito e de Débito.</p>
        </div>


      </div>
    </div>



  </div>

</div>