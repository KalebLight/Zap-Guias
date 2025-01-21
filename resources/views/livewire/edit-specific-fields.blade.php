<div>
    @if ($isOpen)
        <!-- Overlay -->
        <div class="fixed inset-0 z-50 flex justify-center items-center ss:p-0 px-3">
            <!-- Background Overlay -->
            <div class="absolute inset-0 bg-gray-400 opacity-55 transition-opacity" wire:click="closeModalSpecificData"></div>

            <!-- Modal Container -->
            <div class="relative flex flex-col w-full max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden" style="max-height: calc(100vh - 64px); margin-top: 32px; margin-bottom: 32px;">
                <!-- Close Button -->
                <button type="button" wire:click="closeModalSpecificData" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex-1 overflow-y-auto px-5 pt-5 pb-5 scrollbar scrollbar-thumb-secondary scrollbar-track-gray-200">





                    <div>
                        <h4 class="underline text-primary text-left font-medium">Editar Dados Específicos</h4>
                        <form wire:submit.prevent="atualizar">
                            <div class="flex flex-col">
                                @foreach ($schema as $campo => $detalhes)
                                    <label for="{{ $campo }}" class="text-primary font-medium text-sm mt-2">
                                        {{ $detalhes['label'] }}
                                    </label>

                                    @if ($detalhes['tipo'] === 'text')
                                        <input type="text" wire:model.defer="dadosEspecificos.{{ $campo }}" value="{{ $dadosEspecificos[$campo] ?? '' }}" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60">
                                    @elseif ($detalhes['tipo'] === 'number')
                                        <input type="number" wire:model.defer="dadosEspecificos.{{ $campo }}" value="{{ $dadosEspecificos[$campo] ?? '' }}" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" min="0">
                                    @elseif ($detalhes['tipo'] === 'select')
                                        <select wire:model.defer="dadosEspecificos.{{ $campo }}" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60">
                                            <option value="">Selecione</option>
                                            @foreach ($detalhes['opcoes'] as $opcao)
                                                <option value="{{ $opcao }}" {{ ($dadosEspecificos[$campo] ?? '') === $opcao ? 'selected' : '' }}>
                                                    {{ $opcao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @elseif ($detalhes['tipo'] === 'bool')
                                        <input type="checkbox" wire:model.defer="dadosEspecificos.{{ $campo }}" class="rounded border-primary text-primary h-6 w-6" {{ ($dadosEspecificos[$campo] ?? false) ? 'checked' : '' }}>
                                    @endif
                                @endforeach
                            </div>

                            <div class="py-3 flex justify-center">
                                <button type="submit">
                                    <x-custom-secondary-button width="w-3/4" class="underline">
                                        Salvar
                                    </x-custom-secondary-button>
                                </button>
                            </div>
                        </form>
                    </div>






                </div>
            </div>
        </div>
    @endif
</div>