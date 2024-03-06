<div
    wire:key="{{ $hash() }}"

    {{ $attributes
        ->cssClass([
            'base' => 'relative',
            'layer' => 'absolute z-50',
        ])
        ->classMerge(['base'])
    }}
>
    <div
        x-cloak
        x-show="open"
        {{ $attributes->twFor('layer') }}
    >
        {{ $slot }}
    </div>

    {{ $actions }}
</div>
