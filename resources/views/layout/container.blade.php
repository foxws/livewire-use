<div {{ $attributes
    ->cssClass([
        'base' => 'container mx-auto w-full max-w-4xl xl:max-w-5xl',
        'padding' => 'px-6',
    ])
    ->classMerge();
}}>
    {{ $slot }}
</div>
