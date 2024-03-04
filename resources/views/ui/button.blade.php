<button
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->class([
            'inline-flex w-full shrink-0 cursor-pointer select-none flex-wrap items-center justify-center' => ! $attributes->twHas('layer'),
            '!bg-gray-300 cursor-not-allowed opacity-50' => $attributes->has('disabled') && ! $attributes->twHas('color'),
        ])
        ->merge([
            'type' => 'button',
        ])
        ->twMerge('layer', 'color', 'disabled')
    }}
>
    {{ $prepend }}

    {{ $label }}

    {{ $slot }}

    {{ $append }}
</button>
