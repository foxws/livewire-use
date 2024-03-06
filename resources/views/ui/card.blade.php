<div {{ $attributes
    ->wireId()
    ->cssClass([
        'layer' => 'w-full sm:px-12',
        'padding' => 'px-6 py-12 sm:px-12',
    ])
    ->classMerge()
}}>
    {{ $slot }}
</div>
