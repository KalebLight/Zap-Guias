<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        redirect()->route('login');
    }
}; ?>

<nav class="bg-white fixed top-0 z-50 w-full  md:px-[100px] lg:px-[188px] xs:px-[30px] px-[10px]">
    <div class="flex h-100 w-full items-center">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" wire:navigate class="shrink-0">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>

        <!-- Navegação e Menu -->
        <div class="flex w-full ">
            <!-- Botões de Navegação -->
            <div class="flex w-full sm:justify-end justify-center">
                <div class="flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Blog') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('rota alt')" wire:navigate>
                        {{ __('Como funciona?') }}
                    </x-nav-link>

                    @if (auth()->check())
                                    <x-dropdown align="right" width="48" wrapperClasses="flex" divContentClasses="top-12">
                                        <x-slot name="trigger" class="flex">
                                            <x-person-icon />
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                                {{ __('Perfil') }}
                                            </x-dropdown-link>

                                            @if (auth()->user()->company_type && auth()->user()->company_id)
                                                                    @php

                                                                        $company = app(auth()->user()->company_type)::find(auth()->user()->company_id);
                                                                    @endphp
                                                                    @if ($company && $company->slug)
                                                                        <x-dropdown-link :href="route('partner.profile', ['slug' => $company->slug])" wire:navigate>
                                                                            {{ __('Minha Empresa') }}
                                                                        </x-dropdown-link>
                                                                    @endif
                                            @endif

                                            @if (!auth()->user()->cnpj)
                                                <x-dropdown-link :href="route('favorites', ['id' => auth()->user()->id])" wire:navigate>
                                                    {{ __('Meus Favoritos') }}
                                                </x-dropdown-link>
                                            @endif

                                            <button wire:click="logout" class='w-full'>
                                                <x-dropdown-link>
                                                    {{ __('Sair') }}
                                                </x-dropdown-link>
                                            </button>

                                        </x-slot>
                                    </x-dropdown>
                    @else
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                            {{ __('Entrar') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Menu Hamburguer -->
            <div class="shrink-0 lg:ml-4 lg:hidden">
                <x-hamburguer-menu />
            </div>
        </div>
    </div>

    <div class="hidden lg:block mt-5">
        <x-nav-icons />
    </div>
</nav>