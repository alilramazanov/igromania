<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Studio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameFactory extends Factory
{

    protected $model = Game::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->text(rand(5,10));
        $description = $this->faker->sentence(rand(0,10));
        $preview = $this->faker->image();
        $slug = Str::slug($name);

        $studioId = Studio::all()->random()->id;
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'preview' => $preview,
            'studio_id' => $studioId
        ];
    }
}
