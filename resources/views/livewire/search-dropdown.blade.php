<div class="relative">
    {{-- debource to stop from sending too many requests to backend --}}
    <input wire:model.debource.300ms="search" type="text"
        class="w-64 px-3 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:shadow-outline"
        placeholder="Search...">
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 text-gray-400 fill-current" viewBox="0 0 32 40">
            <g data-name="Layer 33">
                <path
                    d="M28.1318,26.0537l-7.76-7.59a10.5782,10.5782,0,1,0-2.1525,2.0909l7.8151,7.6437a1.5,1.5,0,1,0,2.0976-2.1445ZM12.0381,19.5762a7.5381,7.5381,0,1,1,7.5381-7.5381A7.5467,7.5467,0,0,1,12.0381,19.5762Z" />
            </g>
        </svg>
    </div>

    <div wire:loading class="top-0 right-0 mt-1 mr-2" style="position: absolute">
        @include('layouts.spinner')
    </div>
    
    @if (strlen($search) >= 2)
        <div class="absolute z-50 w-64 mt-2 text-xs bg-gray-800 rounded">
            @if (count($searchResults) > 0)
                <ul>
                    @foreach ($searchResults as $game)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('games.show', $game['slug']) }}"
                                class="flex items-center px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-700">
                                @isset($game['cover'])
                                    <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}"
                                        alt="cover" class="w-10">
                                @else
                                    <img src="" alt="">
                                @endisset
                                <span class="ml-4">{{ $game['name'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>
