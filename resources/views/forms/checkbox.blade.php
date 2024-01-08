<div
    wire:key="{{ $hash() }}"
    class="field"
>
    <div {{ $attributes->class([
        'checkbox-group' => filled($prepend || $append),
        'checkbox-error' => $errors->has($id()),
    ]) }}>
        {{ $prepend }}

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

        @if ($label)
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
