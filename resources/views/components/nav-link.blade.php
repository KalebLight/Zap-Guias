@props(['active'])
@php
    $classes =
        $active ?? false
        ? 'inline-flex items-center text-primary p-2  sm:mx-2 font-bold sm:text-xl text-base'
        : 'inline-flex font-light  sm:font-normal  sm:mx-2 items-center text-primary hover:bg-gray-100 transition duration-150 ease-in-out p-2  sm:text-xl text-base';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>