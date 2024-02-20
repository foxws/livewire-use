<div
    wire:key="{{ $hash() }}"
    x-data="{
        open: @if ($wireModel()) @entangle($wireModel()) @else false @endif,
    }"
    x-ref="dropdown"
    x-on:click="open = ! open"
    x-on:click.outside="open = false"
    x-trap.inert.noscroll="open"
    @keyup.escape.window="open = false"
    {{ $attributes
        ->class([
            'dropdown',
            'dropdown-end' => $right,
        ])
    }}
>
    <div
        x-cloak
        x-show="open"
        class="dropdown-content"

    >
        {{ $slot }}
    </div>

    {{ $actions }}
</div>
