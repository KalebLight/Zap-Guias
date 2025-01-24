<?php

namespace App\Livewire;

use App\Models\AcampamentoTuristico;
use App\Models\AgenciasDeTurismo;
use App\Models\CasaDeEspetaculos;
use App\Models\CentroDeConvencoes;
use App\Models\GuiaDeTurismo;
use App\Models\LocadoraDeVeiculosParaTuristas;
use App\Models\MeioDeHospedagem;
use App\Models\OrganizadoraDeEventos;
use App\Models\ParqueAquaticoEEmpreendimentoDeLazer;
use App\Models\ParqueTematico;
use App\Models\Restaurante;
use App\Models\TurismoNautico;
use Livewire\Component;

class Dashboard extends Component
{

    public $partners = [];

    public function mount()
    {
        $this->loadPartners();
    }

    public function loadPartners()
    {
        $this->partners = collect()->merge(Restaurante::all())->merge(TurismoNautico::all())->merge(GuiaDeTurismo::all())->merge(CentroDeConvencoes::all())->merge(CasaDeEspetaculos::all())->merge(AcampamentoTuristico::all())->merge(LocadoraDeVeiculosParaTuristas::all())->merge(AgenciasDeTurismo::all())->merge(ParqueAquaticoEEmpreendimentoDeLazer::all()->merge(ParqueTematico::all())->merge(MeioDeHospedagem::all())->merge(OrganizadoraDeEventos::all()));
    }

    public function render()
    {
        return view('livewire.dashboard')
            ->layout('layouts.app');
    }
}
