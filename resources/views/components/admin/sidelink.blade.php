@props(['label', 'icon' => null, 'active' => false, 'href' => '#'])

<a 
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 
        'flex items-center p-3 w-full text-base font-medium rounded-lg transition ' .
        ($active 
            ? 'bg-gray-700 text-white' 
            : 'text-gray-300 hover:bg-gray-700 hover:text-white')
    ]) }}
>
    @if($icon)
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            {!! $icon !!}
        </svg>
    @endif
    <span class="ml-3">{{ $label }}</span>
</a>
