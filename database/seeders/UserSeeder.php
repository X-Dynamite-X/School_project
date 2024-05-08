<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'dynamite',
                'email' => 'dynamite@gmail.com',
                'password' => Hash::make('123'),

            ],    [
                'name' => 'madara',
                'email' => 'madara@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'mozan',
                'email' => 'mozan@gmail.com',
                'password' => Hash::make('123'),

            ]

        ]);

    }
}
