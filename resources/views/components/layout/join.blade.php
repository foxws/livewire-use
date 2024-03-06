@props([
    'vertical' => false,
])

<form {{ $attributes
    ->cssClass([
        'base' => 'inline-flex items-center',
        'vertical' => 'flex-col',
    ])
    ->classMerge([
        'base',
        'vertical' => $vertical,
    ])
}}>
    {{ $slot }}
</form>

