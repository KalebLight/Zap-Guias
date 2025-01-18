<div>
    @if ($isOpen)
        <!-- Overlay -->
        <div class="fixed inset-0 z-50 flex justify-center items-center ss:p-0 px-3">
            <!-- Background Overlay -->
            <div class="absolute inset-0 bg-gray-400 opacity-55 transition-opacity" wire:click="closeModalBioEdit"></div>

            <!-- Modal Container -->
            <div class="relative flex flex-col w-full max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden" style="max-height: calc(100vh - 64px); margin-top: 32px; margin-bottom: 32px;">
                <!-- Close Button -->
                <button type="button" wire:click="closeModalBioEdit" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex-1 overflow-y-auto px-5 pt-5 pb-5 scrollbar scrollbar-thumb-secondary scrollbar-track-gray-200">
                    <textarea placeholder="Adicione uma bio" wire:model="bio" class="w-full rounded-md border border-primary text-primary h-24 resize-y mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="200" style="max-height: 230px; min-height: 90px;"></textarea>
                </div>


                <!-- Fixed Save Button -->
                <div class=" py-3 flex justify-center">
                    <x-custom-secondary-button width="w-3/4" class="underline" wire:click="saveData">
                        Salvar
                    </x-custom-secondary-button>
                </div>
            </div>
        </div>
    @endif
</div>