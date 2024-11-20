<?php

namespace App\Livewire;

use Livewire\Component;

class SearchDesktopButton extends Component
{   
     public string $iconDefault;
    public string $iconHover;
    public string $text;
    public bool $isOpen = false;

    public function toggleContainer(bool $state)
    {
        $this->isOpen = $state;
    }


    public function render()
    {
        return view('livewire.search-desktop-button');
    }
}
