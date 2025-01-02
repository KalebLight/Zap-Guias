<div x-data="{ isOpen: false }" class="relative">
    <!-- Button -->
    <div class="flex flex-col items-center cursor-pointer group w-fit" @mouseover="isOpen = true" @mouseout="isOpen = false">
        <!-- Icon -->
        <img src="{{ asset($iconDefault) }}" alt="Ícone padrão" class="h-12 w-12 transition-all group-hover:hidden" />
        <img src="{{ asset($iconHover) }}" alt="Ícone ao passar o mouse" class="h-12 w-12 transition-all hidden group-hover:block" />

        <!-- Button text -->
        <span class="font-normal text-primary">{{ $text }}</span>
    </div>

    <!-- Hover Container  -->
    <div x-show="isOpen" class="fixed left-1/2 transform -translate-x-1/2 rounded z-10 mt-6" @mouseover="isOpen = true" @mouseout="isOpen = false" style="width: 90vw; max-width: 90vw; top:134px;">
        <div class="p-4 flex justify-center flex-wrap" style="background-image: linear-gradient(to bottom, #ffffff 65%, rgba(255, 255, 255, 0) 100%)">
            @foreach($items as $item)
                <button type='submit' class='custom-button w-fit lg:h-[50px] leading-none px-4 py-2 min-h-[36px] m-3 shadow-custom border border-primary rounded-full text-primary font-semibold hover:shadow-md hover:bg-secondary transition ease-in-out duration-150'>
                    {{ $item }}
                </button>
            @endforeach
        </div>
    </div>

</div>