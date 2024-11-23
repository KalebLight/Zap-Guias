<button
    {{ $attributes->merge(['type' => 'submit', 'class' => ' custom-button w-full shadow-custom border border-primary rounded-full text-primary font-semibold hover:shadow-md transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
