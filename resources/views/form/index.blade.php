<form {{ $attributes
    ->cssClass([
        'layer' => 'flex flex-col',
        'layout' => 'gap-y-3'
    ])
    ->classMerge()
}}>
    {{ $slot }}
</form>

