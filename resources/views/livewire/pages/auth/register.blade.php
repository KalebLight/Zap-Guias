<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="w-full flex justify-center">
    <div>
        <h2 class="text-primary font-black text-5xl">Junte-se à nossa</h2>
        <h2 class="text-secondary font-black text-5xl mb-5">COMUNIDADE</h2>
        <form wire:submit="register">
            <!-- Name -->
            <div class="flex flex-row">
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                    required autofocus autocomplete="name" placeholder='Nome Completo' />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <p class="text-secondary text-2xl ml-1">*</p>
            </div>

            <div class="mt-3 flex flex-row">
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                    required autofocus autocomplete="name" placeholder='CPF' />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <p class="text-secondary text-2xl ml-1">*</p>
            </div>

            <div class="mt-3 flex flex-row">
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                    required autofocus autocomplete="name" placeholder='Número de Telefone' />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <p class="text-secondary text-2xl ml-1">*</p>
            </div>

            <div class="mt-3 flex flex-row">
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                    required autofocus autocomplete="name" placeholder='E-Mail' />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <p class="text-secondary text-2xl ml-1">*</p>
            </div>

            <div class="mt-3 flex flex-row">
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    required autocomplete="username" placeholder='Repita o E-Mail' />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <p class="text-secondary text-2xl ml-1">*</p>
            </div>

            <!-- Password -->
            <div class="mt-3 flex flex-row">


                <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="new-password" placeholder="Senha" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <p class="text-secondary text-2xl ml-1">*</p>
            </div>

            <!-- Confirm Password -->
            <div class="mt-3 flex flex-row ">

                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="Repita a senha" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <p class="text-secondary text-2xl ml-1">*</p>
            </div>

            <div class="flex flex-row">
                <p class="text-secondary text-2xl mr-2">*</p>
                <p class="text-primary text-sm mt-2 font-medium">Campos obrigatórios</p>
            </div>

            <div class="space-y-4 mt-10">
                <!-- Checkbox para termos de serviço e política de privacidade -->
                <div class="flex items-center">
                    <input type="checkbox" id="terms"
                        class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
                    <label for="terms" class="ml-3 text-primary text-sm leading-none">
                        Eu concordo com nossos
                        <a href="#" class="text-secondary underline font-normal">Termos de Serviço</a>
                        e
                        <a href="#" class="text-secondary underline font-normal">Política de Privacidade</a>.
                    </label>
                </div>

                <!-- Checkbox para receber notícias -->
                <div class="flex items-center">
                    <input type="checkbox" id="news"
                        class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
                    <label for="news" class="ml-3 text-primary text-sm leading-none">
                        Gostaria de receber notícias sobre viagens e o Turismo.
                    </label>
                </div>
            </div>

            <x-primary-button class="mt-10">
                {{ __('Criar Conta') }}
            </x-primary-button>

        </form>
    </div>
</div>
