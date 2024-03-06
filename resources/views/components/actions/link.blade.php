@props([
    'active' => false,
    'navigate' => true,
    'route' => null,
])

@php
    $isRequest = request()->fullUrlIs($attributes->get('href'));
    $isRoute = filled($route) && request()->routeIs($route);
@endphp

<a
    @if ($navigate) wire:navigate @endif
    {{ $attributes
        ->cssClass([
            'base' => 'hover:text-primary-400 cursor-pointer',
            'active' => 'text-primary-400 hover:text-primary-300',
        ])
        ->classMerge([
            'base',
            'active' => $active || $isRequest || $isRoute,
        ])
        ->merge([
            'href' => '/',
        ])
    }}
>
    {{ $slot }}
</a>
