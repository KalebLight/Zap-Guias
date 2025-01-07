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