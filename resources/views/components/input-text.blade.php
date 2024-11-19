<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {}; ?>

<div class="flex items-center rounded-full border border-primary px-2 py-2 shadow-custom sm:h-11 h-13">

    <!-- Ícone de lupa -->
    <img class="w-8 h-8" src="{{ asset('images/search-icon.svg') }}" alt="Ícone de busca" />

    <!-- Input de texto -->
    <input type="text" placeholder="{{ $text }}"
        class="w-full border-none outline-none text-secondary text-xl font-normal placeholder-secondary bg-transparent focus:ring-0 focus:border-transparent"
        wire:model="query" />
</div>
