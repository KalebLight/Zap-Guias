<?php

namespace App\Livewire;

use App\Helpers\CompanyHelper;
use Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ModalBioEdit extends Component
{
    public $partner = [];
    public bool $isOpen = false;
    public string $bio = '';

    protected $listeners = ['openModalBioEdit', 'closeModalBioEdit'];

    function mount()
    {
        if (Auth::user()) {

            $user = Auth::user();
            $this->partner = CompanyHelper::findCompanyByCNPJ($user->cnpj);

            if ($this->partner) {
                $this->bio = $this->partner->bio ?? '';
            }
        }
    }

    public function openModalBioEdit()
    {
        $this->isOpen = true;

    }

    public function closeModalBioEdit()
    {
        $this->isOpen = false;
    }

    public function saveData()
    {
        $this->partner->update([
            'bio' => $this->bio,

        ]);
        Toaster::success('Dados salvos com sucesso');

        return redirect(request()->header('Referer'))->with('success', 'Informações atualizadas com sucesso.');
    }

    public function render()
    {
        return view('components.modal-bio-edit');
    }
}
