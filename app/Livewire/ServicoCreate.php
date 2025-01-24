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
        'descricao' => 'nullable|string|max:2000',
        'preco' => 'nullable|string',
        'foto_servico' => 'nullable|image|max:1024',
        'inclui' => 'nullable|string|max:1000',
        'local' => 'nullable|string|max:255',
    ];

    public function createService()
    {
        try {
            // Validação inicial
            $validatedData = $this->validate();

            // Convertendo o preço para um formato numérico correto
            $precoNumerico = floatval(str_replace(['R$', '.', ','], ['', '', '.'], $validatedData['preco'] ?? '0'));

            // Salvando a foto, caso enviada
            $fotoPath = $validatedData['foto_servico'] ? $this->foto_servico->store('servicos', 'public') : null;

            // Criando o serviço no banco de dados
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

            // Resetando os campos e exibindo sucesso
            $this->reset(['titulo', 'descricao', 'preco', 'foto_servico', 'inclui', 'local']);
            Toaster::success('Serviço salvo com sucesso!');
            return redirect()->route('dashboard');

        } catch (\Illuminate\Validation\ValidationException $e) {

            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
        } catch (\Exception $e) {
            // Lançando erros genéricos

            $this->addError('servicos', 'Erro ao criar o serviço: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.servico-create')->layout('layouts.app');
    }
}
