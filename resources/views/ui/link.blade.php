<a
    wire:key="{{ $hash() }}"
    @if (! $external) wire:navigate @endif
    {{ $attributes
        ->merge([
            'href' => $url(),
        ])
        ->class([
            'link',
            'link-active' => $isActive(),
        ])
    }}
>
    {{ $slot }}
</a>
