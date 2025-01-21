<?php

namespace App\Livewire;

use Livewire\Component;
use App\Helpers\Formatters;


class ShowSpecificFields extends Component
{
    public $partner;
    public $specificData = [];
    public $schema = [];


    public function mount($partner)
    {
        $this->partner = $partner;
        $this->specificData = formatSpecificData(json_decode($partner->dados_especificos, true) ?? []);
    }

    public function render()
    {
        return view('livewire.show-specific-fields');
    }
}

