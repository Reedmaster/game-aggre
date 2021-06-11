@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game['coverImageUrl'] }}" alt="cover">
            </div>
            <div class="lg:ml-12 xl:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">{{ $game['name'] }}</h2>

                <div class="text-gray-400">
                    <span>
                        {{ $game['genres'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['involvedCompanies'] }}
                    </span>
                    &middot;
                    <span>
                        {{ $game['platforms'] }}
                    </span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{ $game['memberRating'] }}
                            </div>
                        </div>

                        <div class="ml-4 text-xs">Member <br> Score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{ $game['criticRating'] }}
                            </div>
                        </div>

                        <div class="ml-4 text-xs">Critic <br> Score</div>
                    </div>
                    <div class="flex items-center space-x-4 mt-4 sm:mt-0 sm:ml-12">
                        @if ($game['social']['official'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['official']['url'] }}" class="hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" display="block" id="Globe">
                                        <circle cx="12" cy="12" r="10" />
                                        <ellipse cx="12" cy="12" rx="10" ry="3" />
                                        <ellipse cx="12" cy="12" rx="10" ry="5" transform="rotate(90 12 12)" />
                                        <path d="M12 2v20" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        @if ($game['social']['instagram'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['instagram']['url'] }}" class="hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke-width="2" display="block" id="InstagramFill">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.465 1.066C8.638 1.012 9.012 1 12 1c2.988 0 3.362.013 4.534.066 1.172.053 1.972.24 2.672.511.733.277 1.398.71 1.948 1.27.56.549.992 1.213 1.268 1.947.272.7.458 1.5.512 2.67C22.988 8.639 23 9.013 23 12c0 2.988-.013 3.362-.066 4.535-.053 1.17-.24 1.97-.512 2.67a5.396 5.396 0 01-1.268 1.949c-.55.56-1.215.992-1.948 1.268-.7.272-1.5.458-2.67.512-1.174.054-1.548.066-4.536.066-2.988 0-3.362-.013-4.535-.066-1.17-.053-1.97-.24-2.67-.512a5.397 5.397 0 01-1.949-1.268 5.392 5.392 0 01-1.269-1.948c-.271-.7-.457-1.5-.511-2.67C1.012 15.361 1 14.987 1 12c0-2.988.013-3.362.066-4.534.053-1.172.24-1.972.511-2.672a5.396 5.396 0 011.27-1.948 5.392 5.392 0 011.947-1.269c.7-.271 1.5-.457 2.67-.511zm8.98 1.98c-1.16-.053-1.508-.064-4.445-.064-2.937 0-3.285.011-4.445.064-1.073.049-1.655.228-2.043.379-.513.2-.88.437-1.265.822a3.412 3.412 0 00-.822 1.265c-.151.388-.33.97-.379 2.043-.053 1.16-.064 1.508-.064 4.445 0 2.937.011 3.285.064 4.445.049 1.073.228 1.655.379 2.043.176.477.457.91.822 1.265.355.365.788.646 1.265.822.388.151.97.33 2.043.379 1.16.053 1.507.064 4.445.064 2.938 0 3.285-.011 4.445-.064 1.073-.049 1.655-.228 2.043-.379.513-.2.88-.437 1.265-.822.365-.355.646-.788.822-1.265.151-.388.33-.97.379-2.043.053-1.16.064-1.508.064-4.445 0-2.937-.011-3.285-.064-4.445-.049-1.073-.228-1.655-.379-2.043-.2-.513-.437-.88-.822-1.265a3.413 3.413 0 00-1.265-.822c-.388-.151-.97-.33-2.043-.379zm-5.85 12.345a3.669 3.669 0 004-5.986 3.67 3.67 0 10-4 5.986zM8.002 8.002a5.654 5.654 0 117.996 7.996 5.654 5.654 0 01-7.996-7.996zm10.906-.814a1.337 1.337 0 10-1.89-1.89 1.337 1.337 0 001.89 1.89z" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        @if ($game['social']['facebook'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['facebook']['url'] }}" class="hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke-width="2" display="block" id="FacebookFill">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 12.067C0 18.033 4.333 22.994 10 24v-8.667H7V12h3V9.333c0-3 1.933-4.666 4.667-4.666.866 0 1.8.133 2.666.266V8H15.8c-1.467 0-1.8.733-1.8 1.667V12h3.2l-.533 3.333H14V24c5.667-1.006 10-5.966 10-11.933C24 5.43 18.6 0 12 0S0 5.43 0 12.067z" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        @if ($game['social']['twitter'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['twitter']['url'] }}" class="hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke-width="2" display="block" id="TwitterFill">
                                        <path
                                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733a4.67 4.67 0 002.048-2.578 9.3 9.3 0 01-2.958 1.13 4.66 4.66 0 00-7.938 4.25 13.229 13.229 0 01-9.602-4.868c-.4.69-.63 1.49-.63 2.342A4.66 4.66 0 003.96 9.824a4.647 4.647 0 01-2.11-.583v.06a4.66 4.66 0 003.737 4.568 4.692 4.692 0 01-2.104.08 4.661 4.661 0 004.352 3.234 9.348 9.348 0 01-5.786 1.995 9.5 9.5 0 01-1.112-.065 13.175 13.175 0 007.14 2.093c8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602a9.47 9.47 0 002.323-2.41l.002-.003z" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <p class="mt-12">{{ $game['summary'] }}</p>


                <div class="mt-12">
                    @isset($game['videos'][0])
                        <a href="{{ $game['trailer'] }}"
                            class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition eas-in-out duration-150">
                            <svg class="w-5 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" display="block" id="Play">
                                <path d="M6 4v16" />
                                <path d="M20 12L6 20" />
                                <path d="M20 12L6 4" />
                            </svg>

                            <span class="ml-2">Play Trailer</span>
                        </a>
                    @else
                        <a
                            class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition eas-in-out duration-150">
                            <svg class="w-5 fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" display="block" id="Play">
                                <path d="M6 4v16" />
                                <path d="M20 12L6 20" />
                                <path d="M20 12L6 4" />
                            </svg>

                            <span class="ml-2">No trailers yet</span>
                        </a>
                    @endisset
                </div>
            </div>
        </div> <!-- end game-details -->

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach ($game['screenshots'] as $screenshot)
                    <div>
                        <a href="{{ $screenshot['huge'] }}">
                            <img src="{{ $screenshot['big'] }}" alt="screenshot"
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>
        </div> <!-- end images-container -->

        <div class="related-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Related Games</h2>

            <div class="related-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach ($game['similarGames'] as $game)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="{{ route('games.show', $game['slug']) }}">
                                <img src="{{ $game['coverImageUrl'] }}" alt="game cover"
                                    class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>

                            @isset($game['total_rating_count'])
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                    style="right: -20px; bottom: -20px">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        {{ $game['total_rating'] }}
                                    </div>
                                </div>
                            @endisset
                        </div>

                        <a href="{{ route('games.show', $game['slug']) }}"
                            class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                            {{ $game['name'] }}
                        </a>

                        <div class="text-gray-400 mt-1">
                            {{ $game['platforms'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end related-games-container -->
    </div>
@endsection
