<div wire:key="{{ $uuid() }}" class="w-full">
    @if ($label)
        <x-forms-label for="{{ $id() }}" :$label />
    @endif

    <div {{ $attributes->class([
        'input-group' => $prepend || $append,
        'input-error' => $errors->has($id())
    ])}}
    >
        {{ $prepend }}

        <input
            {{ $attributes
                ->merge([
                    'id' => $id(),
                    'type' => 'text',
                ])
                ->class([
                    'input peer',
                    'input-prepend' => $prepend,
                    'input-append' => $append,
                    'input-error' => $errors->has($id())
                ])
            }}
        />

        {{ $append }}
    </div>

    @error($id())
        <div class="input-error">
            <span>{{ $message }}</span>
        </div>
    @enderror
</div>
