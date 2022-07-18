<?php

namespace Database\Seeders\Igromania;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['Adventure', 'RPG', 'Strategy', 'Sport', 'Simulator',];

        foreach ($genres as $genre){
            DB::table('genres')->insert(['name' => $genre]);
        }

    }
}
