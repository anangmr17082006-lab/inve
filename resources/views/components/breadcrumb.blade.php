@props(['links' => [], 'current' => null])
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 text-sm">
        @foreach($links as $link)
            <li>
                <div class="flex items-center">
                    @if(!$loop->first)
                        <svg class="w-5 h-5 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    @endif
                    <a href="{{ $link['url'] }}" class="text-gray-500 hover:text-gray-700">{{ $link['label'] }}</a>
                </div>
            </li>
        @endforeach
        @if($current)
            <li>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-gray-900 font-medium">{{ $current }}</span>
                </div>
            </li>
        @endif
    </ol>
</nav>
