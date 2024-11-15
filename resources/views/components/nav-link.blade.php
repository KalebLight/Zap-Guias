
@props(['active'])
@php
  $classes = ($active ?? false)
    ? 'inline-flex items-center text-primary p-2 font-bold'
    : 'inline-flex font-light  sm:font-normal items-center text-primary hover:bg-gray-100 transition duration-150 ease-in-out p-2';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
