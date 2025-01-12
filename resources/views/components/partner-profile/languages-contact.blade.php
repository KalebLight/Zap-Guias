<div class="flex lg:flex-col flex-row w-full justify-between">

  <div class="flex lg:flex-col flex-row lg:gap-0 sm:gap-2 gap-1 flex-wrap w-fit">
    @isset($partner->idiomas)
    @foreach($partner->idiomas as $idioma)
    <div class="rounded-full border border-primary sm:px-6 px-4 sm:py-2 w-fit mb-2 sm:h-[44px] h-9 grid place-items-center">
      <p class="text-primary sm:text-base text-sm">{{ $idioma }}</p>
    </div>
  @endforeach
  @endisset
  </div>


  <!-- contato -->
  <div class="lg:ml-0 ml-2 wrap">
    <p class='partner-label whitespace-nowrap lg:text-left text-right'>Contato</p>
    @isset($partner->email_comercial)
    <p class="partner-info whitespace-nowrap lg:text-left text-right">{{$partner->email_comercial}}</p>
  @endisset
    @isset($partner->website)
    <p class="partner-info whitespace-nowrap lg:text-left text-right">{{$partner->website}}</p>
  @endisset
    @isset($partner->telefone)
    <p class="partner-info whitespace-nowrap lg:text-left text-right">{{$partner->telefone ?? '(84) 99999-9999'}}</p>
  @endisset

  </div>
</div>