<?php

namespace App\Livewire;

use Livewire\Component;

class ModalBioEdit extends Component
{

    public bool $isOpen = false;
    public string $id;

    protected $listeners = ['openModalBioEdit', 'closeModalBioEdit'];

    public function openModalBioEdit()
    {
        $this->isOpen = true;

    }

    public function closeModalBioEdit()
    {
        $this->isOpen = false;
    }
    public function render()
    {
        return view('components.modal-bio-edit');
    }
}
