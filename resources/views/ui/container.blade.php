<div
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->twClass([
            'base' => 'mx-auto max-w-4xl px-6 xl:max-w-5xl',
        ])
        ->twMerge();
    }}
>
    {{ $slot }}
</div>
