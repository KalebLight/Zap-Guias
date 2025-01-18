@if ($partner->endereco)
  <div class="lg:mt-2">
    <a href="https://www.google.com/maps/search/{{$endereco->logradouro}},+{{$endereco->numero}}+-+{{$endereco->bairro}},+{{$endereco->cidade}}+-+{{$endereco->estado}}+{{$endereco->cep}}" target="_blank">
    <p class="leading-none text-primary font-medium lg:no-underline hover:underline lg:text-left underline text-right">
      {{$endereco->logradouro}}, {{$endereco->numero}} - {{$endereco->bairro}}<br>
      {{$endereco->cidade}} - {{$endereco->estado}}<br>
      CEP: {{$endereco->cep}}
    </p>
    </a>
  </div>
@endif