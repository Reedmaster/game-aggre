<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonth = Carbon::now()->addMonths(4)->timestamp;
        
        $this->mostAnticipated = Http::withHeaders([
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
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
