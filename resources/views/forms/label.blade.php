<label class="label">
    <span>{{ $label }}</span>

    @if ($attributes->get('required'))
        <span class="text-error">*</span>
    @endif
</label>
