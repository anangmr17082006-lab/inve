@props([
    'href' => null,
    'variant' => 'secondary', // primary, secondary, danger
    'icon' => null,
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition';
    $variants = [
        'primary' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => 'text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-blue-500',
        'danger' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-500',
    ];
    $classes = $base . ' ' . $variants[$variant];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)<x-dynamic-component :component="$icon" class="w-4 h-4" />@endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)<x-dynamic-component :component="$icon" class="w-4 h-4" />@endif
        {{ $slot }}
    </button>
@endif
