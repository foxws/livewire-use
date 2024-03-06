<button
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->cssClass([
            'base' => 'w-full px-6 py-12 sm:max-w-lg sm:px-12',
            'layer' => 'sm:rounded-xl',
        ])
        ->classMerge([
            'base',
            'layer',
            'disabled' => $attributes->has('disabled'),
        ])
        ->merge([
            'type' => 'button',
        ])
    }}
>
    {{ $slot }}

    {{ $actions }}
</button>
