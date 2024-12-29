<div x-data="{ isOpen: false }" class="w-75 relative text-right px-2">
    <!-- Botão -->
    <p href="#" 
       @click.prevent="isOpen = !isOpen" 
       :class="{ 'text-primary underline': isOpen, 'text-secondary': !isOpen }" 
       class="lg:text-5xl text-4xl font-black hover:underline mt-2 block">
        {{ $text }}
    </p>

    <!-- Conteúdo Dinâmico -->
    <div x-show="isOpen" x-transition class="mt-2 w-full flex flex-wrap justify-end">
    @foreach($items as $item)
                <button type='submit' class='custom-button w-fit leading-none px-4 py-2 m-2 shadow-custom border border-primary rounded-full text-2xl text-primary font-normal hover:shadow-md hover:bg-secondary transition ease-in-out duration-150'>
                    {{ $item }}
                </button>
    @endforeach
    </div>
</div>
