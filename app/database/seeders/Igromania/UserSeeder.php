<?php

namespace Database\Seeders\Igromania;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1'),
            'role_id' => User::ROLE_ADMIN
        ];

        $userClient = [
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' => Hash::make('client1'),
            'role_id' => User::ROLE_CLIENT
        ];

        DB::table('users')->insert($userAdmin);
        DB::table('users')->insert($userClient);


    }
}
