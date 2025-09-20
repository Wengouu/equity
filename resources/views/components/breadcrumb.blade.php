<nav class="flex text-gray-600 text-sm space-x-2">
    @foreach ($links as $link)
    @if (!empty($link['url']))
    <a href="{{ $link['url'] }}" class="hover:underline">{{ $link['label'] }}</a>
    <span>/</span>
    @else
    <span class="font-semibold">{{ $link['label'] }}</span>
    @endif
    @endforeach
</nav>