<div wire:init="loadComingSoon" class="most-anticipated-container space-y-10 mt-8">
    @forelse ($comingSoon as $game)
        <x-game-card-small :game="$game" />
    @empty
        @foreach (range(1, 4) as $game)
            <div class="game flex">
                <div class="bg-gray-800 w-16 h-20 bg-gray-800flex-none"></div>
                <div class="ml-4">
                    <div class="text-transparent bg-gray-700 rounded leading-tight">Title goes here</div>
                    <div class="text-transparent bg-gray-700 rounded inline-block text-sm mt-2">14th Sept, 2021</div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
