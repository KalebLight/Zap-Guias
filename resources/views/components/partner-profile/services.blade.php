<div>
  <h2 class="text-primary font-black lg:text-5xl text-3xl lg:mt-1 lg:p-0 pt-2 mb-5 lg:border-none border-t border-primary">Menu</h2>

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