<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_game_page_shows_correct_game_info()
    {
        Http::fake([
            'https://api-v3.igdb.com/games' => $this->fakeSingleGame(),
        ]);

        $response = $this->get(route('games.show'));

        $response->assertStatus(200);
    }

    public function fakeSingleGame()
    {
        return Http::response([ 'foo' => 'bar' ]);
    }
}
