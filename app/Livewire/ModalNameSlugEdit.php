<?php

namespace App\Livewire;

use Livewire\Component;

class ModalNameSlugEdit extends Component
{
    public $partner = [];
    public bool $isOpen = false;

    protected $listeners = ['openModalNameSlugEdit', 'closeModalNameSlugEdit'];

    public function openModalNameSlugEdit()
    {
        $this->isOpen = true;

    }

    public function closeModalNameSlugEdit()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('components.modal-name-slug-edit');
    }
}
