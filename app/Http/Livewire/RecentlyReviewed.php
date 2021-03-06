<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $recentlyReviewedUnformatted = Cache::remember('recently-reviewed', 7, function () use ($before, $current) {
            return Http::withHeaders([
                'Client-ID' => env('IGDB_CLIENT_ID'),
            ])
                ->withToken(env('IGDB_TOKEN'))
                ->withBody(
                    "fields name, total_rating_count, total_rating, cover.url, first_release_date, platforms.abbreviation, summary; 
                        where platforms = (6) 
                        & (total_rating_count != null)
                        & (first_release_date >= {$before} & first_release_date < {$current})
                        & (total_rating_count > 5);
                        sort total_rating_count desc;
                        limit 3;",
                    "text/plain"
                )->post('https://api.igdb.com/v4/games')
                ->json();
        });

        // Call the formatForView
        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }

        // Refactors the front end logic to here to make views lighter, plus separation of concerns
        public function formatForView($games)
        {
            return collect($games)->map(function ($game) {
                return collect($game)->merge([
                    // Place front end string here
                    'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                    'total_rating' => isset($game['total_rating']) ? round($game['total_rating']) . '%' : null,
                    'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', '),
                ]);
            })->toArray();
        }
}
