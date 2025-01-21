<div>
    <p class="lg:partner-info text-sm font-medium underline">Campos Específicos</p>
    <ul>
        @foreach ($specificData as $campo => $valor)
            <li>
                <strong>{{ ucfirst($campo) }}:</strong> {{ $valor ?? 'Não informado' }}
            </li>
        @endforeach
    </ul>
</div>