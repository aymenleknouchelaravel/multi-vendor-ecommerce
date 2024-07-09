<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('111'),
                    'role' => 'admin',
                    'status' => 'active',
                ],
                [
                    'name' => 'Vendor',
                    'username' => 'vendor',
                    'email' => 'vendor@gmail.com',
                    'password' => Hash::make('111'),
                    'role' => 'vendor',
                    'status' => 'active',
                ],
                [
                    'name' => 'User',
                    'username' => 'user',
                    'email' => 'user@gmail.com',
                    'password' => Hash::make('111'),
                    'role' => 'user',
                    'status' => 'active',
                ],
            ]
        );

        DB::table('vendors')->insert(
            [
                [
                    'join_date' => Carbon::now()->year,
                    'infos' => '',
                    'user_id' => 2,
                ],
            ]
        );

        // \App\Models\User::factory(8)->create();

    }
}
