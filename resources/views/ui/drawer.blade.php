<aside
    wire:key="{{ $hash() }}"
    x-data="{ open: false }"
    x-ref="drawer"
    x-on:click="open = ! open"
    x-on:click.outside="open = false"
    x-trap.inert.noscroll="open"
    @keyup.escape.window="open = false"
    {{ $attributes->class([
            'drawer',
            'drawer-end' => $right,
        ])
    }}
>
    <div
        x-cloak
        x-show="open"
        class="drawer-content"
    >
        {{ $slot }}
    </div>


    <x-ui.actions :$actions />
</aside>
