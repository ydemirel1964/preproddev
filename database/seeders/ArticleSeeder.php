<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<100;$i++)
        {
            DB::table('articles')->insert([
                'content_title' => Str::random(20),
                'content_description'=> Str::random(200),
                'content' => Str::random(1000),
                'user_id' => 1,
            ]);
        }
    }
}
