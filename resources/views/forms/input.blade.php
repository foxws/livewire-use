<div
    wire:key="{{ $hash() }}"
    class="field"
>
    @if ($label)
        <x-forms-label
            {{ $attributes->only('required') }}
            for="{{ $id() }}"
            :$label
        />
    @endif

    <div {{ $attributes->class([
        'input-group' => filled($prepend || $append),
        'input-error' => $errors->has($id()),
    ]) }}>
        {{ $prepend }}

        <input
            {{ $attributes
                ->merge([
                    'id' => $id(),
                    'type' => 'text',
                ])
                ->class([
                    'input peer',
                    'input-prepend' => filled($prepend),
                    'input-append' => filled($append),
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
