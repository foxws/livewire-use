@props([
    'label' => null,
])

<button {{ $attributes
    ->cssClass([
        'layer' => 'inline-flex shrink-0 cursor-pointer select-none flex-wrap items-center justify-center',
        'disabled' => '!bg-gray-300 pointer-events-none opacity-50',
    ])
    ->classMerge([
        'layer',
        'disabled' => $attributes->has('disabled'),
    ])
    ->merge([
        'type' => 'button',
    ])
}}>
    {{ $label }}

    {{ $slot }}
</button>
