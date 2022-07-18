<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\GameGenre;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameGenreFactory extends Factory
{

    protected $model = GameGenre::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gameId = Game::all()->random()->id;
        $genreId = Genre::all()->random()->id;
        return [
            'game_id' => $gameId,
            'genre_id' => $genreId
        ];
    }
}
