<div x-data="{ open: false }" class="relative">
    <!-- Botão do Menu Hambúrguer -->
    <div class="-me-2 mt-2">
        <button @click="open = true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <x-hamburger-icon />
        </button>
    </div>

    <!-- Overlay -->
    <div x-show="open" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex" x-cloak>

        <!-- Gradient area -->
        <div class="w-1/4 bg-gradient-to-r from-black/50 to-transparent" @click="open = false">
        </div>

        <!-- SideMenu -->
        <div class="w-3/4 overflow-y-auto" style="background-image: linear-gradient(to left, #ffffff 85%, rgba(255, 255, 255, 0) 100%)" x-show="open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">

            <!-- Sidemenu content -->
            <div class="pt-7 px-4 pb-4">
                <p @click="open = false" class="text-lg font-medium text-gray-700 px-4 py-2 rounded hover:bg-gray-200 transition underline">
                    Ou VOLTE
                </p>

                <div class="flex justify-end flex-col mt-9 mb-10">
                    <div class="flex flex-col items-end">
                        @foreach (config('categories') as $text => $items)
                                                @livewire('button-link', [
                                'text' => $text,
                                'items' => $items,
                            ])
                        @endforeach
                    </div>
                </div>

                <div class="w-full flex justify-end">
                    <x-search-input id="search" placeholder='Pesquisar' class="block w-max shadow-custom placeholder-secondary" type="email" name="search" required autofocus />
                </div>
            </div>

        </div>

    </div>
</div>