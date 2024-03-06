<div
    x-cloak
    x-show="open"
    {{ $attributes
        ->cssClass([
            'layer' => 'absolute z-50',
        ])
        ->classMerge()
    }}
>
    {{ $slot }}
</form>
