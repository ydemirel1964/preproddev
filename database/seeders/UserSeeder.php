<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'ydemirel1964@gmail.com',
            'password' => Hash::make('Ydemirel18.'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'test1@gmail.com',
            'password' => Hash::make('test'),
        ]);
    }
}
