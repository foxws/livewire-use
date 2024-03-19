<input
    wire:key="{{ $wireKey() }}"
    {{ $attributes
        ->cssClass([
            'layer' => 'peer shrink-0',
            'error' => 'border-red-500',
        ])
        ->classMerge([
            'layer',
            'error' => $errors->has($wireModel()),
        ])
        ->merge([
            'id' => $wireKey(),
            'type' => 'checkbox',
        ])
    }}
>

