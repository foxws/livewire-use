<label {{ $attributes->class(['label']) }}>
    <span>
        {{ $label }}
        bla

        @if ($attributes->get('required'))
            <span class="text-error">*</span>
        @endif
    </span>
</label>
