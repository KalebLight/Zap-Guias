<div x-data="{ isOpen: false }" class="relative">
    <!-- Botão principal -->
    <div class="flex flex-col items-center cursor-pointer group w-fit" @mouseover="isOpen = true"
        @mouseout="isOpen = false">
        <!-- Ícone dinâmico -->
        <img src="{{ asset($iconDefault) }}" alt="Ícone padrão" class="h-12 w-12 transition-all group-hover:hidden" />
        <img src="{{ asset($iconHover) }}" alt="Ícone ao passar o mouse"
            class="h-12 w-12 transition-all hidden group-hover:block" />

        <!-- Texto do botão -->
        <span class="font-normal text-primary">{{ $text }}</span>
    </div>

    <!-- Container exibido ao passar o mouse -->
    <div x-show="isOpen" class="fixed left-1/2 transform -translate-x-1/2 bg-white h-32 rounded shadow-lg z-10 mt-6"
        @mouseover="isOpen = true" @mouseout="isOpen = false"
        style="background: white; width: 90vw; max-width: 90vw; top:134px;">
        <div class="p-4">
            <p class="text-gray-600">Conteúdo dentro do {{ $text }}.</p>
        </div>
    </div>
</div>
