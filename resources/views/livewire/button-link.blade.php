<div x-data="{ isOpen: false }" class="w-full">
    <!-- Botão -->
    <a href="#" 
       @click.prevent="isOpen = !isOpen" 
       :class="{ 'text-primary underline': isOpen, 'text-secondary': !isOpen }" 
       class="lg:text-5xl text-4xl font-black hover:underline mt-2 block">
        {{ $text }}
    </a>

    <!-- Conteúdo Dinâmico -->
    <div x-show="isOpen" x-transition class="mt-2 p-4  w-75">
    @foreach($items as $item)
                <button type='submit' class='custom-button  w-fit lg:h-[50px] leading-none px-4 py-2 min-h-[36px] m-3 shadow-custom border border-primary rounded-full text-primary font-semibold hover:shadow-md hover:bg-secondary transition ease-in-out duration-150'>



                    {{ $item }}
                </button>

            @endforeach
    </div>
</div>
