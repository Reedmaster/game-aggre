<div wire:init="loadComingSoon" class="mt-8 space-y-10 most-anticipated-container">
    @forelse ($comingSoon as $game)
        <x-game-card-small :game="$game" />
    @empty
        @foreach (range(1, 4) as $game)
            <div class="flex game">
                <div class="w-16 h-20 bg-gray-800 bg-gray-800flex-none"></div>
                <div class="ml-4">
                    <div class="leading-tight text-transparent bg-gray-700 rounded">Title goes here</div>
                    <div class="inline-block mt-2 text-sm text-transparent bg-gray-700 rounded">14th Sept, 2021</div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
