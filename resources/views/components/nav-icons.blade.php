<div class="justify-between relative w-full md:px-[100px] lg:px-[188px] sm:px-[60px] flex lg:flex hidden lg:block">
    @foreach (config('categories') as $text => $items)
        @livewire('search-desktop-button', [
            'iconDefault' => "images/" . strtolower($text) . "-off-icon.svg",
            'iconHover' => "images/" . strtolower($text) . "-on-icon.svg",
            'text' => $text,
            'items' => $items,
        ])
    @endforeach
</div>