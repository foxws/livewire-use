<input
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->wireId()
        ->cssClass([
            'layer' => 'peer w-full focus:border-transparent focus:ring-0',
            'error' => 'border-red-500',
        ])
        ->classMerge([
            'layer',
            'error' => $errors->has($attributes->wireId()),
        ])
        ->merge([
            'type' => 'text',
        ])
    }}
/>
