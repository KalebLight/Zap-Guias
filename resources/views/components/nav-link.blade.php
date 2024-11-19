@props(['active'])
@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center text-primary p-2  sm:mx-2 font-bold text-xl'
            : 'inline-flex font-light  sm:font-normal  sm:mx-2 items-center text-primary hover:bg-gray-100 transition duration-150 ease-in-out p-2 text-xl';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
