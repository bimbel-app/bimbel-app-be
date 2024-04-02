<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => 'admin1@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => '123456',
            'created_at' => '2024-01-16 23:37:19',
            'updated_at' => '2024-01-16 23:37:19'
        ]);
    }
}
