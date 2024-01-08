<div
    wire:key="{{ $hash() }}"
    class="field"
>
    <div {{ $attributes->class([
        'checkbox-group' => filled($prepend || $append),
        'checkbox-error' => $errors->has($id()),
    ]) }}>
        {{ $prepend }}

        @if ($label && $left)
            <x-forms-label
                {{ $attributes->only('required') }}
                for="{{ $id() }}"
                :$label
            />
        @endif

        <input
            {{ $attributes
                ->merge([
                    'id' => $id(),
                    'type' => 'checkbox',
                ])
                ->class([
                    'checkbox peer',
                    'checkbox-prepend' => filled($prepend),
                    'checkbox-append' => filled($append),
                    'checkbox-error' => $errors->has($id())
                ])
            }}
        />

        @if ($label && ! $left)
            <x-forms-label
                {{ $attributes->only('required') }}
                for="{{ $id() }}"
                :$label
            />
        @endif

        {{ $append }}
    </div>

    @error($id())
        <div class="input-error">
            <span>{{ $message }}</span>
        </div>
    @enderror
</div>
