<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;
        $afterFourMonth = Carbon::now()->addMonths(4)->timestamp;

        $popularGames = Http::withHeaders([
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

        $recentlyReviewed = Http::withHeaders([
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

        $mostAnticipated = Http::withHeaders([
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

        $comingSoon = Http::withHeaders([
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

        return view('index', [
            'popularGames' => $popularGames,
            'recentlyReviewed' => $recentlyReviewed,
            'mostAnticipated' => $mostAnticipated,
            'comingSoon' => $comingSoon,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}