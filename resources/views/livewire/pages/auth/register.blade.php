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
    public string $confirm_email = '';
    public string $cpf = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $terms = false; 
    public bool $news = false; 
    public array $registerUserData = [];

    public string $registerType = 'default';

    public function mount(?string $type = null): void
    {
        $this->registerType = $type === 'partner' ? 'partner' : 'default';
        $this->registerUserData = session()->get('register_user_data', []);
        if(($this->registerUserData)) {
            $this->name = $this->registerUserData['name'];
            $this->email = $this->registerUserData['email'];
            $this->cpf = $this->registerUserData['cpf'];
            $this->phone = $this->registerUserData['phone'];

        }
    }

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'min:15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'terms' => ['accepted'],
        ]);

        if ($this->email !== $this->confirm_email) {
            $this->addError('confirm_email', 'O campo de confirmação do e-mail deve ser igual ao e-mail informado.');

            return;
        }

        $validated['password'] = Hash::make($validated['password']);

        if ($this->registerType == 'partner') {
            session()->put('register_user_data', $validated);
            return redirect()->route('register-identity');
        }

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="w-fit h-full flex justify-start flex-col items-start">
    <div>
        <form wire:submit.prevent="register">
            <h2 class="text-primary font-black text-5xl">Junte-se à nossa</h2>
            <h2 class="text-secondary font-black text-5xl mb-5">COMUNIDADE</h2>
            <!-- Name -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                        required autofocus autocomplete="name" placeholder='Nome Completo' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('name')"  />
            </div>

            <!-- CPF -->
            <div class="sm:mt-3 mt-1 flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:ignore wire:model="cpf" id="cpf" class="block mt-1 w-full" type="text"
                        name="cpf" required autofocus autocomplete="cpf" placeholder='CPF' maxlength='14' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('cpf')"  />
            </div>

            <!-- Phone -->
            <div class="sm:mt-3 mt-1 flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone" required autofocus autocomplete="phone" placeholder='Número de Telefone' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('phone')"  />
            </div>

            <!-- Email -->
            <div class="sm:mt-3 mt-1 flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="text"
                        name="email" required autofocus autocomplete="email" placeholder='E-Mail' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('email')"  />
            </div>

            <!-- Confirm Email -->
            <div class="sm:mt-3 mt-1 flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="confirm_email" id="confirm_email" class="block mt-1 w-full" type="email"
                        name="confirm_email" required placeholder='Repita o E-Mail' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('confirm_email')"  />
            </div>

            <!-- Password -->
            <div class="sm:mt-3 mt-1 flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                        name="password" required autocomplete="new-password" placeholder="Senha" />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('password')"  />
            </div>

            <!-- Confirm Password -->
            <div class="sm:mt-3 mt-1 flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="password_confirmation" id="password_confirmation"
                        class="block mt-1 w-full" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Repita a senha" />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')"  />
            </div>

            <div class="flex flex-row">
                <p class="text-secondary text-2xl mr-2">*</p>
                <p class="text-primary text-sm mt-2 font-medium">Campos obrigatórios</p>
            </div>

            <div class="space-y-4 mt-10">
                <!-- Checkbox para termos de serviço e política de privacidade -->
                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" wire:model.change="terms"
                        class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
                    <label for="terms" class="ml-3 text-primary text-sm leading-none">
                        Eu concordo com nossos
                        <a href="#" class="text-secondary underline font-normal">Termos de Serviço</a>
                        e
                        <a href="#" class="text-secondary underline font-normal">Política de Privacidade</a>.
                    </label>
                </div> 
                <x-input-error :messages="$errors->get('terms')" class="mt-2" />
               

                <!-- Checkbox para receber notícias -->
                <div class="flex items-center">
                    <input type="checkbox" id="news" name="news" wire:model="news"
                        class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
                    <label for="news" class="ml-3 text-primary text-sm leading-none">
                        Gostaria de receber notícias sobre viagens e o Turismo.
                    </label>
                </div>
            </div>


            <x-primary-button class="mt-10 underline">
                {{ $registerType == 'default' ? 'Criar Conta' :'Avançar' }}
            </x-primary-button>


        </form>
    </div>
</div>
