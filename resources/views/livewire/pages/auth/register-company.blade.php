<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public array $registerUserData = [];
    public string $tipoDeAtividade = '';
    public string $especialidade = '';
    public string $numero_do_certificado = '';
    public string $municipio = '';
    public string $uf = '';
    public string $email_comercial = '';
    public string $nome_fantasia = '';
    public string $categoria = '';

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
        'Restaurante, Cafeteria, Bar e etc.' => ['Árabe', 'Italiana', 'Brasileira', 'Francesa', 'Cozinha regional', 'Americana', 'Alemã', 'Tailandesa', 'Japonesa', 'Portuguesa', 'Chinesa', 'Asiática', 'Espanhola', 'Mexicana', 'Argentina', 'Grega', 'Indiana', 'Marroquina', 'Portuguesa'],
        'Parque Aquático e Empreendimento de Lazer' => ['Parque Aquático', 'Empreendimento de Lazer'],
        'Parque Temático' => ['Água', 'Entretenimento', 'Histórico', 'Cultural', 'Ficção', 'Tecno-científico'],
        'Meio de Hospedagem' => ['Hotel', 'Flat', 'Pousada', 'Outros', 'Hotel Fazenda', 'Resort', 'Albergue', 'Cama e Café', 'Hotel Histórico', 'Alojamento de Floresta', 'Hostel', 'Apart-Hotel'],
        'Turismo Náutico' => ['Marina só vagas molhadas', 'Marina só vagas secas', 'Passagem (escala temporária)', 'Marina de encalhe', 'Serviços/Reparos/Estaleiro', 'Urbana'],
        'Organizadora de Eventos' => ['Organizadora de congressos, convenções e congêneres', 'Organizadora de feiras de negócios, exposições e congêneres'],
        'Centro de Convenções' => ['Centro de Convenções e Feiras', 'Pavilhão de Feiras, Centro de Eventos, Arena Multiuso e Espaço para Eventos', 'Centro de Exposições'],
    ];

    public array $ufs = ['AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PB', 'PE', 'PI', 'PR', 'RJ', 'RN', 'RO', 'RR', 'RS', 'SC', 'SE', 'SP', 'TO'];

    public array $atividadesEspecialidade = [];

    public function mount()
    {
        
        $this->tipoDeAtividade = session('tipoDeAtividade', '');
        $this->especialidade = session('especialidade', '');
        $this->numero_do_certificado = session('numero_do_certificado', '');
        $this->municipio = session('municipio', '');
        $this->uf = session('uf', '');
        $this->email_comercial = session('email_comercial', '');
        $this->nome_fantasia = session('nome_fantasia', '');
        $this->categoria = session('categoria', '');
        
        if ($this->tipoDeAtividade) {
            $this->atividadesEspecialidade = $this->atividades[$this->tipoDeAtividade] ?? [];
        }

        $this->registerUserData = session()->get('register_user_data', []);

        if (empty($this->registerUserData)) {
            return redirect()->route('register');
        }

    }

    public function updated($propertyName)
{
    session([$propertyName => $this->$propertyName]);
}

    public function updatedTipoDeAtividade(string $value): void
    {
        $this->atividadesEspecialidade = $this->atividades[$value] ?? [];
        $this->especialidade = '';
    }

    public function registrationNextStep()
    {

        $company_data =[
        'tipoDeAtividade' => $this->tipoDeAtividade,
        'especialidade' => $this->especialidade,
        'numero_do_certificado' => $this->numero_do_certificado,
        'municipio' => $this->municipio,
        'uf' => $this->uf,
        'email_comercial' => $this->email_comercial,
        'nome_fantasia' => $this->nome_fantasia,
        'cnpj' => $this->registerUserData['cnpj']
        ];
        
        session()->put('register_company_data', $company_data);
        
        return redirect()->route('register-plan-selection');
    }
}; ?>

<div class="w-fit h-full flex justify-start items-start">
    <div>

        <form wire:submit="registrationNextStep">
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
               
                <x-input-select wireModel="especialidade" id="especialidade" firtOption='Selecione a Atividade/Especialidade'
                :options="$atividadesEspecialidade" />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('especialidade')" class="mt-2" />
            </div>

            <!-- nome_fantasia -->
             <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model.change="nome_fantasia" id="nome_fantasia" class="block mt-1 w-full"
                        type="text" name="nome_fantasia" required autofocus autocomplete="nome_fantasia"
                        placeholder='Nome Fantasia' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('nome_fantasia')" class="mt-2" />
            </div>


            <!-- numero de certificado -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model.change="numero_do_certificado" id="numero_do_certificado" class="block mt-1 w-full"
                        type="text" name="numero_do_certificado" required autofocus autocomplete="numero_do_certificado"
                        placeholder='Número de Certificado' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('numero_do_certificado')" class="mt-2" />
            </div>

            <!-- municipio -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model.change="municipio" id="municipio" class="block mt-1 w-full" type="text"
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
                    <x-text-input wire:model.change="email_comercial" id="email_comercial" class="block mt-1 w-full"
                        type="text" name="email_comercial" required autofocus autocomplete="email_comercial"
                        placeholder='E-Mail Comercial' />
                    <p class="text-secondary text-2xl ml-1">*</p>
                </div>
                <x-input-error :messages="$errors->get('email_comercial')" class="mt-2" />
            </div>

            <!-- categoria -->
            <div class="flex flex-col items-center">
                <div class="flex flex-row w-full">
                    <x-text-input wire:model.change="categoria" id="categoria" class="block mt-1 w-full" type="text"
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
