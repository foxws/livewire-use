<div
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->cssClass([
            'layer' => 'flex items-center',
            'vertical' => 'flex-col',
        ])
        ->classMerge([
            'layer',
            'vertical' => $vertical,
        ])
    }}
>
    {{ $slot }}
</div>

