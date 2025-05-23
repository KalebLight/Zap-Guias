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
                <div class="flex-1 overflow-y-auto px-5 pt-5 pb-3 scrollbar scrollbar-thumb-secondary scrollbar-track-gray-200">
                    <form wire:submit.prevent="saveData">
                        <h4 class="underline text-primary text-left font-medium">Nome</h4>
                        <input type="text" placeholder="Nome do Título da Página" wire:model="nome_fantasia" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60 " required>
                        <h4 class="underline text-primary text-left font-medium mt-2">URL (slug)</h4>
                        <div class="relative" onclick="focusInput(this)">
                            <span class="absolute left-2 top-2 text-primary">URL:</span>
                            <span class="absolute left-10 top-2 text-gray-400">www.zapguias.com.br/</span>
                            <input type="text" wire:model="slug" class="w-full rounded-full border border-primary text-primary h-8 pl-[198px] mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="20" required>
                        </div>
                        <div>
                            <h4 class="underline text-primary text-left font-medium">Foto de Perfil</h4>
                            <input type="file" id="foto_perfil" wire:model="foto_perfil" class="block w-full text-sm text-secondary border rounded-md cursor-pointer focus:outline-none" accept="image/*">
                            <!-- Pré-visualização da foto -->
                            @if ($foto_perfil)
                                <div class="w-full flex justify-center">
                                    <img src="{{ $foto_perfil->temporaryUrl() }}" class="w-24 h-24 mt-2 rounded-md">
                                </div>
                            @elseif($partner->foto_perfil)
                                <div class="w-full flex justify-center">
                                    <img src="{{ asset('storage/' . $partner->foto_perfil) }}" class="w-32 h-w-32 mt-2 rounded-md">
                                </div>
                            @endif
                        </div>
                        @error('foto_perfil')
                            <x-input-error :messages=$message class="mt-2" />
                        @enderror
                        @error('nome_fantasia')
                            <x-input-error :messages=$message class="mt-2" />
                        @enderror
                        @error('slug')
                            <x-input-error :messages=$message class="mt-2" />
                        @enderror
                        <div wire:loading wire:target="foto_perfil" class="text-sm text-primary mt-1">Carregando imagem...</div>
                        <!-- Fixed Save Button -->
                        <div class=" py-3 flex justify-center">
                            <button type="submit">
                                <x-custom-secondary-button width="w-3/4" class="underline" wire:loading.class="opacity-50 cursor-not-allowed" wire:loading.attr="disabled" wire:target="foto_perfil"> Salvar </x-custom-secondary-button>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
<script>
    function focusInput(container) {
        const input = container.querySelector('input');
        if (input) {
            input.focus();
        }
    }
</script>