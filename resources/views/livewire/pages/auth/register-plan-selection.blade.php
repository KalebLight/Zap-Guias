<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public array $registerUserData = [];
    public string $selectedPlan = ''; // Variável para armazenar o plano selecionado
    public string $tipoDeAtividade = '';
    public string $atividadeEspecialidade = '';
    public string $numeroDeCertificado = '';
    public string $municipio = '';
    public string $uf = '';
    public string $emailComercial = '';
    public string $categoria = '';

    public array $atividadesEspecialidade = [];

    public function mount()
    {
        $this->registerUserData = session()->get('register_user_data', []);

        if (empty($this->registerUserData)) {
            return redirect()->route('register');
        }
    }

    public function selectPlan(string $plan)
    {
        $this->selectedPlan = $plan; // Atualiza o plano selecionado
    }

    public function registerUserAndCompany()
    {
        event(new Registered(($user = User::create($this->registerUserData))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);

        session()->forget([
            'register_user_data',
            'register_company_data',
            'tipoDeAtividade',
            'atividadeEspecialidade',
            'numeroDeCertificado',
            'municipio',
            'uf',
            'emailComercial',
            'categoria',
        ]);
    }

    public function registrationNextStep()
    {
        $company_data = [
            'tipoDeAtividade' => $this->tipoDeAtividade,
            'atividadeEspecialidade' => $this->atividadeEspecialidade,
            'numeroDeCertificado' => $this->numeroDeCertificado,
            'municipio' => $this->municipio,
            'uf' => $this->uf,
            'emailComercial' => $this->emailComercial,
            'selectedPlan' => $this->selectedPlan, // Salvar o plano selecionado
        ];

        session()->put('register_company_data', $company_data);

        return redirect()->route('register-plan-selection');
    }
}; ?>

<div class="w-fit h-full flex justify-start items-start">
    <div>

        <form wire:submit.prevent="registrationNextStep">
            <h2 class="text-primary font-black text-5xl">ESCOLHA SEU</h2>
            <h2 class="text-secondary font-black text-5xl mb-5">PLANO</h2>
            <div class="flex flex-row justify-between">
            <div class="@if($selectedPlan === 'gratis') bg-secondary @endif flex flex-col border border-primary rounded-3xl py-[12px] px-[20px] w-52 h-44 items-center cursor-pointer hover:bg-gray-100" wire:click="selectPlan('gratis')">

                    <h3 class="underline text-lg font-medium">Grátis</h3>
                    <div class="flex flex-row items-baseline h-fit -mt-4">
                        <p class="text-4xl h-max mr-1 text-gray-300">.</p>
                        <p class="text-primary text-sm font-medium">Concorrentes serão recomendados no seu perfil;</p>
                    </div>
                    <div class="flex flex-row items-baseline h-fit -mt-3">
                        <p class="text-4xl h-max mr-1 text-gray-300">.</p>
                        <p class="text-primary text-sm font-medium">Menor destaque nas buscas.</p>
                    </div>
                </div>

                <div
                    class="@if($selectedPlan === 'premium') bg-secondary @endif flex flex-col border border-primary rounded-3xl py-[12px] px-[20px] w-52 h-44 items-center cursor-pointer hover:bg-gray-100" wire:click="selectPlan('premium')" >
                    <h3 class="underline text-lg font-medium text-center">Premium</h3>
                    <div class="flex flex-col items-start h-fit -mt-4">
                        <div class="flex flex-row items-baseline">
                            <p class="text-4xl h-max mr-1 text-gray-300">.</p>
                            <p class="text-primary text-sm font-medium">Destaque nas buscas;</p>
                        </div>
                        <div class="flex flex-row items-baseline -mt-3">
                            <p class="text-4xl h-max mr-1 text-gray-300">.</p>
                            <p class="text-primary text-sm font-medium">Informações sobre seus concorrentes.</p>
                        </div>
                    </div>
                </div>
            </div>
            <x-primary-button class="mt-10 underline">
                {{ __('Criar Conta') }}
            </x-primary-button>

        </form>
    </div>
</div>
