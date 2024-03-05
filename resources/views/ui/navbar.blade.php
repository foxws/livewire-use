<nav
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->twClass([
            'foo' => 'flex items-center justify-between',
            'layer' => 'py-6',
        ])
        ->twMerge()
    }}
>
    <div class="navbar-start">
        {{ $start }}
    </div>

    <div class="navbar-center">
        {{ $slot }}
    </div>

    <div class="navbar-end">
        {{ $end }}
    </div>
</<nav>
