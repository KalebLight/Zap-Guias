<?php

use Livewire\Volt\Component;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;

new #[Layout('layouts.guest')] class extends Component {
    public string $cnpj = '';
    public array $registerUserData = [];

    public function mount()
    {
        $this->registerUserData = session()->get('register_user_data', []);
        
        if (empty($this->registerUserData)) {
            return redirect()->route('register');
        }
    }

    public function registrationNextStep()
    {
        $this->registerUserData['cnpj'] = $this->cnpj;
        session()->put('register_user_data', $this->registerUserData);
        
        return redirect()->route('register-company');
    }
}; ?>

<div class="w-fit h-full flex justify-start flex-col items-start">
    <div>

        <form wire:submit="registrationNextStep">
            <h2 class="text-primary font-black text-5xl">Confirme sua</h2>
            <h2 class="text-secondary font-black text-5xl mb-5">IDENTIDADE</h2>

            <!-- CNPJ -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="cnpj" id="cnpj" class="block mt-1 w-full" type="text" name="cnpj"
                        required autofocus autocomplete="cnpj" placeholder='CNPJ' x-mask="99.999.999/9999-99"/>
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>



            <div class="flex flex-row">
                <p class="text-secondary text-2xl mr-2">*</p>
                <p class="text-primary text-sm mt-2 font-medium">Campos obrigatórios</p>
            </div>

            <x-primary-button class="mt-10 underline">
               Avançar
            </x-primary-button>

        </form>
    </div>
</div>
