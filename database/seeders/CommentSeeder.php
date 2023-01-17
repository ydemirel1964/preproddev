<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'comment' => Str::random(100),
            'article_id'=>1,
            'user_id' => 1
        ]);
        DB::table('comments')->insert([
            'comment' => Str::random(150),
            'article_id'=>1,
            'user_id' => 1
        ]);
    }
}
