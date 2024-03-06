<label {{ $attributes
    ->cssClass([
        'layer' => 'flex items-center cursor-pointer',
        'error' => 'text-red-500',
        'hint' => 'text-red-500',
        'required' => 'text-primary-400',
    ])
    ->classMerge([
        'layer',
        'error' => filled($error) || $errors->has($attributes->wireId()),
    ])
}}>
    {{ $slot }}

    @if ($required)
        <span class="{{ $attributes->classFor('required') }}">*</span>
    @endif

    @if ($hint)
        <p class="{{ $attributes->classFor('hint') }}">
            {{ $hint }}
        </p>
    @endif
</label>
