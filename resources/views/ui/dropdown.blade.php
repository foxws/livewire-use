<div wire:key="{{ $uuid() }}" x-data="{ open: false }">
    <div
        x-ref="dropdown"
        x-on:click="open = ! open"
        {{ $attributes->class('dropdown') }}
    >
        {{ $slot }}

        <div
            x-cloak
            x-show="open"
            class="dropdown-content"
        >
            {{ $content }}
        </div>
    </div>
</div>