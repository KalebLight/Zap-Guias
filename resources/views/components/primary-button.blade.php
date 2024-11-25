<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'custom-button md:w-[500px] w-[300px] shadow-custom border border-primary rounded-full text-primary underline font-semibold hover:shadow-md hover:bg-secondary transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
