<div class="mt-8 game">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="game cover"
                class="transition duration-150 ease-in-out hover:opacity-75">
        </a>
        @if ($game['total_rating'])
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                style="right: -20px; bottom: -20px">
                <div class="flex items-center justify-center h-full text-xs font-semibold">
                    {{ $game['total_rating'] }}
                </div>
            </div>
        @endif
    </div>
    <a href="{{ route('games.show', $game['slug']) }}"
        class="block mt-8 text-base font-semibold leading-tight hover:text-gray-400">
        {{ $game['name'] }}
    </a>
    <div class="mt-1 text-gray-400">
        {{ $game['platforms'] }}
    </div>
</div>