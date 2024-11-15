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

<nav x-data="{ open: false }" class="bg-white mb-12">
    <!-- Primary Navigation Menu -->
    <div class=" px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}" wire:navigate>
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex justify-between">
                <div class="flex justify-between">
                    <div class="flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate> {{ __('Blog') }} </x-nav-link>
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('rota alt')" wire:navigate> {{ __('Como funciona?') }}
                        </x-nav-link>

                        @if (auth()->check())
                            <x-dropdown align="right" width="48" wrapperClasses='flex' divContentClasses='top-12 '>
                                <x-slot name="trigger" class="flex">
                                    <x-person-icon />
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile')" wire:navigate>
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <button wire:click="logout" class="w-full text-start">
                                        <x-dropdown-link>
                                            {{ __('Sair') }}
                                        </x-dropdown-link>
                                    </button>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <x-nav-link :href="route('login')" :active="request()->routeIs('rota alt')" wire:navigate>
                                {{ __('Entrar') }}
                            </x-nav-link>
                        @endif

                    </div>
                </div>

            </div>

            <x-hamburguer-menu />
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <!-- Responsive Settings Options -->
        <div class="pt-2 pb-1 border-t border-gray-200">
            @if (auth()->check())
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                        x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>
            @endif

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
