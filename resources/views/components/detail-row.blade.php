@props(['label', 'value', 'subtext' => null, 'icon' => null, 'fullWidth' => false])
<div @class(['px-6 py-4 flex gap-4', 'md:grid md:grid-cols-12' => !$fullWidth, 'flex-col' => $fullWidth])>
    <dt class="text-sm font-medium text-gray-600 md:col-span-4 lg:col-span-3 flex items-center gap-2">
        @if($icon)
            <x-dynamic-component :component="$icon" class="w-4 h-4 text-gray-400" />
        @endif
        {{ $label }}
    </dt>
    <dd @class(['text-sm text-gray-900 md:col-span-8 lg:col-span-9', 'mt-1' => $fullWidth])>
        <div class="font-medium">{{ $value }}</div>
        @if($subtext)
            <div class="text-gray-500 text-xs mt-0.5">{{ $subtext }}</div>
        @endif
    </dd>
</div>
