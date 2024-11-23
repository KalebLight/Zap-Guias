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

        $this->redirect('/login', navigate: true);
    }
}; ?>

<nav class="bg-white px-4 sm:px-6 w-full">
    <div class="flex h-16 w-full items-center px-4 sm:px-6 ">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" wire:navigate class="shrink-0">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>

        <!-- Navegação e Menu -->
        <div class="flex w-full">
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
            <div class="shrink-0 sm:ml-4 sm:hidden">
                <x-hamburguer-menu />
            </div>
        </div>
    </div>


    </div>

</nav>
