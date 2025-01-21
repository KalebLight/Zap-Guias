<div>
    @if ($specificData)
        <div class="border-t border-primary mt-2 pt-2">
            <p class="lg:partner-info text-sm font-medium underline">Informações Empresariais</p>
            <div class="lg:block flex flex-row  flex-wrap">

                @foreach ($specificData as $campo => $valor)
                    <div class="flex flex-row lg:mr-0  mr-4 font-medium text-sm">
                        <p class="mr-1 text-nowrap">{{ ucfirst($campo) }}:</p> {{ $valor ?? 'Não informado' }}
                    </div>
                @endforeach

            </div>
        </div>
    @endif
</div>