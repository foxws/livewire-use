<a
    wire:key="{{ $uuid() }}"
    {{ $attributes
        ->merge([
            'href' => $url(),
        ])
        ->class([
            'link',
            'link-active' => $isActive(),
            'link-prepend' => filled($prepend),
            'link-append' => filled($append),
        ])
    }}
>
    {{ $prepend }}

    {{ $label }}

    {{ $slot }}

    {{ $append }}
</a>
