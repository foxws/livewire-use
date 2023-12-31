<div>
    foo
    <input type="text" {{ $attributes }}>
    {{-- @dd($attributes) --}}
    {{ $wireModel() }}

    {{-- @error($name) <span class="error">{{ $message }}</span> @enderror --}}
</div>
