<?php

namespace App\Livewire;

use Livewire\Component;

class PartnerProfile extends Component
{

    public $partner;

    public $formasDePagamento;

    public $ativas;

    public function mount($slug)
    {
        $models = [
            \App\Models\Restaurante::class,
            \App\Models\Transportadora::class,
            \App\Models\MeioDeHospedagem::class,
            \App\Models\CentroDeConvencoes::class,
            \App\Models\AgenciasDeTurismo::class,
            \App\Models\GuiaDeTurismo::class,
            \App\Models\ParqueAquaticoEEmpreendimentoDeLazer::class,
            \App\Models\ParqueTematico::class,
            \App\Models\LocadoraDeVeiculosParaTuristas::class,
            \App\Models\AcampamentoTuristico::class,
            \App\Models\CasaDeEspetaculos::class,
            \App\Models\OrganizadoraDeEventos::class,
            \App\Models\TurismoNautico::class,
        ];

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
