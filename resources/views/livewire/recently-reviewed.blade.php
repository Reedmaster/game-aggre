<div wire:init="loadRecentlyReviewed" class="mt-8 space-y-12 recently-reviewed-container">
    @forelse ($recentlyReviewed as $game)
        <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game">
            <div class="relative flex-none">
                <a href="#">
                    <img src="{{ $game['coverImageUrl'] }}" alt="game cover"
                        class="w-20 transition duration-150 ease-in-out lg:w-48 hover:opacity-75">
                </a>
                @isset($game['total_rating'])
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                        style="right: -20px; bottom: -20px">
                        <div class="flex items-center justify-center h-full text-xs font-semibold">
                            {{ $game['total_rating'] }}
                        </div>
                    </div>
                @endisset
            </div>
            <div class="ml-12">
                <a href="#" class="block mt-8 text-lg font-semibold leading-tight hover:text-gray-400">
                    {{ $game['name'] }}
                </a>
                <div class="mt-1 text-gray-400">
                    {{ $game['platforms'] }}
                </div>
                <p class="hidden mt-6 text-gray-400 lg:block">
                    {{ $game['summary'] }}
                </p>
            </div>
        </div>
    @empty
        @foreach (range(1, 3) as $game)
            <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game">
                <div class="relative flex-none">
                    <div class="w-32 h-40 bg-gray-700 lg:w-48 lg:h-56"></div>
                </div>
                <div class="ml-6 lg:ml-12">
                    <div
                        class="inline-block mt-4 text-lg font-semibold leading-tight text-transparent bg-gray-700 rounded">
                        Title goes here
                    </div>
                    <div class="hidden mt-8 space-y-4 lg:block">
                        <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet,
                            consectetur</span>
                        <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet,
                            consectetur</span>
                        <span class="inline-block text-transparent bg-gray-700 rounded">Lorem ipsum dolor sit amet,
                            consectetur</span>
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
