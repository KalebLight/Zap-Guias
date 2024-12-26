<div class="justify-between relative w-full md:px-[100px] lg:px-[188px] sm:px-[60px] flex lg:flex hidden lg:block">
    @livewire('search-desktop-button', [
    'iconDefault' => 'images/passeios-off-icon.svg',
    'iconHover' => 'images/passeios-on-icon.svg',
    'text' => 'Passeios',
    'items' => ['Ecoturismo', 'Social', 'Sol e Praia', 'Aventura', 'Cultural', 'Rural', 'Pesca', 'Naútico', 'Negócios e Eventos', 'Estudo e Intercâmbio', 'Esporte', 'Saúde']
])
    @livewire('search-desktop-button', [
    'iconDefault' => 'images/entretenimento-off-icon.svg',
    'iconHover' => 'images/entretenimento-on-icon.svg',
    'text' => 'Entretenimento',
    'items' => ['Cinema', 'Teatro', 'Shows']
])
    @livewire('search-desktop-button', [
    'iconDefault' => 'images/hospedagem-off-icon.svg',
    'iconHover' => 'images/hospedagem-on-icon.svg',
    'text' => 'Hospedagem',
    'items' => ['Hotéis', 'Pousadas', 'Hostels']
])
    @livewire('search-desktop-button', [
    'iconDefault' => 'images/restaurantes-off-icon.svg',
    'iconHover' => 'images/restaurantes-on-icon.svg',
    'text' => 'Restaurantes',
    'items' => ['Italiano', 'Regional', 'Braisileiro', 'Japonês', 'Chinês', 'Francês', 'Espanhol', 'Alemão', 'Mexicano', 'Asiático', 'Marroquino', 'Português', 'Americano', 'Tailandês', 'Argentino', 'Indiano', 'Grego', 'Árabe',]
])
    @livewire('search-desktop-button', [
    'iconDefault' => 'images/transporte-off-icon.svg',
    'iconHover' => 'images/transporte-on-icon.svg',
    'text' => 'Transporte',
    'items' => ['Táxi', 'Ônibus', 'Carro Alugado']
])
</div>