<input
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->wireId()
        ->cssClass([
            'layer' => 'shrink-0',
            'error' => 'border-red-500',
        ])
        ->classMerge([
            'layer',
            'error' => $errors->has($attributes->wireId()),
        ])
        ->merge([
            'type' => 'checkbox',
        ])
    }}
>

