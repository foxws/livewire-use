<a
    wire:key="{{ $hash() }}"
    @if (! $external && $navigate) wire:navigate @endif
    {{ $attributes
        ->cssClass([
            'layer' => 'hover:text-primary-400 cursor-pointer',
            'active' => 'text-primary-400 hover:text-primary-300',
        ])
        ->classMerge([
            'layer',
            'active' => $active || $isRoute() || $isRequest(),
        ])
    }}
>
    {{ $slot }}
</a>
