<?php

namespace App\Livewire;

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
        $this->partners = collect()->merge(Restaurante::all())->merge(TurismoNautico::all());
    }

    public function render()
    {
        return view('livewire.dashboard')
            ->layout('layouts.app');
    }
}
