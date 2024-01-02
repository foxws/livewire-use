<button
    wire:key="{{ $uuid() }}"
    {{ $attributes
        ->except(['href'])
        ->merge([
            'type' => 'button',
        ])
        ->class([
            'btn',
            'btn-active' => $isActive(),
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
