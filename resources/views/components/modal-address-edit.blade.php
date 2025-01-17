<div>
    @if ($isOpen)
        <!-- Overlay -->
        <div class="fixed inset-0 z-50 flex justify-center items-center ss:p-0 px-3">
            <!-- Background Overlay -->
            <div class="absolute inset-0 bg-gray-400 opacity-55 transition-opacity" wire:click="closeAddressModal"></div>

            <!-- Modal Container -->
            <div class="relative flex flex-col w-full max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden" style="max-height: calc(100vh - 64px); margin-top: 32px; margin-bottom: 32px;">
                <!-- Close Button -->
                <button type="button" wire:click="closeAddressModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Content with Scroll -->
                <div class="flex-1 overflow-y-auto px-5 pt-5 pb-3 scrollbar scrollbar-thumb-secondary scrollbar-track-secondary">

                    <p class="lg:partner-info text-sm font-medium ">Endereço</p>

                    <form wire:submit.prevent="saveData">
                        <input type="text" placeholder="Logradouro" wire:model="endereco.logradouro" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="20" required>
                        <input type="text" placeholder="Número" wire:model.defer="endereco.numero" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" required />
                        <input type="text" placeholder="Bairro" wire:model.defer="endereco.bairro" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" required />
                        <input type="text" placeholder="Cidade" wire:model.defer="endereco.cidade" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" required />
                        <input type="text" placeholder="Estado" wire:model.defer="endereco.estado" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" required />
                        <input type="text" placeholder="CEP" wire:model.defer="endereco.cep" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" required pattern="\d{5}-\d{3}" />
                    </form>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <!-- Fixed Save Button -->
                <div class="py-3 flex justify-center">
                    <x-custom-secondary-button width="w-3/4" class="underline" wire:click="saveData">
                        Salvar
                    </x-custom-secondary-button>
                </div>
            </div>
        </div>
    @endif
</div>