<button
    wire:key="{{ $uuid() }}"
    {{ $attributes
        ->except([
            'href',
        ])
        ->merge([
            'type' => 'button',
        ])
        ->class([
            'button',
            'button-active' => $isActive(),
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
