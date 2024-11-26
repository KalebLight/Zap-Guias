<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="w-full flex justify-center mt-10 flex-col items-center">
    <div class="md:w-[500px] w-[300px]">
        <h1 class="text-4xl font-black text-primary mb-14">LOGIN</h1>
    </div>

    <form wire:submit.prevent="login" class="flex flex-col">
        <!-- Botão Google -->
        <div class="flex flex-col gap-3">
            <button type="button"
                class=" md:w-[500px] w-[300px] border border-black h-11 rounded-full hover:bg-gray-100">
                <a href="/auth/google/redirect" class="flex items-center justify-center">
                    <div class="flex items-center justify-center h-full">
                        <img src="{{ asset('images/google-icon.png') }}" alt="Logo do Google" class="h-9 w-9">
                    </div>
                    <span class="font-light ml-3">Entrar com Google</span>
                </a>
            </button>

            <!-- Botão Facebook -->

            <button type="button"
                class=" md:w-[500px] w-[300px] bg-facebook text-white h-11 rounded-full justify-center hover:bg-blue-600 ">
                <a href="/auth/facebook/redirect" class="flex items-center justify-center">
                    <div class="flex items-center justify-center h-full">
                        <img src="{{ asset('images/facebook-icon.png') }}" alt="Logo do Facebook" class="h-9 w-9">
                    </div>
                    <span class="font-light ml-3">Entrar com Facebook</span>
                </a>
            </button>
        </div>

        <p class="text-primary my-6 hidden md:block">
            - - - - - - - - - - - - - - - - - - - - - - ou - - - - - - - - - - - - - - - - - - - - - -
        </p>
        <p class="text-primary my-6 block md:hidden">
            - - - - - - - - - - - - - ou - - - - - - - - - - - - -
        </p>

        <div class="flex flex-col gap-3">
            <x-text-input wire:model="form.email" id="email" placeholder='E-mail' class="block  w-full"
                type="email" name="email" required autofocus autocomplete="username" />
            <x-text-input wire:model="form.password" placeholder="Senha" id="password" class="block w-full"
                type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>
        <a href="{{ route('password.request') }}" class="underline text-primary font-normal my-4" wire:navigate>Esqueci
            minha
            senha</a>
        <div class="w-3/4">
            <x-primary-button>
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
        <br>
        <div class="flex flex-row w-full justify-end">
            <a href="/register" class="underline font-medium" wire:navigate>Ou CRIE SUA CONTA</a>
        </div>


    </form>




</div>
