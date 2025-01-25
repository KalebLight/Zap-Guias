<div class="mt-4">
  <div class="w-full flex flex-row justify-between mb-2  border-t border-primary">
    <h2 class="text-primary  font-black lg:text-5xl text-3xl lg:mt-1 lg:p-0 pt-2 mb-5 ">{{getServicosLabel($class)}}</h2>
    @if ($isOwner)

    <a href="{{ route('servicos.create', ['referer' => url()->current()]) }}">

      <x-primary-button width="" class="underline mt-2 xs:ml-0 ml-2">
      Adicionar Serviços
      </x-primary-button>
    </a>

  @endif
  </div>
  <!-- servicos -->
  @if ($services)

    <div class="flex flex-row flex-wrap w-full gap-1 justify-center">
    @foreach ($services as $service)
    <livewire:components.service-profile :service="$service" />
  @endforeach



    </div>
  @else
    <p class="text-primary sm:text-base text-sm">Nenhum serviço registrado.</p>

  @endif

</div>