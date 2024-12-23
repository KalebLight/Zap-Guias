@props(['messages'])

@if ($messages)
    <div class="rounded-md bg-red-700 pt-0 pb-[2px] px-[10px] mt-[2px]">
        <ul {{ $attributes->merge(['class' => 'text-sm text-white font-medium']) }}>
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif