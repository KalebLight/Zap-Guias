@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center text-primary font-bold p-2'
: 'inline-flex items-center text-primary hover:bg-gray-100 transition duration-150 ease-in-out p-2';


@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
