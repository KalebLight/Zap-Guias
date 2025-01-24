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
            $validatedData = $this->validate();

            // Tratando o preço para valores vazios
            $precoNumerico = $this->preco !== ''
                ? floatval(str_replace(['R$', '.', ','], ['', '', '.'], $this->preco))
                : null;

            // Salvando a foto, caso enviada
            $fotoPath = $this->foto_servico ? $this->foto_servico->store('servicos', 'public') : null;

            // Criando o serviço no banco de dados
            Servico::create([
                'titulo' => $validatedData['titulo'],
                'descricao' => $validatedData['descricao'],
                'preco' => $precoNumerico, // Salva null se não preenchido
                'foto_servico' => $fotoPath,
                'inclui' => $validatedData['inclui'],
                'local' => $validatedData['local'],
                'empresa_type' => Auth::user()->company_type,
                'empresa_id' => Auth::user()->company_id,
            ]);

            // Resetando os campos
            $this->reset(['titulo', 'descricao', 'preco', 'foto_servico', 'inclui', 'local']);
            $this->dispatchBrowserEvent('reset-inputs');
            // Exibindo mensagem de sucesso
            Toaster::success('Serviço salvo com sucesso!');

            // Redirecionando para a página anterior
            return redirect()->to(url()->previous());
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



    public function updatePreco($value)
    {
        // Remove a formatação (R$, pontos, e vírgulas)
        $cleanValue = str_replace(['R$', '.', ','], ['', '', '.'], $value);
        $this->preco = number_format((float) $cleanValue, 2, '.', '');
    }

    public function render()
    {
        return view('livewire.servico-create')->layout('layouts.app');
    }
}
