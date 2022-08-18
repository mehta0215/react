<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = \Faker\Factory::create();

       for($i = 0; $i < 20; $i++)
       {
        Author::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'github' => $faker->userName,
            'twitter' => $faker->userName,
            'location' => $faker->name,
            'latest_article_published' => $faker->date,
        ]);
       }

    }
}
