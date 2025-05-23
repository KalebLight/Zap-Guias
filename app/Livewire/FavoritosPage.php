<?php

namespace App\Livewire;

use App\Models\FavoritosPartner;
use App\Models\FavoritosService;
use Auth;
use Livewire\Component;

class FavoritosPage extends Component
{
    public $favoritosService;
    public $services;
    public $partners;

    public function mount()
    {
        $this->favoritosService = FavoritosService::where('user_id', Auth::id())->get();
        $this->services = $this->favoritosService->pluck('servico')->unique();


        $this->favoritosPartner = FavoritosPartner::where('user_id', Auth::id())->get();
        $this->partners = $this->favoritosPartner->pluck('partner')->unique();

    }

    public function compare($type)
    {
        if ($type === 'services') {
            $data = $this->services;
        } else {
            $data = $this->partners;

        }
        return redirect()->route('compare')->with('compareData', $data);
    }

    public function redirectToCompare()
    {
        return redirect()->route('compare');
    }

    public function render()
    {
        return view('livewire.favoritos-page')->layout('layouts.app');
    }
}
