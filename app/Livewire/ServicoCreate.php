<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Servico;
use Masmerise\Toaster\Toaster;

class ServicoCreate extends Component
{
    use WithFileUploads;
    public string $titulo = '';
    public string $descricao = '';
    public string $preco = '';
    public $foto_servico = null;
    public string $inclui = '';
    public string $local = '';

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string|max:2000',
        'preco' => 'required|string',
        'foto_servico' => 'nullable|image|max:1024',
        'inclui' => 'nullable|string|max:1000',
        'local' => 'required|string|max:255',
    ];

    public function createService()
    {
        $this->validate();
        try {
            $precoNumerico = floatval(str_replace(['R$', '.', ','], ['', '', '.'], $this->preco));

            $fotoPath = $this->foto_servico ? $this->foto_servico->store('servicos', 'public') : null;
            Servico::create([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'preco' => $precoNumerico,
                'foto_servico' => $fotoPath,
                'inclui' => $this->inclui,
                'local' => $this->local,
                'empresa_type' => Auth::user()->company_type,
                'empresa_id' => Auth::user()->company_id,
            ]);
            $this->reset(['titulo', 'descricao', 'preco', 'foto_servico', 'inclui', 'local']);
            Toaster::success('Serviço salvo com sucesso!');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            $this->addError('servicos', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.servico-create')->layout('layouts.app');
    }
}
