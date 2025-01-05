<div class="bg-danger h-full">
    <h1>{{ $partner->nome_fantasia }}</h1>
    <p><strong>Tipo:</strong> {{ class_basename($partner) }}</p>
    <p><strong>CNPJ:</strong> {{ $partner->cnpj }}</p>
</div>