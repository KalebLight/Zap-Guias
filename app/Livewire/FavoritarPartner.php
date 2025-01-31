<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\FavoritosPartner;

class FavoritarPartner extends Component
{
    public $partnerId;
    public $partnerType;
    public $isFavorited = false;

    public function mount($partnerId, $partnerType)
    {

        $this->partnerId = $partnerId;
        $this->partnerType = $partnerType;
        $this->isFavorited = FavoritosPartner::where('user_id', Auth::id())
            ->where('partner_id', $this->partnerId)
            ->where('partner_type', $this->partnerType)
            ->exists();
    }

    public function toggleFavorito()
    {
        if ($this->isFavorited) {
            FavoritosPartner::where('user_id', Auth::id())
                ->where('partner_id', $this->partnerId)
                ->where('partner_type', $this->partnerType)
                ->delete();
        } else {
            FavoritosPartner::create([
                'user_id' => Auth::id(),
                'partner_id' => $this->partnerId,
                'partner_type' => $this->partnerType
            ]);
        }

        $this->isFavorited = !$this->isFavorited;
    }

    public function render()
    {
        return view('livewire.favoritar-partner');
    }
}
