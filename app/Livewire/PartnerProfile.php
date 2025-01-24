<?php

namespace App\Livewire;

use App\Helpers\CompanyHelper;
use Livewire\Component;

class PartnerProfile extends Component
{

    public $partner;

    public $formasDePagamento;

    public $ativas;



    public function mount($slug)
    {
        $models = CompanyHelper::getModels();


        foreach ($models as $model) {
            $this->partner = $model::where('slug', $slug)->first();
            if ($this->partner) {
                $this->formasDePagamento = json_decode($this->partner->formas_de_pagamento, true);
                if ($this->formasDePagamento) {
                    $this->ativas = formataFormasDePagamento(array_filter($this->formasDePagamento));
                }
                return;
            }
        }
        abort(404, 'Empresa não encontrada');
    }

    public function render()
    {
        return view('livewire.partner-profile')->layout('layouts.app');
        ;
    }
}
