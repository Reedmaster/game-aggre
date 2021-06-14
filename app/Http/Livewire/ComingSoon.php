<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;

        $comingSoonUnformatted = Cache::remember('coming-soon', 7, function () use ($current) {
            return Http::withHeaders([
                'Client-ID' => env('IGDB_CLIENT_ID'),
            ])
                ->withToken(env('IGDB_TOKEN'))
                ->withBody(
                    "fields name, hypes, cover.url, first_release_date, platforms.abbreviation; 
                        where platforms = (6) 
                        & (first_release_date >= {$current})
                        & (hypes > 10);
                        sort first_release_date asc;
                        limit 4;",
                    "text/plain"
                )->post('https://api.igdb.com/v4/games')
                ->json();
        });

        // Call the formatForView
        $this->comingSoon = $this->formatForView($comingSoonUnformatted);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }

        // Refactors the front end logic to here to make views lighter, plus separation of concerns
        public function formatForView($games)
        {
            return collect($games)->map(function ($game) {
                return collect($game)->merge([
                    // Place front end string here
                    'coverImageUrl' => Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']),
                    'releaseDate' => Carbon::parse($game['first_release_date'])->format('d/m/y'),
                ]);
            })->toArray();
        }
}
