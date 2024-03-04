<button
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->twClass([
            'base' => 'inline-flex w-full shrink-0 cursor-pointer select-none flex-wrap items-center justify-center',
            'disabled' => '!bg-gray-300 pointer-events-none opacity-50',
        ])
        ->twMerge([
            'base',
            'disabled' => $attributes->has('disabled'),
        ])
        ->merge([
            'type' => 'button',
        ])
    }}
>
    {{ $prepend }}

    {{ $label }}

    {{ $slot }}

    {{ $append }}
</button>
