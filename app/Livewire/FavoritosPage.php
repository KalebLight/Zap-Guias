<?php

namespace App\Livewire;

use App\Models\Favorito;
use Auth;
use Livewire\Component;

class FavoritosPage extends Component
{
    public $favoritos;
    public $services;

    public function mount()
    {
        $this->favoritos = Favorito::where('user_id', Auth::id())->get();
        $this->services = $this->favoritos->pluck('servico')->unique();


    }

    public function render()
    {
        return view('livewire.favoritos-page')->layout('layouts.app');
    }
}
