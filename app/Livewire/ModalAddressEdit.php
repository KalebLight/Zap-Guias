<?php

namespace App\Livewire;

use App\Helpers\CompanyHelper;
use Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ModalAddressEdit extends Component
{
    public bool $isOpen = false;
    public $partner = [];

    public array $endereco = [
        'logradouro' => '',
        'numero' => '',
        'bairro' => '',
        'cidade' => '',
        'estado' => '',
        'cep' => '',
    ];

    public function mount()
    {


        $enderecoPartner = json_decode($this->partner->endereco, true);

        if ($this->partner) {
            $this->endereco['logradouro'] = $enderecoPartner['logradouro'] ?? '';
            $this->endereco['numero'] = $enderecoPartner['numero'] ?? '';
            $this->endereco['bairro'] = $enderecoPartner['bairro'] ?? '';
            $this->endereco['cidade'] = $enderecoPartner['cidade'] ?? '';
            $this->endereco['estado'] = $enderecoPartner['estado'] ?? '';
            $this->endereco['cep'] = $enderecoPartner['cep'] ?? '';
        }
    }

    protected $listeners = ['openAddressModal', 'closeAddressModal'];

    public function openAddressModal()
    {
        $this->isOpen = true;
    }

    public function closeAddressModal()
    {
        $this->isOpen = false;
    }

    public function saveData()
    {
        // Validação de campos obrigatórios
        $camposObrigatorios = [
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'cep' => 'CEP',
        ];

        foreach ($camposObrigatorios as $campo => $nomeCampo) {
            if (empty($this->endereco[$campo])) {
                $this->addError('address', 'Preencha todos os campos');
                return;
            }
        }

        $this->partner->update([
            'endereco' => json_encode($this->endereco),
        ]);

        Toaster::success('Dados salvos com sucesso');
        return redirect(request()->header('Referer'))->with('success', 'Informações atualizadas com sucesso.');
    }


    public function render()
    {
        return view('components.modal-address-edit');
    }
}
