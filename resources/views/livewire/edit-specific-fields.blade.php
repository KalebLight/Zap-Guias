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
                    <!-- Modal Content -->
                    <div>
                        <h4 class="underline text-primary text-left font-medium">Editar Dados Específicos</h4>
                        <form wire:submit.prevent="atualizar">
                            <div class="flex flex-col">
                                @foreach ($schema as $campo => $detalhes)
                                    <label for="{{ $campo }}" class="text-primary font-medium text-sm mt-2">
                                        {{ $detalhes['label'] }}
                                    </label>

                                    @if ($detalhes['tipo'] === 'text')
                                        <input type="text" wire:model.defer="dadosEspecificos.{{ $campo }}" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60">

                                    @elseif ($detalhes['tipo'] === 'number')
                                        <input type="number" wire:model.defer="dadosEspecificos.{{ $campo }}" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" min="0">

                                    @elseif ($detalhes['tipo'] === 'select')
                                        <div class="relative">
                                            <!-- Botão para abrir o dropdown -->
                                            <div class="w-full border border-primary rounded-full text-primary px-3 py-1 h-8 flex items-center justify-between cursor-pointer truncate" onclick="toggleDropdown('{{ $campo }}')" title="{{ $dadosEspecificos[$campo] ?? 'Selecione' }}">
                                                <span class="truncate flex-1">{{ $dadosEspecificos[$campo] ?? 'Selecione' }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <!-- Dropdown -->
                                            <ul id="dropdown-{{ $campo }}" class="hidden absolute z-10 w-full bg-white border border-primary rounded-lg shadow-md max-h-48 overflow-auto">
                                                <li class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-white" wire:click="$set('dadosEspecificos.{{ $campo }}', '')">
                                                    Limpar seleção
                                                </li>
                                                @foreach ($detalhes['opcoes'] as $opcao)
                                                    <li class="px-4 py-2 cursor-pointer hover:bg-primary hover:text-white truncate" title="{{ $opcao }}" wire:click="$set('dadosEspecificos.{{ $campo }}', '{{ $opcao }}')">
                                                        {{ $opcao }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @elseif ($detalhes['tipo'] === 'bool')
                                        <input type="checkbox" wire:model.defer="dadosEspecificos.{{ $campo }}" class="rounded border-primary text-primary h-6 w-6">
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
    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(`dropdown-${id}`);
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
            }
        }
    </script>

    <style>
        .truncate {
            white-space: wrap;


        }

        ul.max-h-48 {
            max-height: 12rem;
            overflow-y: auto;
        }

        /* Ajuste para ícone */
        .flex-shrink-0 {
            flex-shrink: 0;
        }
    </style>
</div>