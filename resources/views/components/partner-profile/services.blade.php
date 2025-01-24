<div class="mt-4">
  <div class="w-full flex flex-row justify-between mb-2  border-t border-primary">
    <h2 class="text-primary  font-black lg:text-5xl text-3xl lg:mt-1 lg:p-0 pt-2 mb-5 ">{{getServicosLabel($class)}}</h2>
    @if ($isOwner)

    <a href="{{ route('servicos.create')}}">
      <x-primary-button width="" class="underline mt-2 xs:ml-0 ml-2" wire:click="$dispatch('openAddressModal')">
      Adicionar Serviços
      </x-primary-button>
    </a>

  @endif
  </div>
  <!-- servicos -->
  @if ($services)

    <div class="flex flex-row flex-wrap w-full gap-1 justify-center">
    @foreach ($services as $service)
    <div class="2xl:w-[266px] w-[208px]   p-2 cursor-pointer hover:bg-gray-200 rounded">
      <!-- Definimos o tamanho fixo da imagem com proporções relativas -->
      <div class="2xl:w-[248px] 2xl:h-[164px] w-[198px] h-[114px]  overflow-hidden flex items-center justify-center">
      <img src="{{ asset('storage/' . $service['foto_servico']) }}" alt="{{ $service['titulo'] }}" class="w-full h-full object-cover">
      </div>

      <h3 class="partner-label mt-2">{{ $service['titulo'] }}</h3>
      <p class="text-sm text-primary">{{ $service['descricao'] }}</p>
      <p class="font-bold text-primary text-base">R$ {{ $service['preco'] }}</p>
    </div>
  @endforeach
    </div>
  @else
    <p class="text-primary sm:text-base text-sm">Nenhum serviço registrado.</p>

  @endif

</div>