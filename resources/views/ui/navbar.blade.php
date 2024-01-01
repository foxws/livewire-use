<nav wire:key="{{ $uuid() }}" {{ $attributes->class(['navbar']) }}>
    <div class="navbar-start">
        {{ $start }}
    </div>

    <div class="navbar-content">
        {{ $slot }}
    </div>

    <div class="navbar-end">
        {{ $end }}
    </div>
</<nav>

