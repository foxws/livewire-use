<a
    wire:key="{{ $hash() }}"
    @if (! $external) wire:navigate @endif
    {{ $attributes
        ->twClass([
            'layer' => 'hover:text-primary-400 cursor-pointer',
            'active' => 'text-primary-400 hover:text-primary-300',
        ])
        ->twMerge([
            'base',
            'layer',
            'active' => $isActive(),
        ])
        ->merge([
            'href' => $url(),
        ])
    }}
>
    {{ $slot }}
</a>
