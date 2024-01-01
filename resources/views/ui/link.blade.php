<a
    wire:key="{{ $uuid() }}"
    wire:navigate
    {{ $attributes }}
>
    {{ $label }}

    {{ $slot }}
</a>
