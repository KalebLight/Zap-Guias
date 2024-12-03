<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $cnpj = '';
    public array $data = [];

    public function mount()
    {
        $this->data = session()->get('register_data', []);

        if (empty($this->data)) {
            return redirect()->route('register');
        }
    }

    public function completeRegistration(): void
    {
        $this->data['cnpj'] = $this->cnpj;

        event(new Registered(($user = User::create($this->data))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="w-fit h-full flex justify-start flex-col items-start">
    <div>

        <form wire:submit="completeRegistration">
            <h2 class="text-primary font-black text-5xl">Confirme sua</h2>
            <h2 class="text-secondary font-black text-5xl mb-5">IDENTIDADE</h2>

            <!-- CNPJ -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="cnpj" id="cnpj" class="block mt-1 w-full" type="text" name="cnpj"
                        required autofocus autocomplete="cnpj" placeholder='CNPJ' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>



            <div class="flex flex-row">
                <p class="text-secondary text-2xl mr-2">*</p>
                <p class="text-primary text-sm mt-2 font-medium">Campos obrigatórios</p>
            </div>

            <x-primary-button class="mt-10 underline">
                {{ __('Avançar') }}
            </x-primary-button>

        </form>
    </div>
</div>
