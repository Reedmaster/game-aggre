<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        // Carbon deals with DateTime and turns it into readable time
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        // Cache data so it's retrieved quickly for subsequent requests
        $popularGamesUnformatted = Cache::remember('popular-games', 7, function () use ($before, $after) {
            // Http facade is based around guzzle, allows for easy HTTP requests
            return Http::withHeaders([
                'Client-ID' => env('IGDB_CLIENT_ID'),
            ])
                ->withToken(env('IGDB_TOKEN'))
                ->withBody(
                    "fields name, total_rating_count, total_rating, cover.url, first_release_date, platforms.abbreviation, slug; 
                        where platforms = (6) 
                        & (total_rating_count != null)
                        & (first_release_date >= {$before} & first_release_date < {$after});
                        sort total_rating_count desc;
                        limit 12;",
                    "text/plain"
                )->post('https://api.igdb.com/v4/games')
                ->json();
        });

        // Call the formatForView
        $this->popularGames = $this->formatForView($popularGamesUnformatted);
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    // Refactors the front end logic to here to make views lighter, plus separation of concerns
    public function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                // Place front end string here
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
            ]);
        })->toArray();
    }
}
