<label
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->cssClass([
            'base' => 'inline-flex w-full shrink-0 cursor-pointer flex-wrap items-center',
            'layer' => 'gap-1.5',
            'required' => 'text-primary-400',
        ])
        ->classMerge(['base', 'layer'])
    }}
>
    {{ $prepend }}

    {{ $slot }}

    @if ($required)
        <span {{ $attributes->twFor('required') }}>*</span>
    @endif

    {{ $append }}

    {{ $hint }}
</label>
