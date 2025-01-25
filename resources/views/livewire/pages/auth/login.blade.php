<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    public string $currentView = 'login';

    public function login()
    {
        try {
            $this->validate(); 
            $this->form->authenticate(); 
            Session::regenerate(); 
            
            return redirect()->route('dashboard'); 
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            foreach ($e->errors() as $field => $messages) {
                $this->addError($field, $messages[0]);
            }
        } catch (\Exception $e) {
            
            $this->addError('general', 'Ocorreu um erro inesperado. Tente novamente.');
        }
    }
    


    public function swapView(string $view): void
    {
        $this->currentView = $view;
    }
}; ?>

<div class="w-full h-full flex justify-start flex-col items-start">

    @if ($currentView === 'login')
        <form wire:submit.prevent="login" class="flex flex-col w-full ">
            <div class="h-fit">
                <h1 class="text-5xl font-black text-primary mb-10 leading-[0.5]">LOGIN</h1>
            </div>

            <div class="flex flex-col gap-3">
                <!-- Botão Google -->
                <button type="button "
                    class="lg:h-[50px] h-[36px] border border-black rounded-full hover:bg-gray-100">
                    <a href="/auth/google/redirect" class="flex items-center justify-center ">
                        <div class="flex items-center justify-center h-full">
                            <img src="{{ asset('images/google-icon.png') }}" alt="Logo do Google"
                                class="lg:h-9 lg:w-9 h-7 w-7">
                        </div>
                        <span class="font-light ml-3">Entrar com Google</span>
                    </a>
                </button>

                <!-- Botão Facebook -->
                <button type="button"
                    class=" lg:h-[50px] h-[36px] bg-facebook text-white rounded-full justify-center hover:bg-blue-600 ">
                    <a href="/auth/facebook/redirect" class="flex items-center justify-center">
                        <div class="flex items-center justify-center h-full">
                            <img src="{{ asset('images/facebook-icon.png') }}" alt="Logo do Facebook"
                                class="lg:h-9 lg:w-9 h-7 w-7">
                        </div>
                        <span class="font-light ml-3">Entrar com Facebook</span>
                    </a>
                </button>
            </div>

            <div class="flex justify-center w-full">
                <p class="text-primary my-4 hidden lg:block text-nowrap">
                   - - - - - - - - - - - - - ou - - - - - - - - - - - - -
                </p>
                <p class="text-primary my-4 block lg:hidden text-nowrap">
                    - - - - - - - - - - - - - ou - - - - - - - - - - - - -
                </p>
            </div>

            <div class="flex flex-col gap-3">
                <!-- Form Email -->
                <x-text-input wire:model="form.email" id="email" placeholder='E-mail'
                    class="block  " type="email" name="email" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                <!-- Form Password -->
                <x-text-input wire:model="form.password" placeholder="Senha" id="password"
                    class="block " type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                <x-input-error :messages="$errors->get('general')" class="mt-2" />
            </div>
            <a href="{{ route('password.request') }}" class="underline text-primary font-normal my-4"
                wire:navigate>Esqueci minha senha</a>
            <div class="">
                <x-primary-button class='underline'>
                    {{ __('Entrar') }}
                </x-primary-button>
            </div>
            
            <br>
            <div class="flex flex-row w-full justify-end">
                <a wire:click="swapView('register')" class="underline font-medium cursor-pointer" wire:navigate>Ou CRIE
                    SUA CONTA</a>
            </div>

        </form>
    @elseif ($currentView === 'register')
        <div class="w-fit h-full flex justify-start flex-col items-start">

            <div class=" h-fit">
                <h1 class="text-5xl font-black text-primary mb-10 leading-[0.5]">CRIAR CONTA</h1>
            </div>

            <div class="flex flex-col gap-3">
                <a href="{{ route('register') }}" wire:navigate>
                    <x-primary-button>
                        {{ __('Viajantes') }}
                    </x-primary-button>
                </a>
                <a href="{{ route('partner-register', ['type' => 'partner']) }}" wire:navigate>
                    <x-primary-button>
                        {{ __('Novos Parceiros') }}
                    </x-primary-button>
                </a>
                <x-primary-button>
                    {{ __('Encontrou sua empresa aqui? Reinvidique sua conta!') }}
                </x-primary-button>
            </div>

            <br>
            <div class="flex flex-row w-full justify-end">
                <a wire:click="swapView('login')" class="underline font-medium cursor-pointer" wire:navigate>Ou FAÇA
                    SEU LOGIN</a>
            </div>

        </div>
    @endif
</div>
