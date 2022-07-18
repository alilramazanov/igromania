<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameGenre;
use Database\Seeders\Igromania\GenreSeeder;
use Database\Seeders\Igromania\StudioSeeder;
use Database\Seeders\Igromania\UserSeeder;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(StudioSeeder::class);

        Game::factory(5)->create();

        GameGenre::factory(20)->create();


    }
}
