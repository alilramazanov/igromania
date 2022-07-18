<?php

namespace Database\Seeders\Igromania;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studios = ['Sony Interactive Entertainment	', 'Tencent Games', 'Nintendo', 'Xbox Igromania Studios'];

        foreach ($studios as $studio){
            DB::table('studios')->insert(['name' => $studio]);
        }
    }
}
