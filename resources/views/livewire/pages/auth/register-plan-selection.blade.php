<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Services\CompanyRegistrationService;

new #[Layout('layouts.guest')] class extends Component {
    public array $registerUserData = [];
    public array $registerCompanyData = [];
    public ?string $selectedPlan = '';

    public function mount()
    {
        $this->registerUserData = session()->get('register_user_data', []);
        $this->registerCompanyData = session()->get('register_company_data', []);
        
        if ((empty($this->registerUserData)) || (empty($this->registerCompanyData)) ) {
            return redirect()->route('register');
        }
    }

    public function selectPlan(string $plan)
    {
        $this->selectedPlan = $plan; 
    }

    public function verifyPlan(){
        if ($this->selectedPlan == null || empty($this->selectedPlan)){
            
            return;
        }
        else if ($this->selectedPlan == 'gratis'){
            $this->registerUserAndCompany();
        }
        else{
            //FAZER FLUXO DE COMPRA DE CONTA PREMIUM            
        }
    }

    public function registerUserAndCompany()
    {    
        $service = new CompanyRegistrationService();
        
    try {
        $service->registerCompany($this->registerUserData, $this->registerCompanyData);
        Auth::loginUsingId(User::latest()->first()->id);
        session()->forget(['register_user_data', 'register_company_data']);
        redirect()->route('dashboard');
    } catch (\Exception $e) {       
        dd($e) ;
        $this->addError('general', $e->getMessage());
    }
    }
}; ?>

<div class="w-fit h-full flex justify-start items-start">
    <div>

        <form wire:submit.prevent="verifyPlan">
            <h2 class="text-primary font-black text-5xl">ESCOLHA SEU</h2>
            <h2 class="text-secondary font-black text-5xl mb-5">PLANO</h2>
            <div class="flex flex-row justify-between">

                <div class="@if($selectedPlan === 'gratis') bg-gray-200 @endif flex flex-col border border-primary rounded-3xl py-[12px] px-[20px] w-52 h-44 items-center cursor-pointer 
                @if($selectedPlan !== 'gratis') hover:bg-gray-100 @endif" 
                wire:click="selectPlan('gratis')">

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
                    class="@if($selectedPlan === 'premium') bg-gray-200 @endif flex flex-col border border-primary rounded-3xl py-[12px] px-[20px] w-52 h-44 items-center cursor-pointer @if($selectedPlan !== 'premium') hover:bg-gray-100 @endif" wire:click="selectPlan('premium')" >
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
