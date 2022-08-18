<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Article::truncate();

        $faker = \Faker\Factory::create();

        for($i=0; $i < 20; $i++)
        {
            Article::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'mobile' => $faker->name,
            ]);
        }
    }
}
