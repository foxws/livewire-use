<button
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->merge([
            'type' => 'button',
        ])
        ->class([
            'btn',
            'btn-prepend' => filled($prepend),
            'btn-append' => filled($append),
        ])
    }}
>
    {{ $prepend }}

    {{ $label }}

    {{ $slot }}

    {{ $append }}
</button>
