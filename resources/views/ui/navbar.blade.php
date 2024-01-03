<nav
    wire:key="{{ $hash() }}"
    {{ $attributes->class(['navbar']) }}
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
