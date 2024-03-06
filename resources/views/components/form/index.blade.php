<form {{ $attributes
    ->cssClass([
        'layout' => 'flex flex-col gap-y-6',
    ])
    ->classMerge()
}}>
    {{ $slot }}
</form>

