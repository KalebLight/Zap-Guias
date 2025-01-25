<div class="px-10">
    <h2 class="text-3xl font-black text-primary">Mostre o que</h2>
    <h2 class="text-3xl font-black text-secondary">VOCÊ FAZ</h2>

    <!-- Campo de Título -->
    <input type="text" placeholder="Título" wire:model="titulo" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" />

    <!-- Campo de Descrição -->
    <textarea placeholder="Descrição" wire:model="descricao" class="w-full rounded-2xl border border-primary text-primary h-24 resize-y mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="200" style="max-height: 230px; min-height: 90px;">
    </textarea>

    <!-- Campo de Preço -->

    <input type="text" id="preco" placeholder="Preço (R$ 0,00)" class="w-full rounded-full border border-primary text-primary h-8 placeholder:text-primary placeholder:opacity-60" x-data x-init=" $refs.input.addEventListener('input', function(e) { let value = e.target.value.replace(/\D/g, ''); value = (value / 100).toFixed(2).replace('.', ','); if (parseFloat(value.replace(',', '.')) > 1000000) { e.target.value = 'R$ 1.000.000,00'; } else { e.target.value = 'R$ ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); } @this.preco = e.target.value; }); " x-ref="input" wire:model.lazy="preco" />

    <!-- Campo de Local -->
    <input type="text" placeholder="Local" wire:model="local" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" />

    <!-- Campo de Inclui -->
    <textarea placeholder="Inclui" wire:model="inclui" class="w-full rounded-2xl border border-primary text-primary h-24 resize-y mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="200" style="max-height: 230px; min-height: 90px;">
    </textarea>

    <!-- Campos Adicionais -->
    <div class="flex flex-row">
        <p class="text-secondary text-2xl mr-2">*</p>
        <p class="text-primary text-sm mt-2 font-normal">Campos obrigatórios</p>
    </div>

    <p class="text-primary text-sm font-medium">Adicionar foto:</p>
    <input type="file" id="foto" wire:model="foto_servico" class="block w-full text-sm text-secondary border rounded-md cursor-pointer focus:outline-none" accept="image/*" />
    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
    <x-input-error :messages="$errors->get('preco')" class="mt-2" />
    <x-input-error :messages="$errors->get('servicos')" class="mt-2" />
    <x-input-error :messages="$errors->get('servicos')" class="mt-2" />
    <!-- Botões -->
    <div class="flex flex-row mt-5 gap-4">
        <x-primary-button width="w-full" class="underline" wire:click="onlyOne">Adicionar Este</x-primary-button>
        <x-custom-secondary-button width="w-full" class="underline" wire:click="oneMore">Adicionar Mais</x-custom-secondary-button>
    </div>
</div>