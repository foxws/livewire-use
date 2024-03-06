@props([
    'start' => null,
    'end' => null,
])

<nav {{ $attributes
    ->cssClass([
        'base' => 'flex flex-nowrap items-center justify-between',
        'padding' => 'py-6',
    ])
    ->classMerge(['base', 'padding'])
}}>
    {{ $slot }}
</<nav>
