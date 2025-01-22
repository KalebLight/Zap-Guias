<div>
    @if ($specificData)
        <div class="border-t border-primary mt-2 pt-2">
            <p class="lg:partner-info text-sm font-medium underline">Informações Empresariais</p>
            <div class="lg:block flex flex-row  flex-wrap">

                @foreach ($specificData as $campo => $valor)
                    @if($valor !== "")
                        <p class="font-medium text-sm lg:mr-0 mr-4">
                            <span class="font-semibold">{{ ucfirst($campo) }}:</span>
                            <span class="font-light text-sm">{{ $valor }}</span>
                        </p>
                    @endif
                @endforeach



            </div>
        </div>
    @endif
</div>