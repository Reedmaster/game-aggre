<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;

        $this->comingSoon = Cache::remember('popular-games', 7, function () use ($current) {
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
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
