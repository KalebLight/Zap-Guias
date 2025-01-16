<?php

namespace App\Livewire;

use Livewire\Component;

class ModalAddressEdit extends Component
{
    public bool $isOpen = false;

    protected $listeners = ['openAddressModal', 'closeAddressModal'];

    public function openAddressModal()
    {
        $this->isOpen = true;
    }

    public function closeAddressModal()
    {
        $this->isOpen = false;
    }
    public function render()
    {
        return view('components.modal-address-edit');
    }
}
