<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {}; ?>

<a href="{{ route($route) }}"
    class="text-5xl font-black text-secondary hover:underline transition duration-150 ease-in-out no-underline mt-2"
    wire:navigate>
    {{ $text }}
</a>
