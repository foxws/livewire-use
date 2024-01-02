<div
    wire:key="{{ $hash() }}"
    {{ $attributes->class(['container']) }}
>
    {{ $slot }}
</div>
