<button
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->whereDoesntStartWith('class:')
        ->class([
            $class('base', 'inline-flex w-full shrink-0 cursor-pointer select-none flex-wrap items-center justify-center'),
            $class('color', 'border-primary-500 bg-primary-500'),
            $class('disabled', '!bg-gray-300 cursor-not-allowed opacity-50') => $attributes->has('disabled'),
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
