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
        $user = Auth::user();

        if ($user && $user->cnpj) {
            $this->partner = CompanyHelper::findCompanyByCNPJ($user->cnpj);
        }
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
