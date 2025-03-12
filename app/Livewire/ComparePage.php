<?php

namespace App\Livewire;

use App\Helpers\CompanyHelper;
use App\Models\Servico;
use Livewire\Component;
use App\Helpers\Formatters; // Adicione esta linha para importar o namespace

class ComparePage extends Component
{
    public $compareData = [];

    public function mount()
    {
        $compareData = session()->get('compareData', []);
        $formattedData = collect($compareData)->map(function ($item) {

            if ($item instanceof Servico) {
                $empresa = Servico::find($item['id'])->empresa;

                return [
                    'bio' => $empresa->bio ?? '—',
                    'model_type' => 'Serviço de ' . CompanyHelper::getCompanyType(class_basename($empresa)),
                    'cidade' => $empresa->municipio ?? '—',
                    'idiomas' => $this->formatarIdiomas($empresa->idiomas),
                    'preco' => 'R$ ' . $item->preco,
                    'formas_de_pagamento' => implode(', ', formataFormasDePagamento(array_filter(json_decode($empresa->formas_de_pagamento, true) ?? []))),
                    'funcionamento' => getIntervaloDeFuncionamento(json_decode($empresa->funcionamento, true)),
                    'telefone' => $empresa->telefone ?? '—',
                    'whatsapp' => $empresa->whatsapp ?? '—',
                    'instagram' => $empresa->instagram ?? '—',
                    'facebook' => $empresa->facebook ?? '—',
                    'website' => $empresa->website,
                    'email' => $empresa->email_comercial ?? '—',
                    'dados_especificos' => json_decode($empresa->dados_especificos, true) ?? [],
                ];

            } else {

                return [
                    'bio' => $item['bio'] ?? '—',
                    'model_type' => CompanyHelper::getCompanyType(class_basename($item)),
                    'cidade' => $item['municipio'] ?? '—',
                    'idiomas' => $this->formatarIdiomas($item['idiomas']),
                    'formas_de_pagamento' => implode(', ', formataFormasDePagamento(array_filter(json_decode($item['formas_de_pagamento'], true) ?? []))),
                    'funcionamento' => getIntervaloDeFuncionamento(json_decode($item['funcionamento'], true)),
                    'telefone' => $item['telefone'] ?? '—',
                    'whatsapp' => $item['whatsapp'] ?? '—',
                    'instagram' => $item['instagram'] ?? '—',
                    'facebook' => $item['facebook'] ?? '—',
                    'website' => $item['website'],
                    'email' => $item['email_comercial'] ?? '—',
                    'dados_especificos' => json_decode($item['dados_especificos'], true) ?? [],
                ];
            }
        })->toArray();

        $this->compareData = $formattedData;
    }

    private function formatarIdiomas($idiomasJson)
    {
        $idiomas = json_decode($idiomasJson, true, 512, JSON_UNESCAPED_UNICODE);
        if (empty($idiomas)) {
            return '—';
        }
        $idiomas = array_map(function ($idioma) {
            return str_replace('\\u', '&#x', $idioma);
        }, $idiomas);
        $idiomas = array_map(function ($idioma) {
            return html_entity_decode($idioma, ENT_QUOTES, 'UTF-8');
        }, $idiomas);

        return implode('; ', $idiomas);
    }

    public function render()
    {
        return view('livewire.compare-page')->layout('layouts.app');
    }
}