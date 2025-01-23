<div class="px-10">
    <h2 class="text-3xl font-black text-primary">Mostre o que</h2>
    <h2 class="text-3xl font-black text-secondary">VOCÊ FAZ</h2>
    <input type="text" placeholder="Título" wire:model="titulo" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60">
    <textarea placeholder="Descrição" wire:model="bio" class="w-full rounded-2xl border border-primary text-primary h-24 resize-y mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="200" style="max-height: 230px; min-height: 90px;"></textarea>
    <input type="text" placeholder="Preço" wire:model="preco" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60">
    <input type="text" placeholder="Local" wire:model="local" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60">
    <textarea placeholder="Inclui" wire:model="bio" class="w-full rounded-2xl border border-primary text-primary h-24 resize-y mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="200" style="max-height: 230px; min-height: 90px;"></textarea>

    <div class="flex flex-row">
        <p class="text-secondary text-2xl mr-2">*</p>
        <p class="text-primary text-sm mt-2 font-normal">Campos obrigatórios</p>
    </div>
    <p class="text-primary text-sm font-medium">Adicionar foto:</p>

    <input type="file" id="foto_perfil" wire:model="foto_perfil" class="block w-full text-sm text-secondary border rounded-md cursor-pointer focus:outline-none" accept="image/*">

    <div class="flex flex-row mt-5 gap-4">
        <x-primary-button width="w-full" class="underline">Adicionar Este</x-primary-button>
        <x-custom-secondary-button width="w-full" class="underline">Adicionar Mais</x-custom-secondary-button>
    </div>
</div>