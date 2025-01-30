<div x-data="{ isFavorited: @js($isFavorited) }">
    <button @click="isFavorited = !isFavorited; $wire.toggleFavorito();">
        <img x-bind:src="isFavorited ? '{{ asset('images/favorite_on_icon.svg') }}' : '{{ asset('images/favorite_off_icon.svg') }}'" alt="Favorito" class="w-6 h-6">
    </button>
</div>