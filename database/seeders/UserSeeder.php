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
            ,
            [
                'name' => 'mozan1',
                'email' => 'mozan1@gmail.com',
                'password' => Hash::make('123'),

            ]

            ,
            [
                'name' => 'mozan2',
                'email' => 'mozan2@gmail.com',
                'password' => Hash::make('123'),

            ]

            ,
            [
                'name' => 'mozan3',
                'email' => 'mozan3@gmail.com',
                'password' => Hash::make('123'),

            ]

            ,
            [
                'name' => 'mozan4',
                'email' => 'mozan4@gmail.com',
                'password' => Hash::make('123'),

            ]

            ,
            [
                'name' => 'mozan5',
                'email' => 'mozan5@gmail.com',
                'password' => Hash::make('123'),

            ]

            ,
            [
                'name' => 'mozan6',
                'email' => 'mozan6@gmail.com',
                'password' => Hash::make('123'),

            ]

            ,
            [
                'name' => 'mozan7',
                'email' => 'mozan7@gmail.com',
                'password' => Hash::make('123'),

            ]

            ,
            [
                'name' => 'mozan8',
                'email' => 'mozan8@gmail.com',
                'password' => Hash::make('123'),

            ]
            ,
            [
                'name' => 'mozan9',
                'email' => 'mozan9@gmail.com',
                'password' => Hash::make('123'),

            ]
            ,
            [
                'name' => 'mozan10',
                'email' => 'mozan10@gmail.com',
                'password' => Hash::make('123'),

            ]
        ]);

    }
}
