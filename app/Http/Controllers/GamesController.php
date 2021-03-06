<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
    public function show($slug)
    {
        # Not using livewire because one request
        $game = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
        ])
            ->withToken(env('IGDB_TOKEN'))
            ->withBody(
                "fields *, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, 
                slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, 
                videos.*, screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating, 
                similar_games.platforms.abbreviation, similar_games.slug;
                where slug=\"{$slug}\";",
                "text/plain"
            )->post('https://api.igdb.com/v4/games')
            ->json();

        abort_if(!$game, 404);

        return view('show', [
            'game' => $this->formatGameForView($game[0]),
        ]);
    }

    private function formatGameForView($game)
    {
        $temp = collect($game)->merge([
            'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
            // Notice @foreach on blade is using collect here in livewire
            'genres' => collect($game['genres'])->pluck('name')->filter()->implode(', '),
            'involvedCompanies' => $game['involved_companies'][0]['company']['name'],
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', '),
            'memberRating' => isset($game['rating']) ? round($game['rating']) . '%' : '0%',
            'criticRating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) . '%' : '0%',
            'trailer' => 'https://youtube.com/embed/' . $game['videos'][0]['video_id'],
            'screenshots' => collect($game['screenshots'])->map(function ($screenshot) {
                return [
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                ];
            })->take(9),
            'similarGames' => collect($game['similar_games'])->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                    'total_rating' => isset($game['total_rating']) ? round($game['total_rating']) . '%' : null,
                    'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', '),
                ]);
            })->take(5),
            'social' => [
                'official' => collect($game['websites'])->filter(function ($website) {
                    return $website['category'] == 1;
                })->first(),
                'facebook' => collect($game['websites'])->filter(function ($website) {
                    return $website['category'] == 4;
                })->first(),
                'twitter' => collect($game['websites'])->filter(function ($website) {
                    return $website['category'] == 5;
                })->first(),
                'instagram' => collect($game['websites'])->filter(function ($website) {
                    return $website['category'] == 8;
                })->first(),
            ],
        ]);
        
        return $temp;
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
