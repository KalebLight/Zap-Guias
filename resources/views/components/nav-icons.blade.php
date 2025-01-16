<div class="justify-between relative w-full lg:flex hidden">
    @foreach (config('categories') as $text => $items)
        @livewire('search-desktop-button', [
            'iconDefault' => "images/" . strtolower($text) . "-off-icon.svg",
            'iconHover' => "images/" . strtolower($text) . "-on-icon.svg",
            'text' => $text,
            'items' => $items,
        ])
    @endforeach
</div>