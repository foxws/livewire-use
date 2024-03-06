<div {{ $attributes
    ->wireId()
    ->cssClass([
        'layer' => 'w-full sm:px-12',
        'padding' => 'p-8',
    ])
    ->classMerge()
}}>
    {{ $slot }}
</div>
