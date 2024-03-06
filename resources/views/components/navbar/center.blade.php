<div {{ $attributes
    ->cssClass([
        'base' => 'inline-flex shrink-0 items-center',
    ])
    ->classMerge()
}}>
    {{ $slot }}
</div>
