<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public array $registerUserData = [];
    public string $tipoDeAtividade = '';
    public string $atividadeEspecialidade = '';
    public string $numeroDeCertificado = '';
    public string $uf = '';

    public array $tiposDeAtividade = [
        'Guia de Turismo', 
        'Agência de Turismo', 
        'Transportadora Turística', 
        'Restaurante, Cafeteria, Bar e etc.', 
        'Parque Aquático e Empreendimento de Lazer',
        'Parque Temático',
        'Meio de Hospedagem',
        'Locadora de Veículos para Turistas', 
        'Acampamento Turístico',
        'Casa de Espetáculos',
        'Turismo Náutico',
        'Organizadora de Eventos',
        'Centro de Convenções',

    ];

    public array $atividades = [
       'Guia de Turismo' => ['Atrativo Cultural', 'Excursão Internacional', 'Excursão Nacional - Brasil / América do Sul', 'Guia Regional', 'Guia Especializado em Atrativo Turístico'],
        'Agência de Turismo' => ['Turismo Cultural', 'Turismo de Negócios e Eventos', 'Turismo de Sol e Praia', 'Turismo de Aventura', 'Ecoturismo', 'Turismo de Saúde','Turismo de Esporte','Turismo de Estudo e Intercâmbio','Turismo de Pesca', 'Turismo Náutico', 'Turismo Rural', 'Turismo Social', 'Turismo Religioso'],
        'Transportadora Turística' => [ 'Pacote de viagem', 'Passeio local', 'Traslado', 'Especial'],
        'Restaurante, Cafeteria, Bar e etc.' => ['Árabe', 'Italiana', 'Brasileira', 'Francesa', 'Cozinha regional', 'Americana', 'Alemã', 'Tailandesa', 'Japonesa', 'Portuguesa', 'Chinesa', 'Asiática', 'Espanhola', 'Mexicana', 'Argentina', 'Grega', 'Indiana', 'Marroquina', 'Portguesa'],
        'Parque Aquático e Empreendimento de Lazer' => ['Parque Aquático', 'Empreendimento de Lazer'],
        'Parque Temático' => ['Água', 'Entretenimento', 'Histórico', 'Cultural', 'Ficção', 'Tecno-científico'],
        'Meio de Hospedagem' => ['Hotel', 'Flat', 'Pousada', 'Outros', 'Hotel Fazenda', 'Resort', 'Albergue', 'Cama e Café', 'Hotel Histórico', 'Alojamento de Floresta', 'Hostel', 'Apart-Hotel'],
        'Locadora de Veículos para Turistas' => ['Locadora de Veículos para Turistas'],
        'Acampamento Turístico' => ['Acampamento Turístico'],
        'Casa de Espetáculos' => ['Casa de Espetáculos'],
        'Turismo Náutico' => ['Marina só vagas molhadas', 'Marina só vagas secas', 'Passagem (escala temporária)', 'Marina de encalhe', 'Serviços/Reparos/Estaleiro', 'Urbana'],
        'Organizadora de Eventos' => ['Organizadora de congressos, convenções e congêneres', 'Organizadora de feiras de negócios, exposições e congêneres'],
        'Centro de Convenções' => ['Centro de Convenções e Feiras', 'Pavilhão de Feiras, Centro de Eventos, Arena Multiuso e Espaço para Eventos', 'Centro de Exposições'],
    ];

    public array $ufs = ['AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PB', 'PE', 'PI', 'PR', 'RJ', 'RN', 'RO', 'RR', 'RS', 'SC', 'SE', 'SP', 'TO'];

    public array $atividadesEspecialidade = [];

    public function mount()
    {
        $this->registerUserData = session()->get('register_user_data', []);

        if (empty($this->registerUserData)) {
            return redirect()->route('register');
        }
    }

    public function updatedTipoDeAtividade(string $value): void
    {
        $this->atividadesEspecialidade = $this->atividades[$value] ?? [];
        $this->atividadeEspecialidade = '';
    }

    public function registerUserAndCompany()
    {
        event(new Registered(($user = User::create($this->registerUserData))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="w-fit h-full flex justify-start items-start">
    <div>

        <form wire:submit="registerUserAndCompany">
            <h2 class="text-primary font-black text-5xl">Sobre sua</h2>
            <h2 class="text-secondary font-black text-5xl mb-5">EMPRESA</h2>

            <!-- tipo de atividade -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full ">
                    <x-input-select wireModel="tipoDeAtividade" id="tipoDeAtividade" firtOption='Tipo de Atividade'
                        :options="$tiposDeAtividade" />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('tipoDeAtividade')" class="mt-2" />
            </div>


            <!-- atividade/especialidade -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
               
                <x-input-select wireModel="atividadeEspecialidade" id="atividadeEspecialidade" firtOption='Selecione a Atividade/Especialidade'
                :options="$atividadesEspecialidade" />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('atividadeEspecialidade')" class="mt-2" />
            </div>


            <!-- numero de certificado -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="numeroDeCertificado" id="numeroDeCertificado" class="block mt-1 w-full"
                        type="text" name="numeroDeCertificado" required autofocus autocomplete="numeroDeCertificado"
                        placeholder='Número de Certificado' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('numeroDeCertificado')" class="mt-2" />
            </div>

            <!-- municipio -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="municipio" id="municipio" class="block mt-1 w-full" type="text"
                        name="municipio" required autofocus autocomplete="municipio" placeholder='Município' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('municipio')" class="mt-2" />
            </div>
  
            <!-- uf -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full ">

                    <x-input-select wireModel="uf" id="uf" firtOption='UF'
                        :options="$ufs" />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('tipoDeAtividade')" class="mt-2" />
            </div>


            <!-- email comercial-->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="emailComercial" id="emailComercial" class="block mt-1 w-full"
                        type="text" name="emailComercial" required autofocus autocomplete="emailComercial"
                        placeholder='E-Mail Comercial' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('emailComercial')" class="mt-2" />
            </div>

            <!-- categoria -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model="categoria" id="categoria" class="block mt-1 w-full" type="text"
                        name="categoria" required autofocus autocomplete="categoria" placeholder='Categoria' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
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
