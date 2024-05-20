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
                // "userImage" => 'imageProfile/me.jpg',
            ],    [
                'name' => 'madara',
                'email' => 'madara@gmail.com',
                'password' => Hash::make('123'),
            ],
        ]);
        for ($i = 3; $i <= 100; $i++) {
            DB::table('users')->insert([
                [
                'name' => 'mozan'.$i,
                'email' => 'mozan'.$i.'@gmail.com',
                'password' => Hash::make('123'),
                ],
            ]);
        }
    }
}
