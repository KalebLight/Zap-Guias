@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-primary focus:border-indigo-500 rounded-full focus:ring-indigo-500 custom-input shadow-sm text-primary placeholder-primary ']) }}>
