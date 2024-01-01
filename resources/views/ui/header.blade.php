<header wire:key="{{ $uuid() }}" {{ $attributes->class(['header']) }}>
    {{ $slot }}
</header>
