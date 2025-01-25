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

    public $referer;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descricao' => 'nullable|string|max:2000',
        'preco' => 'nullable|string',
        'foto_servico' => 'nullable|image|max:1024',
        'inclui' => 'nullable|string|max:1000',
        'local' => 'nullable|string|max:255',
    ];



    public function mount()
    {
        $this->referer = request('referer'); // Obtém o parâmetro 'referer' da URL
    }


    public function formatPreco($precoEntrada)
    {
        $precoSaida = str_replace('R$ ', '', $precoEntrada);
        $precoSaida = str_replace('.', '', $precoSaida);
        $precoSaida = str_replace(',', '.', $precoSaida);
        $precoSaida = floatval($precoSaida);
        return $precoSaida;
    }
    public function createService()
    {
        $this->formatPreco($this->preco);
        try {
            $validatedData = $this->validate();
            $this->preco = $this->formatPreco($this->preco);
            $precoNumerico = $this->preco ?? null;

            $fotoPath = $this->foto_servico ? $this->foto_servico->store('servicos', 'public') : null;

            Servico::create([
                'titulo' => $validatedData['titulo'],
                'descricao' => $validatedData['descricao'],
                'preco' => $precoNumerico,
                'foto_servico' => $fotoPath,
                'inclui' => $validatedData['inclui'],
                'local' => $validatedData['local'],
                'empresa_type' => Auth::user()->company_type,
                'empresa_id' => Auth::user()->company_id,
            ]);

            $this->reset(['titulo', 'descricao', 'preco', 'foto_servico', 'inclui', 'local']);
            Toaster::success('Serviço salvo com sucesso!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
        } catch (\Exception $e) {
            $this->addError('servicos', 'Erro ao criar o serviço: ' . $e->getMessage());
        }
    }

    public function onlyOne()
    {
        $this->createService();
        $this->goBack();
    }

    public function oneMore()
    {
        $this->createService();
        $this->reset(['titulo', 'descricao', 'preco', 'foto_servico', 'inclui', 'local']);


    }

    public function goBack()
    {
        redirect($this->referer);
    }

    public function render()
    {
        return view('livewire.servico-create')->layout('layouts.app');
    }
}
