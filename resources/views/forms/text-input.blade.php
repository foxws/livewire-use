<div wire:key="{{ $uuid() }}">
    @if ($label)
        <x-forms-label for="{{ $id() }}" :$label />
    @endif

    <input type="text" {{ $attributes }}>

    {{-- @error($id())
        <div>
            <span class="error">{{ $message }}</span>
        </div>
    @enderror --}}
</div>
