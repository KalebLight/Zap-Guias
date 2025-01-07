@props(['width' => 'xl:w-[570px] sm:w-[440px] w-[350px]'])

<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'custom-button ' . $width . ' lg:h-[50px] leading-none px-4 py-2 min-h-[36px] shadow-custom border border-primary rounded-full text-primary font-semibold hover:shadow-md hover:bg-secondary transition ease-in-out duration-150',
]) }}>
    {{ $slot }}
</button>