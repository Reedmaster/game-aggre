<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->popularGames = Cache::remember('popular-games', 7, function () use ($before, $current) {
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
    }

    public function render()
    {

        return view('livewire.recently-reviewed');
    }
}
