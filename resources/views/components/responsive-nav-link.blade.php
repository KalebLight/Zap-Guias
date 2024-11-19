@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center text-primary p-2 sm:font-bold w-full'
            : 'inline-flex font-normal items-center text-primary hover:bg-gray-100 transition duration-150 ease-in-out p-2 w-full';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
