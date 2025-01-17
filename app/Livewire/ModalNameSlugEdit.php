<?php

namespace App\Livewire;

use App\Helpers\CompanyHelper;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use function PHPUnit\Framework\isEmpty;

class ModalNameSlugEdit extends Component
{

    public $partner;
    public bool $isOpen = false;
    public string $nome_fantasia = '';
    public $slug = '';

    public function mount()
    {
        $this->nome_fantasia = $this->partner->nome_fantasia;
        $this->slug = $this->partner->slug;
    }

    public function saveData()
    {
        if ($this->nome_fantasia == '') {
            $this->addError('nameSlug', 'Nome não pode ser vazio!');
            return;
        }

        if (strlen($this->nome_fantasia) < 5) {
            $this->addError('nameSlug', 'Nome precisa ter pelo menos 5 caracteres!');
            return;
        }

        if (strlen($this->slug) < 3) {
            $this->addError('nameSlug', 'URL precisa ter pelo menos 3 caracteres!');
            return;
        }


        if ($this->slug !== $this->partner->slug && CompanyHelper::isSlugUsed($this->slug)) {
            $this->addError('nameSlug', 'URL já utilizada!');
            return;
        }

        if (
            $this->slug !== $this->partner->slug &&
            CompanyHelper::isSlugUsed($this->slug) ||
            !preg_match('/^[a-zA-Z0-9-_]+$/', $this->slug)
        ) {
            $this->addError('nameSlug', 'URL inválida! Caracteres especiais e espaços não são permitidos.');
            return;
        }


        $this->partner->update([
            'nome_fantasia' => $this->nome_fantasia,
            'slug' => $this->slug,
        ]);
        Toaster::success('Dados salvos com sucesso');

        return redirect(route('partner.profile', ['slug' => $this->partner->slug]));
    }


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
