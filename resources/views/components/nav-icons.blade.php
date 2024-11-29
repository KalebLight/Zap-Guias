<div class="flex justify-between relative w-full  md:px-[100px] lg:px-[188px] sm:px-[60px]">
    @livewire('search-desktop-button', [
        'iconDefault' => 'images/passeios-off-icon.svg',
        'iconHover' => 'images/passeios-on-icon.svg',
        'text' => 'Passeios',
    ])
    @livewire('search-desktop-button', [
        'iconDefault' => 'images/entretenimento-off-icon.svg',
        'iconHover' => 'images/entretenimento-on-icon.svg',
        'text' => 'Entretenimento',
    ])
    @livewire('search-desktop-button', [
        'iconDefault' => 'images/hospedagem-off-icon.svg',
        'iconHover' => 'images/hospedagem-on-icon.svg',
        'text' => 'Hospedagem',
    ])
    @livewire('search-desktop-button', [
        'iconDefault' => 'images/restaurantes-off-icon.svg',
        'iconHover' => 'images/restaurantes-on-icon.svg',
        'text' => 'Restaurantes',
    ])
    @livewire('search-desktop-button', [
        'iconDefault' => 'images/transporte-off-icon.svg',
        'iconHover' => 'images/transporte-on-icon.svg',
        'text' => 'Transporte',
    ])
</div>
