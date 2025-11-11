@props(['title' => null, 'icon' => null])
<div {{ $attributes->merge(['class' => 'bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden']) }}>
    @if($title)
        <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200 flex items-center gap-3">
            @if($icon)
                <x-dynamic-component :component="$icon" class="w-5 h-5 text-gray-600" />
            @endif
            <h2 class="text-lg font-medium text-gray-900">{{ $title }}</h2>
        </div>
    @endif
    {{ $slot }}
</div>
