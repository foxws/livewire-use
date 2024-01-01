<x-forms-field>
    <input type="text" {{ $attributes }}>

    @error($id())
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror
</x-forms-field>
