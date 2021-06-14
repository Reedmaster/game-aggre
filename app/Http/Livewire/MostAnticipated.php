<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonth = Carbon::now()->addMonths(4)->timestamp;

        $mostAnticipatedUnformatted = Cache::remember('most-anticipated', 7, function () use ($current, $afterFourMonth) {
            return Http::withHeaders([
                'Client-ID' => env('IGDB_CLIENT_ID'),
            ])
                ->withToken(env('IGDB_TOKEN'))
                ->withBody(
                    "fields name, hypes, cover.url, first_release_date, platforms.abbreviation, summary; 
                        where platforms = (6) 
                        & (hypes != null)
                        & (first_release_date >= {$current})
                        & (first_release_date < {$afterFourMonth});
                        sort hypes desc;
                        limit 4;",
                    "text/plain"
                )->post('https://api.igdb.com/v4/games')
                ->json();
        });

        // Call the formatForView
        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);
    }

    public function render()
    {
        return view('livewire.most-anticipated');
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
