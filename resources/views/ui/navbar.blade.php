<nav
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->twClass([
            'base' => 'flex flex-nowrap items-center justify-between',
            'layer' => 'py-6',
            'start' => 'inline-flex w-2/4 items-center justify-start',
            'center' => 'inline-flex shrink-0 items-center',
            'end' => 'inline-flex w-2/4 items-center justify-end',
        ])
        ->twMerge('base', 'layer')
    }}
>
    <div {{ $attributes->twFor('start') }}>
        {{ $start }}
    </div>

    <div {{ $attributes->twFor('center') }}>
        {{ $slot }}
    </div>

    <div {{ $attributes->twFor('end') }}>
        {{ $end }}
    </div>
</<nav>
