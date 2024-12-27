<?php

namespace App\Livewire;

use Livewire\Component;

class ButtonLink extends Component
{

    public string $text;
    public $items = [];


    public function render()
    {
        return view('livewire.button-link');
    }
}
