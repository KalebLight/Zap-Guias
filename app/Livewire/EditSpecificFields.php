<?php

namespace App\Livewire;

use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditSpecificFields extends Component
{
    public bool $isOpen = false;
    public $partner;
    public $schema = [];
    public $dadosEspecificos = [];

    protected $listeners = ['openModalSpecificData', 'closeModalSpecificData'];

    public function mount($partner)
    {
        $this->partner = $partner;

        // Carregar campos do JSON
        $schemaFile = config_path('specific-models.json');
        $schemas = json_decode(file_get_contents($schemaFile), true);
        $partnerName = class_basename($partner);

        // Carregar o schema e formatar labels usando o helper
        $this->schema = collect($schemas[$partnerName] ?? [])
            ->mapWithKeys(function ($details, $key) {
                $formattedLabel = formatLabels([$key]);

                $details['label'] = $formattedLabel[0];

                return [$key => $details];
            })
            ->toArray();
        // Carregar os dados específicos do parceiro
        $this->dadosEspecificos = json_decode($this->partner->dados_especificos, true) ?? [];

    }

    public function atualizar()
    {
        // Validar os dados
        $this->validate($this->regrasDeValidacao());

        // Substituir os dados no formato JSON associativo
        $dadosAtualizados = [];
        foreach ($this->schema as $campo => $detalhes) {
            $dadosAtualizados[$campo] = $this->dadosEspecificos[$campo] ?? null;
        }

        // Salvar no banco de dados
        $this->partner->update([
            'dados_especificos' => json_encode($dadosAtualizados),
        ]);

        Toaster::success('Dados salvos com sucesso');
        return redirect(request()->header('Referer'))->with('success', 'Informações atualizadas com sucesso.');
    }

    private function regrasDeValidacao()
    {
        $regras = [];
        foreach ($this->schema as $campo => $detalhes) {
            if ($detalhes['tipo'] === 'number') {
                $regras["dadosEspecificos.$campo"] = 'nullable|numeric';
            } elseif ($detalhes['tipo'] === 'text') {
                $regras["dadosEspecificos.$campo"] = 'nullable|string';
            }
        }
        return $regras;
    }

    public function openModalSpecificData()
    {
        $this->isOpen = true;
    }

    public function closeModalSpecificData()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.edit-specific-fields');
    }
}
