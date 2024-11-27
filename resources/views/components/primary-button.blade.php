<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'custom-button xl:w-[570px] sm:w-[440px] w-[350px] lg:h-[50px]
                 h-[36px] shadow-custom border border-primary rounded-full text-primary underline font-semibold hover:shadow-md hover:bg-secondary transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
