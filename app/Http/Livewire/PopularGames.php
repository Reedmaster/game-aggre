<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->popularGames = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
        ])
            ->withToken(env('IGDB_TOKEN'))
            ->withBody(
                "fields name, total_rating_count, total_rating, cover.url, first_release_date, platforms.abbreviation; 
                where platforms = (6) 
                & (total_rating_count != null)
                & (first_release_date >= {$before} & first_release_date < {$after});
                sort total_rating_count desc;
                limit 12;",
                "text/plain"
            )->post('https://api.igdb.com/v4/games')
            ->json();
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
