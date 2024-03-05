<div
    wire:key="{{ $hash() }}"
    {{ $attributes
        ->twClass([
            'base' => 'w-full',
            'layer' => 'w-full focus:border-transparent focus:ring-0',
            'group' => 'flex flex-1 items-center',
            'disabled' => '!bg-gray-300 pointer-events-none opacity-50',
            'error' => 'border-red-500',
            'prepend' => 'rounded-l-none',
            'append' => 'rounded-r-none',
        ])
        ->twMergeWithout()
        ->only('class')
    }}
>
    @if ($label)
        <x-forms-label
            {{ $attributes->only('required') }}
            for="{{ $id() }}"
            :$label
        />
    @endif

    <div
        {{ $attributes
            ->twMerge([
                'base',
                'group' => filled($prepend || $append),
                'error' => $errors->has($id()),
            ])
        }}
    >
        {{ $prepend }}

        <input
            {{ $attributes
                ->twMerge([
                    'layer',
                    'disabled' => $attributes->has('disabled'),
                    'prepend' => filled($prepend),
                    'append' => filled($append),
                    'error' => $errors->has($id())
                ])
                ->merge([
                    'id' => $id(),
                    'type' => 'text',
                ])
            }}
        />

        {{ $append }}
    </div>

    @error($id())
        <div {{ $attributes->twFor('error') }}>
            <span>{{ $message }}</span>
        </div>
    @enderror
</div>
