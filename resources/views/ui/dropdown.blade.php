<div wire:key="{{ $uuid() }}" x-data="{ open: false }">
    <div
        x-ref="dropdown"
        x-on:click="open = ! open"
        x-on:click.outside="open = false"
        {{ $attributes->class('dropdown') }}
    >
        {{ $slot }}

        @if ($content)
            <div
                x-cloak
                x-show="open"
                class="dropdown-content"
            >
                {{ $content }}
            </div>
        @endif
    </div>
</div>
