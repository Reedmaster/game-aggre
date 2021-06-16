<div wire:init="loadPopularGames"
    class="grid grid-cols-1 gap-12 pb-16 text-sm border-b border-gray-800 popular-games md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6">
    @forelse ($popularGames as $game)
        <x-game-card :game="$game" />
    @empty
        {{-- @include('layouts.spinner') --}}
        @foreach (range(1, 12) as $game)
            <div class="mt-8 game">
                <div class="relative inline-block">
                    <div class="h-56 bg-gray-800 w-44"></div>
                </div>
                <div class="block mt-2 text-lg font-semibold leading-tight text-transparent bg-gray-700 rounded">Title
                </div>
                <div class="inline-block mt-3 text-transparent bg-gray-700 rounded">PS4, PC, XBOX</div>
            </div>
        @endforeach
    @endforelse
</div> {{-- end popular games --}}
