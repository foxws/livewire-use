<div
    x-data="{ open: false }"
    x-ref="dropdown"
    x-on:click="open = ! open"
    x-on:click.outside="open = false"
    x-trap.inert.noscroll="open"
    @keyup.escape.window="open = false"
    {{ $attributes
        ->cssClass([
            'layer' => 'flex flex-col gap-y-6',
        ])
        ->classMerge()
    }}
>
    {{ $slot }}
</form>
