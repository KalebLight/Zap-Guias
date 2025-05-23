<div class="w-full md:px-[100px] lg:px-[188px] xs:px-[30px] px-[10px]">
<div class=" flex flex-col lg:flex-row justify-center md:justify-between lg:items-start items-center">
    <!-- Imagens -->
    <div class="lg:mr-4 mb-10 w-full lg:w-[36%]">
        <div class="lg:aspect-[3/4] aspect-[16/9] overflow-hidden w-full max-w-[450px] lg:max-w-[550px] mx-auto flex justify-start">
            <img id="rotating-image" src="/images/guest-image-1.png" alt="Guest Image" class="object-cover w-full h-full" />
        </div>
    </div>

    <!-- Slot do conteúdo -->
    <main class="lg:w-1/2 w-full h-full md:rounded-lg flex flex-col lg:justify-normal">
        <div class="flex flex-col">
            <p class="text-primary font-black 2xl:text-9xl xl:text-8xl lg:text-7xl text-5xl">PLANEJE</p>
            <p class="text-primary font-black 2xl:text-9xl xl:text-8xl lg:text-7xl text-5xl lg:mt-4 mt-1">SUAS</p>
            <p class="text-secondary font-black 2xl:text-9xl xl:text-8xl lg:text-7xl text-5xl lg:mt-4 mt-1">FÉRIAS</p>
            <div class="w-full py-2 flex justify-end mt-3">
                <x-search-input id="search" placeholder='Pesquisar' class="block w-fit shadow-custom placeholder-secondary" type="email" name="search" required autofocus />
            </div>
        </div>
    </main>
</div>



    <div class="flex flex-row flex-wrap mt-3 justify-center">
        @foreach ($servicesHome as $service)
            <livewire:components.service-home :service="$service" />
        @endforeach
    </div>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nome Fantasia</th>
                <th class="border border-gray-300 px-4 py-2">Tipo</th>
                <th class="border border-gray-300 px-4 py-2">CNPJ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partners as $partner)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $partner->id }}</td>
                    <td>
                        <a href="{{ route('partner.profile', ['slug' => $partner->slug]) }}">
                            {{  $partner->nome_fantasia ?? 'N/A' }}
                        </a>
                    </td>

                    <td class="border border-gray-300 px-4 py-2">{{ class_basename($partner) }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $partner->cnpj ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center border border-gray-300 px-4 py-2">Nenhuma empresa encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>




    <!-- Dúvidas (div expansíveis) -->
    <p class="text-primary font-black text-4xl mt-20 mb-5">TEM DÚVIDAS?</p>
    <div class="w-full">
        
        <div x-data="{ expanded: false }" @click="expanded = !expanded" class="w-full bg-buttonPrimary shadow-custom h-fit px-4 rounded-3xl cursor-pointer">
            <div style="height: 10px;"></div>
            <div class="flex flex-row items-center">
                <svg class="w-6 h-6 ml-2 text-secondary transition-transform duration-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="{ 'rotate-45': expanded }">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <p class="text-primary">Encontrei minha empresa listada, o que faço?</p>    
            </div>

            <div style="height: 10px;"></div>

            <div x-show="expanded" x-collapse class="pl-7" x-cloak>
                <p class="p-4"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. </p>
            </div>
        </div>
        
        <div x-data="{ expanded: false }" @click="expanded = !expanded" class="w-full bg-buttonPrimary shadow-custom h-fit px-4 rounded-3xl mt-3 cursor-pointer">
            <div style="height: 10px;"></div>
            <div class="flex flex-row items-center">
                <svg class="w-6 h-6 ml-2 text-secondary transition-transform duration-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="{ 'rotate-45': expanded }">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <p class="text-primary">Como me cadastro na plataforma como empresa?</p>    
            </div>

            <div style="height: 10px;"></div>

            <div x-show="expanded" x-collapse class="pl-7" x-cloak>
                <p class="p-4"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. </p>
            </div>
        </div>
        
        <div x-data="{ expanded: false }" @click="expanded = !expanded" class="w-full bg-buttonPrimary shadow-custom h-fit px-4 rounded-3xl mt-3 cursor-pointer">
            <div style="height: 10px;"></div>
            <div class="flex flex-row items-center">
                <svg class="w-6 h-6 ml-2 text-secondary transition-transform duration-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="{ 'rotate-45': expanded }">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <p class="text-primary">Encontrei um guia! Como entro em contato?</p>    
            </div>

            <div style="height: 10px;"></div>

            <div x-show="expanded" x-collapse class="pl-7" x-cloak>
                <p class="p-4"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. </p>
            </div>
        </div>
    </div>

</div>