<div class="w-full md:px-[100px] lg:px-[188px] xs:px-[30px] px-[10px] ">
    <div class="w-full border-t border-t-primary pt-2">
        <h3 class="text-primary font-black lg:text-7xl xs:text-5xl text-4xl text-right mb-5 break-words">{{Auth::user()->name}}</h3>

        <div class="mt-10 mb-2">
            <h4 class="text-primary font-black text-4xl">Passeios/Serviços</h4>
            <h4 class="text-primary font-black text-4xl">Favoritos</h4>
        </div>

        <div class="flex flex-wrap justify-between gap-2">
            @foreach ($services as $service)

                <livewire:components.service-profile :service="$service" />

            @endforeach
        </div>


        <div class="mt-10 mb-2">
            <h4 class="text-primary font-black text-4xl">Parceiros</h4>
            <h4 class="text-primary font-black text-4xl">Favoritos</h4>
        </div>

        <div class="flex flex-wrap justify-between gap-2">
            @foreach ($partners as $partner)

                <livewire:components.partner-favorite :partner="$partner" />

            @endforeach
        </div>


        <div>

        </div>
    </div>
</div>