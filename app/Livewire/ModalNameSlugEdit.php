<?php

namespace App\Livewire;

use App\Helpers\CompanyHelper;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Storage;
use function PHPUnit\Framework\isEmpty;

class ModalNameSlugEdit extends Component
{
    use WithFileUploads;

    public $partner;
    public bool $isOpen = false;
    public string $nome_fantasia = '';
    public $slug = '';
    public $foto_perfil = '';

    public function mount()
    {
        $this->nome_fantasia = $this->partner->nome_fantasia;
        $this->slug = $this->partner->slug;

    }

    public function saveData()
    {
        // Validação dos campos
        $this->validate([
            'nome_fantasia' => ['required', 'string', 'max:255', 'min:3'],
            'slug' => ['required', 'string', 'max:255', 'min:3'],
            'foto_perfil' => ['nullable', 'image', 'max:1024'], // Limite de 1MB
        ]);

        // Verifica se uma nova foto foi carregada
        if ($this->foto_perfil instanceof \Illuminate\Http\UploadedFile) {
            // Apaga a foto anterior
            if ($this->partner->foto_perfil) {
                Storage::disk('public')->delete($this->partner->foto_perfil);
            }

            // Upload da nova foto
            $filePath = $this->foto_perfil->store('fotos_parceiros', 'public');
            $this->partner->foto_perfil = $filePath;
        }

        // Atualizar os dados do parceiro
        $this->partner->update([
            'nome_fantasia' => $this->nome_fantasia,
            'slug' => $this->slug,
            'foto_perfil' => $this->partner->foto_perfil, // Atualiza a foto, se necessário
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
