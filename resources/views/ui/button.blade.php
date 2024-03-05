<button
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->twClass([
            'base' => 'inline-flex w-full shrink-0 cursor-pointer select-none flex-wrap items-center justify-center',
            'variant' => 'bg-primary-500 border-primary-500',
            'disabled' => '!bg-gray-300 pointer-events-none opacity-50',
        ])
        ->twMerge([
            'base',
            'variant',
            'disabled' => $attributes->has('disabled'),
        ])
        ->merge([
            'type' => 'button',
        ])
    }}
>
    {{ $prepend }}

    <span {{ $attributes->twFor('disabled') }}>icon</span>

    {{ $label }}

    {{ $slot }}

    {{ $append }}
</button>
