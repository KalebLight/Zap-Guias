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

<div class="w-fit h-full flex justify-start flex-col items-start">

    <form wire:submit.prevent="login" class="flex flex-col">
        <div class="xl:w-[570px] sm:w-[440px] w-[350px]">
            <h1 class="text-5xl font-black text-primary mb-10 ">LOGIN</h1>
        </div>

        <!-- Botão Google -->
        <div class="flex flex-col gap-3">
            <button type="button"
                class="xl:w-[570px] sm:w-[440px] w-[350px] lg:h-[50px] h-[36px] border border-black rounded-full hover:bg-gray-100">
                <a href="/auth/google/redirect" class="flex items-center justify-center">
                    <div class="flex items-center justify-center h-full">
                        <img src="{{ asset('images/google-icon.png') }}" alt="Logo do Google"
                            class="lg:h-9 lg:w-9 h-7 w-7">
                    </div>
                    <span class="font-light ml-3">Entrar com Google</span>
                </a>
            </button>

            <!-- Botão Facebook -->

            <button type="button"
                class="xl:w-[570px] sm:w-[440px] w-[350px] lg:h-[50px] h-[36px]                 bg-facebook text-white rounded-full justify-center hover:bg-blue-600 ">
                <a href="/auth/facebook/redirect" class="flex items-center justify-center">
                    <div class="flex items-center justify-center h-full">
                        <img src="{{ asset('images/facebook-icon.png') }}" alt="Logo do Facebook"
                            class="lg:h-9 lg:w-9 h-7 w-7">
                    </div>
                    <span class="font-light ml-3">Entrar com Facebook</span>
                </a>
            </button>
        </div>

        <p class="text-primary my-4 hidden lg:block text-nowrap">
            - - - - - - - - - - - - - - - - - - - - - - ou - - - - - - - - - - - - - - - - - - - - - -
        </p>
        <p class="text-primary my-4 block lg:hidden text-nowrap">
            - - - - - - - - - - - - - ou - - - - - - - - - - - - -
        </p>

        <div class="flex flex-col gap-3">
            <x-text-input wire:model="form.email" id="email" placeholder='E-mail'
                class="block  xl:w-[570px] sm:w-[440px] w-[350px]" type="email" name="email" required autofocus
                autocomplete="username" />
            <x-text-input wire:model="form.password" placeholder="Senha" id="password"
                class="block xl:w-[570px] sm:w-[440px] w-[350px]" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>
        <a href="{{ route('password.request') }}" class="underline text-primary font-normal my-4" wire:navigate>Esqueci
            minha
            senha</a>
        <div class="xl:w-[570px] sm:w-[440px] w-[350px]">
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
