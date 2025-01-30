<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;

class FavoritarServico extends Component
{
    public $service;
    public $isFavorited = false;

    public function mount()
    {
        if (isset($this->service['id'])) {
            $this->isFavorited = Favorito::where('user_id', Auth::id())
                ->where('servico_id', $this->service['id'])
                ->exists();
        }
    }

    public function toggleFavorito()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        if (!isset($this->service['id'])) {
            return;
        }
        $favorito = Favorito::where('user_id', Auth::id())
            ->where('servico_id', $this->service['id']);
        if ($favorito->exists()) {
            $favorito->delete();
            $this->isFavorited = false;
        } else {
            Favorito::create([
                'user_id' => Auth::id(),
                'servico_id' => $this->service['id'],
            ]);
            $this->isFavorited = true;
        }
        $this->dispatch('favoritoAtualizado', $this->service['id'], $this->isFavorited);
    }

    public function render()
    {
        return view('livewire.favoritar-servico');
    }
}
