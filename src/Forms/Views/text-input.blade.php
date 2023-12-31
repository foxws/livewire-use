<div>
    <input type="text" name="{{ $name }}" {{ $attributes }}>

    @error($name) <span class="error">{{ $message }}</span> @enderror
</div>
