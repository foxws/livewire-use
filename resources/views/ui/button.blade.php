<button
    wire:key="{{ $uuid() }}"
    {{ $attributes
        ->merge([
            'type' => 'button',
        ])
        ->class([
            'button',
            'button-prepend' => filled($prepend),
            'button-append' => filled($append),
        ])
    }}
>
    {{ $prepend }}

    {{ $label }}

    {{ $slot }}

    {{ $append }}
</button>
