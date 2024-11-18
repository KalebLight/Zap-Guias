{{-- resources/views/components/hamburger-menu.blade.php --}}

<div x-data="{ open: false }" class="relative">
    <!-- Botão do Menu Hambúrguer -->
    <div class="-me-2 mt-2">
        <button @click="open = true"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <x-hamburger-icon />
        </button>
    </div>

    <!-- Overlay -->
    <div x-show="open" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex">

        <!-- Área do gradiente transparente -->
        <div class="w-1/4 bg-gradient-to-r from-black/50 to-transparent" @click="open = false">
        </div>

        <!-- Página em branco -->
        <div class="w-3/4 bg-white" x-show="open" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full">

            <!-- Conteúdo da página em branco -->
            <div class="h-full flex items-center justify-center">
                <button @click="open = false"
                    class="text-xl font-semibold text-gray-700 bg-gray-100 px-4 py-2 rounded hover:bg-gray-200 transition">
                    Voltar
                </button>
            </div>
        </div>
    </div>
</div>
