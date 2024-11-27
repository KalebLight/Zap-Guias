@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'border-primary focus:border-indigo-500 rounded-full focus:ring-indigo-500 custom-input shadow-sm text-primary placeholder-primary xl:w-[570px] sm:w-[440px] w-[350px] lg:h-[50px]
                     h-[36px]',
    ]) }}>
