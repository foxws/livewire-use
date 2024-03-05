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
        ->twClass([
            'base' => 'relative',
            'layer' => 'absolute z-50',
        ])
        ->twMerge(['base'])
    }}
>
    <div
        x-cloak
        x-show="open"
        {{ $attributes->twFor('layer') }}
    >
        {{ $slot }}
    </div>

    {{ $actions }}
</div>
