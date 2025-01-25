@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'border-primary focus:border-secondary rounded-full focus:ring-indigo-500 custom-input text-primary placeholder-primary  lg:h-[50px] h-[36px]',
]) }}>