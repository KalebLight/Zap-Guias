<div class="w-full md:px-[100px] lg:px-[188px] xs:px-[30px] px-[10px] ">
    <div class="w-full border-t border-t-primary pt-2">
        <h3 class="text-primary font-black lg:text-7xl xs:text-5xl text-4xl text-right mb-5 break-words">{{Auth::user()->name}}</h3>

        <!-- Passeios / Serviços -->
        <div class="mt-10 mb-2 flex flex-row justify-between items-end">
            <div>
                <h4 class="text-primary font-black text-4xl">Passeios/Serviços</h4>
                <h4 class="text-primary font-black text-4xl">Favoritos</h4>

            </div>
            <!-- Botão compare 'servicos' p/ telas grandes -->
            <button wire:click="compare('services')" class="sm:block hidden text-primary font-semibold text-lg underline h-fit px-1 hover:bg-gray-200 rounded-md">
                COMPARE
            </button>
        </div>

        <div class="flex overflow-x-auto sm:flex-wrap sm:justify-between sm:gap-2 gap-5 pb-3">
            @foreach ($services as $service)
                <div class="flex-shrink-0 sm:flex-shrink">
                    <livewire:components.service-favorite :service="$service" />
                </div>
            @endforeach
        </div>

        <!-- Botão compare 'servicos' p/ telas pequenas -->
        <div class="w-full flex flex-row justify-end">
            <button wire:click="compare('services')" class="sm:hidden block text-primary font-semibold text-lg underline h-fit px-1 hover:bg-gray-200 rounded-md">
                COMPARE
            </button>
        </div>


        <!-- Parceiros -->
        <div class="mt-10 mb-2 flex flex-row justify-between items-end">
            <div>
                <h4 class="text-primary font-black text-4xl">Parceiros</h4>
                <h4 class="text-primary font-black text-4xl">Favoritos</h4>
            </div>

            <!-- Botão compare 'parceiros' p/ telas grandes -->
            <button wire:click="compare('partners')" class="sm:block hidden text-primary font-semibold text-lg underline h-fit px-1 hover:bg-gray-200 rounded-md">
                COMPARE
            </button>
        </div>

        <div class="flex overflow-x-auto sm:flex-wrap sm:justify-between sm:gap-2 gap-5 pb-3">
            @foreach ($partners as $partner)
                <div class="flex-shrink-0 sm:flex-shrink">
                    <livewire:components.partner-favorite :partner="$partner" />
                </div>
            @endforeach
        </div>
        <div class="w-full flex flex-row justify-end">
            <button wire:click="compare('partners')" class="sm:hidden block text-primary font-semibold text-lg underline h-fit px-1 hover:bg-gray-200 rounded-md">
                COMPARE
            </button>
        </div>


    </div>
</div>