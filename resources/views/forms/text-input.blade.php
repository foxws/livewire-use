<div wire:key="{{ $uuid }}">
    <input type="text" {{ $attributes }}>

    @error($wireModel())
    <div>
        <span class="error">{{ $message }}</span>
    </div>
    @enderror
</div>
