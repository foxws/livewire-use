<x-forms-field>
    <input type="text" {{ $attributes }}>

    @error($wireModel())
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</x-forms-field>
