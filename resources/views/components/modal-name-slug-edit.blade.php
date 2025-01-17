<div>
    @if ($isOpen)
        <!-- Overlay -->
        <div class="fixed inset-0 z-50 flex justify-center items-center ss:p-0 px-3">
            <!-- Background Overlay -->
            <div class="absolute inset-0 bg-gray-400 opacity-55 transition-opacity" wire:click="closeModalNameSlugEdit"></div>

            <!-- Modal Container -->
            <div class="relative flex flex-col w-full max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden" style="max-height: calc(100vh - 64px); margin-top: 32px; margin-bottom: 32px;">
                <!-- Close Button -->
                <button type="button" wire:click="closeModalNameSlugEdit" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="flex-1 overflow-y-auto px-5 pt-5 pb-3 scrollbar scrollbar-thumb-secondary scrollbar-track-secondary">
                    <form wire:submit="saveData">
                        <input type="text" placeholder="Nome do Título da Página" wire:model="nome_fantasia" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60 " minlength="5" required>
                        <input type="text" placeholder="URL:" wire:model="slug" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="20" minlength="3" required>
                        <x-input-error :messages="$errors->get('nameSlug')" class="mt-2" />
                        <!-- Fixed Save Button -->
                        <div class=" py-3 flex justify-center">
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
    @endif
</div>