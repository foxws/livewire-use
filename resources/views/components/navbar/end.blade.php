<div {{ $attributes
    ->cssClass([
        'base' => 'inline-flex w-2/4 items-center justify-end',
    ])
    ->classMerge()
}}>
    {{ $slot }}
</div>
